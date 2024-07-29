<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = DB::table('users')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%')->orWhere('email', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'username' => 'required | unique:users',
            'name' => 'required',
            'email' => 'required|email | unique:users',
            'password' => 'required|min:8',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);


        if ($request->hasFile('photo')) {
            $user->photo = $request->file('photo')->store('users', 'public');
        } else {
            $user->photo = 'default.jpg';
        }

        $user->save();


        return redirect()->route('users.index')->with('success', 'Berhasil menambahkan admin');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('pages.users.profile', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;


        if ($request->hasFile('photo')) {

            if (!is_null($user->photo)) {
                $oldPath = public_path('storage/' . $user->photo);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $user->photo = $request->file('photo')->store('users', 'public');
        }


        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Berhasil mengubah admin');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (!is_null($user->photo)) {
            $oldPath = public_path('storage/' . $user->photo);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Berhasil menghapus admin');
    }
}
