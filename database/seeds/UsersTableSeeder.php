<?php

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
        \DB::table('users')->insert(
            [
                'name' => 'Administrador Global',
                'email' => 'admin@admin.com.br',
                'email_verified_at' => now(),
                'username' => 'admin',
                //'password' => '$2y$10$McIGyYR8luPFSGBJqDLP7OHrCAau1C76LmmfQzDqSMQdB0599Vupe',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'level' => 'super',
                'remember_token' => 'thmpv77de6s47',
                'created_at' => now(), 
                'updated_at' => now(),   
            ]
        );
    }
}
