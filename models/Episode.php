<?php namespace Bubblecore\Podcast\Models;

use Model;

/**
 * Episode Model
 */
class Episode extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'bubblecore_podcast_episodes';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];
    public $rules = [
        'title' => 'required|between:3,64',
        'duration' => ['required','regex:/[0-9]+\:[0-5][0-9](\:[0-5][0-9])?/'],
        'pubDate' => 'required|date',
        'explicit' => 'boolean',
        'summary' => 'required|between:3,1024',
        'channel' => 'required|exists:bubblecore_podcast_channels,id',
        'file' => 'required'
    ];

    protected $dates = ['pubDate'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'channel' => ['Bubblecore\Podcast\Models\Channel'],
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'file' => ['System\Models\File', 'order' => 'sort_order'],
    ];
    public $attachMany = [];

}