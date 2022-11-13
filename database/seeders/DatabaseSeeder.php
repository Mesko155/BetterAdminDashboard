<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Field;
use App\Models\Practice;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\FieldSeeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\PracticeSeeder;
use Database\Seeders\FieldPracticeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            PracticeSeeder::class,
            FieldSeeder::class,
            FieldPracticeSeeder::class
        ]);
    }
}
