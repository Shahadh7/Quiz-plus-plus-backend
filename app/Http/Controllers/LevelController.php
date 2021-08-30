<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function view() {

        $level = Level::get();
        return response($level);
    }
}
