<?php
namespace App\Http\Models;
/**
 * Created by PhpStorm.
 * User: shj
 * Date: 2019/3/29
 * Time: 下午5:38
 */
use Illuminate\Database\Eloquent\Model;
class Users extends Model{


    protected $table = 'users';

    //去掉我创建的数据表没有的字段
    protected $fillable = [
        'name', 'password','email'
    ];

    //去掉我创建的数据表没有的字段
    protected $hidden = [
        'password'
    ];
    //将密码进行加密
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
