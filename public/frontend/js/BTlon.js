
// cách 1: sử dụng jquery
$("#navbar").click(function() {
    $("#menu2").toggle();
});

// cách 2: sử dụng javascrip
function myfunction() {
    var menu = document.getElementById("submenu");

    if (menu.style.display == 'block') {
        menu.style.display = 'none';

    } else {
        menu.style.display = 'block';
    }

}

