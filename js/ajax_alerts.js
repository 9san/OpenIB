/*
 * ajax_alerts.js
 *
 *   $config['additional_javascript'][] = 'js/jquery.min.js';
 *   $config['additional_javascript'][] = 'js/ajax.js';
 *   $config['additional_javascript'][] = 'js/ajax_alerts.js';
 * 
 */
 
function html_alert(id, url) {
		$('#alert_'+id).on('click', function() {
		$.get('/static/alert/'+url, function(data) {
			alert(data);
		});
		event.preventDefault(); 
		});		
}
	
$(document).ready(function(){
	
	html_alert('about', 'about.html');
	html_alert('legal', 'legal.html');
	html_alert('contact', 'contact.html');
	html_alert('faqcontact', 'contact.html');
	
});