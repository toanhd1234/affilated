<?php

namespace App\Http\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface SingleModelInterface
{
    public function setMultipleModel(Model ...$model);
}
