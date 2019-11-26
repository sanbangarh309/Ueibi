<?php
namespace App\Modals;
use Illuminate\Support\Str;
use App\Modals\Order;
use App\User;
use Illuminate\Database\Eloquent\Model;
class OrderTicket extends Model
{
    protected $table = 'tickets';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'gift', 'assigned_by', 'assigned_to','ticketno','company','area','emp','rating','file','status','received_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'assigned_date' => 'date'
    // ];

    // protected $appends = [
    //     'order','assignedbyuser','assignedtouser'
    // ];

    public function order(){
        return $this->hasOne(Order::class,'id','order_id');
    }

    public function assignedby(){
        return $this->hasOne(User::class,'id','assigned_by');
    }

    public function assignedto(){
        return $this->hasOne(User::class,'id','assigned_to');
    }

    public function setTicketnoAttribute()
    {
        $this->attributes['ticketno'] = Str::random(5);
    }

    // public function getOrderAttribute()
    // {
    //     return Order::find($this->order_id);
    // }

    // public function getAssignedByAttribute(){
    //     $user = User::find($this->assigned_by);
    //     return $user ? $user : (object) [];
    // }

    // public function getAssignedToAttribute(){
    //     $user = User::find($this->assigned_to);
    //     return $user ? $user : (object) [];
    // }

    // public function getOrderIdAttribute(){
    //     $order = Order::find($this->order_id);
    //     return $order ? $order : (object) [];
    // }

    public function ScopeAllusers($query)
    {
        $this->attributes['assignedbyuser'] = User::find($this->assigned_by);
        $this->attributes['assignedtouser'] = User::find($this->assigned_to);
    }

    public function ScopePublished($query)
    {
        return $query->whereAssigned(1);
    }

    public function ScopeNew($query)
    {
        return $query->whereAssigned(0);
    }
}
