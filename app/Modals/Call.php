<?php
namespace App\Modals;

use Illuminate\Database\Eloquent\Model;
class Call extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type','phone', 'person_name', 'company','city','website','date_time','no_of_calls','remarks'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_time' => 'datetime'
    ];
}
