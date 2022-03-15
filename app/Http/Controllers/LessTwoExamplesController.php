<?php

namespace App\Http\Controllers;

use App\Helpers\ConvertHelper;
use App\Models\Balance;
use App\Models\Foods;
use App\Models\Storages;
use App\Services\StorageService;

class LessTwoExamplesController extends Controller
{    
    /**
     * Реализация логики в контроллере
     */
    public function exampleOne()
    {
        $foods = Foods::get()->keyBy('id')->all();
        $storages = Storages::get()->keyBy('id')->all();
        $balance = Balance::all();

        $viewData = [
            'balance' => []
        ];
        foreach ($balance as $storage) {
            $storageName = (string)$storages[$storage->id_storages]->name;
            $storageVolume = (int)$storages[$storage->id_storages]->volume;
            $foodName = (string)$foods[$storages[$storage->id_storages]->id_foods]->name;
            
            $viewData['balance'][] = [
                'storage_name'          => $storageName,
                'food_name'             => $foodName,
                'storage_volume'        => $storageVolume,
                'storage_loaded_m3'     => (int)$storage->loaded,
                'storage_loaded_kg'     => ConvertHelper::convertFoodVolumeToWeight($foodName, (float)$storage->loaded)
            ];
        }

        return view('storages_balance', $viewData);
    }
    
    /**
     * Использование сервис-провайдера
     */
    public function exampleTwo(StorageService $storages)
    {
        return view('storages_balance', ['balance' => $storages->getCurrentStoragesBalance()]);
    }
    
    /**
     * Использование фасада сервиса
     */
    public function exampleThree()
    {
        return view('storages_balance', ['balance' => StorageService::getCurrentStoragesBalanceStatic()]);
    }
}
