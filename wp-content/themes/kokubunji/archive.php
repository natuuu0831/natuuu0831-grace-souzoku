<?php
/*
Template Name: ニュース
*/
?>
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
                    <a href="/"><img src="/assets/img/common/home.svg" alt="ホーム"></a>
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
                    <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <li>
                        <dl>
                            <a href="<?php the_permalink(); ?>">
                                <dt>
                                    <span class="date"><?php the_time('Y.m.d'); ?></span>
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
                                <dd><?php the_title(); ?></dd>
                            </a>
                        </dl>
                    </li>
                    <?php endwhile;?>
                    <?php endif;?>
                </ul>

                <?php include('news-paginate.php'); ?>
            </div>
            <?php include('news-side.php'); ?>
        </div>
    </section>


    
    <?php include('contact-common.php'); ?>

    </main>



<?php get_footer(); ?>