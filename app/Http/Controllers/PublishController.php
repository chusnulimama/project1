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

class PublishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = User::whereHas('roles', function($subQuery){
            $subQuery->where('description', 'Publisher');
        })->paginate(5);

        return view('layouts/master/publish/publish')->with('publishers', $publishers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('description', '=', 'Publisher')->get();
        return view('/layouts/master/publish/publish_add', ['roles' => $roles]);
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

        return redirect()->route('publish');
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
        $roles = Role::all();
        return view('/layouts/master/publish/publish_edit')->with('roles', $roles)->with('user', $user);
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
            $this->dispatch(new UpdateUser($request));
        } catch(\Exception $msgerror){
            dd($msgerror->getMessage());
        }

        return redirect()->route('publish');
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

        return redirect()->route('publish');
    }

    public function modal(User $publisher)
    {
        return view('/layouts/master/modal/publish', ['publisher' => $publisher]);
    }
}