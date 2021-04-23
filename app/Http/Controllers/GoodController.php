<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Good;

class GoodController extends Controller
{
    public function index()
    {
        $data = Good::latest()->get();
        return view('good-index', compact('data'));
    }

    public function create()
    {

    }

    public function store()
    {
        
    }

    public function edit()
    {
        
    }

    public function update()
    {
        
    }

    public function trash()
    {
        
    }

    public function delete()
    {
        
    }

    public function restore()
    {
        
    }

    public function destroy()
    {
        
    }
}
