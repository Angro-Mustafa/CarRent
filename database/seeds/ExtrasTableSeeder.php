<?php


use Illuminate\Database\Seeder;

class ExtrasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('extras')->delete();
        
        \DB::table('extras')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Insurance',
                'description' => 'Extra insurance',
                'price' => 100,
                'created_at' => '2021-05-10 12:22:13',
                'updated_at' => '2021-05-10 12:22:13',
            ),
           
        ));
        
        
    }
}
