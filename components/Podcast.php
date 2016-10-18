<?php namespace Bubblecore\Podcast\Components;

use Response;
use View;
use Bubblecore\Podcast\Models\Timezone;
use Bubblecore\Podcast\Models\Settings;
use Cms\Classes\ComponentBase;

class Podcast extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Podcast',
            'description' => 'Render a podcast channel\'s RSS feed'
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
        ];
    }

    private function getChannels()
    {
        $channels = \Bubblecore\Podcast\Models\Channel::lists('title','id');
        return $channels;
    }

    public function getEpisodes($channel)
    {
        return $channel->episodes;
    }

    public function getChannel($id)
    {
        $channel = \Bubblecore\Podcast\Models\Channel::find($id);
        return $channel;
    }
    
    public function onRun()
    {
        $tz = Timezone::find(Settings::get('timezone'));
        $channel = $this->getChannel($this->property('channel'));
        $episodes = $this->getEpisodes($channel);
        $this->page['channel'] = $channel;
        $this->page['episodes'] = $episodes;
        $this->page['episodeCount'] = $episodes->count();
        $this->page['tz'] = $tz->name;

        $data = [
            'channel' => $this->page['channel'], 
            'episodes' => $this->page['episodes'], 
            'episodeCount' => $this->page['episodeCount'],
            'tz' => $this->page['tz']
        ];

        return Response::make(view()->file(__DIR__.'/views/podcast.htm', $data))->header('Content-type', 'application/rss+xml');
    }
}
