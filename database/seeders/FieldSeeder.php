<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Manual tags for fields(fields of practice)
        Field::firstOrCreate(['tag' => 'Allergy and Immunology'], ['tag' => 'Allergy and Immunology']);
        Field::firstOrCreate(['tag' => 'Anesthesiology'], ['tag' => 'Anesthesiology']);
        Field::firstOrCreate(['tag' => 'Dermatology'], ['tag' => 'Dermatology']);
        Field::firstOrCreate(['tag' => 'Diagnostic radiology'], ['tag' => 'Diagnostic radiology']);
        Field::firstOrCreate(['tag' => 'Emergency medicine'], ['tag' => 'Emergency medicine']);
        Field::firstOrCreate(['tag' => 'Family medicine'], ['tag' => 'Family medicine']);
        Field::firstOrCreate(['tag' => 'Internal medicine'], ['tag' => 'Internal medicine']);
        Field::firstOrCreate(['tag' => 'Medical genetics'], ['tag' => 'Medical genetics']);
    }
}
