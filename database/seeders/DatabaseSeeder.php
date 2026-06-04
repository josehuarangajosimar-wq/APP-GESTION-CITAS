<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\Cita;
use App\Models\Diagnostico;
use App\Models\Tratamiento;
use App\Models\Medicamento;
use App\Models\User;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Usuario de prueba para la API
        User::create([
            'name' => 'Admin Citas',
            'email' => 'admin@clinica.com',
            'password' => bcrypt('password123'),
        ]);

        // 2. Crear 5 Pacientes
        $pacientes = [
            Paciente::create(['nombre' => 'Carlos', 'apellido' => 'Ruiz', 'dni' => '11111111', 'telefono' => '999888777', 'fecha_nacimiento' => '1985-05-12']),
            Paciente::create(['nombre' => 'Ana', 'apellido' => 'López', 'dni' => '22222222', 'telefono' => '999888666', 'fecha_nacimiento' => '1990-08-22']),
            Paciente::create(['nombre' => 'Luis', 'apellido' => 'Gómez', 'dni' => '33333333', 'telefono' => '999888555', 'fecha_nacimiento' => '1978-11-05']),
            Paciente::create(['nombre' => 'María', 'apellido' => 'Paz', 'dni' => '44444444', 'telefono' => '999888444', 'fecha_nacimiento' => '2001-02-14']),
            Paciente::create(['nombre' => 'Jorge', 'apellido' => 'Gil', 'dni' => '55555555', 'telefono' => '999888333', 'fecha_nacimiento' => '1995-12-30']),
        ];

        // 3. Crear 5 Médicos
        $medicos = [
            Medico::create(['nombre' => 'Dr. Alberto', 'apellido' => 'Pérez', 'especialidad' => 'Cardiología', 'cmp' => 'CMP1001']),
            Medico::create(['nombre' => 'Dra. Rosa', 'apellido' => 'Torres', 'especialidad' => 'Pediatría', 'cmp' => 'CMP1002']),
            Medico::create(['nombre' => 'Dr. Manuel', 'apellido' => 'Silva', 'especialidad' => 'Medicina General', 'cmp' => 'CMP1003']),
            Medico::create(['nombre' => 'Dra. Carmen', 'apellido' => 'Castro', 'especialidad' => 'Dermatología', 'cmp' => 'CMP1004']),
            Medico::create(['nombre' => 'Dr. Hugo', 'apellido' => 'Vega', 'especialidad' => 'Neurología', 'cmp' => 'CMP1005']),
        ];

        // 4. Crear 5 Citas
        $citas = [
            Cita::create(['paciente_id' => $pacientes[0]->id, 'medico_id' => $medicos[0]->id, 'fecha_hora' => Carbon::now()->addDays(1), 'estado' => 'pendiente']),
            Cita::create(['paciente_id' => $pacientes[1]->id, 'medico_id' => $medicos[1]->id, 'fecha_hora' => Carbon::now()->subDays(2), 'estado' => 'completada']),
            Cita::create(['paciente_id' => $pacientes[2]->id, 'medico_id' => $medicos[2]->id, 'fecha_hora' => Carbon::now()->subDays(5), 'estado' => 'completada']),
            Cita::create(['paciente_id' => $pacientes[3]->id, 'medico_id' => $medicos[3]->id, 'fecha_hora' => Carbon::now()->addDays(3), 'estado' => 'cancelada']),
            Cita::create(['paciente_id' => $pacientes[4]->id, 'medico_id' => $medicos[4]->id, 'fecha_hora' => Carbon::now()->subDays(1), 'estado' => 'completada']),
        ];

        // 5. Crear 5 Diagnósticos (Asociados a citas completadas y una pendiente simulando previa)
        $diagnosticos = [
            Diagnostico::create(['cita_id' => $citas[1]->id, 'descripcion' => 'Infección respiratoria aguda.', 'nivel_gravedad' => 'leve']),
            Diagnostico::create(['cita_id' => $citas[2]->id, 'descripcion' => 'Hipertensión arterial estadio 1.', 'nivel_gravedad' => 'moderado']),
            Diagnostico::create(['cita_id' => $citas[4]->id, 'descripcion' => 'Migraña tensional crónica severa.', 'nivel_gravedad' => 'grave']),
            Diagnostico::create(['cita_id' => $citas[0]->id, 'descripcion' => 'Evaluación cardiológica preventiva.', 'nivel_gravedad' => 'leve']),
            Diagnostico::create(['cita_id' => $citas[3]->id, 'descripcion' => 'Paciente canceló. No hay diagnóstico.', 'nivel_gravedad' => 'leve']),
        ];

        // 6. Crear 5 Tratamientos
        $tratamientos = [
            Tratamiento::create(['diagnostico_id' => $diagnosticos[0]->id, 'instrucciones' => 'Reposo absoluto e hidratación.', 'duracion_dias' => 7]),
            Tratamiento::create(['diagnostico_id' => $diagnosticos[1]->id, 'instrucciones' => 'Dieta baja en sodio y medicación.', 'duracion_dias' => 30]),
            Tratamiento::create(['diagnostico_id' => $diagnosticos[2]->id, 'instrucciones' => 'Terapia de relajación y analgésicos.', 'duracion_dias' => 15]),
            Tratamiento::create(['diagnostico_id' => $diagnosticos[0]->id, 'instrucciones' => 'Uso de broncodilatadores en caso de emergencia.', 'duracion_dias' => 5]),
            Tratamiento::create(['diagnostico_id' => $diagnosticos[1]->id, 'instrucciones' => 'Ejercicios cardiovasculares diarios.', 'duracion_dias' => 90]),
        ];

        // 7. Crear 5 Medicamentos
        $medicamentos = [
            Medicamento::create(['nombre' => 'Amoxicilina', 'concentracion' => '500mg', 'presentacion' => 'Tabletas']),
            Medicamento::create(['nombre' => 'Losartán', 'concentracion' => '50mg', 'presentacion' => 'Pastillas']),
            Medicamento::create(['nombre' => 'Ibuprofeno', 'concentracion' => '400mg', 'presentacion' => 'Cápsulas']),
            Medicamento::create(['nombre' => 'Salbutamol', 'concentracion' => '100mcg', 'presentacion' => 'Inhalador']),
            Medicamento::create(['nombre' => 'Paracetamol', 'concentracion' => '1g', 'presentacion' => 'Tabletas']),
        ];

        // 8. Poblar tabla pivote (Medicamento_Tratamiento) asociando los datos
        $tratamientos[0]->medicamentos()->attach($medicamentos[0]->id, ['dosis' => '1 tableta', 'frecuencia' => 'Cada 8 horas']);
        $tratamientos[1]->medicamentos()->attach($medicamentos[1]->id, ['dosis' => '1 pastilla', 'frecuencia' => 'Cada 24 horas']);
        $tratamientos[2]->medicamentos()->attach($medicamentos[2]->id, ['dosis' => '1 cápsula', 'frecuencia' => 'Cada 12 horas SOS']);
        $tratamientos[3]->medicamentos()->attach($medicamentos[3]->id, ['dosis' => '2 puff', 'frecuencia' => 'Cada 6 horas']);
        $tratamientos[0]->medicamentos()->attach($medicamentos[4]->id, ['dosis' => '1 tableta', 'frecuencia' => 'Cada 8 horas para la fiebre']);
    }
}