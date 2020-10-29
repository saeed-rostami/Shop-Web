$(document).ready(function(){

    $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        // let category = window.location.pathname;
        fetch_data(page);
    });

    function fetch_data(page)
    {
        let category = window.location.pathname;
        $.ajax({
            url: category + "/posts?page=" + page,
        }).done(function (data) {
            console.log(data)
            $("#data-post").html(data);
            location.hash = page;
        });
    }

});
