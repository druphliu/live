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
});