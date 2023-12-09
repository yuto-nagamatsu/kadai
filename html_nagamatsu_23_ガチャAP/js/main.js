//タイマー
$(function() {
	var timer = false;
	$(window).resize(function() {
		if(timer !== false){
			clearTimeout(timer);
		}
		timer = setTimeout(function() {
		}, 500);
	});
});

$(function() {
    $('.mainimg-tate').vegas({
        slides: [
            { src: './images/tate_1.jpg' },	//1枚目の写真指定
            { src: './images/tate_2.jpg' },	//2枚目の写真指定
            { src: './images/tate_3.jpg' },	//3枚目の写真指定
        ],
		transition: 'blur',			//https://vegas.jaysalvat.com/documentation/transitions/から好みのtransitionを選んで置き換えられます。
		animation: 'kenburns',		//https://vegas.jaysalvat.com/documentation/transitions/から好みのanimationを選んで置き換えられます。
		delay: 6000,				//次の画像を表示するまでの時間
		animationDuration: 10000,	//アニメーション間の引き継ぎタイミング。
		timer: false,				//プログレスバーを非表示に。
    });
});

// 画像の遷移
$(function() {
    $('.mainimg-yoko').vegas({
        slides: [
            { src: './images/yoko_1.jpg' },	//1枚目の写真指定
            { src: './images/yoko_2.jpg' },	//2枚目の写真指定
            { src: './images/yoko_3.jpg' },	//3枚目の写真指定
        ],
		transition: 'blur',			//https://vegas.jaysalvat.com/documentation/transitions/から好みのtransitionを選んで置き換えられます。
		animation: 'kenburns',		//https://vegas.jaysalvat.com/documentation/transitions/から好みのanimationを選んで置き換えられます。
		delay: 6000,				//次の画像を表示するまでの時間
		animationDuration: 10000,	//アニメーション間の引き継ぎタイミング。
		timer: false,				//プログレスバーを非表示に。
    });
});

// menu
$(window).on("load resize", function() {
	setTimeout(function(){

		var winH = window.innerHeight;
		var winBP = 600;	//ブレイクポイント

			//小さな端末用
			if(winH <= winBP) {
				$('body').addClass('s').removeClass('p');
				$('#menubar').addClass('dn').removeClass('db');
				$('#menubar_hdr').addClass('db').removeClass('dn').removeClass('ham');
				
					// 同一ページへのリンクの場合に開閉メニューを閉じる処理
					$('#menubar a[href^="#"]').click(function() {
						$('#menubar').removeClass('db');
						$('#menubar_hdr').removeClass('ham');
					});
					
			//大きな端末用
			} else {
				$('body').addClass('p').removeClass('s');
				$('#menubar').addClass('db').removeClass('dn');
				$('#menubar_hdr').removeClass('db').addClass('dn');

			}

	}, 100);
});


//pagetop
$(function() {
    var scroll = $('.pagetop');
    var scrollShow = $('.pagetop-show');
        $(scroll).hide();
        $(window).scroll(function() {
            if($(this).scrollTop() >= 300) {
                $(scroll).fadeIn().addClass(scrollShow);
            } else {
                $(scroll).fadeOut().removeClass(scrollShow);
            }
        });
});


//スムーススクロール
$(window).on('load', function() {
	var hash = location.hash;
	if(hash) {
		$('body,html').scrollTop(0);
		setTimeout(function() {
			var target = $(hash);
			var scroll = target.offset().top - 40;
			$('body,html').animate({scrollTop:scroll},500);
		}, 100);
	}
});
$(window).on('load', function() {
    $('a[href^="#"]').click(function() {
        var href = $(this).attr('href');
        var target = href == '#' ? 0 : $(href).offset().top - 40;
            $('body,html').animate({scrollTop:target},500);
            return false;
    });
});

