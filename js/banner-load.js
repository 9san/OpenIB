/* 9san Development Group
 * The intention with this method is avoiding banners not rotating with src 
 * rotating on template and allowing a variety of banner options.
 */
function getRandomImage(id) {
$.get( "/image.php", { brd_name: board_name, gbl: global_banner } ,function(data) {
	  document.getElementById(id).src = "/" + data;
});}