<?php

namespace App\Http\Controllers\Auth\Form;

use App\Http\Controllers\Auth\Model\Role;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\FormBuilder;

class UserForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('username', 'text', [
                'label' => 'نام کاربری:',
                'attr' => ['name' =>  'frm[user][username]'],
            ])
            ->add('email', 'text', [
                'label' => 'پست الکترونیک:',
                'attr' => ['name' =>  'frm[user][email]'],
            ])
            ->add('userInfo[name]', 'text', [
                'label' => 'نام:',
                'attr' => ['name' =>  'frm[userInfo][name]'],

            ])
            ->add('userInfo[family]', 'text', [
                'label' => 'فامیلی:',
                'attr' => ['name' =>  'frm[userInfo][family]'],

            ])
            ->add('userInfo[mobile]', 'text', [
                'label' => 'موبایل:',
                'attr' => ['name' =>  'frm[userInfo][mobile]'],

            ])
            ->add('role_id', 'entity', [
                'label' => 'نقش',
                'attr' => ['name' => 'frm[user][role_id]'],
                'wrapper' => ['class' => 'form-group'],
                'class' => Role::class,
                'property' => 'title',
                'query_builder' => function (Role $q) {
                    // If query builder option is not provided, all data is fetched
                    return $q->whereNotIn('id',[1]);
                }
            ])
            ->add('password', 'password', [
                'label' => 'پسورد:',
                'attr' => ['name' =>  'frm[user][password]'],
            ])
            ->add('submit', 'submit', [
                'label' => trans('public.Send Request'),
                'attr' => ['class' => 'btn btn-primary pull-left'],
                'wrapper' => ['class' => 'form-group col-md-12'],
            ])
        ;
    }
}
