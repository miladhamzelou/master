<?php

namespace App\Http\Controllers\MasterBundle\Admin;

use App\Http\Controllers\AdminController as Controller;
use App\Http\Controllers\MasterBundle\Model\Resume;
use App\Http\Controllers\MasterBundle\Model\ScienceRanking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Validator;

class ResumeController extends Controller
{
    public function changeResume()
    {
        $request = App::make(Request::class);
        $resume = Resume::first();
        $this->layout->content = view('masterBundle.resume.admin.changeResume');
        $this->layout->content->resume = $resume;
        $this->layout->content->science_ranking = ScienceRanking::all();
        $frm = Input::get('frm');
        if($frm) {
            $validator = Validator::make($request->all(), [
                'frm.resume.name' => 'required',
                'frm.resume.family' => 'required',
                'frm.resume.science_ranking_id' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            if(empty($resume))
                Resume::store($frm['resume']);
            else
                Resume::store($frm['resume'], $resume['id']);
            return redirect()->back()->with(['alert-success' => trans('validate.done successfully') ]);
        }
    }
}
