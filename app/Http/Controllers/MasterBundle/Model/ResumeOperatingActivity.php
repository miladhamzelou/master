<?php

namespace App\Http\Controllers\MasterBundle\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ResumeOperatingActivity extends Model
{
    protected $table = 'resume_operating_activity';

    protected  $primaryKey = 'id';

    public static function getResult()
    {
       $instance = new static();
       return DB::table($instance->table)
              ->select(['*', $instance->table . '.' . $instance->primaryKey . ' AS xid'])
              ;
    }

    /**
     * @param $frm
     * @param null $id
     * @return mixed
     */
    public static function store($frm, $id = null)
    {
        unset($frm['_token']);
        $instance = new Static();
        if (!$id)
            return DB::table($instance->table)->insertGetId($frm);
        else
            return DB::table($instance->table)->where($instance->primaryKey, $id)->update($frm);
    }

}
