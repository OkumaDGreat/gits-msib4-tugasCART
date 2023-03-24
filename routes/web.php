
<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KeranjangController;
 
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('dashboard', function () {
  return view('dashboard');
})->name('dashboard');
 
Route::get('/', [ProductsController::class, 'index']);
Route::get('cart', [ProductsController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [ProductsController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [ProductsController::class, 'remove'])->name('remove_from_cart');

Route::controller(CategoryController::class)->prefix('kategori')->group(function () {
  Route::get('', 'index')->name('kategori');
  Route::get('tambah', 'tambah')->name('kategori.tambah');
  Route::post('tambah', 'simpan')->name('kategori.tambah.simpan');
  Route::get('edit/{id}', 'edit')->name('kategori.edit');
  Route::post('edit/{id}', 'update')->name('kategori.tambah.update');
  Route::get('hapus/{id}', 'hapus')->name('kategori.hapus');
});

Route::controller(KeranjangController::class)->prefix('keranjang')->group(function () {
  Route::get('', 'index')->name('keranjang');
  Route::get('tambah', 'tambah')->name('keranjang.tambah');

});

Route::controller(ProductsController::class)->prefix('barang')->group(function () {
  Route::get('', 'view')->name('barang');
  Route::get('tambah', 'tambah')->name('barang.tambah');
  Route::post('tambah', 'simpan')->name('barang.tambah.simpan');
  Route::get('edit/{id}', 'edit')->name('barang.edit');
  Route::post('edit/{id}', 'updateBarang')->name('barang.tambah.updateBarang');
  Route::get('hapus/{id}', 'hapus')->name('barang.hapus');
});