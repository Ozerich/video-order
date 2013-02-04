function initChooseEl(){

	$('.gallery-holder:first .frame').delegate('.radioArea,.radioAreaChecked','click',function(){

        var visual = $(this).parents('li').find('.visual');

        if(visual.is('.checked')){
			visual.removeClass('checked');
			$(this).removeClass('radioAreaChecked').addClass('radioArea').next().attr('checked',false);
			$('.info-block .visual img').attr('src','images/none.gif').parent().hide();
			$('.info-block .visual a.iframe').attr('href',' ');
			$('.info-block ul li').eq(0).find('.name').text(' ');
		}else{
			if($(this).is('.radioAreaChecked')){
				var img=$(this).parents('li').find('.visual img').attr('src'),
					youtube_link=$(this).parents('li').find('.visual a.iframe').attr('href'),
					title=$(this).parents('li').find('.text').text();
					$(this).parents('ul').find('.visual').removeClass('checked');
				visual.addClass('checked');
				$('.info-block .visual img').attr('src',img).parent().show();
				$('.info-block .visual a.iframe').attr('href',youtube_link);
				$('.info-block ul li').eq(0).find('.name').text(title);
			}else{
                visual.removeClass('checked');
			}
		}
	});



	$('.gallery-holder.sound:first').delegate('.radioArea,.radioAreaChecked','click',function(){
		if ($(this).parent().hasClass('active')){
			$(this).parent().removeClass('active');
			$(this).removeClass('radioAreaChecked').addClass('radioArea').next().attr('checked', false);
			$('.info-block ul li').eq(1).find('.name').text('');
			$('.info-block ul li').eq(1).find('.play').hide();
		}else{
			if($(this).is('.radioAreaChecked')){
				$(this).closest('.gallery-holder').find('ul>li .check-holder.active').removeClass('active');
				$(this).parent().addClass('active');
				$('.info-block ul li').eq(1).find('.name').text($(this).parents('li:first').find('.text').text());
				$('.info-block ul li').eq(1).find('.play').show();
			}
		}
	});
	$('.gallery-holder.sound:last').delegate('.radioArea,.radioAreaChecked','click',function(){
		if($(this).parent().hasClass('active')){
			$(this).parent().removeClass('active');
			$(this).removeClass('radioAreaChecked').addClass('radioArea').next().attr('checked',false);
			$('.info-block ul li').eq(2).find('.name').text('');
			$('.info-block ul li').eq(2).find('.play').hide();
		}else{
			if($(this).is('.radioAreaChecked')){
				$(this).closest('ul').find('>li .check-holder.active').removeClass('active');
				$(this).parent().addClass('active');
				$('.info-block ul li').eq(2).find('.name').text($(this).parents('li:first').find('.text').text());
				$('.info-block ul li').eq(2).find('.play').show();
				$('.filename').val('').prev().find('input:file').val('');
			}
		}
		
	});
}

function initFrameChange(){
	var frame_holder=$('.still-block-holder');
	frame_holder.delegate('.up,.down','click',function(e){
		var frame=$(this).parents('.still-block');
		if($(this).hasClass('up')){
			var prevFrame=frame.prev();
			if(prevFrame.size() && prevFrame.hasClass('still-block')) frame.insertBefore(prevFrame);
		}else{
			var nextFrame=frame.next();
			if(nextFrame.size() && nextFrame.hasClass('still-block')) frame.insertAfter(nextFrame);
		}
		renderFrameOrder();
		e.preventDefault();
	});
	function renderFrameOrder(){
		frame_holder.find('.still-block').each(function(i){
			$('.frame-number',this).text((i+1)+' кадр');
		});
	}
	var newFrame=$('.still-block-holder').find('.still-block:first').clone().find('.active').removeClass('active').find('textarea,input').val('').end().end();
	$('.still-block-holder .add').click(function(e){
		newFrame.find('.symbols').text('0 слов')
		newFrame.clone().insertBefore($(this).parents('.still-block-holder').find('.add-still'));
		newFrame.find('.active').removeClass('active');
		newFrame.find('textarea,input').val('');
		updateInfo();
		e.preventDefault();
	});
	updateInfo=function(){
		$('.video-info span:first').text('Кадров: '+frame_holder.find('.still-block').size());
		renderFrameOrder();
	}
	updateInfo();
}

function initFileUpload(){
	var path='images/';
	$('.still-block-holder').delegate('.still-block .file-input-area','change',function(){
		var filename=getFileName($(this).val());
		var path_to_img=path+filename;
		if(filename) $(this).parents('.content-block').addClass('active').find('.visual>a>img').attr('src',path_to_img).parent().attr('href',path_to_img);
	});
	function getFileName(path_string){
		var beginning=path_string.lastIndexOf('\\')+1,
			end=path_string.length,
			filename=path_string.substring(beginning,end);
		return filename;
	}
	$('.upload.file input:file').change(function(){
		var filename=getFileName($(this).val());
		$(this).parent().next().val(filename);
		$('.gallery-holder.sound:last ul>li .check-holder.active .radioAreaChecked').click();
		$('.info-block ul li').eq(2).find('.name').text(filename);
		$('.info-block ul li').eq(2).find('.play').show();
	});
}

function initRemoveEl(){
	$('.still-block-holder').delegate('.still-block h2 .erase','click',function(e){
		if(confirm('Вы точно хотите удалить кадр?')){
			$(this).parents('.still-block').remove();
			updateInfo();
			calcCM();
		}
		e.preventDefault();
	});
	$('.still-block-holder').delegate('.still-block .erase-block .erase','click',function(e){
		$(this).parents('.content-block').removeClass('active').find('.upload input:file').val('');
		e.preventDefault();
	});
}

function initTxtCounter(){
	var status=$('.status-block'),
		days=status.find('.aside strong:first'),
		money=status.find('.aside strong:last'),
		time=$('.video-info span:last');
		$('.still-block .symbols').text('0 слов');
	$('.still-block-holder').delegate('.still-block textarea','keyup',function(){
		var wrds=$(this).val().match(/[a-zа-я]{1,}(-[a-zа-я]{1,})?/ig),
			calc_days=0,
			calc_money=0,
			calc_time=0;
		if(wrds){
			$(this).next().text(wrds.length+" слов");
		}else{
			$(this).next().text("0 слов");
		}
		if($(this).is('.textarea2')){
			calcCM();
		}
	});
	calcCM=function(){
		var calc_days=0,
			calc_money=0,
			calc_time=0;
		$('.still-block .textarea2+.symbols').each(function(){
				var text=parseInt($(this).text().replace(/[^0-9]+/ig));
				calc_days+=text;
				calc_money+=text*20;
				calc_time+=text*500;
			});
			if((calc_days/200)>=1){
				days.text((parseInt(calc_days/200)+1)+" дней");
			}else{
				days.text("1 дней");
			}
			money.text((calc_money+3000)+"руб.");
			time.text(formatTime(calc_time));
	}
	$('textarea').trigger('keyup');
	function formatTime(time){
		var ms=parseInt(time%1000),
			s=parseInt(time/1000),
			m=parseInt(s/60), 
			h=parseInt(m/60);
			(s%=60) < 10 ? s='0'+s:s;
			(m%=60) < 10 ? m='0'+m:m;
			//(h%=60) < 10 ? h='0'+h:h;
			(h) < 10 ? h='0'+h:h;
		return m+"мин:"+s+"сек.";
	}
}

function initAll(){
   // initTxtCounter();
  //  initRemoveEl();
  //  initFileUpload();
   // initFrameChange();
    initChooseEl();
}