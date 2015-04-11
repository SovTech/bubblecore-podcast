<?php namespace Bubblecore\Podcast\Models;

use Model;

/**
 * Timezone Model
 */
class Timezone extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'bubblecore_podcast_timezones';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['name','code'];

    public $timestamps = false;

    protected static $nameList = null;
    
    public static function getNameList()
    {
        if (self::$nameList)
            return self::$nameList;

        return self::$nameList = self::all()->lists('name','id');
    }

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}