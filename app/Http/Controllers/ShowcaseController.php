<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowcaseController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->query('sort', 'title'); // default sort

        $projects = [
            [
                'title' => 'MediSight',
                'description' => 'A mobile app...',
                'details_url' => '#',
                'view_url' => '#',
                'created_at' => '2023-10-05'
            ],
            [
                'title' => 'Face Recognition',
                'description' => 'Attendance system...',
                'details_url' => '#',
                'view_url' => '',
                'created_at' => '2022-12-10'
            ],
            [
                'title' => 'Hand Tracking Control',
                'description' => 'OpenCV tracking...',
                'details_url' => '#',
                'view_url' => '',
                'created_at' => '2023-01-20'
            ],
        ];

        // Sort based on the selected key
        usort($projects, function ($a, $b) use ($sort) {
            return strcmp($a[$sort], $b[$sort]);
        });

        return view('showcase', compact('projects', 'sort'));
    }
}
