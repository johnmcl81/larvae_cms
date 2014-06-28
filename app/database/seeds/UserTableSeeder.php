// app/database/seeds/UserTableSeeder.php

<?php

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'John McLachlan',
            'username' => 'johnmcl81',
            'email'    => 'j.d.mclachlan@gmail.com',
            'password' => Hash::make('l1verp00l'),
        ));
    }

}
