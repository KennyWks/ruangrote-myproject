<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class PublikasiDesa extends Model
{
    use Notifiable;
    use Uuid;

    protected $primaryKey = 'id_publikasi';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'publikasi_desa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

}
