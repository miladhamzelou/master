<?php

namespace App\Http\Controllers\GeneralBundle\Model;

use App\Http\Controllers\MasterBundle\Model\MyClassSession;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Calendar extends Model
{
    protected $table = 'calendar';

    protected  $primaryKey = 'id';

    public function myclassSession()
    {
        return $this->hasMany(MyclassSession::class);
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
