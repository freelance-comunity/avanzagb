<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\Datatables\Services\DataTable;

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
    protected $fillable = ['credit_id', 'client_id', 'group', 'product', 'client', 'start_date', 'brach', 'source_of_funding', 'status', 'archivist', 'drawer'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function GetArchives() {
        return response()->json(['Data' => \App\Archive::all()]);
    }

    public function assign()
    {
        return $this->hasOne('App\Assign');
    }

}
