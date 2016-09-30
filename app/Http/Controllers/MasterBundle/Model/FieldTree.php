<?php

namespace App\Http\Controllers\MasterBundle\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Kalnoy\Nestedset\NodeTrait;

class FieldTree extends Model
{
    use NodeTrait;

    public $timestamps = false;

    protected $fillable = ['name'];

    protected $table = 'field_tree';

    protected  $primaryKey = 'id';

    public function getLftName()
    {
        return 'lft';
    }

    public function getRgtName()
    {
        return 'rgt';
    }

    public static function tree()
    {
        $nodes = FieldTree::get()->toTree();
        $tree = '<div class="tree">';
        $traverse = function ($categories) use (&$traverse , &$tree) {
            $tree .= '<ul>';
            foreach ($categories as $key=>$category) {
                $tree .= '<li id="node_'.$category->id.'" data-id="'.$category->id.'">'.$category->name;
                if(count($category->children) > 0) {
                    $traverse($category->children);
                }
                $tree .= '</li>';
            }
            $tree .= '</ul>';
        };
        $traverse($nodes);
        $tree .= '</div>';
        return $tree;
    }

    /**
     * @param $frm
     * @param null $id
     * @return mixed
     */
    public static function store($frm, $id = null)
    {
        $instance = new Static();
        if (!$id)
            return DB::table($instance->table)->insertGetId($frm);
        else
            return DB::table($instance->table)->where($instance->primaryKey, $id)->update($frm);
    }

}
