$(document).ready(function () {

    $(document).ajaxStart(function () {
        console.log('started');
        $.blockUI({
            message: `<img src="http://127.0.0.1:8000/images/25.gif" alt="">`,
            css: {backgroundColor: 'transparent', color: '#663399', border: 'none'}
        });
    });
    $(document).ajaxStop(function () {
        $.unblockUI();
    });

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    });

    function fetch_data(page) {
        let category = window.location.pathname;
        $.ajax({
            url: 'pagination' + category + '?page=' + page,
        })
            .done(function (data) {
                $("#data-post").html(data);
                location.hash = page;
            });
    }

});
