<?php

namespace App\Http\Controllers;

use App\Services\CoinService;
use Illuminate\View\View;

class CoinController extends Controller
{    
    /**
     * __construct
     *
     * @param CoinService $coinService
     * @return void
     */
    public function __construct(CoinService $coinService)
    {
        $this->service = $coinService;
    }
    
    /**
     * index
     *
     * @return Illuminate\View\View
     */
    public function index() : View
    {
        $coins = $this->service->getCoins();
        return view('home', ['coins' => $coins]);
    }

    /**
     * show
     *
     * @return Illuminate\View\View
     */
    public function show(String $coin) : View
    {
        $coinData = $this->service->getCoin($coin);
        return view('home', ['coin' => $coinData]);
    }
}
