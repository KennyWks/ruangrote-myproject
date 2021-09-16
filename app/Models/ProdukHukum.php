<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class ProdukHukum extends Model
{
    use Notifiable;
    use Uuid;

    protected $primaryKey = 'id_prokum';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'produk_hukum';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

}
