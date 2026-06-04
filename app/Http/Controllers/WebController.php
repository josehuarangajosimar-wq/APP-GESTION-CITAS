<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class WebController extends Controller
{
    // Vista de Login (Soluciona el RouteNotFoundException)
    public function showLogin()
    {
        return view('auth.login');
    }

    // Vista del Dashboard (Panel SANAR +)
    public function dashboard()
    {
        return view('dashboard');
    }

    // Vista de Tabla de Pacientes
    public function pacientes()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }
}