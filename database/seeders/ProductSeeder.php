<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    use HasTranslations;

    public function run()
    {
        $products = [
            [
                'nama' => [
                    'id' => 'Produk 1 ID',
                    'en' => 'Product 1 EN',
                    'pl' => 'Produkt 1 PL',
                ],
                'harga' => [
                    'id' => '100000',
                    'en' => '100 USD',
                    'pl' => '100 PLN',
                ],
                'qty' => 10,
                'satuan' => [
                    'id' => 'pcs',
                    'en' => 'pcs',
                    'pl' => 'szt.',
                ],
                'deskripsi' => [
                    'id' => 'Deskripsi Produk 1 ID',
                    'en' => 'Product 1 Description EN',
                    'pl' => 'Opis produktu 1 PL',
                ],
            ],
            [
                'nama' => [
                    'id' => 'Produk 2 ID',
                    'en' => 'Product 2 EN',
                    'pl' => 'Produkt 2 PL',
                ],
                'harga' => [
                    'id' => '200000',
                    'en' => '200 USD',
                    'pl' => '200 PLN',
                ],
                'qty' => 15,
                'satuan' => [
                    'id' => 'kg',
                    'en' => 'kg',
                    'pl' => 'kg',
                ],
                'deskripsi' => [
                    'id' => 'Deskripsi Produk 2 ID',
                    'en' => 'Product 2 Description EN',
                    'pl' => 'Opis produktu 2 PL',
                ],
            ],
            [
                'nama' => [
                    'id' => 'Produk 3 ID',
                    'en' => 'Product 3 EN',
                    'pl' => 'Produkt 3 PL',
                ],
                'harga' => [
                    'id' => '300000',
                    'en' => '300 USD',
                    'pl' => '300 PLN',
                ],
                'qty' => 20,
                'satuan' => [
                    'id' => 'm',
                    'en' => 'm',
                    'pl' => 'm',
                ],
                'deskripsi' => [
                    'id' => 'Deskripsi Produk 3 ID',
                    'en' => 'Product 3 Description EN',
                    'pl' => 'Opis produktu 3 PL',
                ],
            ],
            [
                'nama' => [
                    'id' => 'Produk 4 ID',
                    'en' => 'Product 4 EN',
                    'pl' => 'Produkt 4 PL',
                ],
                'harga' => [
                    'id' => '400000',
                    'en' => '400 USD',
                    'pl' => '400 PLN',
                ],
                'qty' => 25,
                'satuan' => [
                    'id' => 'lbr',
                    'en' => 'sheet',
                    'pl' => 'arkusz',
                ],
                'deskripsi' => [
                    'id' => 'Deskripsi Produk 4 ID',
                    'en' => 'Product 4 Description EN',
                    'pl' => 'Opis produktu 4 PL',
                ],
            ],
            [
                'nama' => [
                    'id' => 'Produk 5 ID',
                    'en' => 'Product 5 EN',
                    'pl' => 'Produkt 5 PL',
                ],
                'harga' => [
                    'id' => '500000',
                    'en' => '500 USD',
                    'pl' => '500 PLN',
                ],
                'qty' => 30,
                'satuan' => [
                    'id' => 'botol',
                    'en' => 'bottle',
                    'pl' => 'butelka',
                ],
                'deskripsi' => [
                    'id' => 'Deskripsi Produk 5 ID',
                    'en' => 'Product 5 Description EN',
                    'pl' => 'Opis produktu 5 PL',
                ],
            ],
        ];

        foreach ($products as $productData) {
            $product = new Product();

            foreach ($productData as $key => $translations) {
                if ($key != 'qty') {
                    foreach ($translations as $locale => $translation) {
                        $product->setTranslation($key, $locale, $translation);
                    }
                }
            }

            $product->save();
        }
    }
}
