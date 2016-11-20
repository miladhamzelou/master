<?php

namespace App\Http\Controllers\MailBundle\Admin;

use App\Http\Controllers\AdminController as Controller;
use App\Http\Controllers\MailBundle\Model\Mail;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Request;

class MailController extends Controller
{
    public function mailList()
    {
        $field = Input::get('field');
        $type= Input::get('type');
        $entity = Mail::orderBy($field ? $field : 'id' , $type ? $type : 'DESC')->paginate();
        if(Request::ajax()) {
            $this->layout =  view('mailBundle.mail.admin.ajax', ['entity' => $entity]);
            die($this->layout);
        }
        $this->layout->content = view('mailBundle.mail.admin.index',  ['entity' => $entity]);
    }

    public function show($id)
    {
        $entity = Mail::find($id);
        return response()->view('mailBundle.mail.admin.show', ['entity' => $entity]);
    }

    public function newMail()
    {
        $this->layout->content = view('mailBundle.mail.admin.new');
    }

    public function delete($id) {
        Mail::destroy($id);
        die;
    }
}
