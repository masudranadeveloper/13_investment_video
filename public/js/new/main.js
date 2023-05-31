// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
    list.forEach((item) => {
        item.classList.remove("hovered");
    });
    this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("click", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
};

$('.my_settings').click(function(){
    $('.my_settings_ul').toggleClass('d-none');
});

// drop down 
$('.navigation .navigation_ul li').click(function(){
    $('.navigation .navigation_ul li').children('a').children('span.icon.left_arrow_ft').removeClass('active-icon');
    $('.navigation .navigation_ul li').children('ul.drop-down').removeClass('active');

    $(this).children('ul.drop-down').addClass('active');
    $(this).children('a').children('span.icon.left_arrow_ft').addClass('active-icon');
});

// copy_sponser_linnk
$('li#copy_sponser_linnk').click(function(){
    $('#copy_refarel_id').fadeIn(500);
});

$('.copy_refarel_idclose').click(function(){
    $('#copy_refarel_id').fadeOut(500);
});

$('span#website_notification_close').click(function(){
    $('#website_notification').fadeOut(500);
});