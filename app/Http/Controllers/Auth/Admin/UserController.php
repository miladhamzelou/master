<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\AdminController as Controller;
use App\Http\Controllers\Auth\Model\Role;
use App\Http\Controllers\Auth\Model\User;
use Illuminate\Support\Facades\DB;
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

        $sub = DB::table('user_role')
            ->select('*', DB::raw("group_concat(role.title) as roles"))
            ->leftJoin('role', 'role.id', '=', 'user_role.role_id')
            ->groupBy('user_role.user_id')
            ->toSql();

        $entity = DB::table('user')
            ->select('*', 'user.id as xid')
            ->leftJoin('user_info', 'user.id', '=', 'user_info.user_id')
            ->leftJoin(DB::raw("({$sub}) as s"), 's.user_id', '=', 'user.id')
            ->whereRaw($this->where)
            ->orderBy($field ? $field : 'xid', $type ? $type : 'DESC')
            ->paginate();

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
        $this->layout->roles = Role::all();
        die($this->layout);
    }

    public function show($id)
    {
        $entity = User::find($id);
        return response()->view('auth.user.admin.show', ['entity' => $entity]);
    }

    /**
     * @param $id
     * @param $field
     */
    public function changeEnum($id)
    {
        $user = User::find($id);
        $enum = Input::get('enum') == 1 ? 0 : 1 ;
        $field = Input::get('field');
        $frm = [$field => $enum];
        $id = User::store($frm, $id);
        die($id);
    }
}
