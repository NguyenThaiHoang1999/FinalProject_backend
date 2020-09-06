<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $brandID = DB::table('tbl_brand')->pluck('brand_id');
        $categoryID = DB::table('tbl_category_product')->pluck('category_id');

        $faker = Faker\Factory::create();
        for ($i=0; $i < 10; $i++) {
            DB::table('tbl_product')->insert([

                'product_name'  => $faker->name(),
                'brand_id'      =>$faker->randomElement($brandID),
                'category_id'   =>$faker->randomElement($categoryID),
                'product_desc'  =>'',
                'product_image' => $faker->imageUrl($width = 640, $height = 480),
                'product_content' => 'sony',
                'product_price' => 100000,
                'product_status'=> 1
            ]);
        }
    }
}
