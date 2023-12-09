<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    use HasFactory;
    public $timestamps=false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_item';
 
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Orderitemid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'Orderid','Itemid','Status', 'Quantity', 'SubTotal',
    ];
}