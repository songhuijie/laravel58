<?php
/**
 * Created by PhpStorm.
 * User: hkx
 * Date: 18/5/29
 * Time: 下午8:14
 */
namespace  App\Http\Libraries;

class Lib_Entity{
    private static $_instance = null;
    public $_account_id = 0;
    public $_access_token= '';

    /**
     * 注册一个实例
     * @return Lib_Entity|null
     */
    public static function getInstance()
    {
        if(self::$_instance == null){
            self::$_instance = new Lib_Entity();
        }
        return self::$_instance;
    }
}
