<?php

namespace App\Http\Controllers;

use App\Jobs\User\CreateUser;
use App\Jobs\User\DeleteUser;
use App\Jobs\User\UpdateUser;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $employees = User::whereHas('roles', function($subQuery) {
            $subQuery->where('description', 'User');
        })->paginate(5);

        return view('layouts.master.employee.employee')->with('employees', $employees);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('description', '=', 'User')->get();
        return view('layouts.master.employee.employee_add', ['roles' => $roles]);
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

        return redirect()->route('employee');
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
        return view('layouts.masater.employee.employee_edit')->with('roles', $roles)->with('user', $user);
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
        try{
            $this->dispatch(new UpdateUser($user, $request));
        } catch( \Exception $msgerror){
            dd($msgerror->getMessage());
        }
        redirect()->route('employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteUser($user));

        return redirect()->route('employee');
    }

    public function modal(User $employee)
    {
        return view('layouts.master.modal.employee', ['employee'=>$employee]);
    }
}
