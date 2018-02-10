<div class="machete-module-wrap"><div class="machete-module <?php echo $slug.'-module' ?> module-is-<?php echo $args['is_active'] ? 'active' : 'inactive' ?>">
				
				<?php if ($args['is_active'] && $args['has_config']) { ?>

					<a class="machete-module-image"
						href="<?php echo admin_url('admin.php?page=machete-'.$slug) ?>"
						title="<?php echo __('Configure','machete').' '.$args['full_title'] ?>">
						<img src="<?php echo MACHETE_BASE_URL .'inc/'. $slug ?>/banner.svg">
					</a>

				<?php } else { ?>

					<span class="machete-module-image" title="<?php echo $args['full_title'] ?>">
						<img src="<?php echo MACHETE_BASE_URL . 'inc/' . $slug ?>/banner.svg">
					</span>

				<?php } ?>

				<div class="machete-module-text">
					<?php if ($args['has_config']) { ?>
						<h3><a href="<?php echo admin_url('admin.php?page=machete-'.$slug) ?>"
						title="<?php echo __('Configure','machete').' '.$args['full_title'] ?>"><?php echo $args['full_title'] ?></a></h3>

					<?php } else { ?>
						<h3><?php echo $args['full_title'] ?></h3>

					<?php } ?>

					<div class="machete-module-description">
						<?php echo $args['description'] ?>
					</div>
					<?php if ($args['is_active']){ ?><div class="machete-module-active-indicator"><?php _e('Active','machete') ?></div><?php } ?>

				</div>
				<div class="machete-module-bottom">
					<div class="machete-module-toggle-active">
					<?php 

					$action_url = wp_nonce_url( admin_url( "admin.php?page=machete&amp;module=" . $slug), 'machete_action_' . $slug );

					if ('powertools' == $slug) { 

						$machete_powertools_path = 'machete-powertools/machete-powertools.php';

						if ($args['is_active']) {

							$machete_powertools_deactivation_url = wp_nonce_url(admin_url('plugins.php?action=deactivate&plugin='.$machete_powertools_path), 'deactivate-plugin_'.$machete_powertools_path);
							?>

							<a href="<?php echo $machete_powertools_deactivation_url ?>" class="button-secondary" data-status="1"><?php _e('Deactivate Plugin','machete') ?></a>

							<a href="<?php echo admin_url('admin.php?page=machete-'.$slug) ?>"
						title="<?php echo __('Configure','machete').' '.$args['full_title'] ?>" class="button-secondary" data-status="0"><?php _e('Settings','machete') ?></a>
						<?php } elseif (file_exists(WP_PLUGIN_DIR.'/'.$machete_powertools_path)) { 

							
							$machete_powertools_activation_url = wp_nonce_url(admin_url('plugins.php?action=activate&plugin='.$machete_powertools_path), 'activate-plugin_'.$machete_powertools_path);

							?>

							<a href="<?php echo $machete_powertools_activation_url ?>" class="button-primary" data-status="1"><?php _e('Activate Plugin','machete') ?></a>

						<?php } else { ?>
							<a href="https://machetewp.com/powertools/" class="button-primary" data-status="1"><?php _e('Download Machete PowerTools','machete') ?></a>

						<?php } ?>


					<?php } else if ($args['is_active']) { ?>

						<?php if ($args['can_be_disabled']) { ?>
						<a href="<?php echo $action_url.'&amp;machete-action=deactivate' ?>" class="button-secondary" data-status="0"><?php _e('Deactivate','machete') ?></a>
						<?php } ?>

						<?php if ($args['has_config']) { ?>
						<a href="<?php echo admin_url('admin.php?page=machete-'.$slug) ?>"
						title="<?php echo __('Configure','machete').' '.$args['full_title'] ?>" class="button-secondary" data-status="0"><?php _e('Settings','machete') ?></a>
						<?php } ?>

					<?php } else { ?>

						<a href="<?php echo $action_url.'&amp;machete-action=activate' ?>" class="button-secondary" data-status="1"><?php _e('Activate','machete') ?></a>

					<?php } ?>
					</div>

				</div>


			</div></div>