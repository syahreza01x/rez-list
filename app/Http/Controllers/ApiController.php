<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lis;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function getId($id)
    {

        $content =     file_get_contents("https://api.jikan.moe/v4/anime/" . $id);

        $result  = json_decode($content);

        $genre = [];

        foreach ($result->data->genres as $item) {
            array_push($genre, $item->name);
        }

        $finalGenre = collect($genre)->join(', ');
        echo $finalGenre;


        Lis::create([
            'id_anime' => $id,
            'id_user' => Auth::user()->id,
            'judul' => $result->data->title,
            'sinopsis' => $result->data->synopsis,
            'studio' => $result->data->studios[0]->name,
            'genre' => $finalGenre,
            'gambar' => $result->data->images->jpg->image_url,
            'status' => "Plan To Watch",
        ]);

        return redirect()->route('user.index');
    }
}
