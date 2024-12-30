<?php

namespace App\Http\Controllers;

use App\Models\Modules;
use App\Http\Requests\StoreModulesRequest;
use App\Http\Requests\UpdateModulesRequest;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Modules::all();
        return view('modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->basicBehavior();
        return view('modules.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModulesRequest $request)
    {
        $this->basicBehavior();
        // Validation automatique grâce à StoreModulesRequest
        $validatedData = $request->validated();

        // Création du module
        Modules::create([
            'code' => $validatedData['code'],
            'nom' => $validatedData['nom'],
            'coefficient' => $validatedData['coefficient'],
        ]);

        // Redirection avec un message de succès
        return redirect()->route('modules.index')->with('success', 'Module créé avec succès');
    }


    /**
     * Display the specified resource.
     */
    public function show($modules)
    {
        $module = Modules::find($modules);
        return view('modules.show', compact('module'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($module)
    {
        $this->basicBehavior();
        $modules = Modules::find($module);
        return view('modules.edit', compact('modules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModulesRequest $request, $module)
    {
        $this->basicBehavior();
        // Validation automatique grâce à UpdateModulesRequest
        $modules = Modules::find($module);
        $validatedData = $request->validated();

        // Mise à jour du module
        $modules->update([
            'nom' => $validatedData['nom'],
            'coefficient' => $validatedData['coefficient'],
        ]);

        // Redirection avec un message de succès
        return redirect()->route('modules.index')->with('success', 'Module mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($module)
    {
        $this->basicBehavior();
        $modules = Modules::find($module);
        $modules->delete();

        // Redirection avec un message de succès
        return redirect()->route('modules.index')->with('success', 'Module supprimé avec succès');
    }
}
