<?php

namespace App\Http\Controllers;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {

        $chart_options = [
            'chart_title' => 'Jumlah Admin Bar Chart',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'chart_color' => '37,83,115',
        ];

        $bar_chart = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Jumlah Admin Line Chart',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'line',
            'chart_color' => '37,83,115',
        ];

        $line_chart = new LaravelChart($chart_options);
        $total_admin = User::count();

        $initialMarkers = [
            [
                'position' => [
                    'lat' => -7.8052485,
                    'lng' => 110.3642824
                ],
                'draggable' => false
            ],
            [
                'position' => [
                    'lat' => -7.7925927,
                    'lng' => 110.3658812
                ],
                'draggable' => false
            ],
            [
                'position' => [
                    'lat' => -7.8118994,
                    'lng' => 110.3632557
                ],
                'draggable' => true
            ]
        ];

        return view('pages.dashboard', compact('bar_chart', 'line_chart', 'total_admin', 'initialMarkers'));
    }
}
