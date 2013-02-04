$(function () {
	activeTimeField();
	$('#iKoefH').change(CalculateText);
	$('#iKoefM').change(CalculateText);
	$('#iKoefS').change(CalculateText);
	
	$('#iKoefH').keyup(CalculateText);
	$('#iKoefM').keyup(CalculateText);
	$('#iKoefS').keyup(CalculateText);
	
	change_type(2);
});

function change_type(num){
		
	if(num == 1) {
		$('#options').show();
		$('#chrono').hide();
		$('#pages').show();
		$('#track_length_min').hide();
		$('#track_length_opt').hide();
		$('#edit_text').change(CalculateText);
		$('#edit_text').keyup(CalculateText);
		CalculateText();
	} else{
		$('#chrono').show();
		$('#options').hide();
		$('#pages').hide();
		$('#track_length_min').show();
		$('#track_length_opt').show();
		
		$('#edit_text').change(show_counts);
		$('#edit_text').keyup(show_counts);
		show_counts();
	}
	
	$('#edit_text').focus();
	
}

function isNumber(str){
	var re = /^[0-9]*$/;
	if (!re.test(str))
        return false;
	else
        return true;
}

function strreplace(strObj, need){
	var re = new RegExp(need , "g");
	var newstrObj = strObj.replace(re, " ");

	return newstrObj;
}

function strcount(strObj, need, count){
	var index = 0;
	var indexstart = 0;

	while (index != -1){
		index = strObj.indexOf(need, indexstart);
		if (index >= 0){
			indexstart = index+1;
			count++;
		}
	}
	return count;
}

function calculate_length() {
	var text = $('#edit_text').val();
	
	var pattern = new RegExp('\n' , "g");
	text = text.replace(pattern, " ");
	var pattern = new RegExp('\r' , "g");
	text = text.replace(pattern, " ");
	
	var tarray = text.split(" ");
	var wrdsCount = 0;
	var index = 0;
	var indexstart = 0
	var ltrsCount = 0;
	
	wrdsCount = strcount(text, "№", wrdsCount);
	text = strreplace(text, "№");
	wrdsCount = strcount(text, "@", wrdsCount);
	text = strreplace(text, "@");
	wrdsCount = strcount(text, "$", wrdsCount);
	text = strreplace(text, "$");
	wrdsCount = strcount(text, "%", wrdsCount);
	text = strreplace(text, "%");
	wrdsCount = strcount(text, "&", wrdsCount);
	text = strreplace(text, "&");
	wrdsCount = strcount(text, "Є", wrdsCount);
	text = strreplace(text, "Є");
	wrdsCount = strcount(text, " пр.", wrdsCount);
	text = strreplace(text, " пр\\.");
	wrdsCount = strcount(text, " ул.", wrdsCount);
	text = strreplace(text, " ул\\.");
	wrdsCount = strcount(text, " г.", wrdsCount);
	text = strreplace(text, " г\\.");
	wrdsCount = strcount(text, " т.", wrdsCount);
	text = strreplace(text, " т\\.");
	wrdsCount = strcount(text, " д.", wrdsCount);
	text = strreplace(text, " д\\.");
	wrdsCount = strcount(text, " кв.", wrdsCount);
	text = strreplace(text, " кв\\.");
	wrdsCount = strcount(text, " кг.", wrdsCount);
	text = strreplace(text, " кг\\.");
	wrdsCount = strcount(text, " см.", wrdsCount);
	text = strreplace(text, " см\\.");
	wrdsCount = strcount(text, " гр.", wrdsCount);
	text = strreplace(text, " гр\\.");
	
	for(el in tarray){	
		if (isNumber(tarray[el])){
			wrdsCount += tarray[el].length;
			continue;
		}

		tmpStrArr = tarray[el].split("");
		for(tmpel in tmpStrArr){	
			if (isNumber(tmpStrArr[tmpel])){
				wrdsCount += 1;
				continue;
			}
		}

		text = strreplace(text, '0');
		text = strreplace(text, '1');
		text = strreplace(text, '2');
		text = strreplace(text, '3');
		text = strreplace(text, '4');
		text = strreplace(text, '5');
		text = strreplace(text, '6');
		text = strreplace(text, '7');
		text = strreplace(text, '8');
		text = strreplace(text, '9');
	}

	
	var txarray = text.split(" ");
	for(el in txarray){	
		var sElement = txarray[el].toString();
	
	
		index = sElement.indexOf('.', 0);
		if (index >= 1 && index < (sElement.length-1)){
			tmpStrArr2 = sElement.split('.');
			wrdsCount += tmpStrArr2.length;
			wrdsCount += tmpStrArr2.length-1;
		}
		else{
			if (sElement.length > 2 && sElement.length <= 14) wrdsCount += 1; 
			if (sElement.length > 14) wrdsCount += 2;
			if ((sElement.length < 3) && (sElement != "-") && (sElement != " ") 
			&& (sElement != ".") && (sElement != ",") && (sElement != "№") 
			&& (sElement != "@") && (sElement != "Є") && (sElement != "$") 
			&& (sElement != "%") && (sElement != "&") && (sElement != "")){ 
				ltrsCount++;
			}
		}
    }

	if (ltrsCount > 0) wrdsCount+= Math.ceil(ltrsCount/4);
	wrdsCount = wrdsCount.toFixed(0);

	if (text == '') wrdsCount = '0';
	return wrdsCount;
	
}

