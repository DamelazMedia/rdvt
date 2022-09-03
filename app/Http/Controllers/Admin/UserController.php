<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use function Symfony\Component\Mime\date;
use App\Models\UserProfile;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = role::all();
        return view('dashboard.admin.users.index', ['users'=> $users,'roles'=> $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = role::all();
        return view('dashboard.admin.users.create', ['roles'=> $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $roles = $request->input('roles', []);
        $user->save();

        $userprofile = UserProfile::create([
            'user_id' => $user->id,
            'dj_name' => $user->name,
            'slug' => $user->name,
        ]);
        
        $userprofile->save();
        $user->assignRole($roles);
        if($request->saveedit == true){
            return redirect()->route('users.edit', $user->id);
        }else{

            return redirect()->route('users.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.admin.users.show', ['user'=> $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        $roles = role::all();
        return view('dashboard.admin.users.edit', ['user'=> $User,'roles'=> $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        $user = User::findorfail($User->id);
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password != " "){
            $user->password = Hash::make($request->password);
        }

        $roles = $request->input('roles', []);
        //$create_date = date_create()->format('Y-m-d H:i:s');
        if($request->verified == 'verified'){
            $user->email_verified_at = $user->updated_at;
        }else{
            $user->email_verified_at = null;
        }

        $user->save();

        $user->syncRoles($roles);

        $user->userprofile->dj_name = $request->dj_name;
        $user->userprofile->slug = str_replace(' ', '-', strtolower($request->profile_slug));
        $user->userprofile->avatar_slug = $request->avatar;
        $user->userprofile->cover_slug = $request->cover;
        $user->userprofile->genries = $request->genries;
        $user->userprofile->intrests = $request->intrests;
        $user->userprofile->city = $request->city;
        $user->userprofile->birthday = $request->birthday;
        $user->userprofile->bio = $request->bio;

        $user->userprofile->update();
        if($request->saveedit == 'edit'){
            return redirect()->route('users.edit', $user->id);
        }else{

            return redirect()->route('users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        $roles = Role::all();
        $user = User::findorfail($User->id);
        foreach($roles as $role){
            $user->removeRole($role->name);
        }

        $user->delete();


        return redirect()->route('users.index');
    }
}
