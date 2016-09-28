<?php

namespace App\Http\Controllers\MasterBundle\Admin;

use App\Http\Controllers\AdminController as Controller;
use App\Http\Controllers\MasterBundle\Model\UniversityTree;
use App\Http\Requests;

class UniversityTreeController extends Controller
{

    public function index()
    {
//        UniversityTree::create(['name' => 'دانشگاه بوعلی']);
        $this->layout->content = view('masterBundle.universityTree.admin.index');
        $nodes = UniversityTree::get()->toTree();
        $tree = '<div class="tree">';
        $traverse = function ($categories) use (&$traverse , &$tree) {
            $tree .= '<ul>';
            foreach ($categories as $key=>$category) {
                $tree .= '<li class="tree-select" data-id="'.$category->id.'">'.$category->name;
                if(count($category->children) > 0) {
                    $traverse($category->children);
                }
                $tree .='</li>';
            }
            $tree .= '</ul>';

        };
        $traverse($nodes);
        $tree .= '</div>';
        $this->layout->content->tree = $tree;
    }
}
