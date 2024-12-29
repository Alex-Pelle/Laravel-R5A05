<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evaluation extends Model
{
    use HasFactory;
    protected $fillable = [
        'dateEval',
        'titreEval',
        'coefEval',
        'moduleEval'
    ];

    public function module(): BelongsTo
    {
        return $this->belongsTo(Modules::class);
    }

    public function getLinkedModule() : Modules {
        return Modules::find($this->moduleEval);
    }


}
