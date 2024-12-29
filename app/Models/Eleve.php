<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
    protected $fillable=['nom','prenom','dateNaissance','numeroEtudiant','email','image'];

    public function moyenne($notes) {


        $sommePonderee = 0;
        $totalCoefficients = 0;

        foreach ($notes as $note) {
            $evaluation = $note->getLinkedEvaluation();
            $module = $evaluation->getLinkedModule();

            $coefEvaluation = $evaluation->coefEval;
            $coefModule = $module->coefficient;


            $sommePonderee += $note->note * $coefEvaluation * $coefModule;
            $totalCoefficients += $coefEvaluation * $coefModule;
        }

        return $totalCoefficients > 0 ? $sommePonderee / $totalCoefficients : 0;
    }
}
