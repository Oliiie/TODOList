<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sadrzaji = User::find(Auth::user()->id);
        $sadrzaji = Todolist::join('users', 'users.id', '=', 'todolists.idKorisnika')
                            ->get(['users.name', 'todolists.id', 'todolists.sadrzaj', 'todolists.created_at']);

        return view('todo')->with(['sadrzaji' => $sadrzaji]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sadrzaji = new Todolist();

        $sadrzaji->idKorisnika = $request->user()->id;
        $sadrzaji->sadrzaj = $request->sadrzaj;
        $sadrzaji->save();

        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function show(Todolist $todolist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function edit(Todolist $todolist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todolist $todolist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sadrzaji = Todolist::find($id);
        $sadrzaji->delete();
        
        return redirect()->route('todo.index');
    }
}
