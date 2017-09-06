<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Archive extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'archives';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['credit_id', 'client_id', 'group', 'product', 'client', 'start_date', 'brach', 'source_of_funding'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
