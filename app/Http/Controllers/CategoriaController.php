<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $account_user = \Auth::user()->account;
        $categorias = Categoria::all()->where('account_user', $account_user);
        return view('categorias.index', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categoria = Categoria::all();
        return view('categorias.novo', ['categoria' => $categoria]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nome = $request->input('nome');
        $account_user = \Auth::user()->account;
        $categoria = ['nome' => $nome, 'account_user' => $account_user];
        Categoria::create($categoria);
        return redirect('categorias')->with('create-success', 'Categoria criada com sucesso.');
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
        $categoria = Categoria::find($id);
        if($categoria->account_user != \Auth::user()->account){
          return redirect('categorias')->with('update-failed', 'Você não pode atualizar esse registro.');
        }else{
          return view('categorias.editar', ['categoria' => $categoria]);
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
        $categoria = Categoria::findOrFail($id);
        if($categoria->account_user != \Auth::user()->account){
          return redirect('categorias')->with('update-failed', 'Você não pode atualizar esse registro.');
        }else{
          $categoria->update($request->all());
          return redirect('categorias')->with('update-success', 'Categoria alterada com sucesso.');
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
        $categoria = Categoria::find($id);
        if($categoria->account_user != \Auth::user()->account){
          return redirect('categorias')->with('delete-failed', 'Você não pode excluir esse registro.');
        }else{
          $categoria->delete();
          return redirect('categorias')->with('delete-success', 'Registro excluido com sucesso.');
        }
    }
}
