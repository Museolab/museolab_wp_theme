//// COMMENT FOR ACTIVATION

wp.domReady(function () {

    var embed_variations = [
                            'amazon-kindle',
                            'animoto',
                            'cloudup',
                            'collegehumor',
                            'crowdsignal',
                            'dailymotion',
                            'facebook',
                            'flickr',
                            'imgur',
                            //'instagram',
                            'issuu',
                            'kickstarter',
                            'meetup-com',
                            'mixcloud',
                            'reddit',
                            'reverbnation',
                            'screencast',
                            'scribd',
                            'slideshare',
                            'smugmug',
                            'soundcloud',
                            'speaker-deck',
                            'spotify',
                            'ted',
                            'tiktok',
                            'tumblr',
                            'twitter',
                            'videopress',
                            //'vimeo'
                            'wordpress',
                            'wordpress-tv',
                            //'youtube'
                ];
    var core_block_variations = [

                            //'paragraph',
                            //'image',
                            'heading',
                            'gallery',
                            'list',
                            'quote',
                            'shortcode',
                            'archives',
                            'audio',
                            'button',
                            'buttons',
                            'calendar',
                            'categories',
                            'code',
                            'columns',
                            'column',
                            'cover',
                            'embed',
                            //'file',
                            'group',
                            'freeform',
                            'html',
                            'media-text',
                            'latest-comments',
                            'latest-posts',
                            'missing',
                            'more',
                            'nextpage',
                            'preformatted',
                            'pullquote',
                            'rss',
                            'search',
                            'separator',
                            'block',
                            'social-links',
                            'social-link',
                            'spacer',
                            'subhead',
                            'table',
                            'tag-cloud',
                            'text-columns',
                            'verse',
                            'video'

    ];

    for (var i = embed_variations.length - 1; i >= 0; i--) {
        wp.blocks.unregisterBlockVariation('core/embed', embed_variations[i]);
    };



    for (var j = core_block_variations.length - 1; j >= 0; j--) {
        wp.blocks.unregisterBlockType('core/' + core_block_variations[j]);
    };




});
