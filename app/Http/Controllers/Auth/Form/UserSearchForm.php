<?php

namespace App\Http\Controllers\Auth\Form;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\FormBuilder;

class UserSearchForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('username', 'text', [
                'attr' => ['name' =>  'search[username]'],
            ])
            ->add('submit', 'submit', [
                'label' => 'Save form',
                'attr' => ['class' => 'searchBtn']
            ])
        ;
    }
}
