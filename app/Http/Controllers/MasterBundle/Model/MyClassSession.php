<?php

namespace App\Http\Controllers\MasterBundle\Model;

use App\Http\Controllers\GeneralBundle\Model\Calendar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MyclassSession extends Model
{
    protected $table = 'class_session';

    protected  $primaryKey = 'id';

    public function myclassDateTime()
    {
        return $this->belongsTo(MyclassDateTime::class);
    }

    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
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
