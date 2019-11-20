<?php
namespace App\Modals;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Modals\OrderTicket;
class History extends Model
{
    protected $table = 'history';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'assigned_by', 'assigned_to', 'ticket_id'
    ];

    public function assignedby(){
        return $this->hasOne(User::class,'assigned_by');
    }

    public function assignedto(){
        return $this->hasOne(User::class,'assigned_to');
    }

    public function ticket(){
        return $this->hasOne(OrderTicket::class,'ticket_id');
    }

}
