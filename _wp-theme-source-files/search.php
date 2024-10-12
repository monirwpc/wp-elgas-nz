<?php get_header(); ?>
	<div class="container article-page-container search-page">
		<div class="center-content">
			<div class="article-page entry-content">
				<?php 
					global $wp_query;		
					echo '<p class="search-result">Total: <span class="badge">'.$wp_query->found_posts.'</span> results found.</p>';
					$s= get_search_query();
					$query = new WP_Query(array(
						'post_type'      => array('post', 'page'),
						's'              => $s,
						'posts_per_page' => -1
					));
					$i = 0;
					if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); $i++; ?>
						<div class="search-item">
							<h4><?php echo $i.'. '; ?><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo the_title(); ?></a></h4>
							<?php the_excerpt(); ?>
							<dd class="result-created">Created on <strong><?php echo get_the_date( 'F d, Y' ); ?></strong></dd>
						</div>
						<?php
					endwhile; else :
						get_search_form();
					endif; wp_reset_query();
				?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>