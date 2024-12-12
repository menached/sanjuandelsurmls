jQuery(document).ready(function($){
    $('.woocommerce-product-gallery').on('mouseenter', '.flex-control-nav.flex-control-thumbs img', function(){
        var $this = $(this),
            index = $this.closest('li').index();

        $('.woocommerce-product-gallery__wrapper .woocommerce-product-gallery__image:eq('+index+') a').trigger('click');
    });
});
