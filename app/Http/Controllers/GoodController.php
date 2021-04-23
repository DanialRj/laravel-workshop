<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Good;
use App\Models\Category;

class GoodController extends Controller
{
    public function index()
    {
        $data = Good::with('category')->latest()->get();
        return view('good-index', compact('data'));
    }

    public function create()
    {
        $data = [
            'categories' => Category::oldest()->get(),
        ];
        return view('good-create', compact('data'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'category_id' => ['required'],
        ]);

        $input['slug'] = $this->slugify($input['name']);
        $input['stock'] = 0;
        $input['image'] = '-';
        
        Good::create($input);

        return redirect()->route('goods');
    }

    public function edit($id)
    {
        $data = [
            'data' => Good::with('category')->findOrFail($id)->get()->first(),
            'categories' => Category::oldest()->get(),
        ];

        return view('good-edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'category_id' => ['required'],
        ]);

        $input['slug'] = $this->slugify($input['name']);

        Good::findOrFail($id)->update($input);
        return redirect()->route('goods');
    }

    public function trash()
    {
        $data = Good::onlyTrashed()->latest()->get();
        return view('good-trash', compact('data'));   
    }

    public function delete(Request $request)
    {
        Good::findOrFail($request->id)->delete();

        return redirect()->back();
    }

    public function restore(Request $request)
    {
        Good::onlyTrashed()->findOrFail($request->id)->restore();   
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        Good::onlyTrashed()->findOrFail($request->id)->forceDelete();
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
