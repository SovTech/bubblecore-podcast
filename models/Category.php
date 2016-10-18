<?php namespace Bubblecore\Podcast\Models;

use Model;

/**
 * Category Model
 */
class Category extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'bubblecore_podcast_categories';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['name','code'];

    public $rules = [
        'name' => 'required',
        'key' => 'unique:bubblecore_podcast_categories'
    ];

    public $timestamps = false;

    protected static $nameList = null;

    public static function getNameList()
    {
        if (self::$nameList)
            return self::$nameList;

        return self::$nameList = self::all()->lists('name','id');
    }

    public static function formSelect($name, $selectedValue = null, $options = [])
    {
        return Form::select($name, self::getNameList(), $selectedValue, $options);
    }

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
        'subcategories' => ['Bubblecore\Podcast\Models\Subcategory']
    ];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}