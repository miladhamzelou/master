<?php

namespace App\Http\Controllers\MailBundle\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MailAttachment extends Model
{
    protected $table = 'mail_attachment';

    protected  $primaryKey = 'id';

    public function mail(){
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
        unset($frm['_token']);
        $instance = new Static();
        if (!$id)
            return DB::table($instance->table)->insertGetId($frm);
        else
            return DB::table($instance->table)->where($instance->primaryKey, $id)->update($frm);
    }

}
