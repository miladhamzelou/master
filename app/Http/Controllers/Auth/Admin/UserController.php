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
        $user_info = Input::get("userInfo");
        $entity = User::whereHas('userInfo', function($q) use($user_info) {
            $q->where('name', 'like', '%'. $user_info['name'] . '%');
        })->with(['role', 'userInfo'])->orderBy($field ? $field : 'id' , $type ? $type : 'DESC')->toSql();
        dd($entity);

        if(Request::ajax()) {
            $this->layout = view('auth.user.admin.ajax',['entity' => $entity]);
            die($this->layout);
        }
        $this->layout->content = view('auth.user.admin.index',['entity' => $entity]);
    }


    /**
     * create search form
     */
    public function searchForm()
    {
        $this->layout = view(lcfirst(config('app.bundle')) . '.' . lcfirst(config('app.controller')) . '.' . lcfirst(config('app.prefix')) . '.search');
        die($this->layout);
    }

    public function show($id)
    {
        $entity = User::find($id);
        return response()->view('auth.user.admin.show', ['entity' => $entity]);
    }
}
