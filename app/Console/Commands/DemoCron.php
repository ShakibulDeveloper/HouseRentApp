<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;
use App\Models\Orders;
use App\Mail\rentMail;
use Mail;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

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
     * @return int
     */
    public function handle()
    {
        $unpaid_users = Orders::where('to', '<' , Carbon::today())->get();
        
        foreach ($unpaid_users as $user) {
           
            
            $details = [
                'p_id' => $user->property_id
            ];

            try {
                Mail::to(findUser($user->user_id)->email)->send(new rentMail($details));
              } catch (\Throwable $th) {
                //throw $th;
              }


        }

    }
}
