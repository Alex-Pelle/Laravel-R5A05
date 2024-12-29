<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EvaluationEleve extends Model
{
    use HasFactory;
    protected $fillable = [
        'idEval',
        'idEleve',
        'note'
    ];

    public function eleve(): BelongsTo
    {
        return $this->belongsTo(Eleve::class);
    }
    public function evaluation(): BelongsTo
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function getLinkedEvaluation(): Evaluation {
        return Evaluation::find($this->idEval);
    }

    public function getLinkedEleve(): Eleve {
        return Eleve::find($this->idEleve);
    }
}
