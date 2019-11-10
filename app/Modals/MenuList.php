<?php
namespace App\Modals;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class MenuList extends Model
{
    protected $table = 'menu_items';

    public function ScopeActive($query)
    {
        return $query->whereStatus(1)->where('roleid', isset(Auth::user()->role_id) ? Auth::user()->role_id : '' );
    }
}
