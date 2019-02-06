<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable {
	use Notifiable;
	use HasRoles;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'apellidoP', 'apellidoM', 'dni', 'numero', 'tipo', 'slug', 'status',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function role() {
		return $this->belongsToMany(Role::class, 'role_user');
	}

	public function getNombreCompletoAttribute() {
		return ucfirst($this->name) . ' ' . ucfirst($this->apellidoP);
	}
}
