<?php

use Illuminate\Database\Seeder;

class OrderServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = \App\Customer::all();

        foreach($customers as $customer)
        {
            $customer->orderService()->save(factory(\App\OrderService::class)->make());
        }
    }
}
