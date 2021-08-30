<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function view() {
        $subjects = Subject::all();

        return response()->json($subjects,200);
    }

    public function update(Request $request,$id) {

        $data = $request->validate([
            'name' => 'required|string'
        ]);

        Subject::where('id', $id)->update(['name' => $data['name']]);

        return response(["message" => "Subject has been updated successfully."]);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name' => "required|string"
        ]);

        $subject = Subject::create([
            'name' => $data['name']
        ]);

        $response = [
            "message" => 'Subject has been created successfully',
            'subject' => $subject
        ];

        return response($response,201);
    }

    public function destroy($id) {

        Subject::where('id', $id)->delete();;

        return response(['message' => 'Subject has been deleted successfully'],200);
    }
}
