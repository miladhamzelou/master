<?php

namespace App\Http\Controllers\MasterBundle\Admin;

use App\Facades\FarsiFacade;
use App\Http\Controllers\AdminController as Controller;
use App\Http\Controllers\MasterBundle\Model\Lesson;
use App\Http\Controllers\MasterBundle\Model\MasterClass;
use App\Http\Controllers\MasterBundle\Model\Term;
use App\Http\Controllers\MasterBundle\Model\UniversityTree;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Request;
use Validator;

class MasterClassController extends Controller
{

    public function classList()
    {
        $field = Input::get('field');
        $type= Input::get('type');
        $entity = MasterClass::with(['lesson', 'universityCollection', 'term'])->orderBy($field ? $field : 'id' , $type ? $type : 'DESC')->paginate();
        if(Request::ajax()) {
            $this->layout =  view('masterBundle.masterClass.admin.ajax', ['entity' => $entity]);
            die($this->layout);
        }
        $this->layout->content =  view('masterBundle.masterClass.admin.index', ['entity' => $entity]);
    }


    public function newClass()
    {
        $this->layout->content = view('masterBundle.masterClass.admin.new');
        $this->layout->content->term = Term::all();
        $this->layout->content->university = UniversityTree::withDepth()->having('depth','=',0)->get();
        $this->layout->content->lesson = Lesson::all();
    }

    public function store()
    {
        $request = App::make(\Illuminate\Http\Request::class);
        $frm = $request->get('frm');
        if ($request->get('exam_hour') && $request->get('exam_minute') && $frm['exam_date']) {
            $frm['exam_time'] = $request->get('exam_hour').':'.$request->get('exam_minute').':'.'00';
            $frm['exam_date'] = FarsiFacade::j2gDate($frm['exam_date']);
        }
        $validator = Validator::make($request->all(),
            [
                'frm.group' => 'required',
                'frm.term_id' => 'required',
                'frm.lesson_id' => 'required',
                'frm.university_tree_id' => 'required'
            ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $group = explode(',', $frm['group']);
        foreach($group as $grp) {
            $frm['group'] = $grp;
            MasterClass::store($frm);
        }
        return redirect()->back()->withInput()->with(['alert-success' => trans('public.done successfully')]);
    }
}
