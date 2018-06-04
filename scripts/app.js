// Copyright 2016 Google Inc.
// 
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
// 
//      http://www.apache.org/licenses/LICENSE-2.0
// 
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

$( document ).ready(function() {
	
	function toggleFullScreen() {
		var doc = window.document;
		var docEl = doc.documentElement;

		var requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.	msRequestFullscreen;
		var cancelFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;

		if(!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc.msFullscreenElement) {
			requestFullScreen.call(docEl);
		}
		else {
			cancelFullScreen.call(doc);
		}
	}
	
    function readDeviceOrientation() {
							
		if (Math.abs(window.orientation) === 90) {
			// Landscape
			//window.alert("LANDSCAPE");
			$(".alertBox").show();
			
		} else {
			// Portrait
			//window.alert("PORTRAIT");
			$(".alertBox").hide();
		}
	}
	window.onorientationchange = readDeviceOrientation;
	
	readDeviceOrientation();
	//document.documentElement.requestFullscreen();
	
	$("#butRefresh").click(function() {
		//alert("Recarergando!");
		window.location.reload(true);
	});
	
	$("#butAdd").click(function() {
		alert("Adicionando conteudo!");
		populateSwiper();
	});
	
	$("#headerLogo").click(function() {
		//alert("Recarergando!");
		window.location = "index.html";
	});
	
	$(".curse").click(function() {
		if($(this).attr("id")){
			var nloc = $(this).attr("id")+".php";
			//alert("Indo para "+nloc+"!");
			//window.location = nloc;
			//$(this).css("height", "+=100");
			$(this).css("display", "block");
			$(this).animate({height: "250px"},400,function(){
				$(this).children(".about").show();
			});
		}else{
			alert("Este módulo ainda não está disponível!");
		}
	});
	
	$(".curse .startBt").click(function() {
		var divpartent = $(this).parent().parent().parent();
		if($(divpartent).attr("id")){
			var nloc = $(divpartent).attr("id")+".php";
			//alert("Indo para "+nloc+"!");
			window.location = nloc;
			//$(this).css("height", "+=100");
		}else{
			alert("Este módulo ainda não está disponível!");
			//alert($(divpartent).attr("class"));
		}
	});
	
	$(".main").css('height', '100%').css('height', '-=56px');
	
	$('.container input[type=radio]').change(
		function(){
			if (this.checked) {
				if(typeof $(this).attr('resposta') !== typeof undefined && $(this).attr('resposta') !== false){
					alert("Resposta correta!");
					swiper.slideNext();
				}else{
					alert("Resposta errada!");
				}
			}
		}
	);
});
