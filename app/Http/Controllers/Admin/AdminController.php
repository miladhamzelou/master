<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\GeneralBundle\Model\Calendar;
use App\Services\Farsi;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
   public function index()
   {
       $this->layout->content = view('admin.index');
   }
}
