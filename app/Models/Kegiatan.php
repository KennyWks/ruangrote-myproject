<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Kegiatan extends Model
{
    use Notifiable;
    use Uuid;

    protected $primaryKey = 'id_kegiatan';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'kegiatan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
  
}
