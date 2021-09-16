<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class ProfilDesa extends Model
{
    use Notifiable;
    use Uuid;

    protected $primaryKey = 'id_desa';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'profil_desa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

}
