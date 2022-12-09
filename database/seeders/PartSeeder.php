<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Domain\PartsLookup\Models\Part;
use App\Models\Heater;
// use PhpParser\Node\Expr\Cast\Int_;

// use Illuminate\Support\Facades\Hash;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i=0;$i<10;$i++)
        {
            $part = Part::create([
                'part_list_id' => rand(),
                'keyword' => rand(),
                'part_description_en' => rand(),
                'part_description_jp' => rand(),
                'part_number' => rand(),
                'available_for_sale' => rand(),
                'version' => rand(),
                'sequence' => rand(),
                'upgrade_reason_en' => rand(),
                'upgrade_reason_jp' => rand()
            ]);
            $heater_ids = Heater::inRandomOrder()->limit(10)->get()->pluck('id')->toArray();
            $part->heaters()->sync($heater_ids);
        }
    }
}
