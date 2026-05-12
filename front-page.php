<?php get_header(); ?>
<main>
    <div class="main d-flex">
        <div class="left_sibar">
            <?php $terms = get_terms( array(
            'taxonomy' => 'code-cate',
            'hide_empty' => false, 
        ) );

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            echo '<ul class="ul-menu-list"><li><a href="'.esc_url( get_permalink(13) ).'">すべて</a></li>';
            $i="0";
            $active="";
            foreach ( $terms as $term ) {
                $i++;
                if($i==1){
                    $active="active";
                }else{
                    $active="";
                }
                echo '<li><a href="'.get_term_link( $term ) .'" class="'.$active.'">' . $term->name . '</a>'; 
                $args           = array(
                    'post_status'    => 'publish',
                    'post_type'      => 'code-list',
                    'orderby'        => 'DATE',
                    'order'          => 'DESC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'code-cate',
                            'field'    => 'term_id',
                            'terms'    => $term->term_id,
                        ),
                    ),
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) :
                    echo '<ul>';
                    while ($query->have_posts()) : $query->the_post();
                        echo '<li><a href="">'.get_the_title().'</a></li>';
                    endwhile;
                    echo '</ul>';
                endif;
                echo '</li>';
            }
            echo '</ul>';
        }?>

            <?php 
            /*wp_nav_menu( array(
                'theme_location'  => 'header-top',
                'menu'            => 'Menu left',
                'container'      => 'nav',           // Thẻ bao quanh menu (thường là <nav>)
                'container_class'=> 'main-navigation',// Class của thẻ bao quanh
                'menu_class'     => 'ul-menu-list',  // Class của thẻ <ul> bên trong
            ) ); */?>
           
        </div>
        <div class="main_content">
            <ul class="breadcrumb">
                <li><span class="item">Text</span></li>
                <li><span class="item">Text mẫu</span></li>
            </ul>
            <div class="tabs-container">
                <div class="tabs-header">
                    <ul class="menu_list__head d-flex">
                        <li><a data-id="tab_1" href="#">Source</a></li>
                        <li><a data-id="tab_2" href="#">HTML</a></li>
                        <li><a data-id="tab_3" href="#">CSS</a></li>
                        <li><button id="btn-copy" class="btn-copy">Copy</button></li>
                    </ul>
                    
                </div>
                <div class="tabs-content">
                    <div id="tab_1" class="item active">
                        <p>@include setting_text(#FFF, 3rem, 400, 150%, 0);</p>
                    </div>
                    <div id="tab_2" class="item"></div>
                    <div id="tab_3" class="item">
                        <p>@mixin setting_text($cl, $fz, $fw, $lh, $lp) {<br>
                        color: $cl;<br>
                        font-size: $fz;<br>
                        font-weight: $fw;<br>
                        line-height: $lh;<br>
                        letter-spacing: $lp;<br>
                    }</p>
                    </div>
                </div>
               
            </div>
            

@mixin before($w, $h) {
    content: "";
    position: absolute;
    width: $w;
    height: $h;
}
        </div>
    </div>
</main>
<?php get_footer(); ?>
