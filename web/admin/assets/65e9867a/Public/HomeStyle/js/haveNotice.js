(function($){var searchVal=$("#search").val();if($.trim(searchVal)!=""){var reg=/\s/g;searchVal=searchVal.replace(reg,"").split("");var resultL="";var resultR="";$(".result_wrap .time_r li").each(function(){resultL=$(".con_l .searchFlagN",this).text().split("");resultR=$(".con_l .searchFlagP",this).text().split("");$.each(resultL,function(i,v){if($.inArray(v.toLowerCase(),searchVal)!=-1||$.inArray(v.toUpperCase(),searchVal)!=-1){resultL[i]="<em>"+v+"</em>"}});$(".con_l .searchFlagN",this).html(resultL.join(""));$.each(resultR,function(i,v){if($.inArray(v.toLowerCase(),searchVal)!=-1||$.inArray(v.toUpperCase(),searchVal)!=-1){resultR[i]="<em>"+v+"</em>"}});$(".con_l .searchFlagP",this).html(resultR.join(""))})}})(jQuery);$(function(){placeholderFn();Date.prototype.Format=function(fmt){var o={"M+":this.getMonth()+1,"d+":this.getDate(),"h+":this.getHours(),"m+":this.getMinutes(),"s+":this.getSeconds(),"q+":Math.floor((this.getMonth()+3)/3),"S":this.getMilliseconds()};if(/(y+)/.test(fmt)){fmt=fmt.replace(RegExp.$1,(this.getFullYear()+"").substr(4-RegExp.$1.length))}for(var k in o){if(new RegExp("("+k+")").test(fmt)){fmt=fmt.replace(RegExp.$1,(RegExp.$1.length==1)?(o[k]):(("00"+o[k]).substr((""+o[k]).length)))}}return fmt};function newDateTime(str){str=str.split("-");var date=new Date();date.setUTCFullYear(str[0],str[1]-1,str[2]);date.setUTCHours(0,0,0,0);return date}function newDateAndTime(dateStr){var ds=dateStr.split(" ")[0].split("-");var ts=dateStr.split(" ")[1].split(":");var r=new Date();r.setFullYear(ds[0],ds[1]-1,ds[2]);r.setHours(ts[0],ts[1],ts[2],0);return r}var dotLen=$(".time_dot").length-1;$(".time_dot").each(function(i){var _this=$(this);var ymd_data=$.trim($(_this).text()).substring(0,10);var hms_date=$.trim($(_this).text()).substring(10);hms_date=$.trim(hms_date);var str=ymd_data+" "+hms_date+":00";var date=newDateAndTime(str);var nowDate=$("#nowTime").val();var nDate=newDateAndTime(nowDate);if(i>0){if(date>nDate){var t1=$(_this).find("label").text();var t2=$(".time_dot").eq(i-1).find("label").text();if(t1!=t2){$(_this).parent().parent().parent().prevAll(".result_main").addClass("active");$(_this).parent().parent().parent().prev(".result_main").addClass("active").find(".result_time:last .time_r ul").after($("#nowDivHide").html())}else{$(_this).parent().parent().parent().prevAll(".result_main").addClass("active");$(_this).parent().parent().prevAll(".result_time").addClass("active");$(_this).parent().parent().prev(".result_time").addClass("active").find(".time_r ul").after($("#nowDivHide").html())}return false}else{if(i==dotLen){$(_this).parent().parent().parent().addClass("active").prevAll(".result_main").addClass("active");return false}}}else{if(date>nDate){return false}else{if($(".time_dot").length==1){$(_this).parent().parent().parent().addClass("active").prevAll(".result_main").addClass("active");return false}}}});$(".dash_bottom").each(function(){var btDivHeight=$(this).parent().parent().parent().height();$(this).css("top",btDivHeight-36-35-29+"px").show()});$(".time_l").css("border-color","#e1e1e1");$(".head_r a").bind("click",function(){var searchCont=$("#search").val();$(".head_r a").removeClass("active");$(this).addClass("active");$("#d").val("");$("#r").val($(this).data("type"));if($.trim(searchCont)){$("#q_flag").val("1")}if($.trim($("#search").val())=="搜索姓名或应聘职位"){$("#search").val("")}$("#filterForm").submit()});$("#datetimepicker").datepicker({dateFormat:"yy/mm/dd"});$("#datetimepicker").focus(function(){$(this).blur()});$("#datetimepicker").bind("click",function(){$(this).blur();initPicker();var ym=$("#nowTimeYm").val();initPickerXY();dateColorGrey();initPickerData(ym);$(".ui-datepicker-next").unbind("click",demo1);$(".ui-datepicker-next").bind("click",demo1);$(".ui-datepicker-prev").unbind("click",demo1);$(".ui-datepicker-prev").bind("click",demo1)});function demo1(){$(".picker_icon").remove();dateColorGrey();initPicker()}function initPickerData(ym){L.ajax({type:"POST",url:ctx+"/interview/cal.json",data:{ym:ym},dataType:"json"}).done(function(result){if(result.state=="1"){var result=eval(result.content.rows);var totalPage=$("#totalPage").val();if(result.length==0){$(".ui-state-default").addClass("cursor_nm");$(".ui-state-default").bind("click",function(){return false})}for(var i=0;i<result.length;i++){$(".ui-state-default").each(function(){var _this=$(this);var d=result[i].date.substring(result[i].date.lastIndexOf("-")+1);d=parseInt(d);var d1=$.trim($(this).text());var dbNum=$(this).find(".tip_count").eq(0).text();day=parseInt(d1.substring(0,d1.lastIndexOf(dbNum)));if(day==d){var nowTimeYmDd=$("#nowTimeYmDd").val();nowTimeYmDd=newDateTime(nowTimeYmDd);var y=$(".ui-datepicker-year").text().substring(0,4);var m=$(".ui-datepicker-month").text().substring(0,$(".ui-datepicker-month").text().length-1);if(parseInt(m)<10){m="0"+m}var time=y+"-"+m;var ymActice;ymActice=time+"-"+day;ymActice=newDateTime(ymActice);if(ymActice<nowTimeYmDd){$(_this).find("i").text(result[i].count).parent().parent().removeClass("active").addClass("activebr")}else{$(_this).find("i").text(result[i].count).parent().parent().addClass("active")}if(d<10){d="0"+d}$(_this).bind("click",function(){var dateDay=$.trim($(this).text());var dbNum=$(this).find(".tip_count").eq(0).text();dateDay=parseInt(dateDay.substring(0,dateDay.lastIndexOf(dbNum)));if(dateDay<10){dateDay="0"+dateDay}var ymd=ym.replace("-","")+dateDay;$("#d").val(ymd);$("#q_flag").val("1");$("#r").val("1");$("#search").val("");$("#filterForm").submit()})}else{$(_this).bind("click",function(){return false})}})}initCursor()}else{alert(result.message)}})}function initCursor(){$(".ui-state-default").each(function(){var con=$(this).find(".tip_count").text();if($.trim(con).length>0){$(this).removeClass("cursor_nm")}else{$(this).addClass("cursor_nm");$(this).bind("click",function(){return false})}})}function dateColorGrey(){var nowTimeYmDd=$("#nowTimeYmDd").val();nowTimeYmDd=newDateTime(nowTimeYmDd);var y=$(".ui-datepicker-year").text().substring(0,4);var m=$(".ui-datepicker-month").text().substring(0,$(".ui-datepicker-month").text().length-1);if(parseInt(m)<10){m="0"+m}var time=y+"-"+m;var ymActice;$(".ui-state-default").each(function(){var day=parseInt(L.trim($(this).text()));if(parseInt(day)<10){day="0"+day}ymActice=time+"-"+day;ymActice=newDateTime(ymActice);if(ymActice<nowTimeYmDd){$(this).css("color","#999")}})}$(window).resize(function(){initPickerXY()});function initPickerXY(){var l=$("#datetimepicker").offset().left-17.5+"px";var t=$("#datetimepicker").offset().top-18+"px";var dateDiv=document.getElementById("ui-datepicker-div");dateDiv.style.left=l;dateDiv.style.top=t}function initPicker(){$("#ui-datepicker-div").fadeIn();$(".ui-datepicker-title").append($(".ui-datepicker-month"));$(".ui-state-default").each(function(){$(this).find(".tip_count").remove();$(this).append("<i class='tip_count'></i>")});var l=$("#datetimepicker").offset().left-17.5+"px";var t=$("#datetimepicker").offset().top-18+"px";$("#ui-datepicker-div").css({"left":l,"top":t});$(".ui-datepicker-header").append("<a href='javascript:;' class='picker_icon'></a>");$(".picker_icon").bind("click",function(){$("#ui-datepicker-div").fadeOut(function(){$(".picker_icon").remove()})});$(".ui-datepicker-next").unbind("click",demo);$(".ui-datepicker-next").bind("click",demo);$(".ui-datepicker-prev").unbind("click",demo);$(".ui-datepicker-prev").bind("click",demo)}function demo(){dateColorGrey();getPickerData()}function getPickerData(){$(".picker_icon").remove();initPicker();var y=$(".ui-datepicker-year").text().substring(0,4);var m=$(".ui-datepicker-month").text().substring(0,$(".ui-datepicker-month").text().length-1);if(parseInt(m)<10){m="0"+m}var time=y+"-"+m;initPickerData(time)}$(".download").bind("click",function(){if($(this).data("type")=="1"){var key=$(this).data("key");var url=rctx+"/resume/downloadResume?key="+key+"&type=";$("#wordDw").attr("href",url+"1");$("#htmlDw").attr("href",url+"2");$("#pdfDw").attr("href",url+"3");L.colorbox({inline:true,href:$("#downloadOnlineResume"),title:"下载简历"})}});$("#searchBtn").bind("click",function(){var searchCont=$("#search").val();if(!$.trim(searchCont)||$.trim($("#search").val())=="搜索姓名或应聘职位"){$("#search").val("").focus();return false}$("#q").val(searchCont);$("#r").val("1");$("#q_flag").val("1");if($.trim($("#search").val())=="搜索姓名或应聘职位"){$("#search").val("")}$("#filterForm").submit()});$("#search").bind("keypress",function(event){if(event.keyCode=="13"){var searchCont=$("#search").val();if(!$.trim(searchCont)){$("#search").val("").focus();return false}$("#q_flag").val("1");var searchCont=$("#search").val();$("#q").val(searchCont);$("#r").val("1");if($.trim($("#search").val())=="搜索姓名或应聘职位"){$("#search").val("")}$("#filterForm").submit()}});$("#search").keyup(function(){var searchCont=$("#search").val();if($.trim(searchCont)){$("#searchBtn").addClass("active")}else{$("#searchBtn").removeClass("active")}});$("#backAll").bind("click",function(){$(".result_tip").animate({height:"hide"}).find("strong").text("")})});