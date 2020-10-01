<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::select("users.*")->paginate(10);
        return view('layouts.user-list', ['data' => $users]);
    }

    public function registration($id = 0) {
        $user = User::select('users.*')->where('users.id', '=', $id)->get();
        return view('layouts.user-registration',  ['user' => $user]);
    }

    public function getAll() {
        return User::all();
    }

    public function test(Request $request) {
        $user = new User;

        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        try { 
            if ($user->save()) {
                return response(['message' => 'success', 'success' => true]);
            }
        } catch(\Illuminate\Database\QueryException $ex){ 
            return response(['message' => 'possible duplicate of username/password.', 'success' => false]);
        }
        

        return response(['message' => 'failed', 'success' => false]);
    }

    public function getUserList(Request $request) {
        $search = $request->query('search');

        $users = User::select('users.*');

        if ($search) {
            $users = $users->where('users.lastname', 'LIKE', "%$search%")
                        ->orWhere('users.firstname', 'LIKE', "%$search%")
                        ->orWhere('users.middlename', 'LIKE', "%$search%")
                        ->orWhere('users.role', 'LIKE', "%$search%");
        }

        $users = $users->orderBy('users.lastname')->paginate(10);

        return view('ajax-forms.user-main-list',  ['data' => $users]);
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
        $user = $request->isMethod('put') ? 
            User::findOrFail($request->id) : new User;

        $id = $request->id ? $request->id : 0;

        $user->lastname = $request->input('lastname');
        $user->firstname = $request->input('firstname');
        $user->middlename = $request->input('middlename');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $privileges = $request->input('chk-privilege');
        
        $value = 0;
        foreach ($privileges as $privilege) {
            $value |= $privilege;
        }

        $user->privileges = $value;

        if ($user->save()) {
            // return view('layouts.user-registration', ['message' => 'success']);
            return redirect()->intended("/user/$id/registration");
            
        } else {
            // return view('layouts.user-registration', ['message' => 'error']);
            return redirect()->intended("/user/$id/registration");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
