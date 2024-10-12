<div class="search-form">
    <form action="<?php echo home_url( '/' ); ?>" role="search" method="get" id="searchform">
        <input type="search" placeholder="<?php echo esc_attr_x( 'Search Elgas...', 'placeholder', 'elgas' ); ?>" value="<?php echo get_search_query(); ?>" name="s" id="s" />
        <input type="submit" value="<?php echo esc_attr_x( 'GO', 'submit button', 'elgas' ); ?>" />
    </form>
</div>