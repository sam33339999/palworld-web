<?php

namespace App\Console\Commands;

use App\Models\Pal;
use App\Models\PalAttr;
use Illuminate\Console\Command;

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

        foreach ($pals as $pal) {
            $id = strtoupper($pal['id']);
            $name = $pal['name'];
            $food = $pal['food'];
            $skill = $pal['skill'];
            $lifeSkills = $pal['lifeSkills']; // array
            $drops = $pal['drops']; // array
            $img = $pal['img']; // array

            $lifeSkills = array_map(
                fn ($it) =>
                PalAttr::where('zh_name', $it['sk'])
                    ->where('number', $it['lv'])
                    ->first(),
                $lifeSkills
            );

            $pal = Pal::updateOrCreate([
                'id' => $id,
            ], [
                'zh_name' => $name,
                'food' => $food,
                'image1' => $img,
            ]);
        }


        $palJson = file_get_contents(storage_path('pal_en.json'));
        $pals = json_decode($palJson, true);


        foreach ($pals as $pal) {
            $id = strtoupper($pal['id']);
            $name = $pal['name'];
            $drops = $pal['drops'] ?? []; // array
            $img = $pal['img']; // array

            $pal = Pal::updateOrCreate([
                'id' => $id,
            ], [
                'en_name' => $name,
                'image2' => $img,
            ]);
        }
    }
}
