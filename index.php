<!DOCTYPE html>
<html>
<head>
<script src="Winwheel.min.js"></script>
 <script src="TweenMax.min.js"></script>
</head>
<body>
<input type="button" value="Girar" onclick="miRuleta.startAnimation();" style="width:180px;height:90px;font-size:35px;">
 <br />
 <br />
 <canvas id='canvas' height="400" width="400"></canvas>

 
 <script>
 var miRuleta = new Winwheel({
           'numSegments': 6, // Numero de segmentos
           'outerRadius'    : 170, // Radio externo
            'segments':[ // Datos de los segmentos
                { 'fillStyle': '#f1c40f', 'text': 'Pregunta' },
                { 'fillStyle': '#2ecc71', 'text': 'Reto' },
                { 'fillStyle': '#e67e22', 'text': 'Vuelve a tirar' },
				{ 'fillStyle': '#f1c40f', 'text': 'Pregunta' },
                { 'fillStyle': '#2ecc71', 'text': 'Reto' },
                { 'fillStyle': '#e67e22', 'text': 'Vuelve a tirar' },
            ],
            'animation': { 
                'type': 'spinToStop', // Giro y alto
                'duration': 5, // Duracion de giro
                'callbackFinished': 'Mensaje()', // Funcion para mostrar mensaje
                'callbackAfter': 'dibujarIndicador()' // Funciona de pintar indicador
            }
         });
		 
		 
dibujarIndicador();
       function Mensaje() {
           var SegmentoSeleccionado = miRuleta.getIndicatedSegment();
           alert("Elemento seleccionado: " + SegmentoSeleccionado.text + "!");
           miRuleta.stopAnimation(false);
           miRuleta.rotationAngle = 0;
           miRuleta.draw();
           dibujarIndicador();
       }
	   
       function dibujarIndicador() {
            var ctx = miRuleta.ctx;
            ctx.strokeStyle = 'navy';     
            ctx.fillStyle = 'black';     
            ctx.lineWidth = 2;
            ctx.beginPath();             
            ctx.moveTo(170, 0);          
            ctx.lineTo(230, 0);          
            ctx.lineTo(200, 40);
            ctx.lineTo(171, 0);
            ctx.stroke();                
            ctx.fill();                  
       }
 </script>
 
</body>
</html>