<?php

namespace App\Http\Controllers;

use App\Helpers\GraphicHelper;
use App\Models\Order;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::orderBy('created_at')->get();
        $tours = Tour::all();

        $gh = new GraphicHelper();
        $colorsConfiguration = $gh->getAvailableColors();
        $ordersDataForFirstGraphics = $gh->getDataForFirstGraphics($orders);
        $ordersDataForSecondGraphics = $gh->getDataForSecondGraphics($orders);
        $ordersDataForThirdGraphics = $gh->getDataForThirdGraphics($orders);
        $ordersDataForFourthGraphics = $gh->getDataForFourthGraphics($orders, $tours, $colorsConfiguration);

        return view('home',[
            'orders' => $orders,
            'ordersDataForFirstGraphicsData' => $ordersDataForFirstGraphics['data'],
            'ordersDataForFirstGraphicsLineNames' => $ordersDataForFirstGraphics['linesConfiguration'],
            'ordersDataForSecondGraphicsData' => $ordersDataForSecondGraphics['data'],
            'ordersDataForSecondGraphicsLineNames' => $ordersDataForSecondGraphics['linesConfiguration'],
            'ordersDataForThirdGraphicsData' => $ordersDataForThirdGraphics['data'],
            'ordersDataForFourthGraphics' => $ordersDataForFourthGraphics,
            'colorsConfiguration' => $colorsConfiguration,
        ]);
    }


}
