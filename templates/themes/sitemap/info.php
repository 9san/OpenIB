<?php
	$theme = Array();
	
	// Theme name
	$theme['name'] = 'Sitemap Generator';
	// Description (you can use Tinyboard markup here)
	$theme['description'] = 'Generates an XML sitemap to help search engines find all threads and pages.';
	$theme['version'] = 'v1.1';
	
	// Theme configuration	
	$theme['config'] = Array();
	
	$theme['config'][] = Array(
		'title' => 'Sitemap Path',
		'name' => 'path',
		'type' => 'text',
		'default' => 'sitemap.xml',
		'size' => '20'
	);
	
	$theme['config'][] = Array(
		'title' => 'URL prefix',
		'name' => 'url',
		'type' => 'text',
		'comment' => '(with trailing slash)',
		'default' => (isset($_SERVER['HTTP_HOST']) ? 'https://' . $_SERVER['HTTP_HOST'] . $config['root'] : ''),
		'size' => '20'
	);
	
	$theme['config'][] = Array(
		'title' => 'Thread change frequency',
		'name' => 'changefreq',
		'type' => 'text',
		'comment' => '(eg. "hourly", "daily", etc.)',
		'default' => 'hourly',
		'size' => '20'
	);
	
	$theme['config'][] = Array(
		'title' => 'Minimum time between regenerating',
		'name' => 'regen_time',
		'type' => 'text',
		'comment' => '(in seconds)',
		'default' => '60',
		'size' => '8'
	);
		
	$__boards = listBoards();
	$__default_boards = Array();
	foreach ($__boards as $__board) {
		if(!$__board['indexed']) {
			continue;
		}
		$__default_boards[] = $__board['uri'];
	}
	
	$theme['config'][] = Array(
		'title' => 'Boards',
		'name' => 'boards',
		'type' => 'text',
		'comment' => '(boards to include; space seperated)',
		'size' => 24,
		'default' => implode(' ', $__default_boards)
	);
	
	$theme['config'][] = Array(
		'title' => 'Use all indexed boards',
		'name' => 'all',
		'type' => 'checkbox',
		'comment' => 'Because that\'s kind of the point with indexing, right? You don\'t have to add any boards above if this is checked.',
		'default' => true
	);

	$theme['build_function'] = 'sitemap_build';
