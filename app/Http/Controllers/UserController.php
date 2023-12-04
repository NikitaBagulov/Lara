<?php

namespace App\Http\Controllers;

use App\Events\UserValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\User;
use App\Role;
use App\Comment;

    class UserController extends Controller
    {
        public function index()
        {
            $users = User::usersWithRoles();
            // dd($users);
            return view("users.index", compact("users"));
        }

        public function show($id)
        {
            $user = User::findOrfail($id);
            $comment = Comment::where('commentable_type', 'App\User')->where('commentable_id', $id)->get();
            return view("users.show", compact("user", "comment"));
        }

        public function add()
        {
            $roles = Role::all();
            return view("users.add", compact("roles"));
        }

        public function store(Request $request){

            event(new UserValidation($request));

            $user = new User([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'age' => $request->input('age'),
                'city' => $request->input('city'),
                'email' => $request->input('email'),
                'created_at' => Carbon::now(),
                'updated_at'=> Carbon::now()
               ]);
            $user->save();
            if(!empty($request->input('roles'))){
                $roles = $request->input('roles');
                $user->role()->attach($roles);
            }

            return redirect('/users')->with('message', "Форма сохранена!");
        }

        public function edit($id){
            $user = User::findOrfail($id);
            $roles = Role::all();
            return view("users.edit", compact("user", "roles"));
        }

        public function update(Request $request, $id){
            $user = User::findOrFail($id);
            event(new UserValidation($request));

            $user->update([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'age' => $request->input('age'),
                'city' => $request->input('city'),
                'email' => $request->input('email')
               ]);
            if(!empty($request->input('roles'))){
                $roles = $request->input('roles');
                $user->role()->sync($roles);
            }

            return redirect("/users")->with('message','Элемент сохранен!');
        }

        public function destroy($id){
            $user = User::findOrFail($id);
            $user->delete();

            return back()->with('message','Элемент удален!');
        }
    }
