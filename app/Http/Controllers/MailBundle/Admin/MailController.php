<?php

namespace App\Http\Controllers\MailBundle\Admin;

use App\Http\Controllers\AdminController as Controller;
use App\Http\Controllers\Auth\Model\User;
use App\Http\Controllers\GeneralBundle\Model\Setting;
use App\Http\Controllers\MailBundle\Model\Mail;
use App\Http\Controllers\MailBundle\Model\MailAttachment;
use App\Http\Controllers\MailBundle\Model\MailerSetting;
use App\Http\Controllers\MailBundle\Model\MailTo;
use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Mockery\CountValidator\Exception;
use Request;
use Mail as mailer;

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
        $user = User::whereHas('role', function($q) {
            $q->where('role_id', 3);
        })->get();
        return response()->view('mailBundle.mail.admin.show', ['entity' => $entity, 'group_count' => count($user)]);
    }

    public function newMail()
    {
        if(Request::ajax()) {
            $term = Input::get('term');
            $user = DB::table('user')->where('email', 'like', '%'.$term.'%')->pluck('email');
            return response()->json($user);
        }
        $this->layout->content = view('mailBundle.mail.admin.new');
    }

    public function store()
    {
        ini_set('max_execution_time', 600);
        $request = App::make(\Illuminate\Http\Request::class);
        $attachment = [];
        $frm = $request->get('frm');
        $files = Input::get('file');
        // store in db
        if($request->get('send_group')) {
            $to = User::select('email')->whereHas('role', function($q) {
                $q->where('role_id', 3);
            })->lists('email');
        } else
            $to = explode(',' , $frm['to']);

        $mail_id = Mail::store($frm['mail']);
        foreach($to as $item) {
            if (!$item || $item == ' ') continue;
            MailTo::store([
                'mail_id' => $mail_id,
                'mail_address' => trim($item)
            ]);
            $final_to[] = $item;
        }
        if($files)
            foreach($files as $file) {
                rename(public_path().'/mailer-attachment/tmp/'.$file, public_path().'/mailer-attachment/'.time().'_'.$file);
                $attachment[] =  public_path().'/mailer-attachment/'.time().'_'.$file;
                MailAttachment::store([
                    'mail_id' => $mail_id,
                    'name' => time().'_'.$file
                ]);
            }
        try {
            mailer::send('mailBundle.mail.template.default', [ 'mail' => $frm['mail']] , function ($m) use ($frm, $final_to, $attachment) {
                $m->from(Setting::setting('info_mail'), Setting::setting('admin_name'));
                $m->to($final_to)->subject($frm['mail']['subject']);
                foreach($attachment as $attach)
                    $m->attach($attach);
            });
        } catch(\Exception $e) {
            return redirect()->back()->with(['alert-danger' => trans('validate.error')]);
        }
        return redirect()->back()->with(['alert-success' => trans('validate.done successfully')]);
    }

    public function delete($id) {
        Mail::destroy($id);
        MailTo::where('mail_id', $id)->delete();
        die;
    }

    public function attachment()
    {
        $request = App::make(\Illuminate\Http\Request::class);
        if($request->file('file')) {
            foreach($request->file('file') as $file) {
                $imageName = $file->getClientOriginalName();
                $file->move(
                    public_path() . '/mailer-attachment/tmp/', $imageName);
            }
        }
        die;
    }

    public function unlink()
    {
        $file = Input::get('file');
        if(file_exists(public_path().'/mailer-attachment/tmp/'.$file))
            unlink(public_path().'/mailer-attachment/tmp/'.$file);
        die;
    }

    public function sendAgain()
    {
        $this->layout->content = view('mailBundle.mail.admin.edit');
    }
}
