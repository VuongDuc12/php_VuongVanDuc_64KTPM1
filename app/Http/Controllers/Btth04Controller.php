<?php

namespace App\Http\Controllers;
use App\Models\Library;
use App\Models\Book;
use App\Models\issues;
use Illuminate\Http\Request;

class Btth04Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = issues::with( 'computer')->paginate(10);
        return view('btth04.index', compact( 'issues'));
     
    }


}