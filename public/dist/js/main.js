$(".dropdown.user.user-menu").click(function(){
    $(this).toggleClass("open");
    if($(this).hasClass("open")==1)
        $(".dropdown.user.user-menu .dropdown-menu").css({"display": "block", "left": "-100px"});
    else
    $(".dropdown.user.user-menu .dropdown-menu").css({"display": "none", "left": "0px"});
})
