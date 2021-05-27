<?php

class Stocks
{
    private $list = array(
        'DOGEUSD' => 'BINANCE:DOGEUSDT',
        'TSLA' => 'TSLA',
        'BTCUSD' => 'BINANCE:BTCUSDT', 
        'ETHUSD' => 'BINANCE:ETHUSDT',
        'AAPL' =>'AAPL' ,
        'SPOT' => 'SPOT',
        'MSFT' => 'MSFT',
        'NKE' => 'NKE',
        'AMZN' => 'AMZN',
        'GOOG' => 'GOOG',
        'NFLX' => 'NFLX',
        'ABNB' => 'ABNB',
        'BNBUSD' => 'BINANCE:BNBUSDT',
        'ADAUSD' => 'BINANCE:ADAUSDT',
        'FB' => 'FB',
        'HPQ' => 'HPQ',
        'SBUX' => 'SBUX',
        'KO' => 'KO',
        'BB' => 'BB',
        'NVDA' => 'NVDA',
        'PYPL' => 'PYPL',
        'PINS' =>'PINS' 
    );

    public function getList()
    {
        return $this->list;
    }
}

function getTickerFinn($ticker)
{
    $list = new Stocks();
    $for = $list->getList();

    foreach ($for as $key => $value) {
        if ($key == $ticker) return $value;
    }
}
