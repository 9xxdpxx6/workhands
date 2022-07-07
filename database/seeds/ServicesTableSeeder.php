<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            \Illuminate\Support\Facades\DB::table('services')->insert([
                'name' => 'Название услуги '.$i,
                'price' => rand(500, 1500),
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod deserunt velit temporibus eos, ullam provident? Praesentium voluptates officiis natus provident explicabo! Eligendi accusamus illo hic vel assumenda architecto reprehenderit aliquam.',
            ]);
        }
    }
}
