<?php
function pagenation( $pages, $paged, $range = 2, $show_only = false ) {

    $pages = ( int ) $pages;    //float型で渡ってくるので明示的に int型 へ
    $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように
  
    //表示テキスト
    $text_first   = "«";
    $text_before  = "«";
    $text_next    = "»";
    $text_last    = "»";
  
    if ( $show_only && $pages === 1 ) {
        // １ページのみで表示設定が true の時
        echo '<ul class="pager"><li class="active">1</li></ul>';
        return;
    }
  
    if ( $pages === 1 ) return;    // １ページのみで表示設定もない場合
  
    if ( 1 !== $pages ) {
        //２ページ以上の時
        echo '<ul class="pager">';
        if ( $paged > $range + 1 ) {
            // 「最初へ」 の表示
            echo '<li><a href="', get_pagenum_link(1) ,'" class="first">', $text_first ,'</a></li>';
        }
        if ( $paged > 1 ) {
            // 「前へ」 の表示
            echo '<li><a href="', get_pagenum_link( $paged - 1 ) ,'" class="prev">', $text_before ,'</a></li>';
        }
        for ( $i = 1; $i <= $pages; $i++ ) {
  
            if ( $i <= $paged + $range && $i >= $paged - $range ) {
                // $paged +- $range 以内であればページ番号を出力
                if ( $paged === $i ) {
                    echo '<li class="active">', $i ,'</li>';
                } else {
                    echo '<li><a href="', get_pagenum_link( $i ) ,'">', $i ,'</a></li>';
                }
            }
        }
        if ( $paged < $pages ) {
            // 「次へ」 の表示
            echo '<li><a href="', get_pagenum_link( $paged + 1 ) ,'" class="next">', $text_next ,'</a></li>';
        }
        if ( $paged + $range < $pages ) {
            // 「最後へ」 の表示
            echo '<li><a href="', get_pagenum_link( $pages ) ,'" class="last">', $text_last ,'</a></li>';
        }
        echo '</ul>';
    }
  }

pagenation( $wp_query->max_num_pages, get_query_var( 'paged' ), 2, true);

wp_reset_postdata();
?>