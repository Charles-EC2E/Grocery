<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('home');
    }


    public function getChartData(){

//        Cela aurais renvoyé toutes les données de la table donc cela pourrait être très lourd si la la table avait plus de données
//        $products = Product::all();

//      Ici je récupère uniquement les produits qui sont des Fruits ou des légumes
//      Si demain il y a de nouveaux types de produits, j'aurais toujours uniquement les fruits et les légumes
//      J'ai ajouté de la viande (de luxe, biensûr)
        $products = Product::where('type', '=', 'Fruit')
            ->orWhere('type', '=', 'Légume')
            ->orWhere('type', '=', 'Viande')
            ->get();

//      Je renvoie la liste de produits vers le front  (cf. response.data)
        return response()->json($products);
    }

    public function getAllTypes(){
        
        return Product::all(['type']);
    }
}
