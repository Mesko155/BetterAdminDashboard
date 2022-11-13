<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\Practice;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FieldPracticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Randomised seeds for pivot table       
        $amountOfPractices = Practice::count();
        $amountOfFieldsOfPractice = Field::count();
        
        //FIXME: test block
        if(DB::table('field_practice')->exists()) {
            $incrementer = DB::table('field_practice')->orderBy('id', 'DESC')->first()->practice_id + 1;
        } else {
            $incrementer = 1;
        }

        $x = range(1, $amountOfPractices);
        $array = [];
        $finalArray = [];

        foreach($x as $i) {
	        $array = [];

            foreach(range(1,rand(1,$amountOfFieldsOfPractice)) as $y) {
    	    $array[] = rand(1,$amountOfFieldsOfPractice);
            }

            $finalArray[] = array_unique($array);
        }

        // $incrementer = 1;
        
        foreach($finalArray as $arrayToAdd) {
            foreach($arrayToAdd as $singleValue) {
                // DB::table('field_practice')->insert([
                //     'field_id' => $singleValue,
                //     'practice_id' => $incrementer
                // ]);
                // NE MOZE OVO JER MI NE OSTAVLJA TIMESTAMPE

                $practiceAttach = Practice::where('id', $incrementer)->first();
                $fieldAttach = Field::where('id', $singleValue)->value('id');
                
                if($practiceAttach != NULL) {
                    $practiceAttach->fields()->attach($fieldAttach);
                }
            }
            $incrementer = $incrementer + 1;
        }
    }
}
