var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};
var exists = {
    init: function(selector)
    {
        return ($(selector).length > 0);
    }
};
var mainMenu = {
    init: function() {
        var self = this;
        self.$level_one = $('.main-menu > ul > li');
        self.$level_one.each(function() {
            $(this).addClass('level1');
            if ($(this).find('ul').length > 0)
            {
                $(this).addClass('ar');
            }
        });
    }
};
var mobileMenu = {
    init: function() {
        var self = this;
        self.$mob_menu = $("#menu-mobile-open");
        self.$main_menu = $(".main-menu");
        self.openMenu();
    },
    openMenu: function() {
        var self = this;
        self.$mob_menu.on("click", function() {
            $(this).toggleClass("active");
            self.$main_menu.toggleClass("open");
            return false;
        });
    }
};
var companyMoreLink = {
    $flag: true,
    $countHeight: 0,
    init: function() {
        var self = this;
        self.$item = $('.items-company');
        self.openLinks();
    },
    countsHideLinks: function(wraps) {
        var self = this;
        self.$countHeight = 0;
        wraps.find('li').each(function() {
            self.$countHeight += $(this).height();
        });
        return self.$countHeight;
    },
    openLinks: function() {
        var self = this;
        self.$item.find('.more-link a').on('click', function() {
            self.countsHideLinks($(this).parent().parent().find('ul'));
            if (self.$flag)
            {
                $(this).parent().parent().find('ul').css({'max-height': self.$countHeight});
                $(this).html('Скрыть');

                return self.$flag = false;
            }
            else
            {
                $(this).parent().parent().find('ul').css({'max-height': '75px'});
                $(this).html('показать еще');
                return self.$flag = true;
            }
        });
    }
}
var owlCarusel = {
    init: function(selector, item, margin) {
        var self = this;
        if (exists.init(selector))
        {
            self.$owl = $(selector);
            if (typeof (self.$owl.data("item")) !== 'undefined')
            {
                item = self.$owl.data("item");
            }
            self.$owl.owlCarousel({
                margin: margin,
                loop: true,
                nav: true,
                navText: ["<span class='line'></span>", "<span class='line'></span>"],
                responsive: {
                    0: {
                        items: 1
                    },
                    750: {
                        items: 3
                    },
                    1140: {
                        items: 3
                    },
                    1200: {
                        items: item
                    }
                }
            });
        }
    }
};
var caruselMobile = {
    init: function(selector) {
        var self = this;
        if (exists.init(selector))
        {
            self.$owl = $(selector);
            self.$owl.owlCarousel({
                items: 1,
                smartSpeed: 550,
                loop: true,
                nav: true,
                navText: ["<span class='line'></span>", "<span class='line'></span>"]
            });
        }
    }
};
var fancyBox = {
    init: function(element) {
        var self = this;
        self.$f = $(element);
        self.$f.attr('rel', 'gallery').fancybox({
            beforeLoad: function() {
                this.title = $(this.element).attr('caption');
            }
        });
    }
};
var popupVideo = {
    init: function() {
        $('.popup-youtube').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    }
}
jQuery(document).ready(function() {
    $("input[name=phone]").mask("+7 (999) 999-99-99");
    $("a.order").fancybox();
     popupVideo.init();
    owlCarusel.init(".specialist-slider", 4, 0);
    owlCarusel.init(".review-slider", 3, 30);
    fancyBox.init(".fancybox");
    mainMenu.init();
    mobileMenu.init();
    caruselMobile.init(".single-slider");
    if (isMobile.any())
    {
        caruselMobile.init(".block-problem .items");
        caruselMobile.init(".block-wgy-we .items");
        caruselMobile.init(".steps .items");
        if ($(window).width() < 769)
        {
            caruselMobile.init(".block-number .items");
        }

    }
    if (!isMobile.any())
    {
        if (exists.init(".banner"))
        {
            new WOW().init();
        }
    }
});