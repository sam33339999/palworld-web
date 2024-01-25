<?php

namespace App\Console\Commands;

use App\Models\Pal;
use App\Models\Attr;
use App\Models\DropItem;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class PalFileFetch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:pal-file-fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $palJson = file_get_contents(storage_path('pal.json'));
        $pals = json_decode($palJson, true);
        $attrMap = [];
        Attr::get(['id', 'zh_name', 'number'])->each(function ($it) use (&$attrMap) {
            $key = sprintf("%s%d", $it->zh_name, $it->number);
            $attrMap[$key] = $it->id;
        });

        foreach ($pals as $pal) {
            $id = strtoupper($pal['id']);
            $name = $pal['name'];
            $food = $pal['food'];
            $skill = $pal['skill'];
            $lifeSkills = $pal['lifeSkills']; // array
            $drops = $pal['drops']; // array
            $img = $pal['img']; // array
            $dropIds = [];

            // 掉落物品建立
            foreach ($drops as $dropName) {
                $dropIds[] = DropItem::firstOrCreate([
                    'zh_name' => $dropName,
                ])->id;
            }

            // 生活技能查詢
            $attrIds = array_map(
                function ($singleItem) use (&$attrMap) {
                    $searchKey = sprintf("%s%d", $singleItem['sk'], $singleItem['lv']);
                    return $attrMap[$searchKey] ?? 0;
                },
                $lifeSkills
            );

            $pal = Pal::updateOrCreate([
                'pal_id' => $id,
            ], [
                'zh_name' => $name,
                'food' => $food,
                'image1' => $img,
            ]);

            $pal->drops()->sync($dropIds);
            $pal->attrs()->sync($attrIds);
        }


        $palJson = file_get_contents(storage_path('pal_en.json'));
        $pals = json_decode($palJson, true);


        foreach ($pals as $pal) {
            $id = strtoupper($pal['id']);
            $name = $pal['name'];
            $drops = $pal['drops'] ?? []; // array
            $img = $pal['img']; // array

            $pal = Pal::updateOrCreate([
                'pal_id' => $id,
            ], [
                'en_name' => $name,
                'image2' => $img,
            ]);
        }
    }
}
