<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = [
            [
                'icon' => 'images/house.png',
                'name' => 'House Cleaning',
                'description' => 'Professional house cleaning services tailored to your needs.'
            ],
            [
                'icon' => 'images/office.png',
                'name' => 'Office Cleaning',
                'description' => 'Keep your workspace clean and productive.'
            ],
            [
                'icon' => 'images/deep.png',
                'name' => 'Deep Cleaning',
                'description' => 'Thorough cleaning service for a spotless environment.'
            ],
            [
                'icon' => 'images/ac.png',
                'name' => 'AC Cleaning',
                'description' => 'Regular maintenance your air conditioner to keep your space clean.'
            ]
        ];
    
        $testimonials = [
            [
                'image' => 'images/say1.png',
                'name' => 'Jefri Nichol',
                'text' => 'Excellent service! My house has never been cleaner.'
            ],
            [
                'image' => 'images/say2.png',
                'name' => 'Natasha Rizky',
                'text' => 'Very professional and thorough. Highly recommended!'
            ],
            [
                'image' => 'images/say3.png',
                'name' => 'Jackson Kamela',
                'text' => 'Great attention to detail and friendly staff.'
            ]
        ];
    
        // Anda bisa menambahkan view `user.dashboard` menggunakan Blade include
        return view('home', compact('services', 'testimonials'));
    }
}
