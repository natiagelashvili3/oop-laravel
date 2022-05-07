<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about')->insert([
            'title' => 'Lorem Ipsum',
            'short_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut varius dui. Vivamus vitae sem at lacus malesuada faucibus eu et justo. Mauris in bibendum tellus.',
            'text' => 'Vestibulum sit amet fermentum arcu, sed sagittis lorem. Pellentesque vehicula vehicula nisl porta convallis. Vestibulum sit amet consequat libero. Quisque sit amet imperdiet justo. Pellentesque aliquam ultricies sapien, vitae condimentum metus congue quis. Cras congue odio et velit hendrerit, non sodales lectus vehicula. Donec facilisis risus diam, eu imperdiet sem viverra eu. Cras in justo a sem lacinia fringilla. Nam sit amet sapien nisi. Vestibulum non justo porta, bibendum nunc in, ullamcorper augue. Praesent eu lectus imperdiet eros blandit porttitor at non quam. Pellentesque quis tempus libero. Nam justo sem, iaculis sit amet euismod vitae, ullamcorper feugiat metus. Etiam finibus tortor non massa egestas semper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.            ',
        ]);
    }
}
