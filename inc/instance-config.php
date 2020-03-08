<?php

/*
*  Instance Configuration
*  ----------------------
*  Edit this file and not config.php for imageboard configuration.
*
*  You can copy values from config.php (defaults) and paste them here.
*/
	
	$config['root'] = '/';
	
	$config['board_create'] = false; //toggle public board creation
	
	$config['forced_sfw'] = true; //disallows people to set board to NSFW.
	
	//$config['announcement'] = '<div class="ban top"><h2>Announcement</h2><p>We will be going down for maintainance the 6th of January, 2020.<br>Expected downtime is no longer than 1 hour, but unforeseen complications may arise</p></div>'; 
	//This shows above Post form. Should be reserved for emergencies only such as expected longer downtime for maintainance/upgrades.
	
	$config['hide_postform'] = true; //when true requires you to click a button to open the form
	$config['blotter_enabled'] = true; //shows toggleable announcements blotter below post form.
	
	$config['url_banner'] = true; //enables banner
	$config['url_banner_global'] = true; //sets default to yes
	
	$config['show_sages'] = false; //default sage setting
	$config['sage'] = "SAGE!"; // default sage text
	$config['ukko_sage'] = "SAGE!"; // ukko sage text, not working. may just fix the custom sage on ukko instead
	
	//static theme rebuilds
	$config['static_theme'][] = '403.php';
	$config['static_theme'][] = '404.php';
	$config['static_theme'][] = 'rules.php';
	$config['static_theme'][] = 'news.php';
	$config['static_theme'][] = 'faq.php';
	$config['static_theme'][] = 'donate.php';
	$config['static_theme'][] = 'blotter.php'; //announcements
	$config['static_theme'][] = 'boards.php'; //frontpage, this should be on crontab, but is nice to rebuild when making changes
	$config['static_theme'][] = 'claim.php'; //this should be on crontab, but is nice to rebuild when making changes
	
	
	
	$config['tor_posting'] = false;
	
	$config['always_noko'] = true;
	$config['allow_no_country'] = true;
	$config['thread_subject_in_title'] = true;
	
	// Image shit
	$config['spoiler_images'] = true;
	$config['image_reject_repost'] = true;


	// Mod shit
	$config['mod']['groups'][25] = 'GlobalVolunteer';
	$config['mod']['groups'][19] = 'BoardVolunteer';
	define_groups();
	$config['mod']['capcode'][BOARDVOLUNTEER] = array('Board Volunteer');
	$config['mod']['capcode'][MOD] = array('Board Owner');
	$config['mod']['capcode'][GLOBALVOLUNTEER] = array('Global Volunteer');
	$config['mod']['capcode'][ADMIN] = array('Admin', 'Global Volunteer');
	$config['custom_capcode']['Admin'] = array(
		'<span class="capcode" data-tooltip="9san Administrator"><span style="color:#3f84a0;font-weight:bold;text-shadow:1px 1px 1px #95b1e1">❾ Admin</span></span> ',
	);
	
	
	
	$config['mod']['recent_reports'] = 65535;
	$config['mod']['ip_less_recentposts'] = 75;
	$config['ban_show_post'] = true;

	// Board shit
	$config['max_links'] = 40;
	$config['poster_id_length'] = 6;
	
	
	//JavaScript
	$config['additional_javascript_compile'] = true;
	
	$config['additional_javascript'][] = 'js/jquery.min.js';
	$config['additional_javascript'][] = 'js/jquery.mixitup.min.js';
	$config['additional_javascript'][] = 'js/jquery-ui.custom.min.js';
	$config['additional_javascript'][] = 'js/jquery.tablesorter.min.js';
	//Options
	$config['additional_javascript'][] = 'js/options.js';
	$config['additional_javascript'][] = 'js/options/general.js';
	$config['additional_javascript'][] = 'js/options/user-css.js';
	$config['additional_javascript'][] = 'js/options/user-js.js';
	$config['additional_javascript'][] = 'js/options/fav.js';
	$config['additional_javascript'][] = 'js/style-select.js';

	$config['additional_javascript'][] = 'js/inline-expanding.js';

	$config['additional_javascript'][] = 'js/update_boards.js';
	$config['additional_javascript'][] = 'js/favorites.js';

	$config['additional_javascript'][] = 'js/local-time.js';

	$config['additional_javascript'][] = 'js/element-hider.js';

	$config['additional_javascript'][] = 'js/ajax.js';

	$config['additional_javascript'][] = 'js/banner-load.js';
	$config['additional_javascript'][] = 'js/catalog.js';

	$config['additional_javascript'][] = 'js/post-hover.js';
	$config['additional_javascript'][] = 'js/show-op.js';
	$config['additional_javascript'][] = 'js/file-selector.js';
	
	$config['additional_javascript'][] = 'js/smartphone-spoiler.js';
	
	$config['additional_javascript'][] = 'js/show-backlinks.js';
	$config['additional_javascript'][] = 'js/webm-settings.js';
	$config['additional_javascript'][] = 'js/expand-video.js';
	$config['additional_javascript'][] = 'js/expand.js';
	$config['additional_javascript'][] = 'js/expand-too-long.js';
	$config['additional_javascript'][] = 'js/settings.js';
	$config['additional_javascript'][] = 'js/post-filter.js';
	$config['additional_javascript'][] = 'js/id_highlighter.js';
	$config['additional_javascript'][] = 'js/id_colors.js';
	$config['additional_javascript'][] = 'js/forced-anon.js';
	$config['additional_javascript'][] = 'js/toggle-locked-threads.js';
	$config['additional_javascript'][] = 'js/toggle-images.js';
	$config['additional_javascript'][] = 'js/mobile-style.js';
	//$config['additional_javascript'][] = 'js/thread-watcher.js';
	$config['additional_javascript'][] = 'js/quick-reply.js';
	$config['additional_javascript'][] = 'js/quick-post-controls.js';
	$config['additional_javascript'][] = 'js/keyboard-shortcuts.js';
	$config['additional_javascript'][] = 'js/show-own-posts.js';
	$config['additional_javascript'][] = 'js/catalog-search.js';
	$config['additional_javascript'][] = 'js/catalog-updater.js';
	$config['additional_javascript'][] = 'js/captcha.js';
	$config['additional_javascript'][] = 'js/thread-stats.js';
	$config['additional_javascript'][] = 'js/post-menu.js';
	$config['additional_javascript'][] = 'js/fix-report-delete-submit.js';
	$config['additional_javascript'][] = 'js/auto-reload.js';
	//$config['additional_javascript'][] = 'js/image-hover.js';
	$config['additional_javascript'][] = 'js/youtube.js';
	//$config['additional_javascript'][] = 'js/comment-toolbar.js';
	//$config['additional_javascript'][] = 'js/infinite-scroll.js';
	$config['additional_javascript'][] = 'js/wPaint/8ch.js';
	$config['additional_javascript'][] = 'js/wpaint.js';
	$config['additional_javascript'][] = 'js/board-directory.js';
	//$config['additional_javascript'][] = 'js/catalog-updater.js';
	//$config['additional_javascript'][] = 'js/stub-options.js';
	$config['additional_javascript'][] = 'js/code_tags/run_prettify.js';
	$config['additional_javascript'][] = 'js/youtube-embed.js';
	$config['additional_javascript'][] = 'js/ajax_alerts.js';
	$config['additional_javascript'][] = 'js/download-original.js';



	$config['stylesheets_board'] = true;

	
	
	$config['markup_paragraphs'] = true;
	$config['markup_paragraphs_span'] = true;
	$config['markup_rtl'] = true;
	
	$config['boards'] = array(array('<i class="fa fa-home" title="Home"></i><span class="boardtext"> home</span>' => '/', '<i class="fa fa-tags" title="Boards"></i><span class="boardtext"> boards</span>' => '/boards', '<i class="fa fa-random" title="Random"></i><span class="boardtext"> random</span>' => '/random.php', '<i class="fa fa-plus" title="New board"></i><span class="boardtext"> create</span>' => '/create.php', '<i class="fa fa-search" title="Search"></i><span class="boardtext"> search</span>' => '/search.php', '<i class="fa fa-cog" title="Manage board"></i><span class="boardtext"> manage</span>' => '/mod.php'), array('<i class="fa fa-newspaper-o" title="News"></i><span class="boardtext"> news</span>' => '/news', '<i class="fa fa-book" title="Rules"></i><span class="boardtext"> rules</span>' => '/rules', '<i class="fa fa-question" title="Frequently Asked Questions"></i><span class="boardtext"> faq</span>' => '/faq'), array('<i class="fa fa-recycle" title="Claim a board"></i>'=>'/claim', '<i class="fa fa-bug" title="File a bug report"></i>'=>'/bugs/', '<i class="fa fa-usd" title="Donate"></i>'=>'/donate'), array('all'=>'/all/'));

	$config['footer'][] = 'All posts on 9san are the responsibility of the individual poster and not the administration of 9san.';

	$config['search']['enable'] = true;
	
	$config['syslog'] = true;
	
	$config['hour_max_threads'] = 10;
	$config['filters'][] = array(
		'condition' => array(
			'custom' => 'max_posts_per_hour'
		),
		'action' => 'reject',
		'message' => 'On this board, to prevent raids the number of threads that can be created per hour is limited. Please try again later, or post in an existing thread.'
	);


	
