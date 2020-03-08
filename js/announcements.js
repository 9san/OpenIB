var hideAnnouncements = get_cookie("hideAnnouncements");
    buildAnnouncementList(hideAnnouncements);

    $("#announcements").delegate("#toggleAnnouncements", "click", function(){
        hideAnnouncements = ((hideAnnouncements != "1")?"1":"0");
        document.cookie = 'hideAnnouncements=' + hideAnnouncements + ';expires=0;path=/;';
        buildAnnouncementList(hideAnnouncements);
    });