$(function(){
        var a_i = 0;
        $(".js_nav-list").each(function(){
           var d= $(this).attr("num",a_i++);
           $(".js_news-deta").hide();
           $(".js_news-deta").eq(0).show();
        });
        $(".js_nav-list").click(function(){
            var this_i = $(this).attr("num");
             $(".js_nav-list").removeClass("act");
             $(this).addClass("act");
            // if($(".nav-list").find("a").is(".curr")){
            //      $(".nav-list").find("a").removeClass("curr");
            //      $(this).find("a").addClass("curr");;
            // }else{
            //     $(".nav-list").find("a").removeClass("news-active");
            //      $(this).find("a").addClass("news-active");;
            // }
            $(".js_news-deta").hide();
            $(".js_news-deta").eq(this_i).show();
        });
    $(".shrink").click(function(){
        $(".left-menu").hide();
        $(".left-menu-min").show();
        $(".show-type-box").css({
            "width":'94%',
            "margin-left":'95px'
        })
        $(".show-type-list .game-live-list li").css({
            "width":'240px'
        })
        $(".game-list-img").css({
            "margin-left":'95px'
        })
    })
    $(".shrink01").click(function(){
        $(".left-menu-min").hide();
        $(".left-menu").show();
        $(".show-type-box").css({
            "width":'88%',
            "margin-left":'219px'
        })
        $(".show-type-list .game-live-list li").css({
            "width":'225px'
        })
        $(".game-list-img").css({
            "margin-left":'219px'
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