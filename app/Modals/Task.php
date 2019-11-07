<?php
namespace App\Modals;

use App\Modals\Order;
use App\User;
use Illuminate\Database\Eloquent\Model;
class Task extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'assigned_by', 'assigned_to','status'
    ];

    public function getAssignedByAttribute(){
        $user = User::find($this->assigned_by);
        return $user ? $user : (object) [];
    }

    public function getAssignedToAttribute(){
        $user = User::find($this->assigned_to);
        return $user ? $user : (object) [];
    }

    public function getOrderIdAttribute(){
        $order = Order::find($this->order_id);
        return $order ? $order : (object) [];
    }
}
