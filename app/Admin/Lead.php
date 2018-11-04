<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\User;
use DB;

class Lead extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'message', 'unread'];

	public function markRead()
	{
		$this->unread = false;
		$this->opened_by = auth()->id();
		$this->save();
	}

	public function openedBy()
	{
		$user = DB::table('users')
			->select('name')
			->where('id', '=', $this->opened_by)
			->first();

		return $user->name;
	}
}
