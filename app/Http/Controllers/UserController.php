<?php

namespace App\Http\Controllers;

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
            $validatedData = $request->validate([
                'name' => 'required|min:2',
                'lastname' => 'required',
                'age' => 'required|numeric|min:12|max:120',
                'city' => 'required',
                'email' => 'required|email',
            ], [
                'name.required' => 'Представтесь',
                'name.min' => 'Не бывает таких маленьких имен',
                'age.required' => 'Сколько вам лет?',
                'age.min' => 'Малый ты, вырости до :min лет',
                'age.max' => 'Слишком старый, :max это максимум',
                'lastname.required' => 'Фамилии нет',
                'email.required' => 'Забыли email',
                'email.email' => 'Не похоже на Email'
            ]);

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
            $validatedData = $request->validate([
                'name' => 'required|min:2',
                'lastname' => 'required',
                'age' => 'required|numeric|min:12|max:120',
                'city' => 'required',
                'email' => 'required|email',
            ], [
                'name.required' => 'Представтесь',
                'name.min' => 'Не бывает таких маленьких имен',
                'age.required' => 'Сколько вам лет?',
                'age.min' => 'Малый ты, вырости до :min лет',
                'age.max' => 'Слишком старый, :max это максимум',
                'lastname.required' => 'Фамилии нет',
                'email.required' => 'Забыли email',
                'email.email' => 'Не похоже на Email'
            ]);

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
