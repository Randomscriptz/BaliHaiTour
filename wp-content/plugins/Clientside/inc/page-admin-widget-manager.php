<div class="wrap">

	<h1><?php echo $page_info['title']; ?></h1>

	<div class="clientside-page-sidebar clientside-page-sidebar--lower">

		<div class="clientside-widget clientside-widget-empty">
			<input type="submit" class="button-primary clientside-button-action clientside-button-large clientside-button-w100p" data-js-relay=".clientside-admin-widget-save-button" value="<?php _e( 'Save Settings' ); ?>">
			<?php if ( ! is_multisite() || is_super_admin() ) { ?>
				<button class="button-secondary clientside-admin-widget-revert-button clientside-button-large clientside-button-w100p"><?php _e( 'Revert to Defaults', 'clientside' ); ?></button>
			<?php } ?>
		</div>

		<div class="clientside-widget clientside-widget-empty">
			<ul>
				<li><?php _e( 'Index', 'clientside' ); ?></li>
				<?php foreach ( Clientside_Admin_Widget_Manager::get_widget_info() as $page_slug => $widgets ) { ?>
					<li><a href="#clientside-admin-widgets-<?php echo esc_attr( $page_slug ); ?>" data-scrollto><?php echo Clientside_Admin_Widget_Manager::get_page_name( $page_slug ); ?></a></li>
				<?php } ?>
			</ul>
		</div>

		<div class="clientside-widget clientside-widget-bordered">
			<div class="inside">
				<p>
					Note that disabling widgets here completely hides them for all users with the specific role. It also won't be available in the page's Screen Options.
				</p>
				<p>
					Simply reverting these settings or disabling the Clientside plugin will bring everything back.
				</p>
			</div>
		</div>

		<div class="clientside-widget clientside-widget-bordered">
			<div class="inside">
				<p>
					<?php _e( 'For instructions on using this tool, visit the Clientside Documentation pages:', 'clientside' ); ?>
				</p>
				<p>
					<a class="clientside-button-lined clientside-button-large clientside-button-w100p" href="<?php echo Clientside_Pages::get_page_url( 'clientside-documentation' ); ?>"><?php _e( 'Documentation', 'clientside' ); ?></a>
				</p>
			</div>
		</div>

		<a class="clientside-widget clientside-widget-empty clientside-button-lined clientside-button-large clientside-button-w100p" href="<?php echo Clientside_Pages::get_page_url( 'clientside-tools' ); ?>"><?php _e( 'All Clientside Tools', 'clientside' ); ?></a>
	</div>

	<div class="clientside-page-content">

		<?php settings_errors(); ?>

		<form method="post" action="options.php" class="clientside-admin-widget-manager-form">

			<input type="hidden" name="<?php echo Clientside_Options::$options_slug; ?>[<?php echo 'options-page-identification'; ?>]" value="<?php echo $page_info['slug']; ?>">

			<?php // Prepare options ?>
			<?php settings_fields( Clientside_Options::$options_slug ); ?>

			<?php // Show this page's option sections & fields ?>
			<?php do_settings_sections( $page_info['slug'] ); ?>

			<p class="submit">
				<input type="submit" class="button-primary clientside-button-action clientside-admin-widget-save-button" value="<?php _e( 'Save Settings' ); ?>">
				<?php if ( ! is_multisite() || is_super_admin() ) { ?>
					<button class="button-secondary clientside-admin-widget-revert-button"><?php _e( 'Revert to Defaults', 'clientside' ); ?></button>
				<?php } ?>
			</p>

		</form>

	</div>

</div>
