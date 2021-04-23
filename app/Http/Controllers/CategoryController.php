<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::latest()->get();
        return view('category-index', compact('data'));
    }

    public function create()
    {
        return view('category-create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => ['required', 'string'],
        ]);

        $input['slug'] = $this->slugify($input['name']);

        Category::create($input);
        return redirect()->route('categories');
        
    }

    public function edit($id)
    {
        $data = Category::findOrFail($id)->get()->first();
        return view('category-edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'name' => ['required', 'string'],
        ]);

        $input['slug'] = $this->slugify($input['name']);

        Category::findOrFail($id)->update($input);

        return redirect()->route('categories');
    }

    public function trash()
    {
        $data = Category::onlyTrashed()->get();
        return view('category-trash', compact('data'));
    }

    public function delete(Request $request)
    {
        Category::findOrFail($request->id)->delete();

        return redirect()->back();
    }

    public function restore(Request $request)
    {
        Category::onlyTrashed()->findOrFail($request->id)->restore();

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        Category::onlyTrashed()->findOrFail($request->id)->forceDelete();

        return redirect()->back();
    }

    public static function slugify($text)
    {
      $text = preg_replace('~[^\pL\d]+~u', '-', $text);
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
      $text = preg_replace('~[^-\w]+~', '', $text);
      $text = trim($text, '-');
      $text = preg_replace('~-+~', '-', $text);
      $text = strtolower($text);

      if (empty($text)) {
        return 'n-a';
      }

      return $text;
    }
}
