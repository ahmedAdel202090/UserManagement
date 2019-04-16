<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterestTag extends Model
{
    protected $table='InterestTag';
    protected $primaryKey='name';
    public $incrementing=false;
    const CREATED_AT=null;
    const UPDATED_AT=null;
}
