<?php
$questoes = array(
				array(
					'pergunta' => "Para enviar a minha localização, eu preciso:",
					'respostas' => array("Ir em 'Configurações; e pressionar enviar.", "Dentro de uma conversa, eu clico no clips (que fica na área de digitação do texto) e em seguida seleciono 'Localização'.*", "Vou na aba 'Chamadas' e procuro a pessoa que quero compartilhar minha localização", "Devo apertar no botão com o símbolo de um telefone, dentro da conversa."),
				),
				array(
					'pergunta' => "Como enviar um áudio?",
					'respostas' => array("Dentro da conversa eu seleciono os 3 pontinhos no canto superior direito e mando o áudio", "Na página inicial do app, eu seleciono a lupa, que fica no canto superior direito e mando o áudio ", "Dentro da conversa, ao lado da área de digitação da mensagem, eu pressiono o microfone verde e envio o áudio.*"),
				),
				array(
					'pergunta' => "Como conectar o whatsapp web?",
					'respostas' => array("Na página principal, eu devo im em 'Conversas' e em seguida selecionar 'Whatsapp Web'e conectar com meu computador","Na página principal, eu devo ir nos três pontinhos (canto superior direito) e em seguida selecionar 'Whatsapp Web' e conectar com meu computador", "Vou na aba 'Status' e seleciono Whatsapp Web", "Vou em 'Configurações'e em seguida seleciono Whatsapp Web"),
				)
			);
shuffle($questoes);
//print_r($questoes);
?>
<!DOCTYPE html>
<html>
<head>
	<meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<meta HTTP-EQUIV="EXPIRES" CONTENT="Mon, 22 Jul 2002 11:12:01 GMT">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="canonical" href="https://weather-pwa-sample.firebaseapp.com/final/">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inc Digital</title>
	<link rel="stylesheet" type="text/css" href="styles/whatsapp.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<script src="scripts/app.js" async></script>

	<!-- TODO add manifest here -->
	<link rel="manifest" href="/manifest.json">
	<!-- Add to home screen for Safari on iOS -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="Inc Digital">
	<link rel="apple-touch-icon" href="images/icons/icon-152x152.png">
	<meta name="msapplication-TileImage" content="images/icons/icon-144x144.png">
	<meta name="msapplication-TileColor" content="#2F3BA2">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.2/css/swiper.min.css">
</head>
<body>


	<header class="header" style="">
		<img id="headerLogo" src="images/icons/icon-64x64-white.png" />
		<h1 class="header__title">Inclusão Digital</h1>
		<button id="butRefresh" class="headerButton" aria-label="Refresh"></button>
		<!-- <button id="butAdd" class="headerButton" aria-label="Add"></button> -->
	</header>

	<main class="main">
		<!-- Swiper -->
		<div class="swiper-container">			
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div style="width: 80%;">
						<h3>Vamos começar o tutorial?<br />Arraste para o lado para começar!</h3>
					</div>
				</div>
				<?php
				
					$imgN = 1;
					
					while(file_exists("images/whatsapp/1/".$imgN.".jpg"))
					{
						echo('<div class="swiper-slide"><img src="images/whatsapp/1/'.$imgN.'.jpg"/></div>');
						$imgN++;
					}
				?>
				<div class="swiper-slide"><span style="font-size: 9vw; width: 80%;">Vamos ver se você aprendeu?</span></div>
				<div class="swiper-slide"><span style="font-size: 9vw; width: 80%;">Então responda essas perguntas</span></div>
				<?php
					foreach($questoes AS $questao){
						
						shuffle($questao['respostas']);
						
						echo ('<div class="swiper-slide swiper-no-swiping" noswipe="true"><div style="width: 80%;"><span style="font-size: 9vw;">'.$questao['pergunta'].'</span><br /><br /><center>');
						
						foreach($questao['respostas'] AS $respostas){
							echo ('<label class="container">'.str_replace("*", "", $respostas));
							if(strpos($respostas,"*") !== FALSE){								
								echo ('<input type="radio" checked="checked" name="resposta" resposta><span class="checkmark"></span></label>');
							}else{
								echo ('<input type="radio" checked="checked" name="resposta"><span class="checkmark"></span></label>');
							}
							
						}						
						echo ('</center></div></div>');
						
					}
				?>
			</div>
		<!-- Add Arrows -->
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
		</div>
	</main>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.2/js/swiper.min.js"></script>
	
	<script>
		var swiper = new Swiper('.swiper-container', {
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			noSwiping: true,
			noSwipingClass: 'swiper-no-swiping',
		});
		swiper.on('slideChange', function () {
			//alert($(swiper.slides[swiper.realIndex]).attr('class').indexOf('swiper-no-swiping'));
			if($(swiper.slides[swiper.realIndex]).attr('class').indexOf('swiper-no-swiping')>-1){
				$('.swiper-button-prev,.swiper-button-next').hide();
			}else{
				$('.swiper-button-next,.swiper-button-prev').show();
			}
		});
	</script>

  <div class="alertBox">
	<p id="alertText">O aplicativo deve ser usado com o celuar na vertical!</p>
  </div>



  <div class="loader" hidden="true">
    <svg viewBox="0 0 32 32" width="32" height="32">
      <circle id="spinner" cx="16" cy="16" r="14" fill="none"></circle>
    </svg>
  </div>

</body>
</html>