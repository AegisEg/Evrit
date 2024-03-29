<?php
namespace App\Classes\Socket;

use App\Classes\Socket\Base\BaseSocket;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class ChatSocket extends BaseSocket
{
    protected $clients;
    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }
    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        echo "New connection!" . $conn->resourceId . "\n";
    }
    public function onMessage(ConnectionInterface $from, $msg)
    {
        foreach ($this->clients as $client) {
            if ($from !== $client) {
                $client->send($msg);
            }
        }
    }
    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        echo "Connection!" . $conn->resourceId . "has disconnected \n";
    }
    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo $e->getCode();
        $conn->close();
    }
}
