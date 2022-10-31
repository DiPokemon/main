let currentPage = 1;
$('#load-more').on('click', function () {
    currentPage++; // Do currentPage + 1, because we want to load the next page

    $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        dataType: 'json',
        data: {
            action: 'load_more',
            paged: currentPage,
        },
        success: function (res) {
            if (paged >= res.max) {
                $('#load-more').hide();
            };
            $('.blog-block__grid').append(res.html);
        }
    });
});