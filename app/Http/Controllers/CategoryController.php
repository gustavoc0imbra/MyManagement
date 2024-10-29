<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();

        return view('category.index', [
            'categories' => $categories
        ]);
    }

    public function create(): View
    {
        return view('category.category-form', [
            'category' => null
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->validate([
           'name' => 'required|string|max:255|unique:App\Models\Category',
        ]);

        Category::create($input);

        return redirect()->route('category.index');
    }

    public function edit(int $id): View
    {
        $category = Category::findOrFail($id);

        return view('category.category-form', [
            'category' => $category
        ]);
    }

    public function update(Request $request, int $id)
    {
        $input = $request->validate([
            'name' => 'string|max:255'
        ]);

        $category = Category::find($id);

        $category->fill($input);

        $category->save();

        return redirect()->route('category.index');
    }

    public function destroy(int $id)
    {
        try {
            $category = Category::findOrFail($id);

            $category->delete();

            return redirect()->route('category.index');
        }catch (ModelNotFoundException $exc) {
            return back()->with('notFound', $exc->getMessage());
        }


    }
}
