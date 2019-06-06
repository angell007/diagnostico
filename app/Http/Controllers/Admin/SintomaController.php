<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sintoma;

class SintomaController extends Controller
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
        $html->ajax(route('admin.sintomas.datatables'));
        $html->setTableAttribute('id', 'sintomas_datatables');

        return view('admin.sintomas.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Sintoma::query())
            ->editColumn('actions', function ($sintoma) {
                return view('admin.sintomas.datatables.actions', compact('sintoma'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.sintomas.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required|unique:sintomas',
        ]);

        $sintoma = Sintoma::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Sintoma created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Sintoma $sintoma)
    {
        return view('admin.sintomas.update', compact('sintoma'));
    }

    public function update(Sintoma $sintoma)
    {
        request()->validate([
            'name' => 'required|unique:sintomas,name,' . $sintoma->id,
        ]);

        $sintoma->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Sintoma updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Sintoma $sintoma)
    {
        $sintoma->delete();

        return response()->json([
            'flash_now' => ['success', 'Sintoma deleted!'],
            'reload_datatables' => true,
        ]);
    }
}
