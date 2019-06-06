<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
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
        $html->ajax(route('admin.categories.datatables'));
        $html->setTableAttribute('id', 'categories_datatables');

        return view('admin.categories.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Category::query())
            ->editColumn('actions', function ($category) {
                return view('admin.categories.datatables.actions', compact('category'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.categories.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required|unique:categories',
        ]);

        $category = Category::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Category created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Category $category)
    {
        return view('admin.categories.update', compact('category'));
    }

    public function update(Category $category)
    {
        request()->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
        ]);

        $category->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Category updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Category $category)
    {
        $category->delete();

        return response()->json([
            'flash_now' => ['success', 'Category deleted!'],
            'reload_datatables' => true,
        ]);
    }
}
