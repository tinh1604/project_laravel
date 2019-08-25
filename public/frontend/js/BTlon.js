
// cách 1: sử dụng jquery
// $("#menu5").click(function() {
//     $("#submenu").toggle();
// });

// cách 2: sử dụng javascrip
function myfunction() {
    var menu = document.getElementById("submenu");

    if (menu.style.display == 'block') {
        menu.style.display = 'none';

    } else {
        menu.style.display = 'block';
    }

}

