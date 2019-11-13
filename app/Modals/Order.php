<?php
namespace App\Modals;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Order extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'area', 'city', 'company','address','contact','email','industry','assigned_date','orderno'
        ,'hr_name','hr_contact','hr_email','hr_website','emp_strength','gift_type','gift_quantity','attachment'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'assigned_date' => 'date'
    ];

    public function setOrdernoAttribute($value)
    {
        $this->attributes['orderno'] = Str::random(5);
    }

    public function ScopeNew($query)
    {
        return $query->whereAssigned(0);
    }

    public function ScopePublished($query)
    {
        return $query->whereAssigned(1);
    }

    

    public function save(array $options = array())
    {
        if(empty($this->orderno) || is_null($this->orderno)) {
            $this->orderno = Str::random(5);
        }
        return parent::save($options);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function($order)
        {
            $order->orderno = Str::random(5);
        });
    }
}
