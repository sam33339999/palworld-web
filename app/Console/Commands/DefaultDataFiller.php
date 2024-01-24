<?php

namespace App\Console\Commands;

use App\Models\PalAttr;
use Illuminate\Console\Command;

class DefaultDataFiller extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:default-data-filler';

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
        $attrs = [
            '手工' => 'Handiwork',
            '搬運' => 'Transporting',
            '牧場' => 'Farming',
            '採集' => 'Gathering',
            '挖掘' => 'Mining',
            '播種' => 'Planting',
            '採伐' => 'Lumbering',
            '製藥' => 'Medicine Production',
            '生火' => 'Kindling',
            '澆水' => 'Watering',
            '發電' => 'Generating Electricity',
            '冷卻' => 'Cooling',
        ];

        foreach ($attrs as $zhName => $enName) {
            for($i = 1; $i <= 5; $i++) {
                $this->info("{$zhName}-{$enName}| {$i}");
                PalAttr::firstOrCreate([
                    'zh_name' => $zhName,
                    'en_name' => $enName,
                    'number' => $i,
                ]);
            }
        }
    }
}
