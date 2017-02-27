<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'date', 'status'];


    /* Enum statuses for Deals*/

    protected static $statuses = [
        'New',
        'Assigned',
        'In Progress',
        'Converted',
        'Recycled'
    ];

    public static function getStatusList() {

        return static::$statuses;
    }
}
