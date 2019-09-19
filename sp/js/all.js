// js

/* ===================================================================

 * TOP�֖߂�

=================================================================== */

var scrolltotop={
	//startline: Integer. Number of pixels from top of doc scrollbar is scrolled before showing control
	//scrollto: Keyword (Integer, or "Scroll_to_Element_ID"). How far to scroll document up when control is clicked on (0=top).
	setting: {startline:100, scrollto: 0, scrollduration:800, fadeduration:[500, 100]},
	controlHTML: '<img src="https://midorimushi-senka.com/sp/img/cmn/icon_pagetop.png" />', //HTML for control, which is auto wrapped in DIV w/ ID="topcontrol"
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
			this.$control.stop().animate({opacity:1}, this.setting.fadeduration[0])
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
				.css({position:mainobj.cssfixedsupport? 'fixed' : 'absolute', bottom:mainobj.controlattrs.offsety, right:mainobj.controlattrs.offsetx, opacity:0, cursor:'pointer'})
				.attr({title:'�y�[�W�㕔��'})
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
�^�u�؂�ւ�
================================================================================  */
/* 
$(function(){
	$("a.btn_act").click(function(){
		var connectCont = $("a.btn_act").index(this);
		var showCont = connectCont+1;
		$('.motion').css({display:'none'});
		$('#motion_area'+(showCont)).fadeIn("normal");

		$('a.btn_act').removeClass('active');
		$(this).addClass('active');
	});
});
*/


/*  ================================================================================
 *
 *  jQuery Page Scroller -version 3.0.8
 *  https://coliss.com/articles/build-websites/operation/javascript/296.html
 *  (c)2011 coliss.com
 *
 *  ���̍�i�́A�N���G�C�e�B�u�E�R�����Y�̕\�� 2.1 ���{���C�Z���X�̉���
 *  ���C�Z���X����Ă��܂��B
 *  ���̎g�p��������������ɂ́Ahttps://creativecommons.org/licenses/by-sa/2.1/jp/��
 *  �`�F�b�N���邩�A�N���G�C�e�B�u��R�����Y�ɗX�ւɂĂ��₢���킹���������B
 *  �Z���́F559 Nathan Abbott Way, Stanford, California 94305, USA �ł��B
 *
================================================================================  */


/*  ================================================================================
TOC
============================================================
Ooption
Page Scroller
============================================================
this script requires jQuery 1.3-1.4.4(https://jquery.com/)
================================================================================  */


/*  ================================================================================
Ooption
================================================================================  */
var virtualTopId = "top",
    virtualTop,
    adjTraverser,
    adjPosition,
    callExternal = "pSc",
    delayExternal= 200,
    adjSpeed = 1;

/* option example
======================================================================  */
//  virtualTop = 0;    // virtual top's left position = 0
//  virtualTop = 1;    // virtual top's left position = vertical movement
//  adjTraverser = 0;  // left position = 0
//  adjTraverser = 1;  // horizontal movement.
//  adjPosition = -26;

/*  ================================================================================
Page Scroller
================================================================================  */
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}('(c($){7 C=$.H.C,w=$.H.w,F=$.H.F,A=$.H.A;$.H.1P({w:c(){3(!6[0])1H();3(6[0]==h)b 1K.1O||$.1D&&5.z.1x||5.f.1x;3(6[0]==5)b((5.z&&5.1G=="1s")?5.z.1u:5.f.1u);b w.1e(6,1f)},C:c(){3(!6[0])1H();3(6[0]==h)b 1K.1N||$.1D&&5.z.1F||5.f.1F;3(6[0]==5)b((5.z&&5.1G=="1s")?5.z.1d:5.f.1d);b C.1e(6,1f)},F:c(){3(!6[0])b 17;7 j=5.M?5.M(6[0].u):5.1h(6[0].u);7 k=1o 1r();k.x=j.19;1q((j=j.1j)!=V){k.x+=j.19}3((k.x*0)==0)b(k.x);g b(6[0].u)},A:c(){3(!6[0])b 17;7 j=5.M?5.M(6[0].u):5.1h(6[0].u);7 k=1o 1r();k.y=j.1m;1q((j=j.1j)!=V){k.y+=j.1m}3((k.y*0)==0)b(k.y);g b(6[0].u)}})})(1Q);$(c(){$(\'a[q^="#"], 20[q^="#"]\').22(\'.1k a[q^="#"], a[q^="#"].1k\').1a(c(){7 i=Q.21+Q.1Z;7 I=((6.q).25(0,(((6.q).13)-((6.15).13)))).R((6.q).1C("//")+2);3(i.G("?")!=-1)Y=i.R(0,(i.G("?")));g Y=i;3(I.G("?")!=-1)X=I.R(0,(I.G("?")));g X=I;3(X==Y){d.12((6.15).23(1));b 1T}});$("f").1a(c(){d.L()})});6.r=V;7 d={14:c(B){3(B=="x")b(($(5).w())-($(h).w()));g 3(B=="y")b(($(5).C())-($(h).C()))},W:c(B){3(B=="x")b(h.18||5.f.v||5.f.N.v);g 3(B=="y")b(h.1S||5.f.1c||5.f.N.1c)},P:c(l,m,D,p,o){7 r;3(r)J(r);7 1A=16*1X;7 S=d.W(\'x\');7 O=d.W(\'y\');3(!l||l<0)l=0;3(!m||m<0)m=0;3(!D)D=$.1E.1Y?10:$.1E.1W?8:9;3(!p)p=0+S;3(!o)o=0+O;p+=(l-S)/D;3(p<0)p=0;o+=(m-O)/D;3(o<0)o=0;7 U=E.1J(p);7 T=E.1J(o);h.1U(U,T);3((E.1I(E.1v(S-l))<1)&&(E.1I(E.1v(O-m))<1)){J(6.r);h.1i(l,m)}g 3((U!=l)||(T!=m))6.r=1n("d.P("+l+","+m+","+D+","+p+","+o+")",1A);g J(6.r)},L:c(){J(6.r)},24:c(e){d.L()},12:c(n){d.L();7 s,t;3(!!n){3(n==1M){s=(K==0)?0:(K==1)?h.18||5.f.v||5.f.N.v:$(\'#\'+n).F();t=((K==0)||(K==1))?0:$(\'#\'+n).A()}g{s=(1y==0)?0:(1y==1)?($(\'#\'+n).F()):h.18||5.f.v||5.f.N.v;t=1B?($(\'#\'+n).A())+1B:($(\'#\'+n).A())}7 11=d.14(\'x\');7 Z=d.14(\'y\');3(((s*0)==0)||((t*0)==0)){7 1t=(s<1)?0:(s>11)?11:s;7 1w=(t<1)?0:(t>Z)?Z:t;d.P(1t,1w)}g Q.15=n}g d.P(0,0)},1z:c(){7 i=Q.q;7 1l=i.1C("#",0);7 1b=i.1V(1g);3(!!1b){1p=i.R(i.G("?"+1g)+4,i.13);1R=1n("d.12(1p)",1L)}3(!1l)h.1i(0,0);g b 17}};$(d.1z);',62,130,'|||if||document|this|var||||return|function|coliss||body|else|window|usrUrl|obj|tagCoords|toX|toY|idName|frY|frX|href|pageScrollTimer|anchorX|anchorY|id|scrollLeft|width|||documentElement|top|type|height|frms|Math|left|lastIndexOf|fn|anchorPath|clearTimeout|virtualTop|stopScroll|getElementById|parentNode|actY|pageScroll|location|slice|actX|posY|posX|null|getWindowOffset|anchorPathOmitQ|usrUrlOmitQ|dMaxY||dMaxX|toAnchor|length|getScrollRange|hash||true|pageXOffset|offsetLeft|click|checkPageScroller|scrollTop|scrollHeight|apply|arguments|callExternal|all|scroll|offsetParent|nopscr|checkAnchor|offsetTop|setTimeout|new|anchorId|while|Object|CSS1Compat|setX|scrollWidth|abs|setY|clientWidth|adjTraverser|initPageScroller|spd|adjPosition|indexOf|boxModel|browser|clientHeight|compatMode|error|floor|ceil|self|delayExternal|virtualTopId|innerHeight|innerWidth|extend|jQuery|timerID|pageYOffset|false|scrollTo|match|opera|adjSpeed|mozilla|pathname|area|hostname|not|substr|cancelScroll|substring'.split('|'),0,{}));

//�X�N���[���ʒu����
(function() {
adjPosition = 0;
adjSpeed = 1;
})();


//�J�{�^��
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

//�ݒ�i�R�����g�A�E�g����΋@�\��~�j
$(function(){
$.uHat.switchHat();
//$.uHat.close();
$.uHat.openAll();
});

$.uHat = {

// �܂肽����
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

// ���̕��ɕ���{�^����\������
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

// �S���J���{�^��
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


/*����*/
/*(function($) {
function close_win(){ 
	var nvua = navigator.userAgent; 
		if(nvua.indexOf('MSIE') >= 0){ 
			if(nvua.indexOf('MSIE 5.0') == -1) { 
				top.opener = ''; 
			} 
		} 
		else if(nvua.indexOf('Gecko') >= 0){ 
			top.name = 'CLOSE_WINDOW'; 
			wid = window.open('','CLOSE_WINDOW'); 
		} 
	top.close(); 
}
})(jQuery);*/