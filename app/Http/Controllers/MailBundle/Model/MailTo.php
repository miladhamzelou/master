<?php

namespace App\Http\Controllers\MailBundle\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MailTo extends Model
{
    protected $table = 'send_mail_to';

    protected  $primaryKey = 'id';

    public function mail()
    {
        return $this->belongsTo(Mail::class, 'id');
    }

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

}
