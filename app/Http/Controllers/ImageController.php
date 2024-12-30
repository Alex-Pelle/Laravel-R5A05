<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        if($this->isProf()) {
            abort(403);
        }
        // Validation du fichier téléchargé
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        // Vérifier si un fichier a été téléchargé
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Générer un nom unique pour l'image
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Sauvegarder l'image dans le dossier 'public/images'
            $path = $image->storeAs('public/images', $imageName);

            // Optionnel : Vous pouvez enregistrer le chemin de l'image dans la base de données si nécessaire
            // Example: Image::create(['path' => $path]);

            return back()->with('success', 'Image téléchargée avec succès')->with('path', $path);
        }

        return back()->with('error', 'Aucune image téléchargée');
    }
}
