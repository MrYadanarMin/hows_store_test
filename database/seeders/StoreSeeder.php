<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;
use App\Models\Ware;
use App\Models\Level;
use App\Models\Brand;
use App\Models\Item;
use App\Models\Partner;
use App\Models\Reason;

class StoreSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Units
        $unit3 = Unit::create(['name' => 'Unit 3']);
        $unit9 = Unit::create(['name' => 'Unit 9']);

        // 2. Wares (Categories / Zones)
        $porcelainWare = Ware::create(['name' => 'Porcelain Store', 'unit_id' => $unit3->id, 'order' => 1]);
        $glassWare = Ware::create(['name' => 'Glassware Store', 'unit_id' => $unit9->id, 'order' => 2]);

        // 3. Levels
        $level1 = Level::create(['name' => 'Rack A - Level 1']);
        $level2 = Level::create(['name' => 'Rack A - Level 2']);

        // 4. Brands
        $brand1 = Brand::create(['name' => 'Ocean Glassware']);
        $brand2 = Brand::create(['name' => 'Royal Porcelain']);

        // 5. Items
        Item::create([
            'name' => 'Dinner Plate 10 inch',
            'image' => null,
            'quantity' => 100,
            'brand_id' => $brand2->id,
        ]);

        Item::create([
            'name' => 'Wine Glass 350ml',
            'image' => null,
            'quantity' => 150,
            'brand_id' => $brand1->id,
        ]);

        // 6. Reasons
        Reason::create(['name' => 'Broken during catering']);
        Reason::create(['name' => 'Loss / Missing']);

        // 7. Partners
        Partner::create([
            'name' => 'Grand Catering Co.',
            'contact_name' => 'Michael Smith',
            'phno' => '09123456789',
        ]);
    }
}
