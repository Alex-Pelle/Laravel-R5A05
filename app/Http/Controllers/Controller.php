<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

abstract class Controller
{
    /**
     * @return bool
     */
    public function isProf(): bool
    {
        return Gate::allows('is-professeur');
    }

    public function basicBehavior(): void{
        if(!$this->isProf()) {
            abort(403);
        }
    }
}
