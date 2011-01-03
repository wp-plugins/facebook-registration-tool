<?php
	require('../../../../wp-load.php');
	$options = get_option('fbregister_options');
?>
jQuery(document).ready(function() {
	jQuery('<div>').attr('id', 'fb-root').prependTo(document.body);

	jQuery('p.register').detach();
	jQuery('form#registerform').after(jQuery('<p>').css('padding-top', '10px').html('A password will be e-mailed to you.'));
	var fb_register = jQuery('<fb:registration></fb:registration>').attr('fields', "[{'name':'name'},{'name':'email'},{'name':'username','description':'Username','type':'text'}]");
	fb_register.attr('redirect_uri', '<?php echo plugins_url('/facebook-registration/register.php'); ?>');
	fb_register.attr('width', '530');
	jQuery('form#registerform').after(jQuery(fb_register)).detach();
	
	FB.init({appId:'<?php echo $options['app_id']; ?>',xfbml:true});
});
