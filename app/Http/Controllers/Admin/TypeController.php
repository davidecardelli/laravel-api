<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = new Type();
        return view('admin.types.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'type' => 'required|string|unique:types',
        ]);

        $data = $request->all();

        $type = new Type();
        $type->fill($data);
        $type->save();

        return to_route('admin.types.index')
            ->with('message', "Il tipo $type->type è stato creato correttamente")
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {

        $request->validate([
            'type' => 'required|string|unique:types',
        ]);

        $data = $request->all();
        $type->fill($data);
        $type->update($data);

        return to_route('admin.types.index')
            ->with('message', 'Il tipo è stato modificato correttamente')
            ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return to_route('admin.types.index')
            ->with('message', "Il progetto $type->title è stato eliminato definitivamente")
            ->with('type', 'success');
    }
}
