var tombolMenu = $(".tombol-menu");
var menu = $("nav .menu ul");

function klikMenu() {
    tombolMenu.click(function() {
        menu.toggle();
    });
    menu.click(function () {
        menu.toggle();
    });
}

$(document).ready(function () {
    var width = $(window).width();
    if(width < 990) {
        klikMenu();
    }
})

$(window).resize(function(){
    var width = $(window).width();
    if(width > 989) {
        menu.css("display", "block");
    }else {
        menu.css("display", )
    }
    klikMenu();
})

$(document).ready(function () {
    if (localStorage.getItem("dark-mode") === "enabled") {
        enableDarkMode();
    }

    $("#darkModeToggle").click(function () {
        if ($("body").hasClass("dark-mode")) {
            disableDarkMode();
        } else {
            enableDarkMode();
        }
    });

    function enableDarkMode() {
        $("body").addClass("dark-mode");
        $("#darkModeToggle").text("Light Mode");
        localStorage.setItem("dark-mode", "enabled");
    }

    function disableDarkMode() {
        $("body").removeClass("dark-mode");
        $("#darkModeToggle").text("Dark Mode");
        localStorage.setItem("dark-mode", "disabled");
    }
});

$(document).ready(function () {
    var scroll_pos = 0;
    $(document).scroll(function(){
        scroll_pos = $(this).scrolltop();
        if(scroll_pos > 0){
            $("nav").addclass("putih");
        } else {
            $("nav").removeclass("putih");
        }
    })
});
