<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Auth;

class AjaxController extends Controller
{
    public function addOrder(Request $request){
        $orderTable = new Order;
        $orderTable->users_id = Auth::user()->id;
        $orderTable->book_id = $request->input('bookId');
        $orderTable->surname = $request->input('surname');
        $orderTable->phone = $request->input('phone');
        $orderTable->date = $request->input('date'); 
        $orderTable->status = 'бронь'; 
        $orderTable->save();
    }
}
