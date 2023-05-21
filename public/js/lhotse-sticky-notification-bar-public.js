jQuery(document).ready(function ($) {
    var isNotificationBarTextSet = notificationBarScriptParams.notification_bar_text != "";
    var isNotificationBarEnabledOnPage = !notificationBarScriptParams.pro_version_enabled || 
        (notificationBarScriptParams.pro_version_enabled && !notificationBarScriptParams.disabled_on_current_page);
    var isNotificationBarVisible = isNotificationBarTextSet && isNotificationBarEnabledOnPage;

    if (isNotificationBarVisible) {
        if (!notificationBarScriptParams.wp_body_open || !notificationBarScriptParams.wp_body_open_enabled) {
            var closeButton = notificationBarScriptParams.close_button_enabled ? '<button aria-label="Close" id="notification-bar-close-button" class="notification-bar-button">&#x2715;</button>' : '';
            var prependElement = document.querySelector(notificationBarScriptParams.notification_bar_insert_inside_element || 'body');
            $('<div id="notification-bar" class="notification-bar"><div class="notification-bar-text"><span>' 
                + notificationBarScriptParams.notification_bar_text 
                + '</span></div>' + closeButton + '</div>')
            .prependTo(prependElement || 'body');
        }

        var bodyPaddingLeft = $('body').css('padding-left')
        var bodyPaddingRight = $('body').css('padding-right')

        if (bodyPaddingLeft != "0px") {
            $('head').append('<style type="text/css" media="screen">.notification-bar{margin-left:-' + bodyPaddingLeft + ';padding-left:' + bodyPaddingLeft + ';}</style>');
        }
        if (bodyPaddingRight != "0px") {
            $('head').append('<style type="text/css" media="screen">.notification-bar{margin-right:-' + bodyPaddingRight + ';padding-right:' + bodyPaddingRight + ';}</style>');
        }

        // Add scrolling class
        function scrollClass() {
            var scroll = document.documentElement.scrollTop;
            if (scroll > $("#notification-bar").height()) {
                $("#notification-bar").addClass("notification-bar-scrolling");
            } else {
                $("#notification-bar").removeClass("notification-bar-scrolling");
            }
        }
        document.addEventListener("scroll", scrollClass);
    }

    // Add close button function to close button and close if cookie found
    function closeBar() {
        if (!notificationBarScriptParams.keep_site_custom_css && document.getElementById('notification-bar-site-custom-css')) document.getElementById('notification-bar-site-custom-css').remove();
        if (!notificationBarScriptParams.keep_site_custom_js && document.getElementById('notification-bar-site-custom-js')) document.getElementById('notification-bar-site-custom-js').remove();
        if (document.getElementById('notification-bar-header-margin')) document.getElementById('notification-bar-header-margin').remove();
        if (document.getElementById('notification-bar-header-padding')) document.getElementById('notification-bar-header-padding').remove();
        if (document.getElementById('notification-bar')) document.getElementById('notification-bar').remove();
    }
    if (isNotificationBarVisible) {
        var sbCookie = "notificationbarclosed";

        if (notificationBarScriptParams.close_button_enabled){
            if (getCookie(sbCookie) === "true") {
                closeBar();
                // Set cookie again here in case the expiration has changed
                setCookie(sbCookie, "true", notificationBarScriptParams.close_button_expiration);
            } else {
                document.getElementById("notification-bar-close-button").onclick = function() {
                    closeBar();
                    setCookie(sbCookie, "true", notificationBarScriptParams.close_button_expiration);
                };
            }
        } else {
            // disable cookie if it exists
            if (getCookie(sbCookie) === "true") {
                document.cookie = "notificationbarclosed=true; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            }
        }
    }

    // Cookie Getter/Setter
    function setCookie(cname,cvalue,expiration) {
        var d;
        if (expiration === '' || expiration === '0' || parseFloat(expiration)) {
            var exdays = parseFloat(expiration) || 0;
            d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
        } else {
            d = new Date(expiration);
        }
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    // Debug Mode
    // Console log all variables
    
});
