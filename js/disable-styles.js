/* Adds a checkbox in the General options tab to disable and enable board style sheets. */
/* this literally just disables everything other than default style, dont use lol */

$(document).ready(function () {
	var disableStyles = localStorage['disablestylesheet'] ? true : false;
	/* only search for and disable board stylesheets if the user is on a page that uses them */
	if(active_page == 'ukko' || active_page == 'thread' || active_page == 'index' || active_page == 'catalog' || active_page == 'page')
	{
		var i = 0
		while(i<document.styleSheets.length) {
			var protAndHost = window.location.protocol + '//' + window.location.host
			if(document.styleSheets[i].href == protAndHost + $('link[id="stylesheet"]').attr('href'))
			{
				var sheet = i
				document.styleSheets[sheet].disabled = disableStyles
				break
			}
			i++
		}
	}
	/* add the option on all pages so that the user doesn't need to goto a board to toggle it */
	if (window.Options && Options.get_tab("user-css", "css3", _("Theme"))){
		$('label#css-all-boards').after('<br><label id=\'disablestyle\'><input type=\'checkbox\' />' + ' Disable board specific style sheets' + '</label>')
		$('#disablestyle').find('input').prop('checked', disableStyles)
	}

	$('#disablestyle').on('change', function() {
		if(disableStyles) {
			delete localStorage.disablestylesheet
		} else {
			localStorage.disablestylesheet = true
		}
		disableStyles =! disableStyles
		if(active_page == 'ukko' || active_page == 'thread' || active_page == 'index' || active_page == 'catalog' || active_page == 'page') document.styleSheets[sheet].disabled = disableStyles
	})
})
