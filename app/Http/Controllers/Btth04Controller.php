<?php

namespace App\Http\Controllers;
use App\Models\Library;
use App\Models\Book;
use App\Models\computer;
use App\Models\issue;
use Illuminate\Http\Request;

class Btth04Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::with( 'computer')->paginate(10);
        return view('btth04.index', compact( 'issues'));
     
    }

    public function create()
    {
        $computers = Computer::all();
        return view('btth04.create', compact('computers'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|string|max:50',
            'reported_date' => 'required|datetime',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);
        issue::create($request->all());
        return redirect()->route('btth04.index')->with('success','Vấn đề đã được thêm thành công!');
    }
    public function edit(string $id)
    {
        $issue = issue::findOrFail($id);
        $computers = computer::all();
        return view('btth04.edit', compact('issue' ,'computers'));
    }

    public function update(Request $request, string $id){
        $validatedData = $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);
        $issue = issue::find($id);
        $issue->update($request->all());
        return redirect()->route('btth04.index')->with('success','Cập nhật vấn đề thành công!');
    }
    
    public function destroy(string $id)
    {
        $issue = issue::findOrFail($id);
        $issue->delete();

        return redirect()->route('btth04.index')->with('success', 'Vấn đề đã được xóa thành công!');
    }
}