<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = User::all();
        return view('back.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        if ($request->hasFile('profile_photo_path')) {          

            $file_name = uniqid() . '.' . $request->profile_photo_path->getClientOriginalExtension();
            $request->profile_photo_path->move(public_path('images/users'), $file_name);
        }else {
                $file_name = null;
            }

        $user = User::insert(
            [
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password)
            ]
        );
        if ($user) {
            return redirect(route('user.index'));
        }
        return back();
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
        $user = User::where('id', $id)->first();
        return view('back.user.edit')->with('users', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {

        // BAŞLAR
        $findUser = User::find($id);
        $findUser->name = $request->name;
        $findUser->email = $request->email;
        if ($request->hasFile('profile_photo_path')) {

            $file_name = uniqid() . '.' . $request->profile_photo_path->getClientOriginalExtension();
            $request->profile_photo_path->move(public_path('images/users'), $file_name);


            $path = 'images/users/' . $request->old_file;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }

            $findUser->profile_photo_path = $file_name;
        }
        if (!empty($request->password)) {
            $findUser->password = Hash::make($request->password);
        }
        $findUser->save();
        // BİTER

        if ($findUser) {
            return back();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect()->route('user.index');
    }
}
