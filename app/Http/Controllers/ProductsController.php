<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Category; 
 
class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }
 
    public function cart()
    {
        return view('cart');
    }
    
    public function addToCart($id)
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
 
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }
 
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function view()
	{
		$barang = Product::get();

		return view('barang.index', ['data' => $barang]);
	}

    public function tambah()
	{
		$kategori = Category::get();

		return view('barang.form', ['kategori' => $kategori]);
	}

    public function simpan(Request $request)
	{
		$data = [
			'product_name' => $request->product_name,
			'product_description' => $request->product_description,
			'photo' => $request->photo,
			'id_category' => $request->id_category,
			'price' => $request->price,
		];

		Product::create($data);

		return redirect()->route('barang');
	}

    public function edit($id)
	{
		$barang = Product::where('id',$id)->first();
		$kategori = Category::get();

		return view('barang.form', ['barang' => $barang, 'kategori' => $kategori]);
	}

	public function updateBarang($id, Request $request)
	{
		$data = [
			'product_name' => $request->product_name,
			'product_description' => $request->product_description,
            'photo' => $request->photo,
			'id_category' => $request->id_category,
			'price' => $request->price,
		];

		Product::find($id)->update($data);

		return redirect()->route('barang');
	}

    public function hapus($id)
	{
		Product::find($id)->delete();

		return redirect()->route('barang');
	}

}