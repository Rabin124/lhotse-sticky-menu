(function ($) {
  "use strict";

  $(window).on("load resize", function () {
    var $selector = $(sticky_object.sticky_desktop_menu_selector);
    if ($selector[0]) {
      var width = $selector[0].getBoundingClientRect().width;
      var height = $selector[0].getBoundingClientRect().height;
      var menu_offset = $selector.offset();
    }
    if ($(window).width() < 768) {
      if (!$(sticky_object.sticky_desktop_menu_selector).length) {
        console.log(
          "Lhotse Sticky menu: Entered Sticky Element for change it in Dashboard / Settings / Lhotse Sticky Menu."
        );
        return;
      }
      $(window).on("scroll", function () {
        $selector.removeClass("lhotseSticky");
        if ($(window).scrollTop() > menu_offset.top) {

          if (sticky_object.enable_only_on_home == 0) {
            $(" .site-navigation").css("top", "0");
            $(" .site-navigation li").css(
              "background-color",
              sticky_object.sticky_background_color
            );
            $(" .site-navigation li a").css(
              "color",
              sticky_object.sticky_text_color
            );
          } else {
            $(".site-navigation").css("top", "0");
            $(".site-navigation li").css(
              "background-color",
              sticky_object.sticky_background_color
            );
            $(".site-navigation li a").css(
              "color",
              sticky_object.sticky_text_color
            );
          }
        } else {
          $(".site-navigation li").removeAttr("style");
          $(" .site-navigation li a").removeAttr("style");
          $(".site-navigation li").removeAttr("style");
          $(".site-navigation li a").removeAttr("style");
          $selector.removeAttr("style");
        }
      });
    } else {
      if (!$(sticky_object.sticky_desktop_menu_selector).length) {
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

          var z_index = parseInt(sticky_object.sticky_z_index);
          var opacity = parseFloat(sticky_object.sticky_opacity);

          if (sticky_object.enable_only_on_home == 0) {
            $(sticky_object.sticky_desktop_menu_selector).addClass(
              "lhotseSticky"
            );
            $(".lhotseSticky").css("top", adminBarHeight + "px");
            $(".lhotseSticky").css(
              "background-color",
              sticky_object.sticky_background_color
            );
            $(".lhotseSticky").css("z-index", z_index);
            $(".lhotseSticky").css("opacity", opacity);
            $(".lhotseSticky").css("width", width);
            $(".lhotseSticky").css("height", height);
            $(".lhotseSticky a").css("color", sticky_object.sticky_text_color);
            $(".lhotseSticky a").css(
              "font-size",
              sticky_object.sticky_desktop_font_size + "px"
            );
          }
        } else {
          $(".lhotseSticky a").removeAttr("style");
          $(".lhotseSticky a").removeAttr("style");
          $(sticky_object.sticky_desktop_menu_selector).removeClass(
            "lhotseSticky"
          );
          $(sticky_object.sticky_desktop_menu_selector).removeAttr("style");
          $(sticky_object.sticky__desktop_menu_selector + " li").removeAttr(
            "style"
          );
        }
      });
    }
  });
})(jQuery);

console.log("Lhotse Sticky menu: Loaded.");

