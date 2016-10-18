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
		    'Bubblecore\Podcast\Components\Podcast' => 'podcast',
		    'Bubblecore\Podcast\Components\PodcastList' => 'podcastList',
		    'Bubblecore\Podcast\Components\PodcastEpisode' => 'podcastEpisode',
		    'Bubblecore\Podcast\Components\Servlet' => 'servlet'
		];
    }

    public function registerNavigation() {
		return [
		    'podcast' => [
				'label' 	=> 'Podcasts',
				'url' 		=> Backend::url('bubblecore/podcast/channels'),
				'icon'		=> 'icon-play-circle',
				'permissions'	=> ['bubblecore.podcast.*'],
				'order'		=> 500,
				'sideMenu' => [
				    'channels'	=> [
						'label'		=> 'Channels',
						'icon'		=> 'icon-copy',
						'url'		=> Backend::url('bubblecore/podcast/channels'),
						'permissions' 	=> ['bubblecore.podcast.access_channels'],
				    ],
				    'episodes' 		=> [
						'label' 	=> 'Episodes',
						'icon'		=> 'icon-envelope-o',
						'url' 		=> Backend::url('bubblecore/podcast/episodes'),
						'permissions'	=> ['bubblecore.podcast.access_episodes'],
				    ],
				]
		    ]
		];
     }

	public function registerSettings()
	{
	    return [
	        'settings' => [
	            'label'       => 'Podcast Settings',
	            'description' => 'Manage podcast based settings.',
	            'category'    => 'Misc',
	            'icon'        => 'icon-play-circle',
	            'class'       => 'Bubblecore\Podcast\Models\Settings',
	            'order'       => 500,
	            'keywords'    => 'security podcast'
	        ]
	    ];
	}

    // /**
	// * Register new Twig variables
	// * @return array
	// */
	// public function registerMarkupTags()
	// {
	// 	return [
	// 		'functions' => [
	// 			'form_select_category' => ['Bubblecore\Podcast\Models\Category', 'formSelect'],
	// 			'form_select_subcategory' => ['Bubblecore\Podcast\Models\Subcategory', 'formSelect'],
	// 		]
	// 	];
	// }

}
