<?php

namespace App\Http\Controllers\MasterBundle\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    protected $table = 'student';

    protected  $primaryKey = 'id';

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
