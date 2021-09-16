<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Pengaduan extends Model
{
    use Notifiable;
    use Uuid;

    protected $primaryKey = 'id_anduan';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'pengaduan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

}
