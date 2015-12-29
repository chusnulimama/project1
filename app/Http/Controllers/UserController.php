<?php

namespace App\Http\Controllers;

use App\Jobs\User\CreateUser;
use App\Jobs\User\DeleteUser;
use App\Jobs\User\UpdateUser;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Guzzle\Tests\Plugin\Redirect;
use App\Http\Requests;
use App\Http\Requests\User\CreateRequest;
use App\UserDetail;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = User::query();
        $data = [];
        $data['users'] = $query->orderBy('id', 'asc')->paginate(5);
        return view('layouts.settings.user.user', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['roles']=Role::all();
//        $roles = Role::lists('name', 'id');
        return view('layouts.settings.user.user_add', $data);
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
        return redirect()->route('user');
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
//        $data = [
//            'user' => $user,
//            'roles' => Role::all()
//        ];
        $roles = Role::all();
        return view('layouts.settings.user.user_edit')->with('roles', $roles)->with('user', $user);
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
        return redirect()->route('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->dispatch(new DeleteUser($user));

        return redirect()->route('user');
    }
}
