<?php

namespace App\Http\Controllers\MasterBundle\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterClass extends Model
{
    protected $table = 'class';

    protected  $primaryKey = 'id';


    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function universityCollection()
    {
        return $this->belongsTo(UniversityTree::class, 'university_tree_id');
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
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
