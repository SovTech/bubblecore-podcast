<?php namespace Bubblecore\Podcast;

use System\Classes\PluginBase;
use \Backend;

/**
 * Podcast Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Podcast',
            'description' => 'Create and publish a podcast using the October CMS platform.',
            'author'      => 'Bubblecore',
	    'homepage'	  => 'http://bubblecore.net',
            'icon'        => 'icon-play-circle'
        ];
    }

    public function registerComponents() {
	return [
	    'Bubblecore\Podcast\Components\Podcast' => 'podcast'
	];
    }

    public function registerNavigation() {
	return [
	    'podcast' => [
		'label' 	=> 'Podcast',
		'url' 		=> Backend::url('bubblecore/podcast/episodes'),
		'icon'		=> 'icon-play-circle',
		'permissions'	=> ['bubblecore.podcast.*'],
		'order'		=> 500,
		'sideMenu' => [
		    'episodes' 		=> [
			'label' 	=> 'Episodes',
			'icon'		=> 'icon-envelope-o',
			'url' 		=> Backend::url('bubblecore/podcast/episodes'),
			'permissions'	=> ['bubblecore.podcast.access_episodes'],
		    ],
		    'categories'	=> [
			'label'		=> 'Categories',
			'icon'		=> 'icon-copy',
			'url'		=> Backend::url('bubblecore/podcast/categories'),
			'permissions' 	=> ['bubblecore.podcast.access_categories'],
		    ],
		]
	    ]
	];
     }

}
