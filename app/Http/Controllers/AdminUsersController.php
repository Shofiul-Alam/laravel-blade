<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UsersUpdateRequest;


class AdminUsersController extends Controller
{
    public $imageRoot;

    public function setImageRoot() {
        $this->imageRoot = isset($_ENV['APP_URL']) ? $_ENV['APP_URL'] : null;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //

        $users = User::all();


        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $roles = Role::pluck('name', 'id')->all();
        
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //
        $userRequest = $request->all();

        if($request->file('file')) {
            $photo['filename'] = $request->file->store('');
            $photo['file'] = $photo['filename'];
            $photo['name'] = $photo['filename'];

            $dbPhoto = Photo::create($photo);
        }
        $userRequest['photo_id'] = $dbPhoto->id;


        User::create($userRequest);

        return redirect('/admin/users');
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
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $roles = Role::pluck('name', 'id')->all();
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersUpdateRequest $request, $id)
    {
        //

        $user = User::findOrFail($id);

        $input = $request->all();

        if(empty(trim($input['password']))) {
            $input = $request->except('password');
        }

        if(isset($request->file)){

            if($user->photo) {
                $user->photo()->delete();
                Storage::delete($user->photo->name);
            }
            $photo['filename'] = $request->file->store('');
            $photo['file'] = $photo['filename'];
            $photo['name'] = $photo['filename'];

            $dbPhoto = Photo::create($photo);

            $input['photo_id'] = $dbPhoto->id;
        }

       

        $user->update($input);

        return redirect('/admin/users');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);

        if($user->photo) {
            Photo::findOrFail($user->photo->id)->delete();

            Storage::delete($user->photo->name);
        }

        $user->delete();

        Session::flash('deleted_user', 'The user has been deleted');

        
        

        return redirect('admin/users');
    }
}
