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
            'description' => 'No description provided yet...',
            'author'      => 'Bubblecore',
            'icon'        => 'icon-leaf'
        ];
    }

}
