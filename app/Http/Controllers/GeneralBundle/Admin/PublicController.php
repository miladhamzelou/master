<?php

namespace App\Http\Controllers\GeneralBundle\Admin;


use App\Http\Controllers\AdminController as Controller;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\GeneralBundle\Model\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PublicController extends Controller
{

    /**
     * change password
     */
    public function changePassword()
    {
        AuthController::changePassword();
        $this->layout->content = view('auth.changePassword');
    }

    public function editProfile()
    {
        AuthController::editProfile();
        $this->layout->content = view('auth.editProfile');
    }

    public function changeSetting()
    {
        $this->layout->content = view('generalBundle.public.admin.changeSetting');
        $setting = Setting::first();
        $this->layout->content->setting = $setting;
        $frm = Input::get('frm');
        if($frm) {
            if(empty($setting))
                Setting::store($frm);
            else
                Setting::store($frm, $setting['id']);
            return redirect()->back()->with(['alert-success' => trans('validate.done successfully')]);
        }
    }
}
