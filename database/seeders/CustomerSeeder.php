<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CustomerModel;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0; $i<100; $i++){
            $customer = new CustomerModel();
            $customer->user_name = fake()->name();
            $customer->email = fake()->email();
            $customer->dob = fake()->date();
            $customer->gender = fake()->randomElement(['M', 'F', 'O']);
            $customer->address = fake()->address();
            $customer->state = fake()->state();
            $customer->country = fake()->country();
            $customer->save();
        }
    }
}
