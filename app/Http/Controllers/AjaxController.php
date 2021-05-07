<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Auth;

class AjaxController extends Controller
{
    public function addOrder(Request $request){
        // dd($request->input('surname'));
        if ($request->surname == "empty field"){
            return undefined;
        }else{
            $orderTable = new Order;
            $orderTable->users_id = Auth::user()->id;
            $orderTable->book_id = $request->input('bookId');
            $orderTable->surname = $request->input('surname');
            $orderTable->phone = $request->input('phone');
            $orderTable->date = $request->input('date'); 
            $orderTable->save();
        }

        // if (isset ($searchNeedOrder)){
        //     $orderId = $searchNeedOrder->id;
        //     $thatProduct = ProductsOrder::whereProduct_idAndOrder_id($idProduct, $orderId)->first();
        //     if(isset($thatProduct)){
        //         $productCount = $thatProduct->count;
        //         $thatProduct->count = $request->input('count') + $productCount;
        //         $thatProduct->save();
        //     }    
        //     else{
        //         $helpTable = new ProductsOrder;
        //         $helpTable->product_id = $idProduct;
        //         $helpTable->order_id = $searchNeedOrder->id;
        //         $helpTable->count = $request->input('count'); 
        //         $helpTable->save();
        //     }
        // }
        // else{
        //     $helpTable = new ProductsOrder;
        //     $orderTable = new Order;
            
        //     $orderTable->user_id = Auth::user()->id;
        //     $orderTable->status = 'load';
        //     $orderTable->save();

        //     $helpTable->product_id = $idProduct;
        //     $helpTable->order_id = $orderTable->id;
        //     $helpTable->count = $request->input('count');  
        //     $helpTable->save();
        // }
    }
}
