<?php
/*
Template Name: 相続-シミュレーター
*/
?>
<?php get_header(); ?>

<?php include('head-navi.php'); ?>

<main id="simulator">
<section class="headBlock">
        <div class="inner">
          <h1><span class="pink">相続税</span>シミュレーター</h1>
        </div>
      </section>
      <section class="breadcrumb">
        <div class="inner">
          <ul>
            <li>
              <a href="/"
                ><img src="../assets/img/common/home.svg" alt="ホーム"
              /></a>
            </li>
            <li>
              <a href="/souzoku">相続について</a>
            </li>
            <li>
              <a href="" class="disabled">相続税シミュレーター</a>
            </li>
          </ul>
        </div>
      </section>
      <section>
        <div class="inner">
          <p class="lead">
            以下フォームに全て入力いただき「計算する」ボタンを押していただくと、おおよその相続税額の目安を算出することができます。<br />
            ただし、このシミュレーターにおける相続税額が0円であっても、ご自身で申告の要否を判断せずに専門家に相談する事をお勧めします。
          </p>
          <form class="simulatorForm">
            <dl>
              <div class="column flexWrap">
                <dt>財産</dt>
                <dd><input name="input_zaisan" type="text" value="0"/> 万円</dd>
              </div>
              <div class="column flexWrap">
                <dt>債務</dt>
                <dd><input name="input_fusai" type="text" value="0" /> 万円</dd>
              </div>
              <div class="column flexWrap">
                <dt>配偶者</dt>
                <dd>
                  <input
                    id="haigusha1"
                    checked="checked"
                    name="input_haigusha"
                    type="radio"
                    value="1"
                  /><label for="haigusha1"> 有</label>　<input
                    id="haigusha0"
                    name="input_haigusha"
                    type="radio"
                    value="0"
                  /><label for="haigusha0"> 無</label>
                </dd>
              </div>

              <div class="column flexWrap">
                <dt>子供</dt>
                <dd class="select">
                  <select name="input_ko">
                    <option selected="selected" value="">
                      選択してください
                    </option>
                    <option value="0">0人</option>
                    <option value="1">1人</option>
                    <option value="2">2人</option>
                    <option value="3">3人</option>
                    <option value="4">4人</option>
                    <option value="5">5人</option>
                    <option value="6">6人</option>
                    <option value="7">7人</option>
                    <option value="8">8人</option>
                    <option value="9">9人</option>
                  </select>
                </dd>
              </div>
            </dl>
            <button type="button" onclick="souzokuForm(this.form)" class="submitButton">
              <img src="../assets/img/souzoku/simulator/icon_compute.png" alt="">
              <span>計算する</span> 
            </button>
            <div class="result">
              <span>相続税額目安</span> 
              <input
                class="output"
                name="output_souzokuzeigaku"
                type="text"
                disabled="disabled"
              />
              万円
            </div>
            <p class="notice">
              <span>当シミュレーションは、各法定相続人が法定相続分で相続するものとして算出した概算の相続税額を表示します。</span> <br />
              <span>Javascriptを利用しています。ご利用環境における動作の保証は致しかねます。</span><br />
              <span>令和2年1月1日以降の税制に基づき計算しております。</span><br />
              <span>当シミュレーションはあくまで概算税額の算出です。シミュレーション結果を利用したことで生じた不利益や損害等に関しましては、当事務所では責任を負いかねますのでその点ご了承ください。</span>
            </p>
            <div style="display: none">
              <input
                class="output"
                name="output_souzokunin"
                type="hidden"
              /><input
                class="output"
                name="output_zaisan"
                type="hidden"
              /><input class="output" name="output_koujo" type="hidden" /><input
                class="output"
                name="output_kazeigaku"
                type="hidden"
              />

              <input
                class="output"
                name="output_souzokuzeigakukoujyo"
                type="text"
                disabled="disabled"
              />

              <input
                class="output"
                name="output_koujogaku"
                type="text"
                disabled="disabled"
              />

              <input
                class="output"
                name="output_kazeizaisangaku"
                type="text"
                disabled="disabled"
              />

              <input
                class="output"
                name="output_haigushazeigaku"
                type="text"
                disabled="disabled"
              />
              <input
                class="output"
                name="output_kisokoujyo"
                type="text"
                disabled="disabled"
              />

              <input
                class="output"
                name="output_haigushazeigakukoujyo"
                type="text"
                disabled="disabled"
              />

              <input
                class="output"
                name="output_souzokuzeigaku_tekiyou"
                type="text"
                disabled="disabled"
              />
              <input
                class="output"
                name="output_kisokoujyoko"
                type="text"
                disabled="disabled"
              />
            </div>
          </form>
          <p class="buttomText">この税額はあくまで簡易的な試算の算出額です。様々な税制度の活用や相続対策を行うことにより節税をすることもできます。<br>
            より正しい相続税額や相続対策について知りたい方はお気軽にご相談ください。</p>
        </div>
      </section>

      <section id="buttomLinkWrap">
        <div class="inner">
          <p>
            当事務所の分かりやすい料金体系
            <a href="/price" class="button">料金</a>
          </p>
        </div>
      </section>

    
    <?php include('contact-common.php'); ?>

    </main>



<?php get_footer(); ?>