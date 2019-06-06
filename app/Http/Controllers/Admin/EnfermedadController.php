<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Enfermedad;
use App\Category;

class EnfermedadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index()
    {
        $html = app('datatables.html')->columns([
            ['title' => '#', 'data' => 'id'],
            ['title' => 'Name', 'data' => 'name'],
            ['title' => 'Descripcion', 'data' => 'descripcion'],
            // ['title' => 'tipo', 'data' => ''],
            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->ajax(route('admin.enfermedads.datatables'));
        $html->setTableAttribute('id', 'enfermedads_datatables');

        return view('admin.enfermedads.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Enfermedad::query())
            ->editColumn('actions', function ($enfermedad) {
                return view('admin.enfermedads.datatables.actions', compact('enfermedad'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        $categorias = Category::all();
        return view('admin.enfermedads.create', compact('categorias'));
    }

    public function create()
    {
        request()->validate([
            'name' => 'required|unique:enfermedads',
        ]);

        $enfermedad = Enfermedad::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Enfermedad created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Enfermedad $enfermedad)
    {
        return view('admin.enfermedads.update', compact('enfermedad'));
    }

    public function update(Enfermedad $enfermedad)
    {
        request()->validate([
            'name' => 'required|unique:enfermedads,name,' . $enfermedad->id,
        ]);

        $enfermedad->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Enfermedad updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Enfermedad $enfermedad)
    {
        $enfermedad->delete();

        return response()->json([
            'flash_now' => ['success', 'Enfermedad deleted!'],
            'reload_datatables' => true,
        ]);
    }

   
}
