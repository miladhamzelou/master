<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Model\User;
use App\Http\Controllers\Auth\Model\UserExtra;
use App\Http\Controllers\Auth\Model\UserFollow;
use App\Http\Controllers\Auth\Model\UserInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController as Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Validator;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function login(Request $request)
    {

        if($request->all()){
            $validator = Validator::make($request->all(), [
                'field' => 'required',
                'password' => 'required',
            ],[
                'password.required' => 'این فیلد الزامی است.',
                'field.required' => 'این فیلد الزامی است.',
            ]);
            if ($validator->fails()) {
                return redirect(getLocale().'/Auth/login')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                if (Auth::attempt(['username' => $request['field'], 'password' => $request['password']]) || Auth::attempt(['email' => $request['field'], 'password' => $request['password']]))
                {
                    $auth = User::find(Auth::id());
                    foreach($auth['role'] as $role)
                        if (in_array($role['title'], Config::get('ACL.admin_access')))
                            return redirect()->intended(getLocale().'/Admin');
                } else {
                    return redirect(getLocale().'/Auth/login')->with(['alert-danger' => 'نام کاربری و رمز عبور اشتباه است.']);
                }
            }
        }

    }

    public function register(Request $request)
    {
        $username = Input::get('username');
        $email = Input::get('email');
        $pass = Input::get('password');

        if($request->all()){
            $validator = Validator::make($request->all(), [
                'username' => 'min:3|required|unique:user',
                'email' => 'unique:user|email',
                'password' => 'min:6|required|confirmed',
                'password_confirmation' => 'min:6|required',
            ],[
                'password.required' => 'این فیلد الزامی است.',
                'password_confirmation.required' => 'این فیلد الزامی است.',
                'username.required' => 'این فیلد الزامی است.',
                'username.min' => 'تعداد کاراکتر کافی نیست.',
                'username.unique' => 'قبلا در سیستم ثبت شده است.',
                'email.unique' => 'قبلا در سیستم ثبت شده است.',
                'email.email' => 'نامعتبر.',
            ]);
            if ($validator->fails()) {
                return redirect('/Auth/register')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $id = User::store(['username' => $username,'email' => $email,'password' => Hash::make($pass)]);
                Auth::loginUsingId($id);
                return redirect('user/'.User::username());
            }
        }
    }

    public static function changePassword()
    {
        $currentPassword = Input::get('password');
        $newPassword = Input::get('newpassword');
        $retypePassword = Input::get('passwordagain');
        if ($currentPassword && $newPassword && $retypePassword) {
            $usr = User::find(Auth::id());
            if (!Hash::check($currentPassword, $usr->password)) {
                return redirect()->back()->withInput()->with(['alert-danger' => trans('validate.your current password is not correct')]);
            } else if ($newPassword != $retypePassword) {
                return redirect()->back()->withInput()->with(['alert-danger' => trans('validate.failure to comply with previous password')]);
            } else {
                $usr->password = Hash::make($newPassword);
                $usr->save();
                Auth::logout();
                return redirect(getCurrentURL('localization').'/Auth/logout');
            }
        }
    }

    public static function editProfile()
    {
        $frm = Input::get('frm');
        if($frm) {
            $validator = Validator::make($frm, [
                'userInfo.name' => 'required',
                'userInfo.family' => 'required',
                'userInfo.mobile' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            if(UserInfo::find(Auth::id()))
                UserInfo::store($frm['userInfo'], Auth::id());
            else {
                $frm['userInfo']['user_id'] = Auth::id();
                UserInfo::store($frm['userInfo']);
            }
            return redirect()->back()->with(['alert-success' => trans('validate.done successfully')]);
        }
    }

}
