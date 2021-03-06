<?php

namespace App\Http\Controllers\MailBundle\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mail extends Model
{
    protected $table = 'send_mail';

    protected  $primaryKey = 'id';

    public function mailTo()
    {
        return $this->hasMany(MailTo::class, 'mail_id');
    }

    public function mailAttachment() {
        return $this->hasMany(MailAttachment::class, 'mail_id');
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
            DB::table($instance->table)->where($instance->primaryKey, $id)->update($frm);
        return $id;
    }

}
