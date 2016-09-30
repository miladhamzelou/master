<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Auth\Form\UserForm;
use App\Http\Controllers\Auth\Form\UserSearchForm;
use App\Http\Controllers\Auth\Model\UserInfo;
use App\Http\Controllers\AdminController as Controller;
use App\Http\Controllers\Auth\Model\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Validator;

class UserController extends Controller
{

    use FormBuilderTrait;

    /**
     * index function
     *
     * return all entity
     */
    public function index()
    {
        $field = Input::get('field');
        $type= Input::get('type');
        $search = Input::get('search');
        $entity = User::
            whereRaw($this->where)
//            ->whereNotIn('role_id',[1])
            ->orderBy($field ? $field : 'id' , $type ? $type : 'DESC')
            ->paginate(10);
        $this->setContent($entity);
    }

    /**
     * create search form
     */
    public function searchForm()
    {
        $form = $this->form(UserSearchForm::class, [
            'method' => 'POST',
            'url' => getCurrentURL('controller').'/index',
            'novalidate' => 'novalidate',
        ]);
        $this->layout = view(lcfirst(config('app.bundle')) . '.' . lcfirst(config('app.controller')) . '.' . lcfirst(config('app.prefix')) . '.search', compact('form'));
        die($this->layout);
    }

    /**
     * create function
     *
     */
    public function create()
    {
        $form = $this->form(UserForm::class, [
                'method' => 'POST',
                'novalidate' => 'novalidate',
                'url' => getCurrentURL('controller').'/store',
         ]);
        return view(lcfirst(config('app.bundle')) . '.' . lcfirst(config('app.controller')) . '.' . lcfirst(config('app.prefix')) . '.edit', compact('form'));
    }

    /**
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $frm = Input::get('frm');
        $validator = Validator::make($frm, [
            'user.username' => 'unique:user|min:3|required',
            'user.email' => 'unique:user|required',
            'user.password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $frm['user']['password']  = Hash::make($frm['user']['password']);
        $id = User::store($frm['user']);
        $frm['userInfo']['user_id'] = $id;
        UserInfo::store($frm['userInfo']);
        return redirect()->back()->with('alert-success', trans('public.successfully'));
    }

//    /**
//     * @param $id
//     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
//     */
//    public function edit($id)
//    {
//        $entity = User::findOrFail($id);
//        $form = $this->form(UserForm::class, [
//            'model' => $entity,
//            'method' => 'POST',
//            'novalidate' => 'novalidate',
//            'url' => getCurrentURL('controller').'/store/' . $id,
//        ]);
//        return view(lcfirst(config('app.bundle')) . '.' . lcfirst(config('app.controller')) . '.' . lcfirst(config('app.prefix')) . '.edit', compact('form'));
//    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $entity = User::findOrNew($id);
        $this->setContent($entity, 'show');

    }

//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return Response
//     */
//    public function destroy($id)
//    {
//        $user = User::find($id);
//        Collection::where('user_id',$id)->delete();
//        RestaurantGallery::where('user_id',$id)->delete();
//        RestaurantMenu::where('user_id',$id)->delete();
//        UserCollection::where('user_id',$id)->delete();
//        UserFollow::where('user_id',$id)->orWhere('following_id',$id)->delete();
//        Restaurant::where('user_id',$id)->delete();
//        Review::where('user_id',$id)->delete();
//        UserExtra::destroy($id);
//        User::destroy($id);
//    }

    /**
    * @param $id
    * @param $field
    */
    public function changeEnum($id)
    {
        $enum = Input::get('enum') == 1 ? 0 : 1 ;
        $field = Input::get('field');
        $frm = [$field => $enum];
        $id = User::store($frm, $id);
        die($id);
    }
}
