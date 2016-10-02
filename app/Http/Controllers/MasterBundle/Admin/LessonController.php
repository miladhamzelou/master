<?php

namespace App\Http\Controllers\MasterBundle\Admin;

use App\Http\Controllers\AdminController as Controller;
use App\Http\Controllers\MasterBundle\Model\FieldTree;
use App\Http\Controllers\MasterBundle\Model\FieldTreeLesson;
use App\Http\Controllers\MasterBundle\Model\Lesson;
use Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Validator;

class LessonController extends Controller
{
    public function lessonList()
    {
        $field = Input::get('field');
        $type= Input::get('type');
        $entity = Lesson::orderBy($field ? $field : 'id' , $type ? $type : 'DESC')->paginate();
        if(Request::ajax()) {
            $this->layout =  view('masterBundle.lesson.admin.ajax',['entity' => $entity]);
            die($this->layout);
        }
        $this->layout->content =  view('masterBundle.lesson.admin.index',['entity' => $entity]);
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
        $request = App::make(\Illuminate\Http\Request::class);
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
        $lesson_id = Lesson::store($frm, $id);
        if($id) {
            FieldTreeLesson::where('lesson_id', $id)->delete();
        }
        foreach($request->get('fieldTree') as $item) {
            FieldTreeLesson::store(['lesson_id' => $lesson_id == 0 ? $id : $lesson_id,'field_tree_id' => $item]);
        }
        return redirect()->back()->with('alert-success', trans('public.successfully'));
    }

    public function show($id)
    {
        $entity = Lesson::find($id);
        return response()->view('masterBundle.lesson.admin.show', ['entity' => $entity]);
    }

    public function delete($id) {
        Lesson::destroy($id);
        die;
    }

    public function edit($id)
    {
        $entity = Lesson::find($id);
        $field = FieldTree::tree();
        $field = str_replace('tree','tree-checkbox',$field);
        $this->layout->content = view('masterBundle.lesson.admin.edit',['entity' => $entity]);
        $this->layout->content->tree  = $field;
    }


}
