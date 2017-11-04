<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Página Inicial do Sistema</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jumbotron.css" rel="stylesheet">
	<script type="text/javascript" src="https://cdn.rawgit.com/ricmoo/aes-js/e27b99df/index.js"></script>
	<script type="text/javascript" src="js/md5.js"></script>


	<script type="text/javascript">	
		var text;
		var text2;
		var hash;
		var hash2;

		window.onload = function() {
			var fileInput = document.getElementById('fileInput');
			var fileDisplayArea = document.getElementById('fileDisplayArea');

			fileInput.addEventListener('change', function(e) {
				var file = fileInput.files[0];
				var textType = /text.*/;

				if (file.type.match(textType)) {
					var reader = new FileReader();

					reader.onload = function(e) {
						fileDisplayArea.innerText = reader.result;
					}

					reader.readAsText(file);	
				} else {
					fileDisplayArea.innerText = "File not supported!"
				}
			});

			var fileInput2 = document.getElementById('fileInput2');
			var fileDisplayArea2 = document.getElementById('fileDisplayArea2');

			fileInput2.addEventListener('change', function(e) {
				var file2 = fileInput2.files[0];
				var textType2 = /text.*/;

				if (file2.type.match(textType2)) {
					var reader2 = new FileReader();

					reader2.onload = function(e) {
						fileDisplayArea2.innerText = reader2.result;
					}

					reader2.readAsText(file2);	
				} else {
					fileDisplayArea2.innerText = "File not supported!"
				}
			});

			var fileDisplayArea3 = document.getElementById('fileDisplayArea3');
		}

		function gerarHash() {

			text = fileDisplayArea.innerText;

			console.log ("Esse é o texto original 1: ", text);

			hash = b64_md5(text);
						
			console.log("Esse é o Hash 1: ", hash);

			fileDisplayArea.innerText += "\n" + hash;


		}

		function gerarHash2() {

			text2 = fileDisplayArea2.innerText;

			console.log ("Esse é o texto original 2: ", text2);

			hash2 = b64_md5(text2);
						
			console.log("Esse é o Hash 2: ", hash2);

			fileDisplayArea2.innerText += "\n" + hash2;
	
		}

		function compararHash() {
			if(fileDisplayArea.innerText == fileDisplayArea2.innerText){
				fileDisplayArea3.innerText = "Os arquivos possuem hashs iguais ! Conteúdos idênticos !";
				console.log("Os arquivos possuem hashs iguais ! Conteúdos idênticos !");
			}
			else{
				fileDisplayArea3.innerText = "Os arquivos não possuem hashs iguais ! Conteúdos diferentes !";
				console.log("Os arquivos não possuem hashs iguais ! Conteúdos diferentes !");
			}
		}
	</script>

  </head>

  	<body>
		<nav class="navbar navbar-static-top navbar-dark bg-inverse">
			<?php
				echo "Seja Bem-Vindo(a) ". $_SESSION['usuarioNome'];	
			?> | <a href="sair.php" style="color: #fff">Sair</a>
		</nav>

		<div class="jumbotron">
			<div class="container">
				<center><h1 class="display-3">Olá, Bem-Vindo(a)!</h1>
				<p>Essa página é sobre o nosso trabalho de segurança de sistemas, disciplina ministrada pelo professor Jackson =)<br/>
				Componentes do grupo: Fernando, Matheus e Tayse</p></center>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<center><h2>Trabalho de Segurança de Sistemas utilizando o algoritmo de Hash MD5</h2><br /></center>
				<div class="col-md-6">
					<center><h3>Gerar Hash 1</h3></center>
					<div id="page-wrapper">
						<center><input type="file" accept='text/plain' name="Arquivo" id="fileInput"><br /><br /></center>
						<input class="btn btn-lg btn-primary btn-block" onclick="gerarHash()" value="Gerar Hash" />
						<center><pre id="fileDisplayArea"></pre></center>
					</div>
				</div>
				<div class="col-md-6">
					<center><h3>Gerar Hash 2</h3></center>
					<div id="page-wrapper">
						<center><input type="file" accept='text/plain' name="Arquivo2" id="fileInput2"><br /><br /></center>
						<input class="btn btn-lg btn-primary btn-block" onclick="gerarHash2()" value="Gerar Hash" />
						<center><pre id="fileDisplayArea2"></pre></center>
					</div>
				</div>
				<div class="col-md-12">
					<center><h3>Comparação de Hashs</h3></center>
					<div id="page-wrapper">
						<input class="btn btn-lg btn-primary btn-block" onclick="compararHash()" value="Comparar Hash" />
						<center><pre id="fileDisplayArea3"></pre></center>
					</div>
				</div>
			</div>
			<hr>
			<footer>
				<center><p>&copy; SS 2017</p></center>
			</footer>
		</div>    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
	</body>
</html>
