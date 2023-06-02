<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FunctionController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->all();

        if ($user = User::create($data)) {
            return response()->json([
                "status" => "OK",
                "user" => $user,
                "message" => "Utilisateur enrole"
            ]);
        }else {
            return response()->json([
                "status" => "KO",
                "message" => "Utilisateur non enrole"
            ]);
        }

    }

    public function user(Request $request, $mot = null)
    {
        if ($mot !== null) {
            $users = User::where("nom", "LIKE", "%$mot%")->orwhere("prenom", "LIKE", "%$mot%")->get();
        } else {
            $users = User::all();
        }

        return response()->json([
            "users" => $users
        ]);
    }

    public function upload(Request $request)
    {
        if (!empty($request->file("file"))) {
            $name = uniqid().".".$request->file("file")->getClientOriginalExtension();

            $path = $request->file("file")->storeAs("files", $name, "public");

            return response()->json([
                "path" => $path
            ]);
        }
        return response()->json([
            "message" => "No file was uploaded"
        ]);
    }

}
