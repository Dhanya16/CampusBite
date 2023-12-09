<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
    public $timestamps=false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feedback';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'feedbackid';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','Itemname', 'rating','comment','date',  'updated_at','created-at','delete'
    ];
}
