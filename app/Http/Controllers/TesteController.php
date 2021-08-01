<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2)
    {
        //echo "A soma de $p1 + $p2 é: " . ($p1 + $p2);

        // METODO ARRAY ASSOCIATIVO
        //return view('site.teste', ['p1' => $p1, 'p2' => $p2]);

        // Metodo Compact, passar parametro para a view

        return view('site.teste', compact('p1', 'p2'));


        //Metodo With ()

        //return view('site.teste')->with('xxx', $p1)->with('yyy', $p2);

        //MELHOR METODO É O COMPACT, FACIL E RAPIDO DE FAZER
    }
}
