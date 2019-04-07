<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $websiteCategories = [
            'Batteries / percussions / pads',
            'Claviers',
            'Guitares',
            'Micros',
            'Consoles',
            'Enceintes',
            'Interfaces Audio',
            'Interfaces Midi',
            'Software'
        ];

        $prefix = 'categorie';
        
        for ($i = 0; $i < count($websiteCategories); $i++) {
            
            ${$prefix.$i} = new \App\Category();
            // $categorie->name = $websiteCategories[$i];
            ${$prefix.$i}->name = $websiteCategories[$i];
            ${$prefix.$i}->save();
        }

    }
}
