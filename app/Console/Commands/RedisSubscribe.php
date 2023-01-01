<?php

namespace App\Console\Commands;

use App\Events\UpdatedRelativeCoordinates;
use App\Events\UserJoinedRoom;
use App\Events\UserVerified;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Redis;

class RedisSubscribe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:subscribe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subscribe to a Redis channel';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Redis::subscribe(['coordinate-channel', 'verification'], function ($message, $channel) {
            match ($channel){
                "coordinate-channel" => UpdatedRelativeCoordinates::dispatch([$message]),
                "verification" => UserVerified::dispatch(json_decode($message, true)["username"], json_decode($message, true)["code"])
            };
        });
    }
}
