<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Order;
use App\Models\Category;

class IndexController extends Controller
{
    public function index()
    {
        // if (Auth::check()){
        //     $books = Book::get();
        //     $inOrder = Order::whereUsers_idAndStatus(Auth::user()->id, 'бронь')->get();

        //     return view('index.main', [
        //         'books' => $books,
        //         'orders' => $orders,
        //     ]);
        // }else{
        //     $user = Auth::user()->id;
        //     $books = Book::get();
        //     $orders = Order::get();
            
        //     foreach ($books as $book){
        //         $orders = Order::whereUser_idAndBook_id($user, $book->id)->get();
        //     }
    
        //     return view('index.main', [
        //         'books' => $books,
        //         'orders' => $orders,
        //     ]);
        // }
        $books = Book::paginate(5);
        $categories = Category::get();
        
           return view('index.main', [
                'books' => $books,
                'categories' => $categories,
                'sortArr' => '',
            ]);
    }

    public function choosenCategory($categoryId = null){
        $categories = Category::get();
        $books = Book::where('categories_id', $categoryId)->paginate(5);

        return view('index.main', [
            'books' => $books, 
            'categories' => $categories,
            'sortArr' => 'id,asc',
        ]);
    }

    public function contacts()
    {
        return view('index.contacts');
    }

    public function asd()
    {
        return view('index.asd');
    }
}
