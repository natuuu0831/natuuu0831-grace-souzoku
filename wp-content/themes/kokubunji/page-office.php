<?php
/*
Template Name: 事務所案内
*/
?>
<?php get_header(); ?>
<script>
$(function() {
    $('#gallery').photoSwipe();
})
</script>
<?php include('head-navi.php'); ?>

<main id="office" class="office">
  <section class="headBlock">
    <div class="inner">
      <h1><span class="pink">事務所</span>案内</h1>
    </div>
  </section>
  <section class="breadcrumb">
    <div class="inner">
      <ul>
        <li>
          <a href="/"><img src="/assets/img/common/home.svg" alt="ホーム"></a>
        </li>
        <li>
          <a href="" class="disabled">事務所案内</a>
        </li>
        <li>
          <a href="" class="disabled">事務所案内</a>
        </li>
      </ul>
    </div>
  </section>

  <h2 class="header-dotted">
    事務所概要
  </h2>

  <section class="detail">
    <div class="inner">
      <table>
        <tr>
          <th>事務所名</th>
          <td>税理士事務所 グレイス</td>
        </tr>
        <tr>
          <th>代表者</th>
          <td>税理士　松井 達也</td>
        </tr>
        <tr>
          <th>設立</th>
          <td>2015年10月</td>
        </tr>
        <tr>
          <th>所在地</th>
          <td>〒185-0012　東京都国分寺市本町3-11-17 ビルドシティプラザ4F</td>
        </tr>
        <tr>
          <th>アクセス</th>
          <td>JR中央線「国分寺駅」北口から徒歩3分</td>
        </tr>
        <tr>
          <th>連絡先</th>
          <td>
            <p>TEL :<a href="tel:042-316-8566">042-316-8566</a></p>
            <p>TEL :<a href="tel:042-316-8587">042-316-8587</a></p>
            <p>メール：<a href="mailto:info@grace-souzoku.jp" class="mail">info@grace-souzoku.jp</a></p>
          </td>
        </tr>
        <tr>
          <th>営業時間</th>
          <td>
            <p>月曜～金曜：9:00～18:00</p>
            <p>※予約していただければ時間外や土日祝日でもご相談可能です。</p>
          </td>
        </tr>
        <tr>
          <th>定休日</th>
          <td>
            土曜・日曜・祝日
          </td>
        </tr>
      </table>
    </div>
  </section>

  <section id="access" class="access">
    <div class="inner">
      <h2 class="header-dotted">
        アクセス
      </h2>
      <div class="mapWrap">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12959.800261247443!2d139.4809039!3d35.7028464!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd032bd15fc1342f8!2z56iO55CG5aOr5LqL5YuZ5omAIOOCsOODrOOCpOOCuQ!5e0!3m2!1sja!2sjp!4v1605681550623!5m2!1sja!2sjp"
          width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
          tabindex="0"></iframe>
      </div>
      <p>〒185-0012　東京都国分寺市本町3-11-17 ビルドシティプラザ4F</p>
      <p>JR中央線「国分寺駅」北口から駅前通りを北に真っすぐ歩いて3分。<br>
        本町二丁目交差点先の焼肉店「牛繁」横の階段を上がり、2階エレベーターから上がった4階フロア。</p>
      <a href="https://www.google.com/maps/place/%E7%A8%8E%E7%90%86%E5%A3%AB%E4%BA%8B%E5%8B%99%E6%89%80+%E3%82%B0%E3%83%AC%E3%82%A4%E3%82%B9/@35.7028464,139.4809039,15z/data=!4m5!3m4!1s0x0:0xd032bd15fc1342f8!8m2!3d35.7028464!4d139.4809039"
        target="_blank" class="btn_pink">Google Map</a>
    </div>
  </section>

  <section class="officeImg">
    <div class="inner">
      <h2 class="header-dotted">
        事務所内写真
      </h2>
      <ul id="gallery">
        <li>
          <figure>
            <a href="/assets/img/office/img01@2x.jpg" class="swipe" rel="group1">
              <img src="/assets/img/office/img01@2x.jpg" alt="エントランス">

              <figcaption>エントランス</figcaption>
            </a>
          </figure>
        </li>
        <li>
          <figure>
            <img src="/assets/img/office/img02@2x.jpg" alt="エントランス側" data-original-src="/assets/img/office/img01@2x.jpg"
              data-original-src-width="810" data-original-src-height="540" alt="エントランス">
            <figcaption>エントランス側</figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="/assets/img/office/img03@2x.jpg" alt="打ち合わせスペース"
              data-original-src="/assets/img/office/img01@2x.jpg" data-original-src-width="810"
              data-original-src-height="540" alt="エントランス">
            <figcaption>打ち合わせスペース</figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="/assets/img/office/img04@2x.jpg" alt="応接室" data-original-src="/assets/img/office/img01@2x.jpg"
              data-original-src-width="810" data-original-src-height="540" alt="エントランス">
            <figcaption>応接室</figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="/assets/img/office/img05@2x.jpg" alt="執務室" data-original-src="/assets/img/office/img01@2x.jpg"
              data-original-src-width="810" data-original-src-height="540" alt="エントランス">
            <figcaption>執務室</figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="/assets/img/office/img06@2x.jpg" alt="国分寺駅北口" data-original-src="/assets/img/office/img01@2x.jpg"
              data-original-src-width="810" data-original-src-height="540" alt="エントランス">
            <figcaption>国分寺駅北口</figcaption>
          </figure>
        </li>
      </ul>
    </div>
  </section>

  <section class="consultation_common">
    <div class="inner">
      <p>こんなスタッフが対応します</p>
      <a href="/office/staff" class="btn_pink">スタッフ紹介</a>
    </div>
  </section>

  <?php include('contact-common.php'); ?>

</main>
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="pswp__bg"></div>
  <div class="pswp__scroll-wrap">
    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>
    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
        <div class="pswp__counter"></div>
        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
        <button class="pswp__button pswp__button--share" title="Share"></button>
        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
        <div class="pswp__share-tooltip"></div>
      </div>
      <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
      <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
      <div class="pswp__caption">
        <div class="pswp__caption__center"></div>
      </div>
    </div>
  </div>
</div>


<?php get_footer(); ?>