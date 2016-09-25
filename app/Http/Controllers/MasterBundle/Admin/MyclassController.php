<?php

namespace App\Http\Controllers\MasterBundle\Admin;

use App\Http\Controllers\MasterBundle\Model\Myclass;
use App\Http\Controllers\MasterBundle\Model\Term;
use Symfony\Component\HttpFoundation\Request;
use Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class MyclassController extends Controller
{
    public function index()
    {
       $this->layout->content =  view('masterBundle.myclass.admin.index');
    }


    public function create()
    {
        $this->layout->content =  view('masterBundle.myclass.admin.create');
        $this->layout->content->term = Term::all();
    }

    public function store()
    {
        $request = App::make(Request::class);
        $validator = Validator::make($request->all(), [
            'frm.myclass.title' => 'required',
            'frm.myclass.term_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $id = Myclass::store();
    }
}
