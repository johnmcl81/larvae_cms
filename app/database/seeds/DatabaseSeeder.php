<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {

    	Eloquent::unguard();
        $this->call('ContentSeeder');
        $this->command->info('Content tables seeded!');

		$this->call('UserTableSeeder');
		$this->command->info('User tables seeded!');

    }

}