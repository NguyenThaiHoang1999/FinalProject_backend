<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $brands=['Xbox One S','DualShock 4', 'Xbox 360'];
        $status=[0,1];
        
        $faker = Faker\Factory::create();
        for ($i=0; $i < 10; $i++) {
            DB::table('tbl_brand')->insert([

                'brand_name' => $faker->randomElement($brands),
                'brand_desc' =>'Xbox One S còn luôn là ứng viên sáng giá cho mọi thể loại game trên PC',
                'brand_status' =>$faker->randomElement($status),
            ]);
        }
    }
}
