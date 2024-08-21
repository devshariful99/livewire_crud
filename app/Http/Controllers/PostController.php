<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{

    /**
     * Display the posts view.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('posts');
    }
}
