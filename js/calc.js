var date=new Date();
var week=new Array('(日)','(月)','(火)','(水)','(木)','(金)','(土)');
var holiday=new Array('1/1','1/2','1/3','1/8','2/11','2/12','3/21','4/29','4/30','5/3','5/4','5/5','7/16','8/11','8/13','8/14','8/15','9/17','9/23','9/24','10/8','11/3','11/23','12/23','12/24','12/29','12/30','12/31');

/*作成中-------------------

holidayを自動取得
↓
お盆などの手動休みを設定(otherHoliday)
↓
holiday、otherHoliday配列を合算してm/dを整え、照準に並び替え

変数にまとめて後はそのままプログラム使える
(var holidayCount=holiday.length;から)

-------------------作成中*/


var holidayCount=holiday.length;
var day=24 * 3600 * 1000;
var nextdayFlag=0;
var y2=date.getFullYear();
var m2=date.getMonth()+1;
var d2=date. getDate();
var closingTime=16;
for(i=0;i<1;i++){
    do{
        holidayFlag=false;
        var y=date.getFullYear();
        var m=date.getMonth()+1;
        var d=date.getDate();
        var w=date.getDay();
    if((w==0)||(w==6)){
        holidayFlag=true;
        nextdayFlag=0;
    }else{
        for(j=0;j<holidayCount;j++){
            if((m+'/'+d )==holiday[j]){
                holidayFlag=true;
                nextdayFlag=0}
            }
        }
        if(y==y2 && m==m2 && d==d2 && date.getHours()>=closingTime){
            holidayFlag=true;
            var nextdayFlag=1
        }
        date.setTime(date.getTime()+day);
    }
while(holidayFlag);
}
if(y==y2 && m==m2 && d==d2 && date.getHours()<closingTime){
    var shipping='本日';
    var dpid = document.getElementById('update');
    dpid.className= 'displayed';
}else if(nextdayFlag==1){
    shipping='翌日';
    var dpid = document.getElementById('update');
    dpid.className= 'displayed';
} else {
    shipping = '';
}
document.write(shipping+'<span class=\'fs-16\'>'+m+'月'+d+'日'+week[w]+'</span>');
