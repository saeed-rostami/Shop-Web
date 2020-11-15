//preloader
$(document).ready(function () {
    document.querySelector('.preloader').classList.add('hidePreloader');
    $('.js-example-basic-multiple').select2({
        placeholder: 'انتخاب کنید',
        allowClear: true,
    });

});

//session alert
$(function () {

    let sessionValue = $("#hdnInput").data('value');
    if (sessionValue) {
        Notiflix.Notify.Success(sessionValue, {
            position: "right-bottom",
            width: "400px",
            borderRadius: 15,
            fontSize: 18,
            cssAnimation: true, cssAnimationDuration: 400, cssAnimationStyle: 'zoom',
        });
    }
});







