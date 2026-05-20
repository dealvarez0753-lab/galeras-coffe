<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function inicio()
    {
        return view('inicio');
    }


     public function nosotros()
    {
        return view('nosotros');
    }

      public function contacto()
    {
        return view('contacto');
    }

      public function menu()
    {
        return view('menu');
    }
}
