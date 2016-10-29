<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\AdminController as Controller;
use App\Http\Controllers\Auth\Model\Role;
use App\Http\Controllers\Auth\Model\User;
use App\Http\Controllers\Auth\Model\UserInfo;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

    public function newUser()
    {
        $this->layout->content = view(lcfirst(config('app.bundle')) . '.' . lcfirst(config('app.controller')) . '.' . lcfirst(config('app.prefix')) . '.new');
        $this->layout->content->roles = Role::whereNotIn('id', [1,4])->get();
    }


    /**
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $request = App::make(\Illuminate\Http\Request::class);
        $frm = Input::get('frm');
        $validator = Validator::make($frm, [
            'user.username' => 'unique:user|min:3|required',
            'user.email' => 'unique:user|required|email',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $frm['user']['password']  = Hash::make($request->get('password'));
        $id = User::store($frm['user']);
        $frm['userInfo']['user_id'] = $id;
        UserInfo::store($frm['userInfo']);
        return redirect()->back()->with('alert-success', trans('public.successfully'));
    }

    public function checkUnique()
    {
        $table = Input::get('table');
        $field = Input::get('field');
        $value = Input::get('value');
        $check = DB::table($table)->where($field, $value)->value($field);
        if($check)
            die('1');
        die('0');
    }
}
