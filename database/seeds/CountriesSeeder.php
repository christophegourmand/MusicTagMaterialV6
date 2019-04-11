<?php

use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $websitecountries = [
            'ALLEMAGNE',
            'BELGIQUE',
            'FRANCE',
            'ITALIE',
            'IRLANDE',
            'LUXEMBOURG',
            'PAYS-BAS',
            'ROYAUME-UNI',
            'SUISSE'
        ];

        $prefix = 'country';
        
        for ($i = 0; $i < count($websiteCountries); $i++) {
            
            ${$prefix.$i} = new \App\Country();
            ${$prefix.$i}->name = $websitecountries[$i];
            ${$prefix.$i}->save();
        }
    }
}
