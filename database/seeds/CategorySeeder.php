<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['Tay cầm fifa','Đông phục Fifa', 'Ốp lưng Fifa'];
        $faker = Faker\Factory::create();
        for ($i=0; $i < 3; $i++) {
            DB::table('tbl_category_product')->insert([

                'category_name' => $faker->randomElement($categories),
                'category_desc' => 'viet nam',
                'category_status'=> 0
            ]);
        }
        
    }
}
