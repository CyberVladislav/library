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
        $books = Book::paginate(5);
        $categories = Category::get();
        if(Auth::check()){
            $tmpArr = Order::where('users_id', Auth::user()->id)
                            ->where('status', 'бронь')
                            ->get()
                            ->toArray();
            $arrayId = [];
            foreach ($tmpArr as $key => $value) {
                $arrayId[] = $value['book_id'];
            }
        }else $arrayId = '';

        return view('index.main', [
            'books' => $books,
            'categories' => $categories,
            'arrayId' => $arrayId,
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
