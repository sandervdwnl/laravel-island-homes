<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = 'Bonaire';
        $slug = Str::slug($name);

        DB::table('locations')->insert([
            'name' => $name,
            'slug' => $slug,
        ]);
    }
}
