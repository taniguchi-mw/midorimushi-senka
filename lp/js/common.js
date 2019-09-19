//開閉ボタン
/*
+ JQuery : switchHat.js 0.10
+
+ Author : Takashi Hirasawa
+ Special Thanks : kotarok (https://nodot.jp/)
+ Copyright (c) 2010 CSS HappyLife (https://css-happylife.com/)
+ Licensed under the MIT License:
+ https://www.opensource.org/licenses/mit-license.php
+
+ Since : 2010-06-24
+ Modified : 2010-06-27
*/

(function($) {

//設定（コメントアウトすれば機能停止）
$(function(){
$.uHat.switchHat();
//$.uHat.close();
$.uHat.openAll();
});

$.uHat = {

// 折りたたみ
switchHat: function(settings) {
uHatConA = $.extend({
switchBtn: '.switchHat',
switchContents: '.switchDetail',
switchClickAddClass: 'nowOpen',
}, settings);
$(uHatConA.switchContents).hide();
$(uHatConA.switchBtn).addClass("switchOn").click(function(){
var index = $(uHatConA.switchBtn).index(this);
$(uHatConA.switchContents).eq(index).slideToggle("fast");
$(this).toggleClass(uHatConA.switchClickAddClass);
}).css("cursor","pointer");
},

// 下の方に閉じるボタンを表示する
close: function(settings) {
uHatConB = $.extend({
closeBtnSet: uHatConA.switchContents,
apCloseBtn: '<span>X Close</span>'
}, settings);
$(uHatConB.closeBtnSet).append('<p class="closeBtnHat">'+uHatConB.apCloseBtn+'</p>');
$(".closeBtnHat").children().click(function(){
$(this).parents(uHatConA.switchContents).fadeOut("slow");
$(this).parents().prev().contents(uHatConA.switchBtn).removeClass(uHatConA.switchClickAddClass);
}).css("cursor","pointer");
},

// 全部開くボタン
openAll: function(settings) {
uHatConC = $.extend({
openAllBtnClass: '.allOpenBtn',
switchBtn: uHatConA.switchBtn,
openContents: uHatConA.switchContents
}, settings);
$(uHatConC.openAllBtnClass).addClass("switchOn").toggle(
function(){
$(this).addClass(uHatConA.switchClickAddClass);
$(uHatConC.openContents).slideDown("slow");
$(uHatConC.switchBtn).addClass(uHatConA.switchClickAddClass);
},
function(){
$(this).removeClass(uHatConA.switchClickAddClass);
$(uHatConC.openContents).slideUp("slow");
$(uHatConC.switchBtn).removeClass(uHatConA.switchClickAddClass);
}
).css("cursor","pointer");
}

};

})(jQuery);


/* ===================================================================

 * TOPへ戻る

=================================================================== */

var scrolltotop={
	//startline: Integer. Number of pixels from top of doc scrollbar is scrolled before showing control
	//scrollto: Keyword (Integer, or "Scroll_to_Element_ID"). How far to scroll document up when control is clicked on (0=top).
	setting: {startline:100, scrollto: 0, scrollduration:800, fadeduration:[500, 100]},
	controlHTML: '<img src="https://midorimushi-senka.com/lp/images/arrow_up.png" />', //HTML for control, which is auto wrapped in DIV w/ ID="topcontrol"
	controlattrs: {offsetx:15, offsety:10}, //offset of control relative to right/ bottom of window corner
	anchorkeyword: '#top', //Enter href value of HTML anchors on the page that should also act as "Scroll Up" links

	state: {isvisible:false, shouldvisible:false},

	scrollup:function(){
		if (!this.cssfixedsupport) //if control is positioned using JavaScript
			this.$control.css({opacity:0}) //hide control immediately after clicking it
		var dest=isNaN(this.setting.scrollto)? this.setting.scrollto : parseInt(this.setting.scrollto)
		if (typeof dest=="string" && jQuery('#'+dest).length==1) //check element set by string exists
			dest=jQuery('#'+dest).offset().top
		else
			dest=0
		this.$body.animate({scrollTop: dest}, this.setting.scrollduration);
	},

	keepfixed:function(){
		var $window=jQuery(window);
		var controlx=$window.scrollLeft() + $window.width() - this.$control.width() - this.controlattrs.offsetx
		var controly=$window.scrollTop() + $window.height() - this.$control.height() - this.controlattrs.offsety
		this.$control.css({left:controlx+'px', top:controly+'px'})
	},

	togglecontrol:function(){
		var scrolltop=jQuery(window).scrollTop()
		if (!this.cssfixedsupport)
			this.keepfixed()
		this.state.shouldvisible=(scrolltop>=this.setting.startline)? true : false
		if (this.state.shouldvisible && !this.state.isvisible){
			this.$control.stop().animate({opacity:0.8}, this.setting.fadeduration[0])
			this.state.isvisible=true
		}
		else if (this.state.shouldvisible==false && this.state.isvisible){
			this.$control.stop().animate({opacity:0}, this.setting.fadeduration[1])
			this.state.isvisible=false
		}
	},
	
	init:function(){
		jQuery(document).ready(function($){
			var mainobj=scrolltotop
			var iebrws=document.all
			mainobj.cssfixedsupport=!iebrws || iebrws && document.compatMode=="CSS1Compat" && window.XMLHttpRequest //not IE or IE7+ browsers in standards mode
			mainobj.$body=(window.opera)? (document.compatMode=="CSS1Compat"? $('html') : $('body')) : $('html,body')
			mainobj.$control=$('<div id="topcontrol">'+mainobj.controlHTML+'</div>')
				.css({position:mainobj.cssfixedsupport? 'fixed' : 'absolute', bottom:mainobj.controlattrs.offsety, right:mainobj.controlattrs.offsetx, opacity:0.8, cursor:'pointer'})
				.attr({title:'ページ上部へ'})
				.click(function(){mainobj.scrollup(); return false})
				.appendTo('body')
			if (document.all && !window.XMLHttpRequest && mainobj.$control.text()!='') //loose check for IE6 and below, plus whether control contains any text
				mainobj.$control.css({width:mainobj.$control.width()}) //IE6- seems to require an explicit width on a DIV containing text
			mainobj.togglecontrol()
			$('a[href="' + mainobj.anchorkeyword +'"]').click(function(){
				mainobj.scrollup()
				return false
			})
			$(window).bind('scroll resize', function(e){
				mainobj.togglecontrol()
			})
		})
	}
}

scrolltotop.init()


/*  ================================================================================
可視範囲でアニメーション
================================================================================  */
$(function(){
  $('.effect .effect_add').css("opacity","0");
  $(window).scroll(function (){
    $(".effect").each(function(){
      var imgPos = $(this).offset().top;    
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > imgPos - windowHeight + windowHeight/6){
        $(".effect_add",this).css("opacity","1" );
		$(".effect_add",this).addClass("animation-bounce");
      } else {
        $(".effect_add",this).css("opacity","0" );
		$(".effect_add",this).removeClass("animation-bounce");
      }
    });
  });
});

