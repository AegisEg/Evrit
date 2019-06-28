<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use  Ratchet\Http\HttpServer;
use  Ratchet\Server\IoServer;
use  Ratchet\WebSocket\WsServer;
use App\Classes\Socket\Pusher;
use React\EventLoop\Factory as ReactLoop;
use React\ZMQ\Context as ReactContex;
use React\Socket\Server as ReactServer;
use Ratchet\Wamp\WampServer;

class PushServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'socketpush:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $loop = ReactLoop::create();
        $pusher = new Pusher;
        $context = new ReactContex($loop);
        $pull = $context->getSocket(\ZMQ::SOCKET_PULL);
        $pull->bind('tcp://127.0.0.1:5555');
        $pull->on('message', [$pusher, 'broadcast']);

        $webSock = new ReactServer('0.0.0.0:8080',$loop);
        
        $webServer = new IoServer(
            new HttpServer(
                new WsServer(
                    new WampServer(
                        $pusher
                    )
                )
            ),
            $webSock
        );
        $this->info('Run hundle');
        $loop->run();
    }
}
