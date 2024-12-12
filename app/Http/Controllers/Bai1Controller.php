<?php

namespace App\Http\Controllers;
use App\Models\Library;
use App\Models\Book;
use Illuminate\Http\Request;

class Bai1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        return view('bai1.index');
    }
    public function books()
    {
       
        $books = Book::all();
        return view('bai1.books', compact( 'books'));
    }
    public function libraries()
    {
        $libraries = Library::all();
        
        return view('bai1.libraries', compact('libraries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
