jQuery(document).ready(function(){
    // handle mailto links
    jQuery.expr[':'].external = function(obj){
        return !obj.href.match(/^mailto\:/) && (obj.hostname !== location.hostname) && !obj.href.match(/^javascript\:/) && !obj.href.match(/^$/);
    };
    jQuery('a:external').attr('target', '_blank');
});
