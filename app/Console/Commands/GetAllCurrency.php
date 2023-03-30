<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Currency;

class GetAllCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'all:currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get all currancy rate';
    public  $GET_ALL_CURRENCY;
    public  $API_KEY;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->GET_ALL_CURRENCY='https://api.apilayer.com/fixer/latest';
        $this->API_KEY='z4upFdco3il1m1EFHiRFOSoth2IbJ2m0';

    }

    

    
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // try {
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->GET_ALL_CURRENCY,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'apikey: '.$this->API_KEY
          ),
        ));
        
        $response = curl_exec($curl);
        $response=(array)json_decode($response);
        curl_close($curl);
        $rates=(array)$response["rates"];
       foreach ($rates as $key => $value) {
      $value=  number_format((float)$value, 2, '.', '');
    
      $old_currency=Currency::where('name',$key)->first();
      $profit=$old_currency->profit;
     $final_rate= (($profit/100)*$value)+$value;
     $final_rate=  number_format((float)$final_rate, 2, '.', '');

     $old_currency->update(['rate'=>$value,'final_rate'=>$final_rate]);
        // echo 'key is :- ' .$key .'& value= '.$value;
    }
       
    // } catch (\Throwable $th) {
    //     \Log::info(["cron job get all currency error".$th]);

    // }
    $this->info('get All currency');
}
}
