<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class SortController extends Controller
{
    public function sort(Request $request){
        if(isset($_GET["sorting"])){
            $sortString = $_GET['sorting'];
            $arr = explode(',', $_GET['sorting']);
            $tableName = current($arr);
            $direction = next($arr);
            $books = Book::orderBy($tableName, $direction)->paginate(5);
            $books->appends($request->all());
            $categories = Category::get();
            
        return view('index.main', [
            'books' => $books,
            'categories' => $categories,
            'sortArr' => $sortString,
        ]);
        }else{
            return redirect('/');
        }
    }
}
