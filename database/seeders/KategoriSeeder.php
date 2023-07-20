<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            [
            'kode' => 'HRR',
            'deskripsi' => 'Horor'
            ],
            [
            'kode' => 'KMD',
            'deskripsi' => 'Komedi'
            ],
            [
            'kode' => 'RMNC',
            'deskripsi' => 'Romance'
            ],
            [
            'kode' => 'SJRH',
            'deskripsi' => 'Sejarah'
            ],
            [
            'kode' => 'BRT',
            'deskripsi' => 'Berita'
            ],
        ]);
    }
}
