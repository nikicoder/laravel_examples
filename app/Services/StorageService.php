<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Balance;
use App\Models\Foods;
use App\Models\Storages;
use App\Helpers\ConvertHelper;

class StorageService
{
    protected $storagesLoaded;

    public function __construct()
    {
        $balance = Balance::all();

        foreach ($balance as $item) {
            $id = (int)$item->id_storages;
            $loaded = (int)$item->loaded;

            $this->storagesLoaded[$id] = $loaded;
        }
    }
    
    /**
     * Возвращает текущие данные по заполненности хранилища
     */
    public function getCurrentStoragesBalance(): array
    {
        $storages = $this->getAvailableStorages();
        $result = [];

        foreach ($this->storagesLoaded as $id => $loaded) {
            $result[] = [
                'storage_name'          => $storages[$id]['name'],
                'food_name'             => $storages[$id]['food_name'],
                'storage_volume'        => $storages[$id]['volume'],
                'storage_loaded_m3'     => $loaded,
                'storage_loaded_kg'     => ConvertHelper::convertFoodVolumeToWeight($storages[$id]['food_name'], (float)$loaded)
            ];
        }

        return $result;
    }
    
    /**
     * Статический фасад для getCurrentStoragesBalance()
     */
    public static function getCurrentStoragesBalanceStatic(): array
    {
        $instance = new StorageService;

        return $instance->getCurrentStoragesBalance();
    }
    
    /**
     * Массив доступных хранилищ наименованием овощей
     */
    public function getAvailableStorages(): array
    {
        $storages = [];
        $foods = Foods::get()->keyBy('id')->all();

        foreach (Storages::all() as $storage) {
            $storages[$storage->id] = [
                'id'        => $storage->id,
                'id_foods'  => $storage->id_foods,
                'name'      => $storage->name,
                'food_name' => $foods[$storage->id_foods]->name,
                'volume'    => $storage->volume
            ];
        }

        return $storages;
    }

    // QUERY BUILDER Реализация
    // Суть реализации: Повторение функционала выше БЕЗ использования моделей
    
    /**
     * Query-builder реализация getCurrentStoragesBalance()
     */
    public static function getCurrentStoragesBalanceQBVersion(): array
    {
        $result = [];

        $storagesLoaded = DB::table('balance')
            ->pluck('loaded', 'id_storages');

        $availableStorages = DB::table('storages')
            ->select('storages.id', 'storages.name', 'storages.volume', 'foods.id as id_foods', 'foods.name as name_foods')
            ->leftJoin('foods', 'foods.id', '=', 'storages.id_foods')
            ->get()
            ->all();

        foreach ($availableStorages as $st) {
            $loaded = !empty($storagesLoaded[$st->id]) ? $storagesLoaded[$st->id] : 0;

            $result[] = [
                'storage_name'          => $st->name,
                'food_name'             => $st->name_foods,
                'storage_volume'        => $st->volume,
                'storage_loaded_m3'     => $loaded,
                'storage_loaded_kg'     => $loaded > 0 ? ConvertHelper::convertFoodVolumeToWeight($st->name_foods, (float)$loaded) : 0
            ];
        }

        return $result;
    }
}