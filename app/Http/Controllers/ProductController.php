<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Products;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 public function index()
    {
        if(request()->ajax()) {

            $query = Products::query();
            
            return DataTables::of($query)
            ->addColumn('action', function($item){
                return '
                <a href="' . route('dashboard.product.edit', $item->id) .'" class=" bg-green-400 hover:bg-green-700
                text-white font-bold py-1 px-3 rounded shadow-lg">
                  Edit
                </a>

                <form class="inline-block" action="' . route('dashboard.product.destroy', $item->id) .'" method="POST"> 
                <button class="bg-red-400 hover:bg-red-700 text-white font-bold py-1 px-2 m-2 rounded-md shadow-lg">
                Hapus
                </button>
                '. method_field('delete') . csrf_field() .'
                 </form>

                ';
            })
            ->editColumn('price', function($item){
            return number_format($item->price);
            })
            ->rawColumns(['action'])
            ->make();
        }
        return view('pages.dashboard.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(ProductRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->title);

        Products::create($data);

        return redirect()->route('dashboard.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        return view('pages.dashboard.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Products $product)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->title);

        $product->update($data);

        return redirect()->route('dashboard.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->delete();

        return redirect()->route('dashboard.product.index');
    }
}
