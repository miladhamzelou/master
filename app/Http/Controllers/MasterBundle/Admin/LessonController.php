<?php

namespace App\Http\Controllers\MasterBundle\Admin;

use App\Http\Controllers\AdminController as Controller;
use App\Http\Controllers\MasterBundle\Model\FieldTree;
use App\Http\Controllers\MasterBundle\Model\FieldTreeLesson;
use App\Http\Controllers\MasterBundle\Model\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Validator;

class LessonController extends Controller
{
    public function lessonList()
    {
        $entity = Lesson::all();
        $this->layout->content =  view('masterBundle.lesson.admin.index');
    }

    public function newLesson()
    {
        $field = FieldTree::tree();
        $field = str_replace('tree','tree-checkbox',$field);
        $this->layout->content = view('masterBundle.lesson.admin.new');
        $this->layout->content->tree = $field;
    }

    public function store($id = null)
    {
        $request = App::make(Request::class);
        $frm = $request->get('frm');
        $validator = Validator::make($request->all(), [
            'frm.title' => 'required',
            'fieldTree' => 'required'
        ],[
            'fieldTree.required' => trans('master.field trend collection  is required')
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $id = Lesson::store($frm);
        foreach($request->get('fieldTree') as $item) {
            FieldTreeLesson::store(['lesson_id' => $id,'field_tree_id' => $item]);
        }
        return redirect()->back()->with('alert-success', trans('public.successfully'));
    }


}
