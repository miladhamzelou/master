<?php

namespace App\Http\Controllers\MasterBundle\Model;

use App\Http\Controllers\GeneralBundle\Model\Tree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MyclassDateTime extends Model
{
    protected $table = 'class_datetime';

    protected  $primaryKey = 'id';

    public function myclass()
    {
        return $this->belongsTo(Myclass::class);
    }

    public function myclassSession()
    {
        return $this->hasMany(MyclassSession::class);
    }

    public function tree()
    {
        return $this->belongsTo(Tree::class);
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
