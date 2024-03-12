jQuery(document).ready(function($){
    $(document).bind('input propertychange','.elementor-control-lian_custom_css textarea', function(){
        let val = $(this).val();
        $('<style type="text/css">'+val+'</style>').appendTo($('head'));
    });
});