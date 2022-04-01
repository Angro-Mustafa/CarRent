<?php


use Illuminate\Database\Seeder;

class MakesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('makes')->delete();
        
        \DB::table('makes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'make' => 'Audi',
                'created_at' => '2021-05-10 12:22:13',
                'updated_at' => '2021-05-10 12:22:13',
            ),
           
           
        ));
        
        
    }
}
