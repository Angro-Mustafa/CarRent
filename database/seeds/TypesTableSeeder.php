<?php

use Illuminate\Database\Seeder;


class TypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('types')->delete();
        
        \DB::table('types')->insert(array (
           
           
            0 => 
            array (
                'id' => 3,
                'class' => 'Compact',
                'created_at' => '2021-05-10 12:51:45',
                'updated_at' => '2021-05-10 12:51:51',
            ),
        ));
        
        
    }
}
