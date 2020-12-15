<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CoinCard extends Component
{
    public $coin;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($coin)
    {
        $this->coin = $coin;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.coin-card');
    }
}
