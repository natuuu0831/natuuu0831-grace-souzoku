<?php
/*
Template Name: お問い合わせ
*/
?>
<?php get_header(); ?>

<?php include('head-navi.php'); ?>
    <section class="contact">
    <section class="headBlock">
        <div class="inner">
          <h1>お問い合わせ</h1>
        </div>
      </section>
      <section class="breadcrumb">
        <div class="inner">
          <ul>
            <li>
              <a href="/"
                ><img src="assets/img/common/home.svg" alt="ホーム"
              /></a>
            </li>
            <li>
              <a href="" class="disabled">お問い合わせ</a>
            </li>
          </ul>
        </div>
      </section>

      <section class="contactSection">
        <div class="inner">


        
          <p class="lead">
            初回のご相談、お見積りは無料です。お気軽にお問い合わせください。<br />
            メールフォームへのお返事は少々お時間頂く場合もございますので、お急ぎの方はお電話にてお願いいたします。
          </p>
          <div class="phoneWrap">
            <a href="tel:042-316-8566" class="phoneNumber"
              ><img src="./assets/img/contact/icon_phone_red.png" alt="" />
              042-316-8566</a
            >電話受付　平日 9:00 ～ 18:00
          </div>
          <div class="contactForm">
            <dl>
            <?php echo do_shortcode('[contact-form-7 id="44" title="お問い合わせ"]'); ?>
          </div>
        </div>
      </section>
    </main>


<?php get_footer(); ?>