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
       
        $books = Book::with( 'library')->paginate(10);
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
        $libraries = Library::all();
        return view('bai1.create', compact('libraries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publication_year' => 'required',
            'genre' => 'required|max:255',
            'library_id' => 'required',
            
        ]);
        book::create($request->all());
        return redirect()->route('bai1Books.index')->with('success','Sách đã được thêm thành công!');
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
        $book = Book::findOrFail($id);
        $libraries = library::all();
        return view('bai1.edit', compact('libraries' ,'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publication_year' => 'required',
            'genre' => 'required',
            'library_id' => 'required',
            
        ]);
        $book = Book::find($id);
        $book->update($request->all());
        return redirect()->route('bai1Books.index')->with('success','Sách đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('bai1Books.index')->with('success', 'Sách đã được xóa thành công!');
    }
}
