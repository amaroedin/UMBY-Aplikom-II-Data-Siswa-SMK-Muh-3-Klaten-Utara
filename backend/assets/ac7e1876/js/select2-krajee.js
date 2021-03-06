/*!
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2015
 * @version 2.0.3
 *
 * Additional enhancements for Select2 widget extension for Yii 2.0.
 *
 * Author: Kartik Visweswaran
 * For more JQuery plugins visit http://plugins.krajee.com
 * For more Yii related demos visit http://demos.krajee.com
 */
var initS2Loading = function () {
}, initS2Open = function () {
}, initS2Unselect = function () {
};
(function ($) {
    "use strict";
    initS2Loading = function (id, containerCss, sizeCss, $reset) {
        var $el = $('#' + id), $container = $(containerCss),
            $loading = $('.kv-plugin-loading.loading-' + id),
            $group = $('.group-' + id);
        if (!$container.length) {
            $el.show();
        }
        if ($group.length) {
            $group.removeClass('kv-input-group-hide').removeClass('.group-' + id);
        }
        $loading.remove();
        if (sizeCss) {
            $el.next(containerCss).removeClass(sizeCss).addClass(sizeCss);
        }
        if ($reset) {
            $el.closest("form").on("reset", function(){
                setTimeout(function(){
                    $el.trigger("change");
                }, 100);
            });
        }
    };
    initS2Open = function () {
        var $el = $(this), $drop = $(".select2-container--open"),
            cssClasses, i, $src = $el.parents("[class*='has-']");
        if ($src.length) {
            cssClasses = $src[0].className.split(/\s+/);
            for (i = 0; i < cssClasses.length; i++) {
                if (cssClasses[i].match("has-")) {
                    $drop.removeClass("has-success has-error has-warning").addClass(cssClasses[i]);
                }
            }
        }
        if ($el.data('unselecting')) {
            $el.removeData('unselecting');
            setTimeout(function () {
                $el.select2('close').trigger('krajeeselect2:cleared');
            }, 5);
        }
    };
    initS2Unselect = function () {
        $(this).data('unselecting', true);
    };
})(window.jQuery);