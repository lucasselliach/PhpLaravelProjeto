<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas=\App\Pessoa::all();
        return view('index',compact('pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pessoa= new \App\Pessoa();
        $pessoa->nome=$request->get('nome');
        $pessoa->email=$request->get('email');
        $pessoa->cpf=$request->get('cpf');
        $pessoa->save();

        return redirect('pessoas')->with('success', 'Information has been added');
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
        $pessoa = \App\Pessoa::find($id);
        return view('edit',compact('pessoa','id'));
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
        $pessoa= \App\Pessoa::find($id);
        $pessoa->nome=$request->get('nome');
        $pessoa->email=$request->get('email');
        $pessoa->cpf=$request->get('cpf');
        $pessoa->save();
        return redirect('pessoas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pessoa = \App\Pessoa::find($id);
        $pessoa->delete();

        return redirect('pessoas')->with('success', 'Information has been added');
    }
}
