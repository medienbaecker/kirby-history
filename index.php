<?php

Kirby::plugin('medienbaecker/history', [
    'sections' => [
        'history' => [
			'props' => [
                'headline' => function($headline) {
                    return $headline;
				},
				'limit' => function($limit = 5) {
					return $limit;
				}
			],
			'computed' => [
				'latestPages' => function() {
					$latestPages = array();
					foreach(site()->index()->sortBy('modified', 'desc')->limit($this->limit()) as $latestPage) {
						$latestPages[] = [
							'title' => $latestPage->title()->value(),
							'link' => $latestPage->panelUrl()
						];
					}
					return $latestPages;
				}
			]
        ]
    ]
]);