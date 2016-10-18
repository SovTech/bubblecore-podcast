# Bubblecore Podcast

*This project is a revival of the awesome [Bubblecore Podcast Plugin](https://gitlab.com/bubblecore-systems/oc-podcast-plugin) for [OctoberCMS](http://octobercms.com/).*

A huge thanks to the folks over at http://bubblecore.net/ for their work on this. The project has been stagnant for about 2 years on GitLab and we decided to give a new breath of life and fix a bug or two.

## Introduction

The Podcast plugin allows you to create multiple podcast channels and add them via components to CMS pages. There is also a servlet component allowing you serve the episodes without using public uploads. An episode list can be tweaked to fit in several common situations and optionally includes an HTML 5 audio player (audio.js) embedded in the list.

## Features

* Publish Multiple Podcast Channels
* Render a list of episodes for a single channel that drops into layouts
* Embedded HTML 5 audio player
* Supports Video Enclosures
* iTunes compatible RSS Feed

## Installation

Navigate to whichever directory your OctoberCMS installation resides & enter the `plugins` subdirectory.
For the sake of this guide, our lives over at `/var/www/html/plugins`.

```bash
cd /var/www/html/plugins
```

Create a new directory for the plugin and clone this repository.

```bash
mkdir bubblecore && cd bubblecore
git clone https://github.com/SovTech/bubblecore-podcast.git podcast
```

Navigate back to your OctoberCMS install root directory and refresh your plugin:

```bash
cd /var/www/html
php artisan plugin:refresh bubblecore.podcast
```

## Usage

### Adding a channel to your website
1. Create a channel using the Podcast menu in the backend. Fill in as much information as possible.

2. Create a new page with no layout. Add the Podcast component to it, selecting the appropriate channel and customizing the component's options as necessary. Enter the component tag in the page to render the component. This will publish the actual RSS feed for the podcast.
```
{% component 'podcast' %}
```

3. Create a new page with the desired layout. Add the Podcast List component to it, selecting the appropriate channel and customizing the component's options as necessary. Enter the component tag in the page to render the component. This will publish a listing of the channel's episodes wrapped inside the chosen layout.
```
<!-- Additional page HTML -->
...
{% component 'podcastList' %}
...
```

4. Create a new page with the desired layout. Add the Podcast Episode component to it. Enter the component tag in the page to render the component. This will define the layout which a single episode should be displayed within.
```
<!-- Additional page HTML -->
...
{% component 'podcastList' %}
...
```
