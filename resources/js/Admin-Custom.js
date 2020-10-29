
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


// //editCategoryShow
// function showEdit(categoryId) {
//     $.ajax({
//         url: '{{ route("getData") }}',
//         type: 'GET',
//         headers: {
//             'X-CSRF-TOKEN': '{{ csrf_token() }}'
//         },
//         data: {categoryId: categoryId},
//         success: function (data) {
//             $('#title').val(data.title);
//             $("#EditCategoryModal").modal('show');
//         },
//     });
// }
//
// //editCategory
// (function ($) {
//     $(document).ready(function () {
//         function updateCategory() {
//             $.ajax({
//                 url: '{{ route("Update-Category") }}',
//                 type: 'POST',
//                 headers: {
//                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
//                 },
//                 success: function (data) {
//                     console.log(data)
//                 },
//             });
//         }
//     });
// })(jQuery);


