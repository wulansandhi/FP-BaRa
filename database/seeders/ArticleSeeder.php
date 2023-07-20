<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            [
            'judul' => 'Viral video pria terjebak di beton pinggir pantai',
            'penulis' => 'Wulan Permata Sandhi',
            'tanggalRilis' => '2023-07-20',
            'isi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate deleniti consequuntur voluptatibus nihil veniam suscipit nisi. Harum inventore porro nobis placeat veniam asperiores, tempore quisquam vitae sequi voluptates amet libero',
            'kategori_id' => '5'
            ],
            [
            'judul' => '4 suara msterius konon pertanda hantu',
            'penulis' => 'Ramaditya Bhaskara Mawanta',
            'tanggalRilis' => '2023-07-18',
            'isi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate deleniti consequuntur voluptatibus nihil veniam suscipit nisi. Harum inventore porro nobis placeat veniam asperiores, tempore quisquam vitae sequi voluptates amet libero?',
            'kategori_id' => '4'
            ],
        ]);
    }
}
