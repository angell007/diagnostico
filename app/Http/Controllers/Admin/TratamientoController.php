<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tratamiento;

class TratamientoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index()
    {
        $html = app('datatables.html')->columns([
            ['title' => 'Name', 'data' => 'name'],
            ['title' => 'Descripcion', 'data' => 'descripcion'],
            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->ajax(route('admin.tratamientos.datatables'));
        $html->setTableAttribute('id', 'tratamientos_datatables');

        return view('admin.tratamientos.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Tratamiento::query())
            ->editColumn('actions', function ($tratamiento) {
                return view('admin.tratamientos.datatables.actions', compact('tratamiento'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.tratamientos.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required|unique:tratamientos',
        ]);

        $tratamiento = Tratamiento::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Tratamiento creado'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Tratamiento $tratamiento)
    {
        return view('admin.tratamientos.update', compact('tratamiento'));
    }

    public function update(Tratamiento $tratamiento)
    {
        request()->validate([
            'name' => 'required|unique:tratamientos,name,' . $tratamiento->id,
        ]);

        $tratamiento->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Tratamiento updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Tratamiento $tratamiento)
    {
        $tratamiento->delete();

        return response()->json([
            'flash_now' => ['success', 'Tratamiento deleted!'],
            'reload_datatables' => true,
        ]);
    }
}
