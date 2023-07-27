<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $title_name = "Inicio";
        return view('index', compact('title_name'));
    }

    public function game()
    {
        $title_name = "Juego";
        return view('game', compact('title_name'));
    }

    public function technologies()
    {
        $title_name = "Tecnologías";
        return view('technologies', compact('title_name'));
    }

    public function download()
    {
        $title_name = "Descargar";
        return view('download', compact('title_name'));
    }

    public function aboutUs()
    {
        $title_name = "Sobre Nosotros";
        return view('aboutUs', compact('title_name'));
    }

}
