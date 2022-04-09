<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {

        $data = [
            'title' => 'About Page',
            'text' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga molestiae laborum quia accusamus blanditiis voluptatibus deserunt enim id, incidunt unde dolore magnam deleniti! Inventore beatae nostrum architecto obcaecati nisi placeat.
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate laboriosam unde tempore officiis quis sint consequatur? Aliquam totam dicta eveniet, molestias dolor fugiat sequi nisi nihil maxime! Inventore, recusandae rerum.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo blanditiis vero corporis laborum error. Explicabo quae, molestias minima deleniti accusamus debitis eius assumenda dolorum cumque tenetur pariatur, aliquam in! Ducimus.'
        ];

        // return view('frontend.about')->with('data', $data);
        return view('frontend.about.about', ['data' => $data]);
    }


    public function view($number) {

        $data = [
            'title' => 'this is a page with number ' . $number,
            'text' => 'test text'
        ];

        return view('frontend.about.about-inner', ['data' => $data]);
    }
}
