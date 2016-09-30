<?php

namespace App\Http\Controllers\MasterBundle\Admin;

use App\Http\Controllers\AdminController as Controller;
use App\Http\Controllers\MasterBundle\Model\FieldTree;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Request;
use Validator;

class FieldTreeController extends Controller
{

    /**
     * list reload ajax and link
     */
    public function treeList()
    {
        $tree = FieldTree::tree();
        if(Request::ajax()) {
            return response()
                ->view('masterBundle.fieldTree.admin.tree-ajax', ['tree' => $tree], 200);
        }
        $this->layout->content = view('masterBundle.fieldTree.admin.index');
        $this->layout->content->tree = $tree;
    }

    /**
     * @return \Illuminate\Http\Response
     * new node
     */
    public function newTree()
    {
        $item_selected = Input::get('item_id');
        return response()->view('masterBundle.fieldTree.admin.new',with(['modal_title' => trans('tree.create new node'),'item_selected' => $item_selected]));
    }

    /**
     * @return \Illuminate\Http\Response
     * craete node
     */
    public function createTree()
    {
        $request = App::make(\Illuminate\Http\Request::class);
        $validator = Validator::make($request->all(), [
            'frm.name' => 'required',
        ]);
        if ($validator->fails()) {
            return Response()->view('masterBundle.fieldTree.admin.new-frm',
                [
                    'errors' => $validator->errors(),
                ]
                ,200);
        }
        $frm = Input::get('frm');
        $new_node = explode(',',$frm['name']);
        $selected = Input::get('item');
        if(!empty($selected)) {
            foreach($selected as $item) {
                foreach($new_node as $new) {
                    $node = new FieldTree(['name' => trim($new)]);
                    $node->appendToNode(FieldTree::find($item));
                    $node->save();
                }
            }
            die('ok');
        } else {
            foreach($new_node as $new)
                FieldTree::create(['name' => $new]);
            die('ok');
        }
    }


    /**
     * @param null $id
     * @return \Illuminate\Http\Response
     */
    public function update($id = null)
    {
        $request = App::make(\Illuminate\Http\Request::class);
        $validator = Validator::make($request->all(), [
            'frm.name' => 'required',
        ]);
        if ($validator->fails()) {
            return Response()->view('masterBundle.fieldTree.admin.edit-frm',
                [
                    'errors' => $validator->errors(),
                    'entity' => FieldTree::find($id),
                ]
                ,200);
        }
        $id = FieldTree::store($request->get('frm'),$id);
        die('ok');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function editTree()
    {
        $id = Input::get('item_id');
        $entity = FieldTree::find($id);
        return response()->view('masterBundle.fieldTree.admin.edit',with(['entity' => $entity,'modal_title' => trans('tree.edit node')]));
    }

    /**
     * delete node
     */
    public function deleteTree()
    {
        $input = Input::get('items');
        foreach($input as $item) {
            $node = FieldTree::find($item);
            $node->delete();
        }
        die;
    }
}
