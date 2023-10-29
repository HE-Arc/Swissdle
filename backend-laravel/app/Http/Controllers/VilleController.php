<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cycle;

class VilleController extends Controller
{
    public function today()
    {
        return Cycle::getCurrentVille();
    }
}
