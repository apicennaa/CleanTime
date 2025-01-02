<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = [
            [
                'icon' => 'image/house.png',
                'name' => 'House Cleaning',
                'description' => 'Professional house cleaning services tailored to your needs.'
            ],
            [
                'icon' => 'image/office.png',
                'name' => 'Office Cleaning',
                'description' => 'Keep your workspace clean and productive.'
            ],
            [
                'icon' => 'image/deep.png',
                'name' => 'Deep Cleaning',
                'description' => 'Thorough cleaning service for a spotless environment.'
            ],
            [
                'icon' => 'image/ac.png',
                'name' => 'AC Cleaning',
                'description' => 'Regular maintenance your air conditioner to keep your space clean.'
            ]
        ];
    
        $testimonials = [
            [
                'image' => 'image/say1.png',
                'name' => 'Jefri Nichol',
                'text' => 'Excellent service! My house has never been cleaner.'
            ],
            [
                'image' => 'image/say2.png',
                'name' => 'Natasha Rizky',
                'text' => 'Very professional and thorough. Highly recommended!'
            ],
            [
                'image' => 'image/say3.png',
                'name' => 'Jackson Kamela',
                'text' => 'Great attention to detail and friendly staff.'
            ]
        ];
    
        // Anda bisa menambahkan view `user.dashboard` menggunakan Blade include
        return view('home', compact('services', 'testimonials'));
    }
}
