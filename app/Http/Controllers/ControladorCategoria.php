<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;

class ControladorCategoria extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat = Categoria::all();
        return view('categorias/categorias', compact('cat'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categorias/novaCategoria');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $cat = new Categoria();
        //$cat->nome = $request->input('nomeCategoria');
        //$cat->save();

        $cat = Categoria::create([
            "nome" => $request->input('nomeCategoria')
        ]);

        return redirect()->route('categorias.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cat = Categoria::find($id);

        if ( isset( $cat ) ) {

            return view('categorias/editarCategoria', compact('cat'));

        }else{

            return redirect()->route('categorias.index');

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $cat = Categoria::find($id);

        if ( isset( $cat ) ) {

            $cat->nome = $request->input('nomeCategoria');
            $cat->save();

        }

        return redirect()->route('categorias.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cat = Categoria::find($id);

        if ( isset( $cat ) ) {

            $cat->delete();

        }

        return redirect()->route('categorias.index');

    }
}
