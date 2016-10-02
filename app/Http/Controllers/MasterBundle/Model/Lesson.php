<?php

namespace App\Http\Controllers\MasterBundle\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lesson extends Model
{
    protected $table = 'lesson';

    protected  $primaryKey = 'id';

    public function fieldCollection()
    {
        return $this->belongsToMany(FieldTree::class);
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
