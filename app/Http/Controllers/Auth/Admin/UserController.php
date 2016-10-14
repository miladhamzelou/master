<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\AdminController as Controller;
use App\Http\Controllers\Auth\Model\User;
use Illuminate\Support\Facades\Input;
use Validator;
use Request;

class UserController extends Controller
{
    public function usersList()
    {
        $field = Input::get('field');
        $type= Input::get('type');
        $entity = User::orderBy($field ? $field : 'id' , $type ? $type : 'DESC')->paginate();
        if(Request::ajax()) {
            $this->layout = view('auth.user.admin.ajax',['entity' => $entity]);
            die($this->layout);
        }
        $this->layout->content = view('auth.user.admin.index',['entity' => $entity]);
    }
}
