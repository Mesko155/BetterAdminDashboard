<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Practice;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PracticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Factory seeding practice with multiple employes; randomised
        collect(range(1,40))
            ->each(function () {
                Practice::factory(1)
                ->has(Employee::factory(rand(1,10)))
                ->create();
            });
    }
}
