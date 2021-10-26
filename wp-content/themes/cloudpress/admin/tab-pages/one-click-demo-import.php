<div id="one_click_demo" class="cloudpress-tab-pane panel-close">
    <?php 
	$cloudpress_actions = $this->recommended_actions;
	$cloudpress_actions_todo = get_option( 'recommended_actions', false );
	$cloudpress_spicebox = $cloudpress_actions[0];
	?>
	<div class="action-list">
		<?php if($cloudpress_spicebox):?>
		<div class="action" id="">
			<div class="action-watch">
			<?php if(!$cloudpress_spicebox['is_done']): ?>
				<?php if(!isset($cloudpress_actions_todo[$cloudpress_spicebox['id']]) || !$cloudpress_actions_todo[$cloudpress_spicebox['id']]): ?>
					<span class="dashicons dashicons-visibility"></span>
				<?php else: ?>
					<span class="dashicons dashicons-hidden"></span>
				<?php endif; ?>
			<?php else: ?>
				<span class="dashicons dashicons-yes"></span>
			<?php endif; ?>
			</div>
			<div class="action-inner">
				<h3 class="action-title"><?php echo esc_html($cloudpress_spicebox['title']); ?></h3>
				<div class="action-desc"><?php echo esc_html($cloudpress_spicebox['desc']); ?></div>
				<?php echo wp_kses_post($cloudpress_spicebox['link']); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>