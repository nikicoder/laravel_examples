<?php

namespace App\Http\Controllers;

use App\Services\StorageService;

class LessThreeExamplesController extends Controller
{
    /**
     * getFoodsBalance
     */
    public function getFoodsBalance(StorageService $storages)
    {
        return view('storages_balance', ['balance' => $storages::getCurrentStoragesBalanceQBVersion()]);
    }
}
