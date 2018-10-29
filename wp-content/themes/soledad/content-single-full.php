<?php
/**
 * Display part top of full width single style
 * Call this file when enable single style 2
 *
 * @since 1.0
 */
?>
<?php if( ! get_theme_mod( 'penci_move_title_bellow' ) ): ?>

	<div class="header-standard header-classic single-header">
		<?php if ( ! get_theme_mod( 'penci_post_cat' ) ) : ?>
			<div class="penci-standard-cat penci-single-cat"><span class="cat"><?php penci_category( '' ); ?></span></div>
		<?php endif; ?>

		<h1 class="post-title single-post-title"><?php the_title(); ?></h1>

		<?php if ( ! get_theme_mod( 'penci_single_meta_author' ) || ! get_theme_mod( 'penci_single_meta_date' ) || ! get_theme_mod( 'penci_single_meta_comment' ) ) : ?>
			<div class="post-box-meta-single">
				<?php if ( ! get_theme_mod( 'penci_single_meta_author' ) ) : ?>
					<span class="author-post"><span><?php echo penci_get_setting('penci_trans_by'); ?> <a class="author-url" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span></span>
				<?php endif; ?>
				<?php if ( ! get_theme_mod( 'penci_single_meta_date' ) ) : ?>
					<span><?php the_time( get_option('date_format') ); ?></span>
				<?php endif; ?>
				<?php if ( ! get_theme_mod( 'penci_single_meta_comment' ) ) : ?>
					<span><?php comments_number( '0 ' . penci_get_setting( 'penci_trans_comment' ), '1 '. penci_get_setting( 'penci_trans_comment' ), '% ' . penci_get_setting( 'penci_trans_comments' ) ); ?></span>
				<?php endif; ?>
				<?php
					// This was for post view plugin
					// $viewsString = strip_tags(pvc_stats_update( get_the_ID(), 0 ));
					// $viewsSplited = explode(" ",$viewsString);
					// $totalViews = explode("&nbsp;",$viewsSplited[1])[0];
					// $todayViews = explode("&nbsp;",$viewsSplited[3])[0];
				?>
				<span>
					<?php //echo $totalViews . " بازدید"; ?>
					<?php
						echo get_post_meta(get_the_ID(), 'penci_post_views_count', true) . " بازدید";
					?>
				</span>
				<?php //echo $todayViews . " بازدید امروز"; ?>
			</div>
		<?php endif; ?>
	</div>

<?php endif; /* End check move title bellow featured image */  ?>

<?php if ( has_post_format( 'link' ) || has_post_format( 'quote' ) ) : ?>
	<div class="standard-post-special post-image<?php if ( has_post_format( 'quote' ) ): ?> penci-special-format-quote<?php endif; ?><?php if ( ! has_post_thumbnail() || get_theme_mod( 'penci_standard_thumbnail' ) ) : echo ' no-thumbnail'; endif; ?>">
		<?php if ( has_post_thumbnail() && ! get_theme_mod( 'penci_standard_thumbnail' ) ) : ?>
			<?php if( ! get_theme_mod( 'penci_disable_lazyload_single' ) ) { ?>
				<img class="attachment-penci-full-thumb size-penci-full-thumb penci-lazy wp-post-image" src="<?php echo get_template_directory_uri() . '/images/penci2-holder.png'; ?>" alt="<?php wp_strip_all_tags( the_title() ); ?>" data-src="<?php echo penci_get_featured_image_size( get_the_ID(),	'penci-full-thumb' ); ?>">
			<?php } else { ?>
				<?php the_post_thumbnail( 'penci-full-thumb' ); ?>
			<?php }?>
		<?php endif; ?>
		<div class="standard-content-special">
			<div class="format-post-box<?php if ( has_post_format( 'quote' ) ) { echo ' penci-format-quote'; } else { echo ' penci-format-link'; } ?>">
				<span class="post-format-icon"><i class="fa fa-<?php if ( has_post_format( 'quote' ) ) { echo 'quote-left'; } else { echo 'link'; } ?>"></i></span>
				<p class="dt-special">
					<?php
					if ( has_post_format( 'quote' ) ) {
						$dt_content = get_post_meta( $post->ID, '_format_quote_source_name', true );
						if ( ! empty( $dt_content ) ): echo sanitize_text_field( $dt_content ); endif;
					}
					else {
						$dt_content = get_post_meta( $post->ID, '_format_link_url', true );
						if ( ! empty( $dt_content ) ):
							echo '<a href="'. esc_url( $dt_content ) .'" target="_blank">'. sanitize_text_field( $dt_content ) .'</a>';
						endif;
					}
					?>
				</p>
				<?php
				if ( has_post_format( 'quote' ) ):
					$quote_author = get_post_meta( $post->ID, '_format_quote_source_url', true );
					if ( ! empty( $quote_author ) ):
						echo '<div class="author-quote"><span>' . sanitize_text_field( $quote_author ) . '</span></div>';
					endif;
				endif; ?>
			</div>
		</div>
	</div>

