<?php

namespace Database\Seeders;

use App\Models\Translate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TranslateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $translations = [
            [
                'key' => 'home',
                'value_id' => 'Beranda',
                'value_en' => 'Home',
                'value_pl' => 'Strona główna',
            ],
            [
                'key' => 'about',
                'value_id' => 'Tentang Kami',
                'value_en' => 'About Us',
                'value_pl' => 'O nas',
            ],
            [
                'key' => 'contact',
                'value_id' => 'Hubungi Kami',
                'value_en' => 'Contact Us',
                'value_pl' => 'Kontakt',
            ],
            [
                'key' => 'products',
                'value_id' => 'Produk',
                'value_en' => 'Products',
                'value_pl' => 'Produkty',
            ],
        ];

        Translate::insert($translations);
    }
}
