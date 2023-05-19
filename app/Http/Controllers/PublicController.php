<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public static $beers = [
        ['name' => 'Ichnusa', 'slug' => 'ichnusa'],
        ['name' => 'Guinnes', 'slug' => 'guinnes'],
        ['name' => 'Peroni', 'slug' => 'peroni'],
        ['name' => 'Daura', 'slug' => 'daura'],
        ['name' => 'Raffo', 'slug' => 'raffo'],
        ['name' => 'Nastro Azzurro', 'slug' => 'nastro-azzurro'],
    ];


    public function index()
    {
        $beers = Http::get('https://api.punkapi.com/v2/beers')->json();

        return view('beer.index', ['beers' => $beers]);
        //return view('beer.index', ['beers' => self::$beers]);
    }

    public function show($id)
    {

        $beer = Http::get('https://api.punkapi.com/v2/beers/' . $id)->json();
        // foreach (self::$beers as $beer) {
        //     if ($slug == $beer['slug']) {
        //         return view('beer.show', ['beer' => $beer]);
        //     }
        // }

        return view('beer.show', ['beer' => $beer[0]]);
        //abort(404);
    }


    public function send(Request $body)
    {

        //verifica
        $body->validate([
            "beer_name" => "required",
            "name" => "required",
            "phone" => "required",
            "email" => "required|email",
            "message" => "min:5",
        ]);
        //mapping
        $data = [
            "beer_name" => ucfirst($body->input('beer_name')),
            "name" => $body->name,
            "phone" => $body->phone,
            "email" => $body->email,
            "message" => $body->message,
        ];
        //Invio
        Mail::to($body->email)->send(new ContactMail($data));

        return redirect()->route('beer.thankyou')->with('data', $data['beer_name']);
    }
}
