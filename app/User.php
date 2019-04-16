<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='User';
    protected $primaryKey='email';
    protected $keyType='varchar';
    public $incrementing=false;
    const CREATED_AT=null;
    const UPDATED_AT=null;

}
