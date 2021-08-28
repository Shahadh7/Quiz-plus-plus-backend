<?php

namespace App\Http\Controllers;

use App\Models\Saying;
use Illuminate\Http\Request;

class SayingController extends Controller
{
    public function view() {

        $saying = Saying::all()->random(1)->first();;

        return response()->json($saying);
    }
}
