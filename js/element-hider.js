/* this hides elements */

//copyright footer
$(document).ready(function(){
  
        if (!localStorage.footer_toggle) localStorage.footer_toggle = false;
        Options.extend_tab('general', '<label id="footer_toggle"><input type="checkbox">' + _("  Hide copyright footer") + '</label>');

		$('#footer_remove').on('click', function() {
			$('#footer_toggle>input').prop('checked', true);
            localStorage.footer_toggle = 'true';
            messageFooter(true);
            event.preventDefault(); 
        });
		
		
		
        if (localStorage.footer_toggle === 'true') {
                $('#footer_toggle>input').prop('checked', true);
                messageFooter(true);
        } else {
                $('#footer_toggle>input').prop('checked', false);
                messageFooter(false);
        }
        $('#footer_toggle>input').on('click', function() {
                if ($('#footer_toggle>input').is(':checked')) {
                        localStorage.footer_toggle = 'true';
                        messageFooter(true);
                } else {
                        localStorage.footer_toggle = 'false';
                        messageFooter(false);
                }
        });

});

function messageFooter(m){
        if(m===true){
                $("#footer-copyright").hide();
        }else{
                $("#footer-copyright").show();
        }

}

//blotter announcement
$(document).ready(function(){
  
        if (!localStorage.blotter_toggle) localStorage.blotter_toggle = false;
        Options.extend_tab('general', '<label id="blotter_toggle"><input type="checkbox">' + _("  Hide blotter announcements") + '</label>');

		$('#blotter_remove').on('click', function() {
			$('#blotter_toggle>input').prop('checked', true);
            localStorage.blotter_toggle = 'true';
            messageBlotter(true);
            event.preventDefault(); 
        });
		
		
		
        if (localStorage.blotter_toggle === 'true') {
                $('#blotter_toggle>input').prop('checked', true);
                messageBlotter(true);
        } else {
                $('#blotter_toggle>input').prop('checked', false);
                messageBlotter(false);
        }
        $('#blotter_toggle>input').on('click', function() {
                if ($('#blotter_toggle>input').is(':checked')) {
                        localStorage.blotter_toggle = 'true';
                        messageBlotter(true);
                } else {
                        localStorage.blotter_toggle = 'false';
                        messageBlotter(false);
                }
        });

});

function messageBlotter(m){
        if(m===true){
                $("#blotter.blotter").hide();
        }else{
                $("#blotter.blotter").css('display', 'block');
        }

}