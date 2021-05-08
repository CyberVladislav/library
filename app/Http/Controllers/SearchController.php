<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class SearchController extends Controller
{
    public function search(Request $request){
        if(isset($_GET['query']) && strlen($_GET['query']) > 0){
            $search_text = $_GET['query'];
            $books = Book::where('name','LIKE','%'.$search_text.'%')->paginate(5);
            $books->appends($request->all());
            $categories = Category::get();
            
            return view('index.main', [
                'books' => $books,
                'categories' => $categories,
                'sortArr' => '',
            ]);
        }else{
            return redirect('/');
        }
    }
}
