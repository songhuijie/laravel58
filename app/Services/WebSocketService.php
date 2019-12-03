<?php
/**
 * Created by PhpStorm.
 * User: shj
 * Date: 2019/10/22
 * Time: 下午4:37
 */
namespace App\Services;

use Hhxsv5\LaravelS\Swoole\WebSocketHandlerInterface;
use Illuminate\Support\Facades\DB;
use Swoole\Http\Request;
use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

/**
 * @see https://wiki.swoole.com/wiki/page/400.html
 */
class WebSocketService implements WebSocketHandlerInterface
{
    private $sessionid = null;

    public function __construct()
    {

    }

    public function sendByUid($server,$uid,$data,$offline_msg = false){

        $fd = app('swoole')->wsTable->get('uid:'.$uid);//获取接受者fd
        if ($fd == false){
            //这里说明该用户已下线，日后做离线消息用
            if ($offline_msg) {
                $data = [
                    'user_id'   => $uid,
                    'data'      => json_encode($data),
                ];
            }
            return false;
        }
        return $server->push($fd['value'], json_encode($data));//发送消息
    }


    public function onOpen(\swoole_websocket_server $server, \swoole_http_request $request)
    {
        // TODO: Implement onOpen() method.
        if(!isset($request->get["sessionid"])){
            $data = [
                "type" => "token "
            ];
            $server->push($request->fd, json_encode($data));
            return;
        }else{
            $data = [
                "type" => "token "
            ];
            $server->push($request->fd, json_encode($data));
            return;
        }
    }

    public function onMessage(\swoole_websocket_server $server, \swoole_websocket_frame $frame)
    {
        // TODO: Implement onMessage() method.

        $info = json_decode($frame->data);
//        $sessionid = $this->sessionid;//获取sessionid
//        session()->setId($sessionid);//赋值sessionid
//        session()->start();//开启session
//        $session = session('user');//获取session中信息
//        if($session == null){
//            $data = [
//                "type" => "token_expire"
//            ];
//            $server->push($frame->fd, json_encode($data));
//        }
//        if (!isset($info->type)) {
//            return;
//        }
        //根据type字段判断消息类型并执行对应操作
        switch ($info->type) {
            //心跳包
            case "ping":
                break;
            //聊天消息
            case "chatMessage":

                break;
            //发送好友请求
            default:
                $data =[
                    'msg'=>'www'
                ];
                $this->sendByUid($server,$info->id,$data);
                break;
        }
    }

    public function onClose(\swoole_websocket_server $server, $fd, $reactorId)
    {
        // TODO: Implement onClose() method.
    }
}
