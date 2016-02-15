<?php

namespace App\Http\Controllers;

use App\Jobs\User\CreateUser;
use App\Jobs\User\DeleteUser;
use App\Jobs\User\UpdateUser;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\User\CreateRequest;
use App\Http\Controllers\Controller;

class SuppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = User::whereHas('roles', function($subQuery){
            $subQuery->where('description', 'Supplier');
        })->paginate(5);

        return view('layouts/master/supp/supplier')->with('suppliers', $suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('description', '=', 'Supplier')->get();
        return view('layouts/master/supp/supplier_add', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        try{
            $this->dispatch(new CreateUser($request));
        } catch(\Exception $msgerror){
            dd($msgerror->getMessage());
        }

        return redirect()->route('supp');
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
    public function edit(User $user)
    {
        $roles = Role::where('description', '=', 'Supplier')->get();
        return view('layouts.master.supp.supplier_edit')->with('roles', $roles)->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try{
            $this->dispatch(new UpdateUser($user, $request));
        } catch(\Exception $msgerror){
            dd($msgerror->getMessage());
        }

        return redirect()->route('supp');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try{
            $this->dispatch(new DeleteUser($user));
        } catch(\Exception $msgerror){
            dd($msgerror->getMessage());
        }

        return redirect()->route('supp');
    }

    public function modal(User $supplier)
    {
        return view('layouts.master.modal.supp', ['supplier' => $supplier]);
    }
}
