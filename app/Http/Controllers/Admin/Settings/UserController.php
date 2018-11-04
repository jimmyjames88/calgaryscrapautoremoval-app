<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Permission;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	public function __construct()
	{

	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$page = [
			'title'		=> 'Users',
			'backUrl'	=>	'/admin/settings'
		];
		$users = User::orderBy('id','ASC')->get();
        return view('admin.settings.users.index', compact('users', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$page = [
			'title'		=> 'Create User',
			'backUrl'	=>	'/admin/settings/users'
		];
		$user = new User;
		$permissions = Permission::all();
        return view('admin.settings.users.create', compact('user', 'permissions', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$data = $request->validate([
			'name'		=>	'required|min:2|max:20',
			'email'		=>	'required|email',
			'password'	=>	'required|confirmed|min:6|max:20'
		]);

		$data['password'] = Hash::make($data['password']);
        $user = User::create($data);

		if($request->permissions){
			dd(3);
			$user->grantPermissions(array_keys($request->permissions));
		}

		if($user){
			dd(1);
			session()->flash('success', 'User created!');
			return redirect('/admin/settings/users');
		}
		dd(2);
		session()->flash('error', 'Error creating user');
		return redirect('/admin/settings/users');
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
		$user = User::find($id);
		$page = [
			'title'		=> 'Edit ' . $user->name,
			'backUrl'	=>	'/admin/settings/users'
		];

		$permissions = Permission::all();
		return view('admin.settings.users.edit', compact('user', 'permissions', 'page'));
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
        $user = User::find($id);
		$data = $request->validate([
			'name'	=>	'required|min:2|max:24',
			'email'	=>	'required|email'
		]);

		$user->name = $data['name'];
		$user->email = $data['email'];

		if($request->permissions){
			$user->grantPermissions(array_keys($request->permissions));
		}

		if($user->save()){
			session()->flash('success', 'User changes saved!');
			return redirect('/admin/settings/users');
		}

		session()->flash('error', 'There was an unspecified error');
		return redirect('/admin/settings/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		if($id ==='1'){
			session()->flash('error', 'Cannot delete root account');
			return redirect('/admin/settings/users');
		}
        $user = User::destroy($id);
		if($user){
			session()->flash('success', 'User deleted');
			return redirect('/admin/settings/users');
		}
    }

	public function delete($id)
	{
		$user = User::find($id);
		$page = [
			'title'		=> 'Delete ' . $user->name . '?',
			'backUrl'	=>	'/admin/settings/users/'
		];
		return view('admin.settings.users.delete', compact('user', 'page'));
	}

	public function change_password($id, Request $request)
	{
		$user = User::find($id);

		$data = $request->validate([
			'password'	=>	'required|min:6|max:20|confirmed'
		]);
		$user->password = Hash::make($data['password']);
		if($user->save()){
			session()->flash('success', 'Password changed');
			return redirect('/admin/settings/users');
		}

		return redirect()->back()->withErrors(['Error saving change']);

	}
}
