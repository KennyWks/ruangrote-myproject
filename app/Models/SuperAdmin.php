<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use GoldSpecDigital\LaravelEloquentUUID\Foundation\Auth\User as Authenticatable;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class SuperAdmin extends Authenticatable {
    use Notifiable;
    use Uuid;

    protected $primaryKey = 'id_admin';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'superadmin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAuthPassword()
    {
      return $this->password;
    }

    public function isAdmin() {
      if($this->roleId === '2'){
        return true;
      }
      return false;
    }

   public function isDesa() {
      if($this->roleId === '1'){
        return true;
      }
      return false;
    }
}
