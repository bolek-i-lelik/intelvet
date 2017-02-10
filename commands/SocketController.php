<?php

namespace app\commands;

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use yii\console\Controller;
use React\EventLoop\Factory;
use React\ZMQ\Context;
//use React\Socket\Server;
use Ratchet\Wamp\WampServer;
use app\commands\SocketServer; //не забудьте поменять, если отличается 

class SocketController extends Controller
{
    public function actionStartSocket($port=8080)
    {
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new SocketServer()
                )
            ),
            $port
        );
        $server->run();
    }
}