<?php elseif ( has_post_format( 'gallery' ) ) : ?>

	<?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>

	<?php if ( $images ) : ?>
		<div class="post-image">
			<div class="penci-owl-carousel penci-owl-carousel-slider penci-nav-visible" data-auto="true" data-lazy="true">
				<?php foreach ( $images as $image ) : ?>

					<?php $the_image = wp_get_attachment_image_src( $image, 'penci-full-thumb' ); ?>
					<?php $the_caption = get_post_field( 'post_excerpt', $image ); ?>
					<figure>
						<?php if( ! get_theme_mod( 'penci_disable_lazyload_single' ) ) { ?>
							<img class="owl-lazy" data-src="<?php echo esc_url( $the_image[0] ); ?>"<?php if ($the_caption) : ?>title="<?php echo esc_attr( $the_caption ); ?>"<?php endif; ?> />
						<?php } else { ?>
							<img src="<?php echo esc_url( $the_image[0] ); ?>"<?php if ($the_caption) : ?>title="<?php echo esc_attr( $the_caption ); ?>"<?php endif; ?> />
						<?php }?>
					</figure>

				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>

<?php elseif ( has_post_format( 'video' ) ) : ?>

	<div class="post-image">
		<?php $penci_video = get_post_meta( $post->ID, '_format_video_embed', true ); ?>
		<?php if ( wp_oembed_get( $penci_video ) ) : ?>
			<?php echo wp_oembed_get( $penci_video ); ?>
		<?php else : ?>
			<?php echo $penci_video; ?>
		<?php endif; ?>
	</div>

<?php elseif ( has_post_format( 'audio' ) ) : ?>

	<div class="standard-post-image post-image audio<?php if ( ! has_post_thumbnail() || get_theme_mod( 'penci_post_thumb' ) ) : echo ' no-thumbnail'; endif; ?>">
		<?php if ( has_post_thumbnail() && ! get_theme_mod( 'penci_post_thumb' ) ) : ?>
			<?php if( ! get_theme_mod( 'penci_disable_lazyload_single' ) ) { ?>
				<img class="attachment-penci-full-thumb size-penci-full-thumb penci-lazy wp-post-image" src="<?php echo get_template_directory_uri() . '/images/penci2-holder.png'; ?>" alt="<?php wp_strip_all_tags( the_title() ); ?>" data-src="<?php echo penci_get_featured_image_size( get_the_ID(),	'penci-full-thumb' ); ?>">
			<?php } else { ?>
				<?php the_post_thumbnail( 'penci-full-thumb' ); ?>
			<?php }?>
		<?php endif; ?>
		<div class="audio-iframe">
			<?php $penci_audio = get_post_meta( $post->ID, '_format_audio_embed', true );
			$penci_audio_str = substr( $penci_audio, -4 ); ?>
			<?php if ( wp_oembed_get( $penci_audio ) ) : ?>
				<?php echo wp_oembed_get( $penci_audio ); ?>
			<?php elseif( $penci_audio_str == '.mp3' ) : ?>
				<?php echo do_shortcode('[audio src="'. esc_url( $penci_audio ) .'"]'); ?>
			<?php else : ?>
				<?php echo $penci_audio; ?>
			<?php endif; ?>
		</div>
	</div>

