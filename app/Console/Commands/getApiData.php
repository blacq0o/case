<?php

namespace App\Console\Commands;

use App\Models\Api;
use App\Repositories\TaskRepository;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class getApiData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apiData:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api Verilerini Çekip DataBase Kaydeder.';

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
     * @throws GuzzleException
     */
    public function handle()
    {
        try {
            $apis = Api::all();

            $client = new Client();
            foreach ($apis as $api){
                $response = $client->get($api->api_url);
                if($response->getStatusCode() == "200"){
                    if($response->getBody()){
                        $taskRepo = new TaskRepository();
                        $bodyData = json_decode($response->getBody());
                        $result = $taskRepo->setApiData($bodyData,$api->api_type);
                        if(!$result){
                            $this->line("Hata Kayıt Başarısız") ;
                        }
                    }
                }else{
                    $this->line("Servise Bağlantısı Başarısız: ".$response->getStatusCode()) ;
                }
            }
        }catch (\Exception $e){
            Log::critical('Hata',[
                'error_code' => $e->getCode(),
                'message' => $e->getMessage()
            ]);
        }
    }
}
