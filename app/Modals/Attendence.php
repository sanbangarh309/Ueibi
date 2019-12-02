<?php
namespace App\Modals;

use Illuminate\Database\Eloquent\Model;
use App\Modals\User;
class Attendence extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'start', 'end','off','day'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime'
    ];

    public function user(){
        return $this->hasOne(User::class,'user_id','id');
    }
}
