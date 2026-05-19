<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WartaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($category)
    {
        $categoryList = ['kebaktian', 'jemaat', 'kegiatan'];

        if(!in_array($category, $categoryList)) {
            abort(404);
        }

        $titleConcat = 'Warta ' . ucfirst($category);

        if ($category === 'kebaktian') {
            return view('warta.warta_kebaktian.index', [
                'category' => $category,
                'title' => $titleConcat
            ]);
        }

        return view('warta.index', [
            'category' => $category,
            'title' => $titleConcat
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
}
