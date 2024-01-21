<?php

namespace App\Http\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface MultipleModelInterface
{
    public function setModel(Model $model);
}
