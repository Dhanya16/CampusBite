<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;
    public $timestamps=false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menu';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Itemid';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Itemname','Price','Category', 'Itemimage', 'Description', 'updated_at','created-at','delete'
    ];
}
