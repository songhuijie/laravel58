<?php
/**
 * Created by PhpStorm.
 * User: shj
 * Date: 2019/4/2
 * Time: 下午3:11
 */
namespace App\Http\Libraries;

use Illuminate\Support\Facades\Cache;

class Lib_make{

    public static $scope = ['manage_accounts','collect_payments','view_user','preapprove_payments','send_money'];
    public static $redirect_url = 'https://www.likeme.link/wepay/oauth';
    public static $redirect_state_url = 'http://www.laravel58.com:8888/oauth';
    public static $redirect_live_success_uri = 'https://www.likeme.link/wepay/success/';
    public static $redirect_state_success_uri = 'http://www.laravel58.com:8888/success/';

    /**
     * 初始化 we_pay
     * @param int $status
     */
    public static function WePayInit($status = 0){

        if($status == 0){
            $client_id = config('app.we_pay.state.client_id');
            $client_secret = config('app.we_pay.state.client_secret');
            $we_pay = \WePay::useStaging($client_id,$client_secret,null);
        }else{
            $client_id = config('app.we_pay.live.client_id');
            $client_secret = config('app.we_pay.live.client_secret');
            $we_pay = \WePay::useProduction($client_id,$client_secret,null);
        }

        return $we_pay;
    }

    /**
     * 获取 登陆账号 url
     * @param int $status
     * @return string
     */
    public static function oauthUrl($status = 0){


        if($status == 0){
            $redirect_url = self::$redirect_state_url;
        }else{
            $redirect_url = self::$redirect_url;
        }

        $oauth_url = \WePay::getAuthorizationUri(self::$scope, $redirect_url);

        return $oauth_url;

    }

    /**
     *
     * 获取token
     * @param $status
     * @param $code
     * @return false|\StdClass
     */
    public static function getToken($status,$code){


        if($status == 0){
            $redirect_url = self::$redirect_state_url;
        }else{
            $redirect_url = self::$redirect_url;
        }
        $info = \WePay::getToken($code, $redirect_url);

        return $info;
    }


    /**
     * 账号用户 信息
     * @param $access_token
     * @return \StdClass
     * @throws \WePayException
     */
    public static function WeInfo($access_token){


        $wepay = new \WePay($access_token);

        $accounts = $wepay->request('account/find');


        return $accounts;
    }


    /**
     * 创建 订单
     * @param $access_token
     * @param $user_id
     * @param $risk_token
     * @param $ip
     * @return \StdClass
     * @throws \WePayException
     */
    public static function WeCreate($access_token,$user_id,$risk_token,$ip){


        $wepay = new \WePay($access_token);

        $checkout = $wepay->request('checkout/create', array(
            'account_id' => $user_id,
            'amount' => 60,
            'currency'=>'USD',
            'short_description'=>'vip',
            'type'=>'goods'
        ), $risk_token, $ip);


        return $checkout;
    }

    /**
     * 创建 用户
     * @param $access_token
     * @param $name
     * @param $description
     * @return \StdClass
     * @throws \WePayException
     */
    public static function CreateAccount($access_token,$name,$description){


        $wepay = new \WePay($access_token);
        $response = $wepay->request('account/create/', array(
            'name'         => $name,
            'description'  => $description
        ));

        return $response;
    }

    public static function PayIframe($status,$access_token){


        if($status == 0){
            $client_id = config('app.we_pay.state.client_id');
            $client_secret = config('app.we_pay.state.client_secret');
        }else{
            $client_id = config('app.we_pay.live.client_id');
            $client_secret = config('app.we_pay.live.client_secret');
        }
        $wepay = new \WePay($access_token);
        // create the pre-approval
        if($status == 0){
            $redirect_uri = self::$redirect_state_success_uri;
        }else{
            $redirect_uri = self::$redirect_live_success_uri;
        }

        $response = $wepay->request('preapproval/create', array(
            'client_id'         => $client_id,
            'client_secret'         => $client_secret,
            'period'            => 'once',
            'amount'            => '1',
            'mode'              => 'iframe',
            'short_description' => 'A brand new soccer ball.',
            'redirect_uri'      => $redirect_uri
        ));

        return $response;
    }


    public static function checkoutLook($access_token,$account_id,$preapproval_id){

        $wepay = new \WePay($access_token);

        // create the checkout
        $response = $wepay->request('checkout/create', array(
            'account_id'        => $account_id,
            'amount'            => '1',
            'short_description' => 'Payment for test project',
            'type'              => 'donation',
            'currency'          => 'USD',
            'payment_method'    => array(
                'type'          => 'preapproval',
                'preapproval'   => array(
                    'id'        => $preapproval_id
                )
            )
        ));
        return $response;
    }



    public static function AllTotal($cache_key,$total){

        $num = Cache::get($cache_key);
        if(empty($num)){
            Cache::put($cache_key,$total,86400);
        }else{
            $all = self::addForMes($num,$total);
            Cache::put($cache_key,$all,86400);
        }
    }





    public static function addForMes($a,$b){
        return bcadd($a, $b, 4);
    }

    public static function array_add($arr1,$arr2)
    {
        //根据键名获取两个数组的交集
        $arr=array_intersect_key($arr1, $arr2);
        //遍历第二个数组，如果键名不存在与第一个数组，将数组元素增加到第一个数组
        foreach($arr2 as $key => $value){
            if(!array_key_exists($key, $arr1)){
                $arr1[$key] = $value;
            }
        }
        //计算键名相同的数组元素的和，并且替换原数组中相同键名所对应的元素值
        foreach($arr as $key => $value){
            $arr1[$key] = $arr1[$key] + $arr2[$key];
        }
        //返回相加后的数组
        return $arr1;
    }
}
