<?php

use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = new \App\Brand();
        $brand->name = "-sans marque";
        $brand->photo = 'noimage.jpg';
        $brand->save();
    }
}
