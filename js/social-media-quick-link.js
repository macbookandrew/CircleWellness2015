jQuery(document).ready(function(){
    jQuery('.home-quick-link a[href*="contact-us"]').on('click', false).addClass('quick-link-social hidden');
    jQuery('.home-quick-link a[href*="contact-us"]').parent().append('<a href="https://www.facebook.com/CircleWellness" class="quick-link-social facebook"></a><a href="https://twitter.com/well4you" class="quick-link-social twitter"></a>').addClass('quick-link-social-container');
});
