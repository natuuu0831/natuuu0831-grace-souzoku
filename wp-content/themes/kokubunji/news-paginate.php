<div class="pager">
    <?php
    // ページャ用に現在ページを取得
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => get_post_type(),
        'paged' => $paged // 現在のページ数をセット
    );

    $arc_query = new WP_Query($args);

    $posts = get_posts( $args );

    if ( $posts ) :
        foreach ( $posts as $post ) :
            setup_postdata( $post );
    ?>
        <!-- タイトル、リンクなどの表示処理 -->
    <?php
            // ループ終了
            endforeach;
        endif;

        // ページャ用設定
        global $wp_rewrite;
        $paginate_base = get_pagenum_link(1);
        if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
            $paginate_format = '';
            $paginate_base = add_query_arg('paged','%#%');
        }
        else{
            $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') . user_trailingslashit('page/%#%/','paged');
            $paginate_base .= '%_%';
        }
        // ページャを出力する
        echo paginate_links(array(
            'base' => $paginate_base,
            'format' => $paginate_format,
            'total' => $arc_query->max_num_pages, // トータルのページ数をセット
            'mid_size' => 1,
            'current' => ($paged ? $paged : 1), // 現在のページ数をセット
            'prev_text' => '«',
            'next_text' => '»',
            )
        );
    ?>
</div>