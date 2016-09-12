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

    /**
     * @param string $user_id
     * @return mixed
     */
    public static function info($user_id = '')
    {
        $user_id = $user_id ? $user_id : Auth::id();
        return DB::table('user')
            ->leftJoin('user_info', 'user.id', '=', 'user_info.user_id')
            ->where('user.id', $user_id)
            ->first();
    }


    /**
     * @param string $user_id
     * @return mixed
     */
    public static function role($user_id = '')
    {
        $user_id = $user_id ? $user_id : Auth::id();
        $role = DB::table('user_role')
            ->leftJoin('role','role.id','=','user_role.role_id')
            ->where('user_role.user_id', $user_id)
            ->select('role.title')
            ->get();
        return $role;
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
