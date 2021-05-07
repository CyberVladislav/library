<?php


namespace App\Helpers;


use App\Models\Tour;

class GraphicHelper
{
    public function getDataForFirstGraphics($orders)
    {
        $ordersDataForFirstGraphics = [];
        $linesConfiguration = [];

        foreach ($orders as $order) {
            $orderYear = date('Y', strtotime($order->created_at));
            if (isset($ordersDataForFirstGraphics[$orderYear][$order->tour->title])) {
                $ordersDataForFirstGraphics[$orderYear][$order->tour->title]++;
                $ordersDataForFirstGraphics[$orderYear]['y'] = $orderYear;
            } else {
                $ordersDataForFirstGraphics[$orderYear][$order->tour->title] = 1;
            }

            if (!isset($linesConfiguration[$order->tour->title])) {
                $linesConfiguration[$order->tour->title]['name'] = $order->tour->title;
            }
        }

        return [
            'data' => $ordersDataForFirstGraphics,
            'linesConfiguration' => $linesConfiguration
        ];
    }

    public function getDataForSecondGraphics($orders)
    {
        $ordersDataForSecondGraphics = [];
        $linesConfiguration = [];

        foreach ($orders as $order) {
            $orderYear = date('Y', strtotime($order->created_at));
            if (isset($ordersDataForSecondGraphics[$orderYear][$order->tour->title])) {
                $ordersDataForSecondGraphics[$orderYear][$order->tour->title]+= $order->tour->price;
                $ordersDataForSecondGraphics[$orderYear]['y'] = $orderYear;
            } else {
                $ordersDataForSecondGraphics[$orderYear][$order->tour->title] = $order->tour->price;
            }

            if (!isset($linesConfiguration[$order->tour->title])) {
                $linesConfiguration[$order->tour->title]['name'] = $order->tour->title;
            }
        }

        return [
            'data' => $ordersDataForSecondGraphics,
            'linesConfiguration' => $linesConfiguration
        ];
    }

    public function getDataForThirdGraphics($orders)
    {
        $ordersDataForThirdGraphics = [];
        $linesConfiguration = [];

        foreach ($orders as $order) {
            $orderMonth = date('m', strtotime($order->created_at));

            if (isset($ordersDataForThirdGraphics[$orderMonth])) {
                $ordersDataForThirdGraphics[$orderMonth]++;
            } else {
                $ordersDataForThirdGraphics[$orderMonth] = 1;
            }
        }

        ksort($ordersDataForThirdGraphics);

        return [
            'data' => $ordersDataForThirdGraphics,
            'linesConfiguration' => $linesConfiguration
        ];
    }

    public function getDataForFourthGraphics($orders, $tours, $colorsConfiguration)
    {
        $statistics = [];
        foreach ($tours as $tour) {
            foreach($orders as $order) {
                if ($tour->id == $order->tour->id) {
                    $orderMonth = intval(date('m', strtotime($order->created_at)));
                    $age = 2021 - date('Y', strtotime($order->birthday));
                    if (isset($statistics[$tour->id][$orderMonth]['info'])) {
                        $statistics[$tour->id][$orderMonth]['info']['count']++;
                        $statistics[$tour->id][$orderMonth]['info']['sum_age'] += $age;
                    } else {
                        $statistics[$tour->id][$orderMonth]['info']['count'] = 1;
                        $statistics[$tour->id][$orderMonth]['info']['sum_age'] = $age;
                    }
                }
            }
        }

        $ordersDataForFourthGraphics = [];

        $countTour = 1;
        foreach($tours as $tour) {
            for($i = 1; $i <= 12; $i++) {

                if (!isset($ordersDataForFourthGraphics[$tour->id])) {
                    $ordersDataForFourthGraphics[$tour->id] = [
                        'label' => $tour->title,
                        'fill' => false,
                        'borderColor' => $colorsConfiguration[$countTour],
                        'backgroundColor' => $colorsConfiguration[$countTour],
                    ];
                }

                if (isset($statistics[$tour->id][$i])) {
                    $ordersDataForFourthGraphics[$tour->id]['data'][] = $statistics[$tour->id][$i]['info']['sum_age'] / $statistics[$tour->id][$i]['info']['count'];
                } else {
                    $ordersDataForFourthGraphics[$tour->id]['data'][] = 0;
                }
            }
            $countTour++;
        }

        return $ordersDataForFourthGraphics;
    }

    public function getAvailableColors()
    {
        return [
            '#F55142',
            '#B042F5',
            '#F5B342',
            '#F542CB',
            '#F5F542',
            '#f54242',
            '#0008ff',
            '#4dff00',
            '#00c3ff',
            '#42E3F5',
            '#4275F5',
            '#4dff00'
        ];
    }
}
