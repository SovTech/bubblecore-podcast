<?php namespace Bubblecore\Podcast;

use System\Classes\PluginBase;

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

}
