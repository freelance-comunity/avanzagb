<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assign extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'assigns';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'reason', 'date_assign', 'return_date', 'archive_id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function archive()
    {
        return $this->belongsTo('App\Archive');
    }

}
