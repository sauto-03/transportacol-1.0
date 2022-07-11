//!control del menu
// Get all "navbar-burger" elements
const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

// Add a click event on each of them
$navbarBurgers.forEach(el => {
    el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

    });
});


$("#item1").click(function (e) {
    $('#usuario').css("display", 'none');
    $('#correos').css('display', 'block');
    $('#config').css('display', 'none');

    $('#vista-1').css('display', 'block');
    $('#vista-2').css('display', 'none');

    //color
    $('#item1').css('color', 'blue');
    $('#item2').css('color', 'black');
    $('#item3').css('color', 'black');

});

$("#item2").click(function (e) {
    $('#usuario').css("display", 'none');
    $('#correos').css('display', 'none');
    $('#config').css('display', 'block');

    $('#vista-1').css('display', 'none');
    $('#vista-2').css('display', 'block');
    //color
    $('#item1').css('color', 'black');
    $('#item2').css('color', 'blue');
    $('#item3').css('color', 'black');


});



$("#btn-canvio").click(function (e) {
    $('#uno-form').css("display", 'none');
    $('#dos-form').css('display', 'block');
});

$("#cancelar").click(function (e) {
    $('#uno-form').css("display", 'block');
    $('#dos-form').css('display', 'none');
});

$("#btn-canvio2").click(function (e) {
    $('#uno-form2').css("display", 'none');
    $('#dos-form2').css('display', 'block');
});

$("#cancelar2").click(function (e) {
    $('#uno-form2').css("display", 'block');
    $('#dos-form2').css('display', 'none');
});

$("#btn-salir").click(function (e) {
    alert('Seguro que desea cerrar la session ?')
});


$(document).ready(function () {
    $('#dataTable').DataTable();
});