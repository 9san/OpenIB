/*
 * download-original.js
 * https://github.com/savetheinternet/Tinyboard/blob/master/js/download-original.js
 *
 * Makes image filenames clickable, allowing users to download and save files as their original filename.
 * Only works in newer browsers. http://caniuse.com/#feat=download
 *
 * Released under the MIT license
 * Copyright (c) 2012-2013 Michael Save <savetheinternet@tinyboard.org>
 * Copyright (c) 2013-2014 Marcin Łabanowski <marcin@6irc.net>
 * Copyright (c) 2020-2020 9san Development Group
 *
 * Usage:
 *   $config['additional_javascript'][] = 'js/jquery.min.js';
 *   $config['additional_javascript'][] = 'js/download-original.js';
 *
 */
$(document).ready(function() {
	
	
	if (!localStorage.download_original) localStorage.download_original = false;
	Options.extend_tab('general', '<label id="download_original"><input type="checkbox">' + _("  Download Original") + '</label>');

	if (localStorage.download_original === 'true') {
		$('#download_original>input').prop('checked', true);
	} else {
		$('#download_original>input').prop('checked', false);
	}
	
	$('#download_original>input').on('click', function() {
		if ($('#download_original>input').is(':checked')) {
			localStorage.download_original = 'true';
		} else {
			localStorage.download_original = 'false';
		}
		$('.postfilename').each(do_original_filename);
	});

	var do_original_filename = function() {
			var filename, truncated;
			if ($(this).attr('title')) {
					filename = $(this).attr('title');
			} else {
					filename = $(this).text();
			}
			if (localStorage.download_original === 'true') {
			$(this).replaceWith(
					$('<a></a>')
							.attr('download', filename)
							.attr('class', 'postfilename')
							.append($(this).contents())
							.attr('href', $(this).parent().parent().find('a').attr('href'))
							.attr('title', filename)
					);
			}
			else {
					$(this).replaceWith(
					$('<a></a>')
							.append($(this).contents())
							.attr('class', 'postfilename')
							.removeAttr("download")
							.attr('href', $(this).parent().parent().find('a').attr('href'))
							.attr('title', filename)
					);
			}
	};

	$('.postfilename').each(do_original_filename);

	$(document).on('new_post', function(e, post) {
			$(post).find('.postfilename').each(do_original_filename);
	});

});
