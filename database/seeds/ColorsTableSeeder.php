<?php


use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('colors')->delete();
        
        \DB::table('colors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'color' => 'Phantom Black',
                'created_at' => '2021-05-10 12:22:13',
                'updated_at' => '2021-05-10 12:22:13',
            ),
           
        ));
        
        
    }
}
