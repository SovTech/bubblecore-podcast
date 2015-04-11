<?php namespace Bubblecore\Podcast\Components;

use \Bubblecore\Podcast\Models\Channel;
use \Bubblecore\Podcast\Models\Episode;
use \Bubblecore\Podcast\Models\Timezone;
use \Bubblecore\Podcast\Models\Settings;
use Cms\Classes\ComponentBase;

class PodcastEpisode extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Podcast Single Episode Component',
            'description' => 'Renders a single episode with player'
        ];
    }

    public function defineProperties()
    {
        return [
            'channel' => [
                'title' => 'Channel',
                'type' => 'dropdown',
                'options' => $this->getChannels(),
            ],
            'episode' => [
                'title' => 'Episode',
                'type' => 'string',
                'default' => '{{ :id }}',
                'description' => 'The ID of the episode',
            ]
        ];
    }

    private function getChannels()
    {
        $channels = Channel::lists('title','id');
        return $channels;
    }

    public function getChannel($id)
    {
        $channel = Channel::find($id);
        return $channel;
    }

    public function onRun()
    {
        $tz = Timezone::find(Settings::get('timezone'));
        $this->addJs('/plugins/bubblecore/podcast/assets/audiojs/audio.min.js');
        $this->addJs('/plugins/bubblecore/podcast/assets/audiojs/audiojs-shunt.js');

        $channel = $this->getChannel($this->property('channel'));
        $episode = Episode::find($this->param('id'));
        $this->page['channel'] = $channel;
        $this->page['episode'] = $episode;
        $this->page['tz'] = $tz->name;
    }

}