$(function(){
        var a_i = 0;
        $(".js_nav-list").each(function(){
           var d= $(this).attr("num",a_i++);
           $(this).parent().parent().find(".js_news-deta").hide();
            $(this).parent().parent().find(".js_news-deta").eq(0).show();
        });
        $(".js_nav-list").click(function(){
            var this_i = $(this).attr("num");
            $(this).siblings().removeClass("act").addClass("index_sub_tab");
             $(this).addClass("act").removeClass("index_sub_tab");
            $(this).siblings().find('img').attr('src','/static/images/game_gray.png');
            $(this).find('img').attr('src','/static/images/game.png');
            // if($(".nav-list").find("a").is(".curr")){
            //      $(".nav-list").find("a").removeClass("curr");
            //      $(this).find("a").addClass("curr");;
            // }else{
            //     $(".nav-list").find("a").removeClass("news-active");
            //      $(this).find("a").addClass("news-active");;
            // }
            $(this).parent().parent().find(".js_news-deta").hide();
            $(".js_news-deta").eq(this_i).show();
        });
    $(".shrink").click(function(){
        $(".left-menu").hide();
        $(".left-menu-min").show();
        $(".show-type-box").css({
            "width":'94%',
            "margin-left":'75px'
        })
        $(".show-type-list .game-live-list li").css({
            "width":'275px'
        })
        $(".game-list-img").css({
            "margin-left":'75px'
        })
    })
    $(".shrink01").click(function(){
        $(".left-menu-min").hide();
        $(".left-menu").show();
        $(".show-type-box").css({
            "width":'88%',
            "margin-left":'250px'
        })
        $(".show-type-list .game-live-list li").css({
            "width":'305px'
        })
        $(".game-list-img").css({
            "margin-left":'250px'
        })
    })
    $(".small_pic li").mouseover(function(){
        $(this).siblings().removeClass("on");
        $(this).addClass("on");
        var preNumber=$(this).prevAll().size()+1;
        $(".big_pic li").removeClass("on");
        $(".big_pic li:nth-child("+preNumber+")").addClass("on");
    });
    $(".small_rigpic li").mouseover(function(){
        $(this).siblings().removeClass("on");
        $(this).addClass("on");
        var preNumber=$(this).prevAll().size()+1;
        $(".big_rigpic li").removeClass("on");
        $(".big_rigpic li:nth-child("+preNumber+")").addClass("on");
    });
});