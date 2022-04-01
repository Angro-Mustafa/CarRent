<?php


use Illuminate\Database\Seeder;

class FuelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('fuels')->delete();
        
        \DB::table('fuels')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fuel' => 'Diesel',
                'created_at' => '2021-05-10 12:22:13',
                'updated_at' => '2021-05-10 12:22:13',
            ),
            1 => 
            array (
                'id' => 2,
                'fuel' => 'Gasoline',
                'created_at' => '2021-05-10 12:22:13',
                'updated_at' => '2021-05-10 12:22:13',
            ),
            
        ));
        
        
    }
}
