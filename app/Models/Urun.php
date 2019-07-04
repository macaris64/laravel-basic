<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Urun extends Model
{
    use SoftDeletes;

    protected $table = 'urun';

    //protected $fillable = ['name','slug'];
    protected $guarded = [];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    public function kategoriler()
    {
        return $this->belongsToMany('App\Models\Kategori','kategori_urun');
    }
}
