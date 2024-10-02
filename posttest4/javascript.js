//menu
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

//check lebar
$(window).resize(function(){
    var width = $(window).width();
    if(width > 989) {
        menu.css("display", "block");
    }else {
        menu.css("display", )
    }
    klikMenu();
})

const darkModeToggle = document.getElementById('darkModeToggle');

darkModeToggle.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
});

//efek scroll
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
