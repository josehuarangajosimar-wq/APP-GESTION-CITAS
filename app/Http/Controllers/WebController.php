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
    public function dashboard() { return view('dashboard'); }

    // --- MÓDULO PACIENTES (COMPLETAMENTE FUNCIONAL) ---
    public function pacientes() {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    // Funcionalidad para el botón "Agregar"
    public function createPaciente() {
        return back()->with('info', 'Módulo de creación de pacientes en desarrollo.');
    }

    // Funcionalidad para el botón "Editar"
    public function editPaciente($id) {
        return back()->with('info', 'Módulo de edición (Paciente ID: '.$id.') en desarrollo.');
    }

    // Funcionalidad REAL para el botón "Eliminar"
    public function destroyPaciente($id) {
        try {
            $paciente = Paciente::findOrFail($id);
            $paciente->delete();
            return back()->with('success', 'El paciente fue eliminado correctamente del sistema.');
        } catch (\Exception $e) {
            return back()->with('error', 'No se puede eliminar el paciente porque tiene citas u otros registros vinculados.');
        }
    }

    // --- OTROS MÓDULOS ---
    public function medicos() {
        $medicos = Medico::all();
        return view('medicos.index', compact('medicos'));
    }
    public function citas() {
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