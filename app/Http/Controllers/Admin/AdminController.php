<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\GeneralBundle\Model\Calendar;
use App\Http\Controllers\GeneralBundle\Model\FieldTrendCategory;
use App\Services\Farsi;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AdminController extends \App\Http\Controllers\AdminController
{
   public function index()
   {
       $this->layout->content = view('admin.index');
   }


    /**
     * change password
     */
    public function changePassword()
    {
        AuthController::changePassword();
        $this->layout->content = view('auth.changePassword');
    }
}
