<?php 

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CoinService 
{
    protected String $url = 'https://economia.awesomeapi.com.br/json';

    public function getCoins() : array
    {
        $response = Http::get("{$this->url}/all");
        $coins = $this->getData($response, 'coins');
        return $coins;
    }
    
    public function getCoin(String $coin, int $days) : array
    {
        $response = Http::get("{$this->url}/{$coin}/{$days}");
        $coinData = $this->getData($response, "coins/{$coin}");
        return $coinData;
    }

    /**
     * getData
     *
     * @param  mixed $response
     * @param  String $dataName
     * @return array
     */
    private function getData($response, String $dataName) :? array
    {
        if(!$response->serverError()) {
            $data = $response->json();
            Cache::put($dataName, $data);
            return $data;
        } else {
            return Cache::get($dataName);
        }
    }
}