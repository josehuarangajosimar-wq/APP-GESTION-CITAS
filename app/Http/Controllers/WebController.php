<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\Cita;
use App\Models\Diagnostico;
use App\Models\Tratamiento;
use App\Models\Medicamento;

class WebController extends Controller
{
    public function showLogin() { 
        return view('auth.login'); 
    }

    public function dashboard() { 
        return view('dashboard'); 
    }

    public function pacientes() {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    public function medicos() {
        $medicos = Medico::all();
        return view('medicos.index', compact('medicos'));
    }

    public function citas() {
        // with() carga las relaciones para optimizar la base de datos (Eager Loading)
        $citas = Cita::with(['paciente', 'medico'])->latest()->get();
        return view('citas.index', compact('citas'));
    }

    public function diagnosticos() {
        $diagnosticos = Diagnostico::with('cita')->get();
        return view('diagnosticos.index', compact('diagnosticos'));
    }

    public function tratamientos() {
        $tratamientos = Tratamiento::with('diagnostico')->get();
        return view('tratamientos.index', compact('tratamientos'));
    }

    public function medicamentos() {
        $medicamentos = Medicamento::all();
        return view('medicamentos.index', compact('medicamentos'));
    }
}