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

    public function reservas()
    {
        return view('reservas');
    }

    // ✅ Método agregado: página de confirmación de mensaje enviado
    public function mensaje()
    {
        return view('mensaje');
    }

    // ✅ Método agregado: página de reserva exitosa
    public function exitosa()
    {
        return view('exitosa');
    }
}