//хронометраж **********************************************************************
function show_counts(){
	wrdsCount = calculate_length();
	$('#words-cnt').text(wrdsCount);
	$('#track_length_min > span').text(Math.ceil(wrdsCount/2) + ' сек.');
	$('#track_length_opt > span').text(Math.ceil(wrdsCount/2 * 1.09) + ' сек.');
}

//СТРАНИЦЕМЕР***********************************************************************
var ForCalc_Koef = 120;
var ForCalc_Val = 350;

var divKoefActive = 0;
 
function ClearInput(){
	$('#words-cnt').text('0');
	$('#page-cnt').text('0 страниц');
	$('#track_length_min > span').text('0 сек.');
	$('#track_length_opt > span').text('0 сек.');
	
	$('#iKoefH').val('час').css('color', '#999');
	$('#iKoefM').val('мин').css('color', '#999');;
	$('#iKoefS').val('сек').css('color', '#999');;
	
 
	$('#edit_text').val('');
	$('#edit_text').focus();
	
	return (true);
}
 
 
function activeTimeField(){
	if (!$('#iFunctionType')[0].checked){
		divKoefActive = 1;
		$('#iKoefH').removeAttr('disabled');
		$('#iKoefM').removeAttr('disabled');
		$('#iKoefS').removeAttr('disabled');
		//$('#reset').removeAttr('disabled');
		$('#edit_text').attr('disabled', 'disabled');
		$('#words').hide();
	}else{
		divKoefActive = 0;
		$('#iKoefH').attr('disabled', 'disabled');
		$('#iKoefM').attr('disabled', 'disabled');
		$('#iKoefS').attr('disabled', 'disabled');
		//$('#reset').attr('disabled', 'disabled');
		$('#edit_text').removeAttr('disabled');
		$('#words').show();
	}
}
 
 
function GetWordsEnd(iCount){
	var sText = "";
	var iSubCount = 0;
	iSubCount = Math.abs((iCount - Math.floor(iCount))*10);
	if (((iSubCount%10)==1)|((iSubCount%10)==2)|((iSubCount%10)==3)|((iSubCount%10)==4)){sText = "страницы";}
	else if (((iSubCount%10)==5)|((iSubCount%10)==6)|((iSubCount%10)==7)|((iSubCount%10)==8)|((iSubCount%10)==9)){sText = "страниц";}
	else{
		if ((iCount>=5)&(iCount<=20)){sText="страниц";}
		else if ((iCount%10)==1){sText = "страница";}
		else if (((iCount%10)==2)|((iCount%10)==3)|((iCount%10)==4)){sText = "страницы";}
		else{sText="страниц";}
	}
	return sText;
}

 
function CalculateText(){

	var wrdsCount = 0;
	var pagesCount = 0;
	var iKoef = 1;
	var timeNeed = 0;
	var iType = 0;
	wrdsCount = calculate_length();	
	if (iType==2){
		var iMinutes = 0;
		if(isNumber($('#iKoefH').val()) && $('#iKoefH').val()!='')
			iMinutes += parseInt($('#iKoefH').val() * 60);
		if(isNumber($('#iKoefM').val()) && $('#iKoefM').val()!='') 
			iMinutes += parseInt($('#iKoefM').val());
		if(isNumber($('#iKoefS').val()) && $('#iKoefS').val()!='')		   
			iMinutes += (Math.ceil((parseInt($('#iKoefS').val())/60)*100))/100;
			
		pagesCount = Math.ceil ((iMinutes*ForCalc_Koef)/ForCalc_Val * 10) / 10;
		
	}
	else{
		pagesCount = Math.ceil (wrdsCount/ForCalc_Val * 10) / 10;
	}
	
	$('#words-cnt').text(wrdsCount);
 	$('#page-cnt').text(' ' + (pagesCount * 1.2).toFixed(1) + ' ' + GetWordsEnd(pagesCount));
	return true;
}

function hide_title(obj, hide){
	if(hide && obj.value == obj.alt){
		obj.value = '';
		obj.style.color = 'black';
	}
	if(!hide && obj.value == ''){
		obj.value = obj.alt;
		obj.style.color = '#999';
	}
}