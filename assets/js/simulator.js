function checkform(form) {
	if (form.input_zaisan.value == null || form.input_zaisan.value.length==0) {
	alert("\n財産額をご入力下さい。（単位：万円）");
	return false;
	}
	else if (form.input_ko.value.length==0) {
	alert("\n子の数をご選択下さい。（単位：人）");
	}
	else if (form.input_ko.value == 0 && document.getElementById("haigusha0").checked) {
	alert("\n法定相続人は1人以上設定してください。");
	form.output_zaisan.value = Math.ceil(0);
	return false;
	}
	return true;
}

/**
 * 全角を半角に変換するメソッド
 */
function zen2han(str){
	return str.replace(/[０-ｚ]/g,function($0){
		return String.fromCharCode(parseInt($0.charCodeAt(0))-65248);
	});
}

function souzokuForm(form) {
	if (checkform(form)) {

		/**
	 	* 弊所実装箇所
	 	*/
		// 財産・債務の入力値に全角文字があった場合、半角文字に変換
		input_zaisan_hankaku = zen2han(form.input_zaisan.value);
		input_fuasai_hankaku = zen2han(form.input_fusai.value);

		// 入力文字列からカンマを除外
		input_zaisan_omit_comma = input_zaisan_hankaku.replace(/,/g, "");
		input_fusai_omit_comma = input_fuasai_hankaku.replace(/,/g, "");

		// 財産入力文字列チェック
		for(var i=0; i < input_zaisan_omit_comma.length; i++){
			if(!(input_zaisan_omit_comma.charAt(i).charCodeAt(0) >= 48 && input_zaisan_omit_comma.charAt(i).charCodeAt(0) <= 57)){
				alert("半角数字（0～9）とカンマ（,）以外は入力しないでください。");
				form.output_souzokuzeigaku.value = "";
				javascript_die();
			}
		}

		// 負債入力文字列チェック
		for(var i=0; i < input_fusai_omit_comma.length; i++){
			if(!(input_fusai_omit_comma.charAt(i).charCodeAt(0) >= 48 && input_fusai_omit_comma.charAt(i).charCodeAt(0) <= 57)){
				alert("半角数字（0～9）とカンマ（,）以外は入力しないでください。");
				form.output_souzokuzeigaku.value = "";
				javascript_die();
			}
		}

		if (input_fusai_omit_comma == null || input_fusai_omit_comma.length==0) { // 負債入力なしの場合
			input_fusai = 0; // 負債＝0
		} else {
			input_fusai = parseFloat(input_fusai_omit_comma); // 負債＝入力値
		}

		input_zaisan = parseFloat(input_zaisan_omit_comma); // 財産
		input_haigusha = document.getElementById("haigusha1").checked; // 配偶者あり
		input_haigushaNg = document.getElementById("haigusha0").checked; // 配偶者なし
		input_ko = parseFloat(form.input_ko.value); // 子供人数

		input_zaisan_str_replace = String(input_zaisan).replace(/(\d)(?=(\d{3})+$)/g , '$1,'); // 財産書式置き換え
		input_fusai_str_replace = String(input_fusai).replace(/(\d)(?=(\d{3})+$)/g , '$1,'); // 負債書式置き換え

		form.input_zaisan.value = input_zaisan_str_replace; // 財産（カンマ挿入）
		form.input_fusai.value = input_fusai_str_replace; // 負債（カンマ挿入）

		form.output_zaisan.value = Math.ceil(input_zaisan - input_fusai); // 財産－負債

		if(input_haigusha){
			form.output_souzokunin.value = Math.ceil(input_ko + 1); // 配偶者＋子供
		}else if(input_haigushaNg){
			form.output_souzokunin.value = Math.ceil(input_ko); // 子供
		}

		souzokunin = Math.ceil(form.output_souzokunin.value); // 相続人の数
		form.output_koujo.value = Math.ceil(3000 + 600 * souzokunin); // 控除額

		zaisan = Math.ceil(form.output_zaisan.value); // 財産総額
		koujo = Math.ceil(form.output_koujo.value); // 基礎控除額
		kazeigaku_div2 = Math.ceil(zaisan - koujo); // 課税財産額

		if (kazeigaku_div2 <= 0) { // 課税財産が0以下の場合
			form.output_kazeigaku.value = Math.ceil(0); // 課税財産＝0
		}
		else if (kazeigaku_div2 > 0) { // 課税財産が1以上の場合
			form.output_kazeigaku.value = Math.ceil(kazeigaku_div2); // 課税財産＝課税財産額
		}

		kazeigaku = Math.ceil(form.output_kazeigaku.value); // 課税財産
		kazeigaku_haigusha = Math.ceil(kazeigaku / 2); // 課税財産÷2（配偶者）
		kazeigaku_haigushako = Math.ceil(kazeigaku / 2 / input_ko); // 課税財産÷2÷子の数（配偶者＋子）
		kazeigaku_divall = Math.ceil(kazeigaku / input_ko); // 課税財産÷子の数

		if ( input_ko >= 0 )  {
			form.output_koujogaku.value = koujo;
			form.output_kazeizaisangaku.value = kazeigaku;
		}

		if ( input_haigusha && input_ko == 0 )  {			
			if ( kazeigaku > 60000) {
				form.output_haigushazeigaku.value = Math.ceil(kazeigaku * 0.55 - 7200);
				form.output_kisokoujyo.value = "※税率55%、控除7200万円" ;
			}
			else if ( kazeigaku > 30000 && kazeigaku <= 60000) {
				form.output_haigushazeigaku.value = Math.ceil(kazeigaku * 0.50 - 4200);
				form.output_kisokoujyo.value = "※税率50%、控除4200万円" ;
			}
			else if ( kazeigaku > 20000 && kazeigaku <= 30000) {
				form.output_haigushazeigaku.value = Math.ceil(kazeigaku * 0.45 - 2700);
				form.output_kisokoujyo.value = "※税率45%、控除2700万円" ;
			}
			else if ( kazeigaku > 10000 && kazeigaku <= 20000) {
				form.output_haigushazeigaku.value = Math.ceil(kazeigaku * 0.40 - 1700);
				form.output_kisokoujyo.value = "※税率40%、控除1700万円" ;
			}
			else if ( kazeigaku > 5000 && kazeigaku <= 10000) {
				form.output_haigushazeigaku.value = Math.ceil(kazeigaku * 0.30 - 700);
				form.output_kisokoujyo.value = "※税率30%、控除700万円" ;
			}
			else if ( kazeigaku > 3000 && kazeigaku <= 5000) {
				form.output_haigushazeigaku.value = Math.ceil(kazeigaku * 0.20 - 200);
				form.output_kisokoujyo.value = "※税率20%、控除200万円" ;
			}
			else if ( kazeigaku > 1000 && kazeigaku <= 3000) {
				form.output_haigushazeigaku.value = Math.ceil(kazeigaku * 0.15 - 50);
				form.output_kisokoujyo.value = "※税率15%、控除50万円" ;
			}
			else if ( kazeigaku > 0 && kazeigaku <= 1000) {
				form.output_haigushazeigaku.value = Math.ceil(kazeigaku * 0.10);
				form.output_kisokoujyo.value = "※税率10%、控除0円" ;
			}
			else {
				form.output_haigushazeigaku.value = Math.ceil(0);
			}
			
			if (form.output_haigushazeigaku.value <= 16000) {
				form.output_haigushazeigakukoujyo.value = Math.ceil(0);
				form.output_souzokuzeigaku.value = form.output_haigushazeigaku.value;
				form.output_souzokuzeigakukoujyo.value = form.output_haigushazeigakukoujyo.value;
				form.output_souzokuzeigaku_tekiyou.value = "－" ;
				form.output_kisokoujyoko.value = "－";

			} else {
				form.output_haigushazeigakukoujyo.value = "要確認" ;
				form.output_souzokuzeigaku.value = form.output_haigushazeigaku.value;
				form.output_souzokuzeigaku_tekiyou.value = "要確認" ;
			}
		}
		else if ( input_haigusha && input_ko > 0 )  {
			if (kazeigaku_haigusha > 60000) {
				form.output_haigushazeigaku.value = Math.ceil(kazeigaku_haigusha * 0.55 - 7200);
				form.output_kisokoujyo.value = "税率55%、控除7200万円" ;
			}
			else if ( kazeigaku_haigusha > 30000 && kazeigaku_haigusha <= 60000) {
				form.output_haigushazeigaku.value = Math.ceil(kazeigaku_haigusha * 0.50 - 4200);
				form.output_kisokoujyo.value = "税率50%、控除4200万円" ;
			}
			else if ( kazeigaku_haigusha > 20000 && kazeigaku_haigusha <= 30000) {
				form.output_haigushazeigaku.value = Math.ceil(kazeigaku_haigusha * 0.45 - 2700);
				form.output_kisokoujyo.value = "税率45%、控除2700万円" ;
			}
			else if ( kazeigaku_haigusha > 10000 && kazeigaku_haigusha <= 20000) {
				form.output_haigushazeigaku.value = Math.ceil(kazeigaku_haigusha * 0.40 - 1700);
				form.output_kisokoujyo.value = "税率40%、控除1700万円" ;
			}
			else if ( kazeigaku_haigusha > 5000 && kazeigaku_haigusha <= 10000) {
				form.output_haigushazeigaku.value = Math.ceil(kazeigaku_haigusha * 0.30 - 700);
				form.output_kisokoujyo.value = "税率30%、控除700万円" ;
			}
			else if ( kazeigaku_haigusha > 3000 && kazeigaku_haigusha <= 5000) {
				form.output_haigushazeigaku.value = Math.ceil(kazeigaku_haigusha * 0.20 - 200);
				form.output_kisokoujyo.value = "税率20%、控除200万円" ;
			}
			else if ( kazeigaku_haigusha > 1000 && kazeigaku_haigusha <= 3000) {
				form.output_haigushazeigaku.value = Math.ceil(kazeigaku_haigusha * 0.15 - 50);
				form.output_kisokoujyo.value = "税率15%、控除50万円" ;
			}
			else if ( kazeigaku_haigusha > 0 && kazeigaku_haigusha <= 1000) {
				form.output_haigushazeigaku.value = Math.ceil(kazeigaku_haigusha * 0.10);
				form.output_kisokoujyo.value = "税率10%、控除0円" ;
			}
			else {
				form.output_haigushazeigaku.value = Math.ceil(0);
			}
			kazeigaku_haigusha2 = Math.ceil(form.output_haigushazeigaku.value);
		
			if (kazeigaku_haigushako > 60000) {
				form.output_souzokuzeigaku.value = Math.ceil(((kazeigaku_haigushako * 0.55 - 7200) * input_ko) + kazeigaku_haigusha2) ;
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(form.output_souzokuzeigaku.value / 2 /input_ko);
				form.output_kisokoujyoko.value = "税率55%、控除7200万円" ;
			}
			else if ( kazeigaku_haigushako > 30000 && kazeigaku_haigushako <= 60000) {
				form.output_souzokuzeigaku.value = Math.ceil(((kazeigaku_haigushako * 0.50 - 4200) * input_ko) + kazeigaku_haigusha2) ;
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(form.output_souzokuzeigaku.value / 2 /input_ko);
				form.output_kisokoujyoko.value = "税率50%、控除4200万円" ;
			}
			else if ( kazeigaku_haigushako > 20000 && kazeigaku_haigushako <= 30000) {
				form.output_souzokuzeigaku.value = Math.ceil(((kazeigaku_haigushako * 0.45 - 2700) * input_ko) + kazeigaku_haigusha2) ;
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(form.output_souzokuzeigaku.value / 2 /input_ko);
				form.output_kisokoujyoko.value = "税率45%、控除2700万円" ;
			}
			else if ( kazeigaku_haigushako > 10000 && kazeigaku_haigushako <= 20000) {
				form.output_souzokuzeigaku.value = Math.ceil(((kazeigaku_haigushako * 0.40 - 1700) * input_ko) + kazeigaku_haigusha2) ;
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(form.output_souzokuzeigaku.value / 2 /input_ko);
				form.output_kisokoujyoko.value = "税率40%、控除1700万円" ;
			}
			else if ( kazeigaku_haigushako > 5000 && kazeigaku_haigushako <= 10000) {
				form.output_souzokuzeigaku.value = Math.ceil(((kazeigaku_haigushako * 0.30 - 700) * input_ko) + kazeigaku_haigusha2) ;
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(form.output_souzokuzeigaku.value / 2 /input_ko);
				form.output_kisokoujyoko.value = "税率30%、控除700万円" ;
			}
			else if ( kazeigaku_haigushako > 3000 && kazeigaku_haigushako <= 5000) {
				form.output_souzokuzeigaku.value = Math.ceil(((kazeigaku_haigushako * 0.20 - 200) * input_ko) + kazeigaku_haigusha2) ;
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(form.output_souzokuzeigaku.value / 2 /input_ko);
				form.output_kisokoujyoko.value = "税率20%、控除200万円" ;
			}
			else if ( kazeigaku_haigushako > 1000 && kazeigaku_haigushako <= 3000) {
				form.output_souzokuzeigaku.value = Math.ceil(((kazeigaku_haigushako * 0.15 - 50) * input_ko) + kazeigaku_haigusha2) ;
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(form.output_souzokuzeigaku.value / 2 /input_ko);
				form.output_kisokoujyoko.value = "税率15%、控除50万円" ;
			}
			else if ( kazeigaku_haigushako > 0 && kazeigaku_haigushako <= 1000) {
				form.output_souzokuzeigaku.value = Math.ceil(((kazeigaku_haigushako * 0.10) * input_ko) + kazeigaku_haigusha2) ;
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(form.output_souzokuzeigaku.value / 2 /input_ko);
				form.output_kisokoujyoko.value = "税率10%、控除0円" ;
			}
			else {
				form.output_souzokuzeigaku.value = Math.ceil(0);
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(0);
			}
			if (form.output_haigushazeigaku.value <= 16000) {
				form.output_haigushazeigakukoujyo.value = Math.ceil(0);
				form.output_souzokuzeigakukoujyo.value = Math.ceil(form.output_souzokuzeigaku_tekiyou.value * input_ko);
				form.output_souzokuzeigaku.value = Math.ceil(kazeigaku_haigusha2+(form.output_souzokuzeigaku_tekiyou.value * input_ko));
			} else {
				form.output_haigushazeigakukoujyo.value = "適用なし" ;
				form.output_souzokuzeigakukoujyo.value = "適用なし";
				form.output_souzokuzeigaku.value = Math.ceil(kazeigaku_haigusha2+(form.output_souzokuzeigaku_tekiyou.value * input_ko));
			}
		}
		else if ( input_haigushaNg && input_ko > 0 ) {
			form.output_haigushazeigaku.value = "－"
			form.output_haigushazeigakukoujyo.value = "－" ;
			form.output_souzokuzeigakukoujyo.value = "－";
			form.output_kisokoujyo.value = "－" ;

			if (kazeigaku_divall > 60000) {
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(kazeigaku_divall * 0.55 - 7200) ;
				form.output_souzokuzeigaku.value = Math.ceil(form.output_souzokuzeigaku_tekiyou.value * input_ko);
				form.output_kisokoujyoko.value = "税率55%、控除7200万円" ;
			}
			else if ( kazeigaku_divall > 30000 && kazeigaku_divall <= 60000) {
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(kazeigaku_divall * 0.50 - 4200) ;
				form.output_souzokuzeigaku.value = Math.ceil(form.output_souzokuzeigaku_tekiyou.value * input_ko);
				form.output_kisokoujyoko.value = "税率50%、控除4200万円" ;
			}
			else if ( kazeigaku_divall > 20000 && kazeigaku_divall <= 30000) {
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(kazeigaku_divall * 0.45 - 2700) ;
				form.output_souzokuzeigaku.value = Math.ceil(form.output_souzokuzeigaku_tekiyou.value * input_ko);
				form.output_kisokoujyoko.value = "税率45%、控除2700万円" ;
			}
			else if ( kazeigaku_divall > 10000 && kazeigaku_divall <= 20000) {
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(kazeigaku_divall * 0.40 - 1700) ;
				form.output_souzokuzeigaku.value = Math.ceil(form.output_souzokuzeigaku_tekiyou.value * input_ko);
				form.output_kisokoujyoko.value = "税率40%、控除1700万円" ;
			}
			else if ( kazeigaku_divall > 5000 && kazeigaku_divall <= 10000) {
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(kazeigaku_divall * 0.30 - 700) ;
				form.output_souzokuzeigaku.value = Math.ceil(form.output_souzokuzeigaku_tekiyou.value * input_ko);
				form.output_kisokoujyoko.value = "税率30%、控除700万円" ;
			}
			else if ( kazeigaku_divall > 3000 && kazeigaku_divall <= 5000) {
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(kazeigaku_divall * 0.20 - 200) ;
				form.output_souzokuzeigaku.value = Math.ceil(form.output_souzokuzeigaku_tekiyou.value * input_ko);
				form.output_kisokoujyoko.value = "税率20%、控除200万円" ;
			}
			else if ( kazeigaku_divall > 1000 && kazeigaku_divall <= 3000) {
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(kazeigaku_divall * 0.15 - 50) ;
				form.output_souzokuzeigaku.value = Math.ceil(form.output_souzokuzeigaku_tekiyou.value * input_ko);
				form.output_kisokoujyoko.value = "税率15%、控除50万円" ;
			}
			else if ( kazeigaku_divall > 0 && kazeigaku_divall <= 1000) {
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(kazeigaku_divall * 0.10) ;
				form.output_souzokuzeigaku.value = Math.ceil(form.output_souzokuzeigaku_tekiyou.value * input_ko);
				form.output_kisokoujyoko.value = "税率10%、控除0円" ;
			}
			else {
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(0);
				form.output_souzokuzeigaku_tekiyou.value = Math.ceil(0);
			}
		}
		else {
			form.output_haigushazeigaku.value = ""
			form.output_souzokuzeigaku.value = ""
			form.output_souzokuzeigaku_tekiyou.value = ""
		}
	}
	
	form.output_haigushazeigaku.value = String(form.output_haigushazeigaku.value);
	while(form.output_haigushazeigaku.value != (form.output_haigushazeigaku.value = form.output_haigushazeigaku.value.replace(/^(-?\d+)(\d{3})/, "$1,$2")));

	form.output_souzokuzeigaku.value = String(form.output_souzokuzeigaku.value);
	while(form.output_souzokuzeigaku.value != (form.output_souzokuzeigaku.value = form.output_souzokuzeigaku.value.replace(/^(-?\d+)(\d{3})/, "$1,$2")));

	form.output_souzokuzeigaku_tekiyou.value = String(form.output_souzokuzeigaku_tekiyou.value);
	while(form.output_souzokuzeigaku_tekiyou.value != (form.output_souzokuzeigaku_tekiyou.value = form.output_souzokuzeigaku_tekiyou.value.replace(/^(-?\d+)(\d{3})/, "$1,$2")));

	form.output_koujogaku.value = String(form.output_koujogaku.value);
	while(form.output_koujogaku.value != (form.output_koujogaku.value = form.output_koujogaku.value.replace(/^(-?\d+)(\d{3})/, "$1,$2")));

	form.output_kazeizaisangaku.value = String(form.output_kazeizaisangaku.value);
	while(form.output_kazeizaisangaku.value != (form.output_kazeizaisangaku.value = form.output_kazeizaisangaku.value.replace(/^(-?\d+)(\d{3})/, "$1,$2")));

	form.output_kisokoujyo.value = String(form.output_kisokoujyo.value);
	while(form.output_kisokoujyo.value != (form.output_kisokoujyo.value = form.output_kisokoujyo.value.replace(/^(-?\d+)(\d{3})/, "$1,$2")));

	form.output_kisokoujyoko.value = String(form.output_kisokoujyoko.value);
	while(form.output_kisokoujyoko.value != (form.output_kisokoujyoko.value = form.output_kisokoujyoko.value.replace(/^(-?\d+)(\d{3})/, "$1,$2")));
}

if (!window.console){
    window.console = {
        log : function(msg){
            // do nothing.
        }
    };
}