<?php

namespace App\Http\Controllers\MailBundle\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MailerSetting extends Model
{
    protected $table = 'mailer_setting';

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
        $instance = new Static();
        if (!$id)
            return DB::table($instance->table)->insertGetId($frm);
        else
            return DB::table($instance->table)->where($instance->primaryKey, $id)->update($frm);
    }

    public static function setting($field)
    {
        $instance = new static();
        return DB::table($instance->table)->orderBy('id', 'desc')->value($field);
    }


}