<?php else : ?>

	<?php if ( has_post_thumbnail() ) : ?>
		<?php if ( ! get_theme_mod( 'penci_post_thumb' ) ) : ?>
			<div class="post-image">
				<?php
				if ( ! get_theme_mod( 'penci_disable_lightbox_single' ) ) {
					$thumb_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
					echo '<a href="'. esc_url( $thumb_url ) .'" data-rel="penci-gallery-image-content">';
					?>
					<?php if( ! get_theme_mod( 'penci_disable_lazyload_single' ) ) { ?>
						<img class="attachment-penci-full-thumb size-penci-full-thumb penci-lazy wp-post-image" src="<?php echo get_template_directory_uri() . '/images/penci2-holder.png'; ?>" alt="<?php wp_strip_all_tags( the_title() ); ?>" data-src="<?php echo penci_get_featured_image_size( get_the_ID(),	'penci-full-thumb' ); ?>">
					<?php } else { ?>
						<?php the_post_thumbnail( 'penci-full-thumb' ); ?>
					<?php }?>
					<?php
					echo '</a>';
				} else {
					?>
					<?php if( ! get_theme_mod( 'penci_disable_lazyload_single' ) ) { ?>
						<img class="attachment-penci-full-thumb size-penci-full-thumb penci-lazy wp-post-image" src="<?php echo get_template_directory_uri() . '/images/penci2-holder.png'; ?>" alt="<?php wp_strip_all_tags( the_title() ); ?>" data-src="<?php echo penci_get_featured_image_size( get_the_ID(),	'penci-full-thumb' ); ?>">
					<?php } else { ?>
						<?php the_post_thumbnail( 'penci-full-thumb' ); ?>
					<?php }?>
					<?php
				}
				$get_description_thumb = get_post( get_post_thumbnail_id() )->post_excerpt;
				if ( $get_description_thumb && get_theme_mod( 'penci_post_thumb_caption' ) ) {
					echo '<div class="penci-featured-caption">' . $get_description_thumb . '</div>';
				}
				?>
			</div>
		<?php endif; ?>
	<?php endif; ?>

<?php endif; ?>

<?php if( get_theme_mod( 'penci_move_title_bellow' ) ): ?>

	<div class="header-standard header-classic single-header penci-title-bellow">
		<?php if ( ! get_theme_mod( 'penci_post_cat' ) ) : ?>
			<div class="penci-standard-cat penci-single-cat"><span class="cat"><?php penci_category( '' ); ?></span></div>
		<?php endif; ?>

		<h1 class="post-title single-post-title"><?php the_title(); ?></h1>

		<?php if ( ! get_theme_mod( 'penci_single_meta_author' ) || ! get_theme_mod( 'penci_single_meta_date' ) || ! get_theme_mod( 'penci_single_meta_comment' ) ) : ?>
			<div class="post-box-meta-single">
				<?php if ( ! get_theme_mod( 'penci_single_meta_author' ) ) : ?>
					<span class="author-post"><span><?php echo penci_get_setting('penci_trans_by'); ?> <a class="author-url" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span></span>
				<?php endif; ?>
				<?php if ( ! get_theme_mod( 'penci_single_meta_date' ) ) : ?>
					<span><?php the_time( get_option('date_format') ); ?></span>
				<?php endif; ?>
				<?php if ( ! get_theme_mod( 'penci_single_meta_comment' ) ) : ?>
					<span><?php comments_number( '0 ' . penci_get_setting( 'penci_trans_comment' ), '1 '. penci_get_setting( 'penci_trans_comment' ), '% ' . penci_get_setting( 'penci_trans_comments' ) ); ?></span>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>

<?php endif; /* End check move title bellow featured image */  ?>