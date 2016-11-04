<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;

class AdminController extends \App\Http\Controllers\AdminController
{
   public function index()
   {
       $this->layout->content = view('admin.index');
   }

}
