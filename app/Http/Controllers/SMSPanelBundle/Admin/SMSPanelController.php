<?php

namespace App\Http\Controllers\SMSPanelBundle\Admin;


use App\Http\Controllers\AdminController as Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

class SMSPanelController extends Controller
{
    public function SMSList()
    {
        $this->layout->content = view('SMSPanelBundle.SMSPanel.admin.index');
    }
}
