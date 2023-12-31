<?php

use App\Models\Product;
use App\Models\Translate;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        // home
        Route::get('/', function () {
            $products = Product::all();
            return view('welcome', compact('products'));
        })->name('home');
        // translate
        Route::get('/translate', function () {
            $translations = Translate::all();
            return view('translate', compact('translations'));
        })->name('translate');
        Route::put('/translate/update', function () {
            $translations = Translate::all();

            foreach ($translations as $translation) {
                $translation->value_id = request()->input("value_id.{$translation->id}");
                $translation->value_en = request()->input("value_en.{$translation->id}");
                $translation->value_pl = request()->input("value_pl.{$translation->id}");
                $translation->save();
            }

            return redirect()->route('translate')->with('success', 'Perubahan telah disimpan.');
        })->name('translate.update');
        // product
        Route::get('/product/{id}', function () {
            $datas = Product::findOrFail(request()->id);
            return view('product', compact('datas'));
        })->name('product');
        Route::put('/product/update/{id}', function () {
            $product = Product::findOrFail(request()->id);

            $product->setTranslation('nama', 'id', request()->input('nama.id'));
            $product->setTranslation('nama', 'en', request()->input('nama.en'));
            $product->setTranslation('nama', 'pl', request()->input('nama.pl'));

            $product->setTranslation('harga', 'id', request()->input('harga.id'));
            $product->setTranslation('harga', 'en', request()->input('harga.en'));
            $product->setTranslation('harga', 'pl', request()->input('harga.pl'));

            $product->qty = request()->input('qty');

            $product->setTranslation('satuan', 'id', request()->input('satuan.id'));
            $product->setTranslation('satuan', 'en', request()->input('satuan.en'));
            $product->setTranslation('satuan', 'pl', request()->input('satuan.pl'));

            $product->setTranslation('deskripsi', 'id', request()->input('deskripsi.id'));
            $product->setTranslation('deskripsi', 'en', request()->input('deskripsi.en'));
            $product->setTranslation('deskripsi', 'pl', request()->input('deskripsi.pl'));

            $product->save();

            return redirect()->route('product', request()->id)->with('success', 'Perubahan telah disimpan.');
        })->name('product.update');
    }
);
