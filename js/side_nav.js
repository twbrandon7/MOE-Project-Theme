$(document).ready(function(){
    $(".open-side-nav").click(function(){
        try{
            var id = $(this).attr("data-target");
            var elem = document.getElementById(id);
            var instance = M.Sidenav.getInstance(elem);
            instance.open();
            M.Sidenav.getInstance($(this).parent().parent()[0]).close();
        }catch(e){}
    });

    $(".close-side-nav").click(function(){
        var elem = $(this).parent().parent()[0];
        var instance = M.Sidenav.getInstance(elem);
        instance.close();
    });
});