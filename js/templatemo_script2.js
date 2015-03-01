/*  Free Template by www.templatemo.com  */

/* 
Dragonfruit Template 
http://www.templatemo.com/preview/templatemo_411_dragonfruit 
*/

jQuery(function(){
    $ = jQuery;
    $(window).load( function() {
        $('.external-link').unbind('click');    
    });

	

    //timeline
    $(window).on("load resize", function(){
        $.timeline_right_position_top = 0 ;
        $.timeline_old_right_position_top = 0 ;
        $.timeline_left_position_top = 0 ;
        $.timeline_old_left_position_top = 0 ;
        w_width = ($(window).width()>1600) ? 1600 : $(window).width() ;
        $.timeline_item_width = ( w_width - 50) / 2;
        $(".time_line_wap2").each(function(){
            //if class name already exit remove
            $(this).children("a.left_timer").remove();
            $(this).children("a.right_timer").remove();
            $(this).removeClass("left_timeline");
            $(this).removeClass("right_timeline");
            if($(window).width()<970){
                $("#templatemo_timeline2 .container-fluid2").css({"position":"absolute"});
                positon_left = $("#templatemo_timeline2 .container-fluid2").position().left +100;
                //put on right
                $(this).css({   
                                    'left': 70,
                                    'top':$.timeline_right_position_top,
                                    'width': $(window).width() - positon_left
                                 });
                $(this).addClass("right_timeline");
                $.timeline_old_right_position_top = $.timeline_right_position_top;
                $.timeline_right_position_top = $.timeline_right_position_top + $(this).outerHeight() + 40 ;
                $(this).prepend("<a href=\"#\" class=\"right_timer\"><span class=\"glyphicon glyphicon-time\"></span></a>");
                $(this).children("a.right_timer").css({left:-86, width: 60 ,});
            }else if($.timeline_left_position_top == 0){
                $("#templatemo_timeline2 .container-fluid2").css({"position":"relative"});
                //put on left
                $(this).css({   
                                    'left':0,
                                    'top':0,
                                    'width': $.timeline_item_width - 50
                                 });
                $(this).addClass("left_timeline");
                $.timeline_old_left_position_top = $.timeline_left_position_top;
                $.timeline_left_position_top = $.timeline_left_position_top + $(this).outerHeight() + 40 ;
                $(this).prepend("<a href=\"#\" class=\"left_timer\"><span class=\"glyphicon glyphicon-time\"></span></a>");
                $(this).children("a.left_timer").css({left:$.timeline_item_width-50,});
            }else if( $.timeline_right_position_top < $.timeline_left_position_top ){
                $("#templatemo_timeline2 .container-fluid2").css({"position":"relative"});
                $.timeline_right_position_top = ($.timeline_old_left_position_top + 40) < $.timeline_right_position_top  ? $.timeline_right_position_top : $.timeline_right_position_top + 40;
                //put on right
                $(this).css({   
                                    'left': $.timeline_item_width + 79,
                                    'top':$.timeline_right_position_top,
                                    'width': $.timeline_item_width - 50
                                 });
                $(this).addClass("right_timeline");
                $.timeline_old_right_position_top = $.timeline_right_position_top;
                $.timeline_right_position_top = $.timeline_right_position_top + $(this).outerHeight() + 40 ;
                $(this).prepend("<a href=\"#\" class=\"right_timer\"><span class=\"glyphicon glyphicon-time\"></span></a>");
                $(this).children("a.right_timer").css({left:-99,});
            }else{
                $("#templatemo_timeline2 .container-fluid2").css({"position":"relative"});
                $.timeline_left_position_top = ($.timeline_old_right_position_top + 40) < $.timeline_left_position_top ? $.timeline_left_position_top : $.timeline_left_position_top + 40;
                //put on left
                $(this).css({
                                    'left':0,
                                    'top':$.timeline_left_position_top,
                                    'width': $.timeline_item_width - 50
                                 });
                $(this).addClass("left_timeline");
                $.timeline_old_left_position_top = $.timeline_left_position_top;
                $.timeline_left_position_top = $.timeline_left_position_top + $(this).outerHeight() + 40 ;
                $(this).prepend("<a href=\"#\" class=\"left_timer\"><span class=\"glyphicon glyphicon-time\"></span></a>");
                $(this).children("a.left_timer").css({left:$.timeline_item_width-50,});
            }
            //calculate and define container height
            if($.timeline_left_position_top > $.timeline_right_position_top ){
                $("#templatemo_timeline2 .container-fluid2").height($.timeline_left_position_top-40);
                $("#templatemo_timeline2").height($.timeline_left_position_top+200);
            }else{
                $("#templatemo_timeline2 .container-fluid2").height($.timeline_right_position_top-40);
                $("#templatemo_timeline2").height($.timeline_right_position_top+200);
            }
            $(this).fadeIn();
        });
    });
    //mobile menu and desktop menu
    $("#templatemo_mobile_menu").css({"right":-1500});
    $("#mobile_menu").click(function(){
            $("#templatemo_mobile_menu").show();
            $("#templatemo_mobile_menu").animate({"right":0});
            return false;
    });
    $(window).on("load resize", function(){
            if($(window).width()>768){
                $("#templatemo_mobile_menu").css({"right":-1500});
            }
    });

    jQuery.fn.anchorAnimate = function(settings) {
        settings = jQuery.extend({
            speed : 1100
        }, settings);	
        return this.each(function(){
            var caller = this
            $(caller).click(function (event){
                event.preventDefault();
                var locationHref = window.location.href;
                var elementClick = $(caller).attr("href");
                var destination = $(elementClick).offset().top - $('#templatemo_banner_menu').outerHeight() ;
                $("#templatemo_mobile_menu").animate({"right":-1500});
                $("#templatemo_mobile_menu").fadeOut() ;
                $("html,body").css({"overflow":"auto"});
                $("html,body").stop().animate({ scrollTop: destination}, settings.speed, function(){
                    // Detect if pushState is available
                    if(history.pushState) {
                        history.pushState(null, null, elementClick);
                    }
                });
                return false;
            });
        });
    }
    
    //events
    //event
    $(document).scroll(function(){
        document_top = $(document).scrollTop();
        event_wapper_top = $("#templatemo_events").position().top - $('#templatemo_banner_menu').outerHeight();
        if(document_top<event_wapper_top){
            event_animate_num = event_wapper_top - document_top;
            event_animate_alpha = (1/event_wapper_top)*(document_top);
            $("#templatemo_events .event_animate_left").css({'left': -event_animate_num,'opacity':event_animate_alpha});
            $("#templatemo_events .event_animate_right").css({'left':event_animate_num,'opacity':event_animate_alpha});
        }else{
            $("#templatemo_events .event_animate_left").css({'left': 0,'opacity':1});
            $("#templatemo_events .event_animate_right").css({'left':0,'opacity':1});
        }
    }); 
});

google.maps.event.addDomListener(window, 'load', initialize);
google.maps.event.addDomListener(window, 'resize', initialize);