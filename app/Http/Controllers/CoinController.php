<?php

namespace App\Http\Controllers;

use App\Services\CoinService;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Request;

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
    public function show(Request $request, String $coin) : View
    {
        $days = $request->query('days')?? 15;
        $coinData = $this->service->getCoin($coin, $days);
        return view('show-coin', ['coin' => $coinData]);
    }
}
