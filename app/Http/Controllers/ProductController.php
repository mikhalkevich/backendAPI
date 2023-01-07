<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function publicShow(Request $request)
    {
        $products = Product::filter($request->all())->get();
        return ProductResource::collection($products)->additional(['collection' => 'public products']);
    }

    public function publicPaginate(Request $request)
    {
        $products = Product::filter($request->all())->simplePaginate(10);
        return ProductResource::collection($products)->additional(['collection' => 'public products with paginate']);
    }

    public function publicOne($id)
    {
        //вывод одной записи
        $product = Product::find($id);
        return new ProductResource($product);
    }

    public function index(Request $request)
    {
        $products = Product::orderBy('id', 'DESC')->paginate(10);

        return ProductResource::collection($products)->additional(['collection' => 'products']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //создание
        $product = Product::create($request->all());
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //вывод одной записи
        $product = Product::find($id);
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //вывод формы редактирования
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //обновление записи
        $product = Product::find($id);
        $product->update($request->all());
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //удаление записи
        $product = Product::find($id);
        $product->delete();
        return response()->json(['message' => 'deleted']);
    }

    public function addCatalog(Product $product, Request $request)
    {
        abort_if(!$request->catalog_id, 401, 'catalog_id is empty');
        $product->catalogs()->syncWithoutDetaching([$request->catalog_id]);
        $request->companies = 'true';
        return new ProductResource($product);
    }

    public function detachCatalog(Product $product, Request $request)
    {
        abort_if(!$request->catalog_id, 401, 'catalog_id is empty');
        $product->catalogs()->detach([$request->catalog_id]);
        $request->catalogs = 'true';
        return new ProductResource($product);
    }

    public function addCompany(Product $product, Request $request)
    {
        abort_if(!$request->company_id, 401, 'company_id is empty');
        $product->companies()->syncWithoutDetaching([$request->company_id]);
        $request->companies = 'true';
        return new ProductResource($product);
    }

    public function detachCompany(Product $product, Request $request)
    {
        abort_if(!$request->company_id, 401, 'company_id is empty');
        $product->companies()->detach([$request->company_id]);
        $request->companies = 'true';
        return new ProductResource($product);
    }
}
