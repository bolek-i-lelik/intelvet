<?php

namespace app\commands;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class SocketServer implements MessageComponentInterface
{
    protected $clients;
    public function __construct()
    {
        $this->clients = new \SplObjectStorage; // Для хранения технической информации об присоединившихся клиентах используется технология SplObjectStorage, встроенная в PHP
    }
   
    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $data = json_decode($msg, true); //для приема сообщений в формате json
        if (is_null($data))
        {
            echo "invalid data\n";
            return $from->close();
        }
        echo $from->resourceId."\n";//id, присвоенное подключившемуся клиенту

        //определение маршрута движения сообщения
        var_dump($data);
        $type = $data['type'];
        echo $type;
        switch($type){
            case 'offer':
                foreach ($this->clients as $client) {
                    $client->send($data['desc']);
                }
                break;
            case 'answer':
                foreach ($this->clients as $client) {
                    $client->send($data['desc']);
                }
                break;
            case 'ice1':
                foreach ($this->clients as $client) {
                    $data = json_encode($data);
                    $client->send($data);
                }
                break;
            case 'ice2':
                foreach ($this->clients as $client) {
                    $client->send($data['desc']);
                }
                break;
            case 'nahgup':
                foreach ($this->clients as $client) {
                    $client->send($data['desc']);
                }
                break;
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}