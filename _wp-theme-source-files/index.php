<?php get_header(); ?>

	<?php 
		// get_template_part("template-parts/page-banner"); 
		$feature_img_id = get_post_thumbnail_id(get_option('page_for_posts'));
		$feature_img   = get_template_directory_uri().'/assets/images/new_blog_banner.jpg';
	?>
	<div class="pg-banner-container blog-banner"> <!-- start banner-container -->
		<?php if($feature_img_id) { echo wp_get_attachment_image($feature_img_id, 'full'); } else { echo "<img src='".$feature_img."' alt=''>"; } ?>
	</div>

	<?php 
		/*
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $query = new WP_Query(array(
            'posts_per_page'   => 5,
            'paged'            => $paged
        ));
		if( $query->have_posts() ) : */
	?>
	<div class="container el-blog-container"><!-- start service-container -->
		<div class="center-content">
			<div class="el-blog-area">
				<?php 
				
				echo do_shortcode('[ajax_load_more post_type="post" posts_per_page="5" scroll="false"]');
				
				
				
				
				/* while( $query->have_posts() ) : $query->the_post();
					$feature = wp_get_attachment_image_src( get_post_thumbnail_id(), 'img_250x250' );
				?>
				<div class="el-blog-row">
					<?php if( $feature[0] ) { ?>
					<div class="el-blog-left">
						<div class="el-blog-img">
							<a href="<?php echo esc_url( get_the_permalink() ); ?>">
								<img src="<?php echo esc_url( $feature[0] ); ?>" alt="" />
							</a>
						</div>
					</div>
					<?php } ?>
					<div class="el-blog-right">
						<div class="el-blog-cont">
							<h2><?php //the_title(); ?></h2>
							<?php the_excerpt(); ?>
							<a class="btn-readmore" href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo _e('Read more ...', 'elgas' ); ?></a>
						</div>
					</div>
				</div>	
				<?php endwhile; wp_reset_postdata(); ?>						
			</div>

			<!-- numeric pagination -->
			<div class="pagination-area"><!-- start pagination-area -->
				<div class="counter-page">
					<small><?php echo "Page ".$paged." of ".$query->max_num_pages; ?></small> 
				</div>

			    <div class="numeric-pagination">
			        <?php
			            echo paginate_links( array(
			                'format'        => 'page/%#%',
			                'current'       => $paged,
			                'total'         => $query->max_num_pages,
			                'mid_size'      => 4,
			                'prev_text'     => __('Prev'),
			                'next_text'     => __('Next')
			            ) );
			        ?>
			    </div> 
			</div><!-- //end .pagination-area -->*/ ?>
			</div>
		</div>
	</div><!-- //end .service-container -->
	<?php //endif; wp_reset_query(); ?>
<?php get_footer(); ?>