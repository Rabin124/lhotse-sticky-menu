(function ($) {
    "use strict";
  
    $(window).on("load resize", function () {
      var $selector = $(sticky_object.sticky_desktop_sidebar_selector);
      if ($selector[0]) {
        var width = $selector[0].getBoundingClientRect().width;
        var height = $selector[0].getBoundingClientRect().height;
        var menu_offset = $selector.offset();
      }
      if ($(window).width() < 768) {
        if (!$(sticky_object.sticky_desktop_sidebar_selector).length) {
          console.log(
            "Lhotse Sticky menu: Entered Sticky Element for change it in Dashboard / Settings / Lhotse Sticky Menu."
          );
          return;
        }
        $(window).on("scroll", function () {
          $selector.removeClass("lhotseStickySidebar");
          if ($(window).scrollTop() > menu_offset.top) {
  
            if (sticky_object.enable_only_on_home == 0) {
              $(" .sidebar-container").css("top", "0");
              $(" .sidebar-container li").css(
                "background-color",
                sticky_object.sticky_background_color
              );
              $(" .sidebar-container li a").css(
                "color",
                sticky_object.sticky_sidebar_text_color
              );
            } else {
              $(".sidebar-container").css("top", "0");
              $(".sidebar-container li").css(
                "background-color",
                sticky_object.sticky_sidebar_background_color
              );
              $(".sidebar-container li a").css(
                "color",
                sticky_object.sticky_sidebar_text_color
              );
            }
          } else {
            $(".sidebar-container li").removeAttr("style");
            $(" .sidebar-container li a").removeAttr("style");
            $(".sidebar-container li").removeAttr("style");
            $(".sidebar-container li a").removeAttr("style");
            $selector.removeAttr("style");
          }
        });
      } else {
        if (!$(sticky_object.sticky_desktop_sidebar_selector).length) {
          console.log(
            "Lhotse Sticky menu: Entered Sticky Element for desktop does not exist, change it in Dashboard / Settings / Lhotse Sticky Menu / Desktop Menu Selector."
          );
          return;
        }
  
        $(window).on("scroll", function () {
          if ($(window).scrollTop() > menu_offset.top) {
            var adminBarHeight = 0;
  
            if ($("#wpadminbar")[0]) {
              // Check if admin bar is enabled.
              adminBarHeight = $("#wpadminbar").height();
            }
  
            var z_index = parseInt(sticky_object.sticky_sidebar_z_index);
            var opacity = parseFloat(sticky_object.sticky_sidebar_opacity);
  
            if (sticky_object.enable_only_on_home == 0) {
              $(sticky_object.sticky_desktop_sidebar_selector).addClass("lhotseStickySidebarSidebar");
              $(".lhotseStickySidebar").css("top", adminBarHeight + "px");
              $(".lhotseStickySidebar").css("background-color", sticky_object.sticky_sidebar_background_color);
              $(".lhotseStickySidebar").css("z-index", z_index);
              $(".lhotseStickySidebar").css("opacity", opacity);
              $(".lhotseStickySidebar").css("width", width);
              $(".lhotseStickySidebar").css("height", height);
              $(".lhotseStickySidebar a").css("color", sticky_object.sticky_sidebar_text_color);
              $(".lhotseStickySidebar a").css("font-size", sticky_object.sticky_sidebar_desktop_font_size + "px" );
            }
          } else {
            $(".lhotseStickySidebar a").removeAttr("style");
            $(".lhotseStickySidebar a").removeAttr("style");
            $(sticky_object.sticky_desktop_sidebar_selector).removeClass( "lhotseStickySidebar");
            $(sticky_object.sticky_desktop_sidebar_selector).removeAttr("style");
            $(sticky_object.sticky_desktop_sidebar_selector + " li").removeAttr( "style" );
          }
        });
      }
    });
  })(jQuery);
  
  console.log("Lhotse Sticky sidebar: Loaded2.");
  
  // steps to update file in github repo from local
  // git add .
  // git commit -m "message"
  // git push origin master
  // git status
  // git log
  // git pull origin master
  // git status
  // git log
  // git push origin master
  // git status
  // git log
  