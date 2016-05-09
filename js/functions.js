(function($){
    $(document).ready(function(){
        // handle mailto links
        $.expr[':'].external = function(obj){
            return !obj.href.match(/^mailto\:/) && (obj.hostname !== location.hostname) && !obj.href.match(/^javascript\:/) && !obj.href.match(/^$/);
        };
        $('a:external').attr('target', '_blank');
    });
})(jQuery);
