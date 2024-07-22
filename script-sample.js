jQuery(function ($) {
    $('.js-posts-load-more').each(function() {
        var $offset = 3;
        $(this).on('click', function(e) {
            e.preventDefault();
            var $this = $(this),
                $wrapper = $this.closest('.js-invert-posts-wrapper'),
                $cat = $this.data('cat'),
                $type = $this.data('type');
            $this.hide();
            $wrapper.find('.invert-loader').show();
            $.ajax({
                url : wpAjax.ajaxUrl,
                data : { 
                    action: 'invert_posts_load_more',
                    cat: $cat,
                    type: $type,
                    offset: $offset
                },
                type : 'post',
                dataType: 'json',
                success : function( result ) {
                    $offset = result.offset;
                    $this.show();
                    $wrapper.find('.invert-loader').hide();
                    $wrapper.find('.js-invert-posts-list').append(result.content);
                    if (result.offset >= result.total) {
                        $wrapper.find('.js-posts-load-more-wrapper').hide();
                    } else {
                        $wrapper.find('.js-posts-load-more-wrapper').show();
                    }
                }
            });
        });
    });
});