<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Permission;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function permissions()
	{
		return $this->belongsToMany(Permission::class);
	}

	public function hasPermission($p)
	{
		// if has slug OR user id 1 will override permissions
		if($this->permissions->contains('slug', $p) || $this->id == 1 ){
			return true;
		}
		return false;
	}

	public function checkPermission($p)
	{
		if($this->permissions->contains('slug', $p) ){
			return redirect('/admin')->withErrors(['You do not have permission to access this feature']);
		}
		return false;
	}

	public function grantPermissions($permissions)
	{
		// reset permissions
		$this->permissions()->detach();
		$this->permissions()->attach($permissions);
	}

	public static function withPermission($slug)
	{
		$permission = Permission::where('slug', '=', $slug)
								->first();
		if(count($permission)){
			return $permission->users;
		}
		return false;

	}
}
