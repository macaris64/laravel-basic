<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Sepet extends Model
{
    use SoftDeletes;
    protected $table = "sepet";

    protected $guarded = [];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';



}
