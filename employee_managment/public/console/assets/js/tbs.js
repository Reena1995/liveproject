(function ($) {
    "use strict";

    /**
     * @property colors
     * @description SET colors for charts includes system colors and pastel colors for charts
     * @returns {array} - array of colors/colours
     */
    var body = $("body"),
        windowWidth = window.innerWidth;

    /**
     * @description Initialize Bootstrap tooltip
     * @param {(Element|jQuery)} [context] - A DOM Element, Document, or jQuery to use as context.
     * @requires bootstrap.js, Popper.js
     */
    $('[data-toggle="tooltip"]').tooltip();

    /**
     * @description sidebar operations like sliding sidebar,toggle and responsive options
     * @param {(Element|jQuery)} [context] - A DOM Element, Document, or jQuery to use as context.
     * @requires jQuery
     */

    // sidebar mouse events
    $(document).on("mouseenter", "body:not(.sidebar-pinned) .admin-sidebar", function (e) {
        if (windowWidth >= 1200) {
            $(this).addClass("sidebar-show");
        }
    }); 
    $(document).on("mouseleave", "body:not(.sidebar-pinned) .admin-sidebar", function (e) {
        if (windowWidth >= 1200) {
            $(this).removeClass("sidebar-show");
        }
    });

    //sidebar pin - toggle sidebar pin
    $(document).on("click", ".admin-pin-sidebar", function (e) {
        e.preventDefault();
        body.toggleClass("sidebar-pinned");
        $(this).toggleClass("pinned");
        // trigger resize event for charts to redraw if required
        window.dispatchEvent(new Event("resize"));
    });

    // append backdrop for mobile
    body.append('<div class="sidebar-backdrop "></div>');

    // close event on mobile by clicking close button or backdrop
    $(document).on("click", " .admin-close-sidebar ,.sidebar-backdrop", function (e) {
        e.preventDefault();
        body.removeClass("sidebar-open");
    });
    /**
     * @description toggles the target class with class given in toggleclass attr
     * * @param {(Element|jQuery)} [context] - A DOM Element, Document, or jQuery to use as context.
     * @requires jQuery
     */
    $(document).on("click", "[data-toggleclass]", function (e) {
        e.preventDefault();
        $($(this).attr("data-target")).toggleClass($(this).attr("data-toggleClass"));
    });

    /**
     * @description Sidebar Multilevel Menu
     * @param {(Element|jQuery)} [context] - A DOM Element, Document, or jQuery to use as context.
     * @requires jQuery
     */
    /* $(document).on("click", ".menu-item", function () { 
        $('.menu-item').next().slideDown();
        $('.menu-item').removeClass('opened');
        $(this).addClass('opened');
        $('.sub-menu').hide();
        $(this).children('.sub-menu').show();
            
    }); */
    $(document).on("click", ".sub-menu-link", function () {
        /* $('.menu-item').each(function(i, obj) {
            console.log(i,'i');
            console.log(obj,'obj');
            //test
        }); */
        if (!$(this).next().is(":visible")) { 
            console.log("click if");
            /* if ($(".menu-item").hasClass('opened')){
                console.log("check condition");
                console.log($(this));
            } */
            $('.sub-menu>.opened').removeClass('opened');
           
            $(this).parent().addClass('opened');
            $(this).addClass('opened');
            $('.sub-menu-ul').hide("slow" );
            console.log( $(this).next());
            $(this).next('.sub-menu-ul').show("slow" );
        } else{ 
            console.log("click else");
            
            console.log($(this).parent().removeClass('opened'));
            // console.log($(this).parent().addClass('opened'));


            $(this).addClass('opened');
            $('.sub-menu-ul').hide("slow" );
            console.log( $(this).next());
            $(this).next('.sub-menu-ul').hide("slow" );
        }
        /* $('.menu-item').next().slideDown();
        $('.menu-item').removeClass('opened');
        $(this).addClass('opened');
        $('.sub-menu').hide();
        $(this).children('.sub-menu').show(); */
            
    });

    $(document).on("click", ".open-dropdown", function (e) {
        e.preventDefault(); 

        if (!$(this).next().is(":visible")) { 
            $('.menu-item').removeClass('opened');
            $('.sub-menu').hide("slow");
            $(this).next().slideDown();
            $(this).parent().addClass("opened");
        } else { 
            $(this).next().slideUp();
            $(this).parent().removeClass("opened");
        }
        
    });

    // light and dark theme setting js END


    $('.nav-list').click(function() {
        $('.nav-list li.active').removeClass('active');
        $(this).addClass('active');
    });

    //Floating Form Floating label :: START

    $(document).on("input", ".floating-label input ", function (e) {
        var item = $(this).parents(".floating-label");
        item.addClass("show-label"); 
    });

    $(document).on("input", ".floating-label textarea ", function (e) {
        var item = $(this).parents(".floating-label");
        item.addClass("show-label"); 
    });


    $(document).on("blur", ".floating-label input", function (e) { 
        /* $(this).val() ? item.addClass("show-label") : item.removeClass("show-label"); */
        var item = $(this).parents(".floating-label");
        item.addClass("show-label");
    });
 

    //checking for pre-filled forms
    $(".floating-label input").each(function () {
        var item = $(this).parents(".floating-label");
        item.addClass("show-label");
    });

    $(".floating-label textarea").each(function () {
        var item = $(this).parents(".floating-label");
        item.addClass("show-label");
    });
    //Floating Form Floating label :: END

    $(document).ready(function() {
        $('#nav-mobile ul').hide();
        $('#nav-mobile a').click(function(e) {
            e.preventDefault();
            var $menuItem = $(this).next('ul');
            $menuItem.slideToggle();
            $('#nav-mobile ul').not($menuItem).slideUp();
        });
    });

    
    /* session time out start */
    $("document").ready(function(){
        setTimeout(function(){
           $(".alert").remove();
        }, 5000 ); // 5 secs
    
    }); 
    /* session time out start */


   


})(window.jQuery);



