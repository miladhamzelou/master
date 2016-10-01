<?php

namespace App\Http\Controllers\MasterBundle\Admin;

use App\Http\Controllers\AdminController as Controller;
use App\Http\Controllers\MasterBundle\Model\UniversityTree;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Request;
use Validator;

class UniversityTreeController extends Controller
{

    /**
     * list reload ajax and link
     */
    public function treeList()
    {
        $nodes = UniversityTree::get()->toTree();
        $tree = '<div class="tree">';
        $traverse = function ($categories) use (&$traverse , &$tree) {
            $tree .= '<ul>';
            foreach ($categories as $key=>$category) {
                $tree .= '<li data-id="'.$category->id.'">'.$category->name;
                if(count($category->children) > 0) {
                    $traverse($category->children);
                }
                $tree .= '</li>';
            }
            $tree .= '</ul>';
        };
        $traverse($nodes);
        $tree .= '</div>';
        if(Request::ajax()) {
            return response()
                ->view(lcfirst(config('app.bundle')) . '.' . lcfirst(config('app.controller')) . '.' . lcfirst(config('app.prefix')) .'.tree-ajax', ['tree' => $tree], 200);
        }
        $this->layout->content = view(lcfirst(config('app.bundle')) . '.' . lcfirst(config('app.controller')) . '.' . lcfirst(config('app.prefix')) .'.admin.index');
        $this->layout->content->tree = $tree;
    }

    /**
     * @return \Illuminate\Http\Response
     * new node
     */
    public function newTree()
    {
        $item_selected = Input::get('item_id');
        return response()->view(lcfirst(config('app.bundle')) . '.' . lcfirst(config('app.controller')) . '.' . lcfirst(config('app.prefix')) .'.new',with(['modal_title' => trans('tree.create new node'),'item_selected' => $item_selected]));
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
            return Response()->view(lcfirst(config('app.bundle')) . '.' . lcfirst(config('app.controller')) . '.' . lcfirst(config('app.prefix')) .'.new-frm',
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
                    $node = new UniversityTree(['name' => trim($new)]);
                    $node->appendToNode(UniversityTree::find($item));
                    $node->save();
                }
            }
            die('ok');
        } else {
            foreach($new_node as $new)
                UniversityTree::create(['name' => $new]);
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
            return Response()->view(lcfirst(config('app.bundle')) . '.' . lcfirst(config('app.controller')) . '.' . lcfirst(config('app.prefix')) .'.edit-frm',
                [
                    'errors' => $validator->errors(),
                    'entity' => UniversityTree::find($id),
                ]
                ,200);
        }
        $id = UniversityTree::store($request->get('frm'),$id);
        die('ok');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function editTree()
    {
        $id = Input::get('item_id');
        $entity = UniversityTree::find($id);
        return response()->view(lcfirst(config('app.bundle')) . '.' . lcfirst(config('app.controller')) . '.' . lcfirst(config('app.prefix')) .'.edit',with(['entity' => $entity,'modal_title' => trans('tree.edit node')]));
    }

    /**
     * delete node
     */
    public function deleteTree()
    {
        $input = Input::get('items');
        foreach($input as $item) {
            $node = UniversityTree::find($item);
            $node->delete();
        }
        die;
    }
}
