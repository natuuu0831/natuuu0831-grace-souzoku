<?php
/*
Template Name: 料金
*/
?>
<?php get_header(); ?>

<?php include('head-navi.php'); ?>
<main id="price" class="price">
    <section class="headBlock">
        <div class="inner">
            <h1>料金</h1>
        </div>
    </section>
    <section class="breadcrumb">
        <div class="inner">
            <ul>
                <li>
                    <a href=""><img src="/assets/img/common/home.svg" alt="ホーム"></a>
                </li>
                <li>
                    <a href="" class="disabled">料金</a>
                </li>
            </ul>
        </div>
    </section>

    <h2 class="header-dotted">
        いちばん大切なのは<br><span class="pink">お客様の満足度</span>
    </h2>

    <section class="leadBox">
        <div class="inner">
            <div class="txtArea">
                <p>当事務所では、他の事務所でよくある相続人の人数による加算報酬や、申告期限間近のスピード対応による加算報酬はいただいておりません。お客様に金額の内容をご納得していただいたうえで 実際の手続き業務を行いますのでご安心ください。</p>
                <p><span class="red">私たちがいちばん大切にしている事はお客様の満足度です。</span>多くのお客様から業務内容にも満足いただいております。</p>
                <p>まずは、以下の料金をご参考にご相談ください。また、<span class="highLight">無料でお見積り作成をお引き受けしておりますのでどうぞお気軽にお問い合わせください。</span></p>
            </div>
            <img src="/assets/img/price/img01.jpg" alt="">
        </div>
    </section>

    <section class="detail">
        <div class="inner">
            <dl>
                <dt>主な業務内容</dt>
                <dd>
                    <ul class="numBox">
                        <li>
                            <span class="num">1</span>
                            <p>戸籍収集による相続人の確定</p>
                        </li>
                        <li>
                            <span class="num">2</span>
                            <p>法定相続情報証明の取得代行</p>
                        </li>
                        <li>
                            <span class="num">3</span>
                            <p>財産評価</p>
                        </li>
                        <li>
                            <span class="num">4</span>
                            <p>遺産分割協議書作成</p>
                        </li>
                        <li>
                            <span class="num">5</span>
                            <p>申告書の作成・提出</p>
                        </li>
                        <li>
                            <span class="num">6</span>
                            <p>書面添付制度</p>
                        </li>
                    </ul>
                </dd>
            </dl>
            <dl>
                <dt>基本報酬</dt>
                <dd>
                    <table>
                        <tr>
                            <th>遺産の額</th>
                            <th>料金（報酬）</th>
                        </tr>
                        <tr>
                            <td class="gray">6千万円以下</td>
                            <td>30万円</td>
                        </tr>
                        <tr>
                            <td class="gray">6千万円 ～ 1億円</td>
                            <td>30万円 ～ 50万円</td>
                        </tr>
                        <tr>
                            <td class="gray">1億円 ～ 3億円</td>
                            <td>50万円 ～ 130万円</td>
                        </tr>
                        <tr>
                            <td class="gray">3億円 ～ 5億円</td>
                            <td>130万円 ～ 210万円</td>
                        </tr>
                        <tr>
                            <td class="gray">5億円 ～</td>
                            <td>別途見積</td>
                        </tr>
                    </table>
                </dd>
            </dl>
            <dl>
                <dt>加算報酬</dt>
                <dd>
                    <table>
                        <tr>
                            <th>項目</th>
                            <th>料金（報酬）</th>
                        </tr>
                        <tr>
                            <td class="gray">土地の評価の2区画目以降</td>
                            <td>5万円 / 1区画</td>
                        </tr>
                    </table>
                </dd>
            </dl>
            <dl>
                <dt>別途報酬</dt>
                <dd>
                    <ul class="listBox">
                        <li><b>・</b>所得税準確定申告</li>
                        <li><b>・</b>金融機関における残高証明の取得・相続手続き</li>
                        <li><b>・</b>特別代理人の選任申請手続き</li>
                        <li><b>・</b>非上場株式の評価</li>
                        <li><b>・</b>納税猶予・延納・物納の適用を受ける場合</li>
                        <li><b>・</b>その他特殊な事情により調査・検討が生じる場合</li>
                    </ul>
                </dd>
            </dl>
            <ul class="note">
                <li>※ 遺産の額は、非課税対象額・小規模宅地等の特例・（旧）広大地評価減・債務控除などの適用前の金額となります。</li>
                <li>※ 上記金額は全て税抜き価格です。消費税は別途必要となります。</li>
            </ul>
        </div>
    </section>

    <section class="consultation_common">
        <div class="inner">
            <p>税理士事務所グレイスについて</p>
            <a href="#?" class="btn_pink">事務所案内</a>
        </div>
    </section>
    
         
    <?php include('contact-common.php'); ?>

    </main>


<?php get_footer(); ?>