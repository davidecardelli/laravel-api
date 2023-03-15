<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technology = new Technology();
        return view('admin.technologies.create', compact('technology'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|unique:technologies',
            'logo' => 'image|nullable',
        ]);

        $data = $request->all();

        $technology = new Technology();

        if (array_key_exists('logo', $data)) {
            $img_url = Storage::put('projects', $data['logo']);
            $data['logo'] = $img_url;
        }

        $technology->fill($data);
        $technology->save();

        return to_route('admin.technologies.index')
            ->with('message', "La tecnologia $technology->type è stata creata correttamente")
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $request->validate([
            'type' => 'required|string|unique:technologies',
            'logo' => 'image|nullable',
        ]);

        $data = $request->all();

        if (array_key_exists('logo', $data)) {
            if ($technology->logo) Storage::delete($technology->logo);
            $img_url = Storage::put('projects', $data['logo']);
            $data['logo'] = $img_url;
        }

        $technology->fill($data);

        $technology->update($data);

        return to_route('admin.technologies.index')
            ->with('message', 'La tecnologia è stata modificata correttamente')
            ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        if ($technology->logo) Storage::delete($technology->logo);
        $technology->delete();
        return to_route('admin.technologies.index')
            ->with('message', "La tecnologia $technology->type è stata eliminata definitivamente")
            ->with('type', 'success');
    }
}
