<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::with('category')->get();

        return view('product.index', [
            'products' => $products
        ]);
    }

    public function create(): View
    {
        $categories = Category::all(['id', 'name']);

        return view('product.product-form', [
            'product' => null,
            'categories' => $categories
        ]);
    }

    public function store(ProductStoreRequest $request)
    {
        $input = $request->validated();

        $request->hasFile('imgPath') ? $input['imgPath'] = $request->file('imgPath')->store('product-Image') : null;

        Product::create($input);

        return redirect()->route('product.index');
    }

    /*public function show(string $id)
    {
        //
    }*/

    public function edit(int $id): View
    {
        $product = Product::findOrFail($id)->with('category')->get();
        $categories = Category::all(['id', 'name']);

        return view('product.product-form', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(ProductStoreRequest $request, int $id): RedirectResponse
    {
        $input = $request->validated();

        $product = Product::findOrFail($id);

        if($product->img_url && $request->hasFile('imgPath')) {
            Storage::delete($product->img_url);
            $request->file('imgPath')->store('productsImage');
        }

        $product->fill($input);

        $product->save();

        return redirect()->route('product.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            $product = Product::findOrFail($id);

            if($product->imgPath) {
                Storage::delete($product->imgPath);
            }

            $product->delete();
            return redirect()->route('product.index');
        }catch (ModelNotFoundException $exc) {
            return back()->with('notFound', $exc->getMessage());
        }

    }
}
