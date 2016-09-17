<?php

namespace App\Http\Controllers\GeneralBundle\Admin;

use App\Http\Controllers\GeneralBundle\Model\UniversityTree;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class UniversityTreeController extends Controller
{
    /**
     * return all nodes
     */
    public function index()
    {
        $this->layout->content = view('generalBundle.universityTree.admin.index');
        $nodes = UniversityTree::get()->toTree();
        $tree = '<div class="tree">';
        $traverse = function ($categories) use (&$traverse , &$tree) {
                $tree .= '<ul>';
                foreach ($categories as $key=>$category) {
                    $tree .= '<li data-id="'.$category->id.'"><span class="fa fa-angle-left"></span>'.$category->name.'</li>';
                    if(count($category->children) > 0) {
                        $traverse($category->children);
                    }
                }
                $tree .= '</ul>';

        };
        $traverse($nodes);
        $tree .= '</div>';
        $this->layout->content->tree = $tree;
    }

    /**
     * @param $id
     */
    public function remove($id)
    {
//        dd('xxxx');
//        UniversityTree::remove($id);
        return response('ok');
    }
}
