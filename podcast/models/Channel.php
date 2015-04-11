<?php namespace Bubblecore\Podcast\Models;

use Model;

/**
 * Channel Model
 */
class Channel extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'bubblecore_podcast_channels';

    public $rules = [
        'title' => 'required|between:3,64',
        'author' => 'required|between:3,64',
        'category' => 'required',
        'summary' => 'required'
    ];

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'title',
        'author',
        'managingEditor',
        'webMaster',
        'ownerName',
        'ownerEmail',
        'coverTitle',
        'coverLink',
        'keywords',
        'summary',
        'description',
        'category_id',
        'subcategory_id',
        'category',
        'explicit',
        'feedlink',
        'link'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
        'episodes' => ['Bubblecore\Podcast\Models\Episode'],
    ];
    public $belongsTo = [
        'category' => ['Bubblecore\Podcast\Models\Category'],
        'subcategory' => ['Bubblecore\Podcast\Models\Subcategory']
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [ ];
    public $attachOne = [];
    public $attachMany = [
        'image' => ['System\Models\File', 'order' => 'sort_order'],
    ];

    public function getCategoryOptions()
    {
        return Category::getNameList();
    }

    public function getSubcategoryOptions()
    {
        return Subcategory::getNameList($this->category_id);
    }
}