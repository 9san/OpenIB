$(document).ready(function(){
        //Stub hide/show options
        if (!localStorage.stub_hide_post) localStorage.stub_hide_post = 'false';
        $('#auto-update-fs').parent().before('<div><label id="stub_hide_post_label"><input type="checkbox">' + _("  Unhide stub when hiding post") + '</label></div>');
        if (localStorage.stub_hide_post === 'true') {
                $('#stub_hide_post_label>input').prop('checked', true);
        } else {
                $('#stub_hide_post_label>input').prop('checked', false);
        }
        $('#stub_hide_post_label>input').on('click', function() {
            console.log("test");
               if ($('#stub_hide_post_label>input').is(':checked')) {
                        localStorage.stub_hide_post = 'true';
                } else {
                        localStorage.stub_hide_post = 'false';
                }
        });
});
