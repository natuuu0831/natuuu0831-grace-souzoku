<?php get_header(); ?>

<?php include('head-navi.php'); ?>
<main id="news" class="news">
    <section class="headBlock">
        <div class="inner">
            <h1>お知らせ</h1>
        </div>
    </section>
    <section class="breadcrumb">
        <div class="inner">
            <ul>
                <li>
                    <a href=""><img src="/assets/img/common/home.svg" alt="ホーム"></a>
                </li>
                <li>
                    <a href="" class="disabled">お知らせ</a>
                </li>
            </ul>
        </div>
    </section>
    <section class="list">
        <div class="inner">
            <div class="newsArea">
                <ul class="ttlList">
                <?php
                    $newslist = get_posts(array(
                        'posts_per_page' => 3,
                        'post_type' => 'news'
                    ));
                    foreach ($newslist as $post) :
                        setup_postdata($post);
                ?>
                    <li>
                        <dl>
                            <dt>
                                <span class="date"><?php the_time('Y年m月'); ?></span>
                                <span class="tag pink">
                                <?php
                                    if ($terms = get_the_terms($post->ID, 'news_category')) {
                                        foreach ($terms as $term) {
                                            echo esc_html($term->name);
                                        }
                                    }
                                 ?>
                                </span>
                            </dt>
                            <dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
                        </dl>
                    </li>
                <?php endforeach; ?>
                </ul>

                <?php include('news-paginate.php'); ?>
            </div>
            <?php include('news-side.php'); ?>
        </div>
    </section>


    
    <?php include('contact-common.php'); ?>

    </main>



<?php get_footer(); ?>