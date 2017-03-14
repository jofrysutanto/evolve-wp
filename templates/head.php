<!DOCTYPE html>
<!--[if IE 7]>
<html class="no-js ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="no-js ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html class="no-js ie ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) | !(IE 9)  ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php wp_title('|', true, 'right'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="icon" href="<?= TrueLib::getImageURL('favicon.png') ?>">
		<?php wp_head(); ?>
		<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
		<script type="text/javascript">
			window.ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		</script>

		<!--[if IE 8]>
		<script type="text/javascript" src="<?= bloginfo('template_url') ?>/assets/vendor/respond.min.js"></script>
        <![endif]-->
	</head>