$config['gzip_static'] = false;
$config['hash_masked_ip'] = true;
$config['force_subject_op'] = false;
$config['min_links'] = 0;
$config['min_body'] = 0;
$config['early_404'] = false;
$config['early_404_page'] = 5;
$config['early_404_replies'] = 10;
$config['cron_bans'] = true;
$config['mask_db_error'] = false;
$config['ban_appeals'] = true;
$config['katex'] = false;
$config['enable_antibot'] = false;
$config['spam']['unicode'] = false;
$config['twig_cache'] = false;
$config['report_captcha'] = true;
$config['no_top_bar_boards'] = array();

$config['convert_args'] = '-size %dx%d %s -thumbnail %dx%d -quality 85%% -background \'#d6daf0\' -alpha remove -auto-orient +profile "*" %s';

$config['meta_keywords'] = 'chan,anonymous discussion,imageboard,tinyboard, openib, infinity, 9chan, 9channel, 9san, reloaded, sfw, nsfw';

// Flavor and design.
$config['site_name'] = "9san";
//$config['site_logo'] = "/static/logo.png";

// 8chan specific mod pages
require '8chan-mod-config.php';

// Load instance functions later on
require_once 'instance-functions.php';
	
// Load database credentials
require "secrets.php";

// Load Announcements
require "instance-announcements.php";

// Load post filters
require "instance-filters.php";

