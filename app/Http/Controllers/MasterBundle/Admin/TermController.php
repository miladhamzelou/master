<?php

namespace App\Http\Controllers\MasterBundle\Admin;

use App\Facades\FarsiFacade;
use App\Http\Controllers\AdminController as Controller;
use App\Http\Controllers\MasterBundle\Model\Term;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Request;
use Validator;

class TermController extends Controller
{
    public function termList()
    {
        $field = Input::get('field');
        $type= Input::get('type');
        $entity = Term::orderBy($field ? $field : 'id' , $type ? $type : 'DESC')->paginate();
        if(Request::ajax()) {
            $this->layout =  view('masterBundle.term.admin.ajax',['entity' => $entity]);
            die($this->layout);
        }
        $this->layout->content =  view('masterBundle.term.admin.index',['entity' => $entity]);
    }

    public function create()
    {
        $this->layout->content = view('masterBundle.term.admin.new');
    }

    public function store($id = null)
    {
        $request = App::make(\Illuminate\Http\Request::class);
        $frm = $request->get('frm');
        $validator = Validator::make($request->all(), [
            'frm.title' => 'required',
            'frm.code' => 'required',
            'frm.from_date' => 'required',
            'frm.to_date' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $frm['from_date'] = FarsiFacade::j2gdate($frm['from_date']);
        $frm['to_date'] = FarsiFacade::j2gdate($frm['to_date']);
        if($frm['from_date'] >= $frm['to_date'])
            return redirect()->back()->withInput()->with('alert-danger', trans('master.start and end dates of the term has not been entered correctly'));
        $confilict = Term::where('from_date', '>=', $frm['from_date'])->where('to_date', '<=', $frm['to_date'])->get();
        if (count($confilict) > 0)
            return redirect()->back()->withInput()->with('alert-warning', trans('master.other entries interferes with the interaction term'));
        Term::store($frm, $id);
        return redirect()->back()->withInput()->with('alert-success', trans('public.successfully'));
    }

    public function show($id)
    {
        $entity = Term::find($id);
        return response()->view('masterBundle.term.admin.show', ['entity' => $entity]);
    }

    public function delete($id) {
        Term::destroy($id);
        die;
    }

    public function edit($id)
    {
        $entity = Term::find($id);
        $this->layout->content = view('masterBundle.term.admin.edit',['entity' => $entity]);
    }
}
