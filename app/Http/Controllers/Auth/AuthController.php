<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Model\User;
use App\Http\Controllers\Auth\Model\UserExtra;
use App\Http\Controllers\Auth\Model\UserFollow;
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

    public function userfollow()
    {
        header("Content-Type: application/json;charset=utf-8");
        $frm['user_id'] = Input::get('user_id');
        $frm['following_id'] = Input::get('following_id');
        $id = UserFollow::store($frm);
        $user_data = UserExtra::find($frm['user_id']);
        if(empty($user_data)) {
            DB::table('user_extra')->insert(
                ['user_id' => $frm['user_id'],'following' => 1]
            );
        } else {
            UserExtra::store(['following' => $user_data['following'] + 1],$frm['user_id']);
        }

        $user_data = UserExtra::find($frm['following_id']);
        if(empty($user_data)) {
            DB::table('user_extra')->insert(
                ['user_id' => $frm['following_id'], 'follower' => 1]
            );
        } else {
            UserExtra::store(['follower' => $user_data['follower'] + 1],$frm['following_id']);
        }
        $follow =UserExtra::find($frm['user_id']);

        $following =UserExtra::find($frm['following_id']);

        die(json_encode(['following_id_follower' => $following['follower'],'following_id_following' => $following['following'],'follow_id_following' => $follow['following'],'follow_id_follower' => $follow['follower']]));
    }

    public function userUnfollow()
    {
        header("Content-Type: application/json;charset=utf-8");
        $frm['user_id'] = Input::get('user_id');
        $frm['following_id'] = Input::get('following_id');
        DB::table('user_follow')->where('user_id', $frm['user_id'])->where('following_id',$frm['following_id'])->delete();

        $user_data = UserExtra::find($frm['user_id']);
        UserExtra::store(['following' => $user_data['following'] - 1],$frm['user_id']);

        $user_data = UserExtra::find($frm['following_id']);
        UserExtra::store(['follower' => $user_data['follower'] - 1],$frm['following_id']);

        $follow =UserExtra::find($frm['user_id']);
        $following =UserExtra::find($frm['following_id']);
        die(json_encode(['following_id_follower' => $following['follower'],'following_id_following' => $following['following'],'follow_id_following' => $follow['following'],'follow_id_follower' => $follow['follower']]));
    }

}
