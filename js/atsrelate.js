//获取下一个元素
function getNextElement(field) {
	var form = field.form;
	for(var e = 0; e < form.elements.length; e++) {
		if(field == form.elements[e])
			break;
	}
	return form.elements[++e % form.elements.length];
}
//获取上一个元素
function getPrevElement(field) {
	var form = field.form;
	for(var e = 0; e < form.elements.length; e++) {
		if(field == form.elements[e])
			break;
	}
	return form.elements[--e % form.elements.length];
}

Date.prototype.Format = function(fmt) { //author: meizz 
	var o = {
		"M+": this.getMonth() + 1, //月份 
		"d+": this.getDate(), //日 
		"h+": this.getHours(), //小时 
		"m+": this.getMinutes(), //分 
		"s+": this.getSeconds(), //秒 
		"q+": Math.floor((this.getMonth() + 3) / 3), //季度 
		"S": this.getMilliseconds() //毫秒 
	};
	if(/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
	for(var k in o)
		if(new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
	return fmt;
}

//ajax:php文件名，post json参数
function ajaxlink(ajaxphp, ajaxdata) {
	var result;
	$.ajax({
		url: ajaxphp,
		type: "POST",
		data: ajaxdata,
		async: false,
		contentType: "application/x-www-form-urlencoded; charset=utf-8",
		dataType: "json",
		error: function() {
			console.warn('Ajax.Error:' + JSON.stringify(ajaxdata));
		},
		success: function(data, status) { //如果调用php成功              
			result = data;
		}
	});
	return result;
}

//中文播报内容
function speak(textToSpeak) {
	if(window.navigator.userAgent.indexOf("Chrome") > -1) {
		//Chrome浏览器，PDA端中文调用需预装中文TTS引擎并设置语音包	
		speechSynthesis.cancel();
		var u = new SpeechSynthesisUtterance();
		u.text = restr(textToSpeak);
		u.lang = 'zh-Hant-CN';
		//u.lang = 'ja-JP';	
		u.rate = 1; //0-10,default:1
		u.pitch = 1; //0-2,default:1
		speechSynthesis.speak(u);
	}
}

function restr(ttsstr) {
	//数字、字母强制不连读
	ttsstr = ttsstr.replace(/[0-9A-Z]/ig, function(word) {
		return word + " ";
	});

	ttsstr = ttsstr.replace(/1/ig, "幺");
	ttsstr = ttsstr.replace(/A/ig, "爱");
	ttsstr = ttsstr.replace(/B/ig, "毕");
	ttsstr = ttsstr.replace(/C/ig, "see");
	ttsstr = ttsstr.replace(/Y/ig, "why");
	ttsstr = ttsstr.replace(/-/ig, " ");
	return ttsstr;
}

//计算异常Rank
function PreJn(edit, std) {
	if(edit == '×') return 0;
	var result = 0;
	for(i = 0; i < 3; i++) {
		if(std[i] === "×" || std[i] === "-") {} else {
			var std0 = parseInt(std[i].split(",")[0].substring(1))
			if(edit * 1 > std0) result = result + Math.pow(2, 2 - i)
		}
	}
	return result;
}

//异常等级Rank->Name
function ToYCName(rank) {
	var YCName = "-";
	switch(rank) {
		case 0:
			YCName = "合格"
			break;
		case 1:
			YCName = "追加选别"
			break;
		case 2:
			YCName = "不具合"
		case 3:
			break;
		case 4:
			YCName = "异常"
		default:
			break;
	}
	return YCName;
}


function prt() {	
	//隐藏不打印对象
	$(".noprt").addClass("notprt");
	$(".el-table__header").addClass("notprt");
	$(".el-table__row.danger-row").addClass("notprt");
	$(".el-table__row.warning-row").addClass("notprt");	
	$(".el-table__row.noprt-row").addClass("notprt");	
	$(".el-message").addClass("notprt");

	$("div.cell:contains('.')").addClass("noshow");	
	$("span:contains('.')").addClass("noshow");	
	//显示误隐藏打印对象
	$(".std").find(".el-table__header").removeClass("notprt");	
	$(".el-table__expanded-cell").addClass("nowprt");
	$(".IBill").addClass("nowprt");
	$(".FBill").addClass("nowprt");	
	window.print();	
	
	$(".notprt").removeClass("notprt");	
	$(".nowprt").removeClass("nowprt");
	$(".noshow").removeClass("noshow");	
}

function prt2() {	
	//隐藏不打印对象
	$(".noprt").addClass("notprt");
	$(".el-table__header").addClass("notprt");
	$(".el-table__row.danger-row").addClass("notprt");
	$(".el-table__row.warning-row").addClass("notprt");	
	$(".el-table__row.noprt-row").addClass("notprt");	
	$(".el-message").addClass("notprt");

	$("div.cell:contains('.')").addClass("noshow");	
	$("span:contains('.')").addClass("noshow");	
	//显示误隐藏打印对象
	$(".std").find(".el-table__header").removeClass("notprt");	
	$(".el-table__expanded-cell").addClass("nowprt");
	$(".IBill").addClass("nowprt");
	$(".FBill").addClass("nowprt");			
	//setInterval(function(){document.body.style.cssText+="-webkit-transform: rotate(-90deg);-moz-transform: rotate(-90deg)";},100);void(0);
	document.body.style.transform = "rotate(90deg)";
	window.print();
	document.body.style.transform = "rotate(0deg)";
	//setInterval(function(){document.body.style.cssText+="-webkit-transform: rotate(90deg);-moz-transform: rotate(90deg)";},100);void(0);
	$(".notprt").removeClass("notprt");
	$(".nowprt").removeClass("nowprt");
	$(".noshow").removeClass("noshow");	
	
	
	
	
	
	
}



//禁用后退
javascript:window.history.forward(1);

