<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * 
     * Limpar Database e incluir dados das Seeders
     * php artisan migrate:refresh --seed
     * php artisan db:seed --class=UsersTableSeeder
     * php artisan db:seed --class=OrderServicesTableSeeder
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(UsersTableSeeder::class);
        //$this->call(CustomerSeeder::class);
        //$this->call(OrderServicesTableSeeder::class);
    }
}
