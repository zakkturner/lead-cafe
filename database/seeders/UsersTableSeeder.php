<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::updateOrCreate(['id'=>1], [
            'name' => 'Zach Turner',
            'email' => 'zakkturner@yahoo.com',
            'password'=> '$2y$10$VXM8Bwe85goyQ.paC546OeblU0rCiOwR0kvQ6w4fBIrWx/rQd8e.O'//password
        ]);
    }
}
