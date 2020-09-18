<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //utilizando api
        $pro = Produto::all();
        return $pro->toJson();

    }

    public function indexView()
    {
        //utilizando api
        return view('produtos/produtos');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cat = Categoria::all();
        return view('produtos/novoProduto', compact('cat'));

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
        $pro = new Produto();

        $pro = Produto::create([
            "nome" => $request->input('nome'),
            "estoque" => $request->input('estoque'),
            "preco" => $request->input('preco'),
            "categoria_id" => $request->input('categoria_id')
        ]);

        //return redirect()->route('produtos');
        return json_encode($pro);

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
        $pro = Produto::find($id);

        if( isset($pro) ){

            return json_encode($pro);

        }else{

            return response('Produto não encontrado', 4004);
            
        }

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
        //atualizando
        $pro = Produto::find($id);

        if( isset($pro) ){
            $pro->nome = $request->input('nome');
            $pro->estoque = $request->input('estoque');
            $pro->preco = $request->input('preco');
            $pro->categoria_id = $request->input('categoria_id');

            $pro->save();

            return json_encode($pro);

        }else{

            return response('Produto não encontrado', 4004);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //deletando com api
        $pro = Produto::find($id);

        if(isset($pro)){
            $pro->delete();
            return response('OK', 200);
        }else{
            return response('Produto não encontrado', 4004);
        }

    }
}
