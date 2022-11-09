let currentPage = 1;
document.getElementById('load-more').addEventListener('click', function(e){ 
   e.preventDefault();
});
$('#load-more').on('click', function () {
    currentPage++; // Do currentPage + 1, because we want to load the next page

    $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        dataType: 'html',
        data: {
            action: 'load_more',
            paged: currentPage,
        },
        success: function (res) {
            $('.blog-block__grid').append(res);
        }
    });
});

