<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Prospect;
use Illuminate\Support\Str;
class ProspectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Prospect::factory()->count(50)->create();

//       factory(Prospect::class, 50)->create([
//            'company' => Str::random(10),
//            'contact' => Str::random(10),
//            'phone_one' => Str::random(10),
//            'phone_two' => Str::random(10),
//            'address' => '1234 '.Str::random(10),
//            'website' => 'www.'.Str::random(10).'com',
//            'email' => Str::random(10).'@gmail.com',
//            'position' => Str::random(10),
//            'notes' => Str::random(20)
//
//        ]);
    }
}
