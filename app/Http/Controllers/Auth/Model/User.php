<?php

namespace App\Http\Controllers\Auth\Model;

use App\Http\Controllers\RestaurantBundle\Model\Collection;
use App\Http\Controllers\RestaurantBundle\Model\Restaurant;
use App\Http\Controllers\ReviewBundle\Model\Review;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     *
     * The primary key
     * @var string
     *
     */
    protected $primaryKey = 'id';


    public function userInfo()
    {
        return $this->hasOne(UserInfo::class);
    }


    public function role()
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    }

    /**
     * @return mixed
     */
    public static function getResult()
    {
        $instance = new static();
        return DB::table($instance->table)
            ->select(['*', $instance->table . '.' . $instance->primaryKey . ' AS xid'])
            ->leftJoin('user_info', 'user.id', '=', 'user_info.user_id')
            ->leftJoin('user_role', 'user.id', '=', 'user_role.user_id');
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
