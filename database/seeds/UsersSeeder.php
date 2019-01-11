<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = new User();
        $admin->email = 'admin@gmail.com';
        $admin->role = 'Admin';
        $admin->status = 'Aktif';
        $admin->password = bcrypt('admin1234');
        $admin->save();
    }
}
