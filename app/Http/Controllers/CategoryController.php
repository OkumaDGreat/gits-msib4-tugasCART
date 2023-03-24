<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function index()
	{
		$kategori = Category::get();

		return view('kategori/index', ['kategori' => $kategori]);
	}

	public function tambah()
	{
		return view('kategori.form');
	}

	public function simpan(Request $request)
	{
		Category::create(['name' => $request->name]);

		return redirect()->route('kategori');
	}

	public function edit($id)
	{
		$kategori = Category::where('id',$id)->first();

		return view('kategori.form', ['kategori' => $kategori]);
	}

	public function update($id, Request $request)
	{
		Category::find($id)->update(['name' => $request->name]);

		return redirect()->route('kategori');
	}

	public function hapus($id)
	{
		Category::find($id)->delete();

		return redirect()->route('kategori');
	}
}
