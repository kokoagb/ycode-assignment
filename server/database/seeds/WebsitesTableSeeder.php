<?php

use Illuminate\Database\Seeder;
use App\Website;

class WebsitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Website::create([
            'name' => 'My first website',
            'url' => 'first.example.com',
        ]);

        Website::create([
            'name' => 'The second website',
            'url' => 'second.example.com',
        ]);
    }
}
