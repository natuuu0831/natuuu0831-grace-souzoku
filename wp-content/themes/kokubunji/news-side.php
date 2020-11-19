<div class="side">
    <dl class="latest">
        <dt>最新の記事</dt>
        <dd>
            <ul>
            <?php
                $newslist = get_posts(array(
                    'posts_per_page' => 5,
                    'post_type' => 'news'
                ));
                foreach ($newslist as $post) :
                setup_postdata($post);
            ?>
                <li><b>・</b><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </dd>
    </dl>
    <dl class="category">
        <dt>カテゴリー</dt>
        <dd>
            <ul>
            <?php
                $terms = get_terms('news_category');
                foreach ( $terms as $term ) :
            ?>
                <li><a href="<?php echo get_term_link($term)?>"><?php echo $term->name ?></a></li>
                <?php endforeach; ?>
            </ul>
        </dd>
    </dl>
    <dl class="archive">
        <dt>アーカイブス</dt>
 
        <dd>
             <ul>
                 <?php
                    $args = array(
                        'type' => 'monthly',
                        'post_type' => 'news', 
                    );
                   wp_get_archives($args);
                ?>
            </ul> 
          
        </dd>
    </dl>
</div>