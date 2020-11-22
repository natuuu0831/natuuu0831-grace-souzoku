<?php
/*
Template Name: 相続TOP
*/
?>
<?php get_header(); ?>

<?php include('head-navi.php'); ?>

<main id="souzoku">
    <section class="headBlock">
        <div class="inner">
            <h1><span class="pink">相続</span>について</h1>
        </div>
    </section>
    <section class="breadcrumb">
        <div class="inner">
            <ul>
                <li>
                    <a href=""><img src="../assets/img/common/home.svg" alt="ホーム"></a>
                </li>
                <li>
                    <a href="" class="disabled">相続について</a>
                </li>
            </ul>
        </div>
    </section>

    <section>
        <div class="inner">
            <ul class="flexWrap souzokuMenuList">
                <li class="souzokuMenuList__item">
                  <a href="/souzoku/seizen.html">
                    <div class="radiusImgBox">
                      <img src="../assets/img/souzoku/img01.jpg" alt="">
                    </div>
                    <dl>
                        <dt>生前対策</dt>
                        <dd>生前対策を行うことにより、不安や悩みの解消、相続税の把握、相続税の節税、納税資金の確保などを行うことが出来ます。</dd>
                    </dl>
                    <a href="/souzoku/seizen.html" class="button">詳しく見る</a>
                  </a> 
                </li>
                <li class="souzokuMenuList__item">
                  <a href="/souzoku/shinkoku.html">
                    <div class="radiusImgBox">
                      <img src="../assets/img/souzoku/img02.jpg" alt="">
                    </div>
                    <dl>
                        <dt>相続税申告</dt>
                        <dd>相続発生後の節税対策は生前対策に比べると限られてきますが、その上でご提案差し上げながら相続税申告をサポートいたします。</dd>
                    </dl>
                    <a href="/souzoku/shinkoku.html" class="button">詳しく見る</a>
                  </a>
                </li>
                <li class="souzokuMenuList__item">
                  <a href="/souzoku/flow.html">
                    <div class="radiusImgBox">
                      <img src="../assets/img/souzoku/img03.jpg" alt="">
                    </div>
                    <dl>
                        <dt>申告手続きの流れ</dt>
                        <dd>主な遺産相続の申告手続きの流れをご紹介します。申告手続にはそれぞれ決められた期限がありますので、手続きはできるだけ早めに進めることが肝心です。</dd>
                    </dl>
                    <a href="/souzoku/flow.html" class="button">詳しく見る</a>
                  </a>
                </li>
                <li class="souzokuMenuList__item">
                  <a href="/souzoku/simulator.html">
                    <div class="radiusImgBox">
                      <img src="../assets/img/souzoku/img04.jpg" alt="">
                    </div>
                    <dl>
                        <dt>相続税シミュレーター</dt>
                        <dd>相続税をいくら納める必要があるのか？現在の財産額などを入力して、簡易的に相続税額を割り出すことができるシミュレーターです。</dd>
                    </dl>
                    <a href="/souzoku/simulator.html" class="button">詳しく見る</a>
                  </a>
                </li>
            </ul>
        </div>
    </section>
    
    <?php include('contact-common.php'); ?>

    </main>



<?php get_footer(); ?>