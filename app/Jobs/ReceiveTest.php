<?php

namespace App\Jobs;


use App\Libraries\Lib_make;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ReceiveTest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * 任务最大尝试次数。
     *
     * @var int
     */
    public $tries = 3;

    /**
     * 任务运行的超时时间。
     *
     * @var int
     */
    public $timeout = 120;

    protected $message;

    /**
     * Create a new job instance.
     * ReceiveTest constructor.
     * @param $message
     */
    public function __construct($message)
    {
        //
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $data = json_decode($this->message,true);
        if($data){
            $all_total   = isset($data['all'])   ? $data['all']:0;
            $robot_total = isset($data['robot']) ? $data['robot']:0;
            $user_total  = isset($data['user'])  ? $data['user']:0;

            $all_key = 'all_total';
            $robot_key = 'robot_total';
            $user_key = 'user_total';
            Lib_make::AllTotal($all_key,$all_total);
            Lib_make::AllTotal($robot_key,$robot_total);
            Lib_make::AllTotal($user_key,$user_total);

            Lib_make::RedisAllTotal($all_key,$all_total);
            Lib_make::RedisAllTotal($robot_key,$robot_total);
            Lib_make::RedisAllTotal($user_key,$user_total);
        }
    }
}
