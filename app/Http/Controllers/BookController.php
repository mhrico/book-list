<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Barryvdh\DomPDF\Facade\Pdf;


class BookController extends Controller
{
    public function index(){
        $books = Book::paginate(5);
        return view('book.index', ['books' => $books]);
    }

    public function create(){
        return view('book.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'price' => 'required|decimal:0,2',
            'quantity' => 'required|numeric'
        ]);

        Book::create($data);
        return redirect(route('book.index'))->with('success', 'Book created successfully!');
    }

    public function edit(Book $book){
        return view('book.edit', ['book' => $book]);
    }

    public function update(Request $request, Book $book){
        $data = $request->validate([
            'name' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'price' => 'required|decimal:0,2',
            'quantity' => 'required|numeric'
        ]);

        $book->update($data);
        return redirect(route('book.index'))->with('success', 'Book updated successfully!');
    }

    public function delete(Book $book){
        $book->delete();
        return redirect(route('book.index'))->with('success', 'Book deleted successfully!');
    }

    public function search(Request $request){
        $query = $request->search;
        $books = Book::where('name', 'like', '%' . $query . '%')
                    ->orWhere('author', 'like', '%' . $query . '%')
                    ->paginate(5);
        $books->appends(['search' => $query]);
        return view('book.index', ['books' => $books]);
    }

    public function download(){
        $books = Book::all();
        $pdf = Pdf::loadView('book.index', compact('books'));
        return $pdf->download('books.pdf');
    }
}
