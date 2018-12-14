<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'MVT.Admin',
            'email' => 'admin@fpms.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('admin123'),
            'image' => 'admin.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Mai Văn Toàn',
            'email' => 'toanmv@fpms.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('toan123'),
            'image' => 'default.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        factory(App\Models\User::class, 20)->create();
    }
}
