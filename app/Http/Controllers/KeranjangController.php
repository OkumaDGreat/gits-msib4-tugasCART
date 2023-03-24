<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Keranjang; 
use App\Models\Product; 

class KeranjangController extends Controller
{
    public function index()
    {
      $keranjang = Keranjang::get();

      return view('keranjang.index', ['data' => $keranjang]);
    }

    public function cart()
    {
        return view('cart');
    }

    public function tambah($id)
    {
      $product = Product::findOrFail($id);
 
      $cart = session()->get('cart', []);

      if(isset($cart[$id])) {
          $cart[$id]['quantity']++;
      }  else {
          $cart[$id] = [
              "product_name" => $product->product_name,
              "photo" => $product->photo,
              "price" => $product->price,
              "quantity" => 1
          ];
      }

      Keranjang::create($cart);

      return redirect()->route('barang');
    }
 
   

}