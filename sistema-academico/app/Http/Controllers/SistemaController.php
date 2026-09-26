<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Profesor;
use App\Models\Materia;
use Illuminate\Http\Request;

class SistemaController extends Controller
{
    /* ============================================================
     |  ESTUDIANTES
     * ============================================================ */

    // Mostrar listado de estudiantes
    public function indexEstudiantes()
    {
        $estudiantes = Estudiante::orderBy('id', 'desc')->get();
        return view('estudiantes.estudiantes', compact('estudiantes'));
    }

    // Mostrar formulario de creación
    public function createEstudiante()
    {
        return view('estudiantes.crear_estudiante');
    }

    // Guardar nuevo estudiante
    public function storeEstudiante(Request $request)
    {
        $datos = $request->validate([
            'nombre'   => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo'   => 'required|email|unique:estudiantes,correo',
        ]);

        Estudiante::create($datos);

        return redirect()->route('estudiantes.index')
            ->with('mensaje', 'Estudiante registrado correctamente.');
    }

    // Mostrar formulario de edición
    public function editEstudiante(Estudiante $estudiante)
    {
        return view('estudiantes.editar_estudiante', compact('estudiante'));
    }

    // Actualizar estudiante
    public function updateEstudiante(Request $request, Estudiante $estudiante)
    {
        $datos = $request->validate([
            'nombre'   => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo'   => 'required|email|unique:estudiantes,correo,' . $estudiante->id,
        ]);

        $estudiante->update($datos);

        return redirect()->route('estudiantes.index')
            ->with('mensaje', 'Estudiante actualizado correctamente.');
    }

    // Eliminar estudiante
    public function destroyEstudiante(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('estudiantes.index')
            ->with('mensaje', 'Estudiante eliminado correctamente.');
    }

    /* ============================================================
     |  PROFESORES
     * ============================================================ */

    public function indexProfesores()
    {
        $profesores = Profesor::orderBy('id', 'desc')->get();
        return view('profesores.profesores', compact('profesores'));
    }

    public function createProfesor()
    {
        return view('profesores.crear_profesor');
    }

    public function storeProfesor(Request $request)
    {
        $datos = $request->validate([
            'nombre'   => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo'   => 'required|email|unique:profesores,correo',
        ]);

        Profesor::create($datos);

        return redirect()->route('profesores.index')
            ->with('mensaje', 'Profesor registrado correctamente.');
    }

    public function editProfesor(Profesor $profesor)
    {
        return view('profesores.editar_profesor', compact('profesor'));
    }

    public function updateProfesor(Request $request, Profesor $profesor)
    {
        $datos = $request->validate([
            'nombre'   => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo'   => 'required|email|unique:profesores,correo,' . $profesor->id,
        ]);

        $profesor->update($datos);

        return redirect()->route('profesores.index')
            ->with('mensaje', 'Profesor actualizado correctamente.');
    }

    public function destroyProfesor(Profesor $profesor)
    {
        $profesor->delete();

        return redirect()->route('profesores.index')
            ->with('mensaje', 'Profesor eliminado correctamente.');
    }

    /* ============================================================
     |  MATERIAS
     * ============================================================ */

    public function indexMaterias()
    {
        $materias = Materia::orderBy('id', 'desc')->get();
        return view('materias.materias', compact('materias'));
    }

    public function createMateria()
    {
        return view('materias.crear_materia');
    }

    public function storeMateria(Request $request)
    {
        $datos = $request->validate([
            'nombre'   => 'required|string|max:255',
            'creditos' => 'required|integer|min:1|max:20',
        ]);

        Materia::create($datos);

        return redirect()->route('materias.index')
            ->with('mensaje', 'Materia registrada correctamente.');
    }

    public function editMateria(Materia $materia)
    {
        return view('materias.editar_materia', compact('materia'));
    }

    public function updateMateria(Request $request, Materia $materia)
    {
        $datos = $request->validate([
            'nombre'   => 'required|string|max:255',
            'creditos' => 'required|integer|min:1|max:20',
        ]);

        $materia->update($datos);

        return redirect()->route('materias.index')
            ->with('mensaje', 'Materia actualizada correctamente.');
    }

    public function destroyMateria(Materia $materia)
    {
        $materia->delete();

        return redirect()->route('materias.index')
            ->with('mensaje', 'Materia eliminada correctamente.');
    }
}
