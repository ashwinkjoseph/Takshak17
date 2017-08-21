<html>
	<head>
	<title>Takshak'17</title>
	<style>
	*{
		box-sizing: border-box;
		margin: 0;
		padding: 0;
	}
	body {
		color: #eee;
		text-shadow: 0 -1px 0 rgba( 0, 0, 0, .6 );
		font-family: 'Open Sans', sans-serif;
		font-size: 13px;
		line-height: 16px;
		overflow: hidden;
		background: black;
		zoom: 110%;
	}
	#viewport {
		-webkit-perspective: 1000;
		-moz-perspective: 1000;
		-o-perspective: 1000;
		perspective: 1000;
		position: absolute;
		left: 0;
		top: 0;
		right: 0;
		bottom: 0;
		overflow: hidden;
		width:140%;
		height: 130%;
		z-index: 1;
		margin-top:150px;
		zoom:150%;
		margin-left: 35px;
	}

	#world {
		position: absolute;
		left: 50%;
		top: 50%;
		margin-left: -156px;
		margin-top: -356px;
		height: 512px;
		width: 512px;
		/* background-color: rgba( 255, 0, 0, .2 ); */
		-webkit-transform-style: preserve-3d;
		-moz-transform-style: preserve-3d;
		-o-transform-style: preserve-3d;
		z-index: 1;
	}

	#world div {
		-webkit-transform-style: preserve-3d;
		-moz-transform-style: preserve-3d;
		-o-transform-style: preserve-3d;
		margin-left:-100px;
	}

	.cloud{
		margin-top:260px;
	}
	
	.cloudBase {
		position: absolute;
		width: 100%;
		height: 100%;
		margin-left: -10px;
		margin-top: -10px;
		z-index: 0;
	}

	.cloudLayer {
		position: absolute;
		left: 50%;
		top: 50%;
		width: 256px;
		height: 256px;
		margin-left: -128px;
		margin-top: 128px;
		-webkit-transition: opacity .5s ease-out;
		-moz-transition: opacity .5s ease-out;
		-o-transition: opacity .5s ease-out;
		transition: opacity 0.5s ease-out;
		z-index: 0;
	}
		
		.movingCloud1{
			left: 0;
			-webkit-animation: cloudAnimation linear 20s infinite;
			animation: cloudAnimation linear 20s infinite;
		}

	#title{
		height:50px;
		opacity: 0;
		padding-left: 330px;
		position: absolute;
		margin-left: -190px;
		-webkit-transition: 10s;
		-moz-transition:10s;
		-o-transition: 10s;
		transition: 10s;
		z-index: 3;
	}
	#titleBase{
		height:500px;
		width:600px;
		z-index: 1;
	}
	.bimg3{
		-webkit-transition: 40s;
		-moz-transition: 40s;
		-o-transition: 40s;
		transition: 18s;
	}
	#logo{
		-webkit-transition: 25s;
		-moz-transition: 25s;
		-o-transition: 25s;
		transition: 25s;
		position: relative;
		z-index: 1;
		padding-top: 50px;
		padding-left: 35px;
	}
	#comingSoon{
		margin-left: 85px;
		-webkit-transition: 25s;
		-moz-transition: 25s;
		-o-transition: 25s;
		transition: 25s;
		position: relative;
		z-index: 1;
		height: 70px;
		margin-top: -50px;
	}
	#Date{
		-webkit-transition: 25s;
		-moz-transition: 25s;
		-o-transition: 25s;
		transition: 25s;
		position: relative;
		z-index: 1;
		height: 70px;
		margin-left: 85px;
		margin-top: -20px;
	}
	.lightning{
		-webkit-filter: brightness(3);
		filter: brightness(3);
		-o-filter: brightness(3);
		-moz-filter: brightness(3);
	}
	.flashit{
	-webkit-animation: flash ease-out 10s infinite;
	animation: flash ease-out 10s infinite;
	-webkit-animation-delay: 1s;
			animation-delay: 1s;
	}

	.flashit2{
	-webkit-animation: flash ease-out 15s infinite;
	animation: flash ease-out 15s infinite;
	-webkit-animation-delay: 1s;
			animation-delay: 1s;
	}

	@-webkit-keyframes flash {
		from { opacity: 0; } 
	92% { opacity: 0; }
		93% { opacity: 0.6; }
	94% { opacity: 0.2; }
	96% { opacity: 0.9; } 
		to { opacity: 0; }
	}

	@keyframes flash {
		from { opacity: 0; } 
		92% { opacity: 0; }
		93% { opacity: 0.6; }
		94% { opacity: 0.2; }
		96% { opacity: 1; } 
		to { opacity: 0; }
	}

	@keyframes cloudAnimation {
		0% { left:-20%;} 
		100% { left: 120%; }
	}
	.bimg31{
		transform: perspective(1000px) translateZ( 845px ) translateX(50px);
	}
	.bimg4{
		transform: perspective(1000px) translateX(-250px) translateY(100px) translateZ( 500px );
	}
	.about{
		-webkit-transition: 30s;
		-moz-transition: 30s;
		-o-transition: 30s;
		transition: 30;
		z-index:1;
		height: 40px;
		margin-top: -10px;
		padding-left:80px;
		opacity:0;
	}
	#AboutTakshak{
		z-index:10;
		position: absolute;
		top: -10%;
		left: -15%;
		-webkit-transition: 10s;
		-moz-transition: 10s;
		-o-transition: 10s;
		transition: 10s;
		margin-left: 50px;
		margin-top: 20px;
	}
	#AboutMACE{
		z-index:10;
		position: absolute;
		top: -10%;
		-webkit-transition: 10s;
		-moz-transition: 10s;
		-o-transition: 10s;
		transition: 10s;
		margin-top: -100px;
		margin-left: 120px;
		height: 1000px;
	}
	#aboutdiv{
		z-index:10;
		top: -10%;
		left: -10%;
		position: absolute;
		display:none;
	}
	#preloader{
		width:100%;
		height:100%;
		z-index:300;
		background:url('http://localhost/Takshak17/public/images/0.gif');
		background-repeat:no-repeat;
		background-position:center;
		text-align:center;
		vertical-align: middle;
	}
	/* #wrapper{
		display:none;
	} */
	#loading{
		padding-top:58vh;
	}
	#overlay{
  position:fixed;
  z-index:99999;
  top:0;
  left:0;
  bottom:0;
  right:0;
  background:rgba(0,0,0,0.9);
  transition: 1s 0.4s;
}
#progress{
  height:1px;
  background:#fff;
  position:absolute;
  width:0;
  top:50%;
  transition: 1s;
}
#progstat{
  font-size:0.7em;
  letter-spacing: 3px;
  position:absolute;
  top:50%;
  margin-top:-40px;
  width:100%;
  text-align:center;
  color:#fff;
}

.marquee {
	/* padding-top:300px; */
    width: 450px;
    margin: 0 auto;
    white-space: nowrap;
    overflow: hidden;
	box-sizing: border-box;
	z-index: 100;
}

.marquee span {
	padding-top:30px;
    display: inline-block;
    padding-left: 100%;  /* show the marquee just outside the paragraph */
	animation: marquee 15s linear infinite;
	font-size:30;
	color: white;
}

.marquee span:hover {
    animation-play-state: paused
}

/* Make it move */
@keyframes marquee {
    0%   { transform: translate(0, 0); }
    100% { transform: translate(-100%, 0); }
}

</style>
<script>
	;(function(){
          function id(v){ return document.getElementById(v); }
          function loadbar() {
            var ovrl = id("overlay"),
                prog = id("progress"),
                stat = id("progstat"),
                img = document.images,
                c = 0,
                tot = img.length;
            if(tot == 0) return doneLoading();

            function imgLoaded(){
              c += 1;
              var perc = ((100/tot*c) << 0) +"%";
              prog.style.width = perc;
              stat.innerHTML = "Loading "+ perc;
              if(c===tot) return doneLoading();
            }
            function doneLoading(){
              ovrl.style.opacity = 0;
              setTimeout(function(){ 
                ovrl.style.display = "none";
              }, 1200);
            }
            for(var i=0; i<tot; i++) {
              var tImg     = new Image();
              tImg.onload  = imgLoaded;
              tImg.onerror = imgLoaded;
              tImg.src     = img[i].src;
            }    
          }
          document.addEventListener('DOMContentLoaded', loadbar, false);
        }());
	var popup = function(element){
		document.getElementById('aboutdiv').style.display = "flex";
		if(element == "takshak"){
			document.getElementById('AboutTakshak').style.opacity=1;
		}
		else{
			document.getElementById('AboutMACE').style.opacity=1;
		}
	}
	window.onclick = (e) => {
		if(e.target.className!="about"){
			document.getElementById('aboutdiv').style.display = "none";
			AboutTakshak.style.opacity = 0;
			AboutMACE.style.opacity = 0;
		}
	}
	var titleFunc = function(){
		// document.getElementById('bgm').play();
		// document.getElementById('preloader').style.display = "none";
		// document.getElementById('wrapper').style.display="block";
	    var Dateimg = document.getElementById('Date');
		var thunder = document.getElementById('thunder');
		var title = document.getElementById('title');
		var logo = document.getElementById('logo');
		var comingSoon = document.getElementById('comingSoon');
		setTimeout(function() {
			title.style.height= "300px";
			title.style.opacity="1";
			title.style.paddingLeft="0px";
		}, 500);
		document.getElementsByName('bimg3').forEach(function(cloud){
			cloud.style.opacity="0.2";
		});
		setTimeout(function(){
			title.style.height = "150px";
			title.style.paddingLeft="190px";
			title.style.transform = "translateY(-50px)";
			setTimeout(()=>{
				logo.style.opacity="1";
				setTimeout(()=>{
				    comingSoon.style.opacity="1";
				    setTimeout((()=>{
				        Dateimg.style.opacity="1";
						Array.prototype.forEach.call(document.getElementsByClassName('about'), function(about){
							about.style.opacity = 1;
						});
					}));
				}, 1000);
			}, 1000);
		}, 4000);
	}
	</script>
	</head>
	<body onload="titleFunc()">
	<audio id="bgm" autoplay loop>
		 <source src="http://www.takshak.in/2017/public/sounds/bgm.mp3" type="audio/mpeg"> 
	</audio>
	<audio id="thunder">
		<source src="http://www.takshak.in/2017/public/sounds/thuder1.mp3" type="audio/mpeg">
	</audio>
	<!-- <div id="preloader">
		<div id="loading">Loading....</div>
	</div> -->
	<div id="overlay">
        <div id="progstat"></div>
        <div id="progress"></div>
    </div>
	<div id="wrapper">
		<div id="cloudBase" class="cloud">
		</div>
		<div id="viewport" >
		<a class="marquee" href="http://takshak.in/2017/public/avishkar"><span>Registrations for avishkar has already began..... Click here to Register</span></a>
			<div id="world" >
				<div id="titleBase">
					<img id="title" src="http://www.takshak.in/2017/public/images/Takshak.png"/>
					<img id="logo" src="http://www.takshak.in/2017/public/images/logo.png" style="opacity:0"/>
					<img id="comingSoon" src="http://www.takshak.in/2017/public/images/comingSoon.png" style="opacity:0"/>
					<img id="Date" src="http://www.takshak.in/2017/public/images/Date.png" style="opacity:0"/><br>
					<img style="float:left" class="about" src="http://www.takshak.in/2017/public/images/aboutTriggers1.png" onclick="popup('takshak')">
					<img id="mac" class="about" src="http://www.takshak.in/2017/public/images/aboutTriggers2.png" style="float:left" onclick="popup('mace')">
					<div id="aboutdiv" style="z-index:5">
						<img id="AboutTakshak" src="http://www.takshak.in/2017/public/images/AboutTakshak.png" style="opacity:0"/>
						<img id="AboutMACE" src="http://www.takshak.in/2017/public/images/AboutMACE.png" style="opacity:0"/>
					</div>
				</div>
			</div>
		</div>
	</div>
	<img class="cloudLayer cloud bimg3 bimg31" name="bimg3" style="opacity:1" src="http://www.takshak.in/2017/public/images/cloud.png"/>
	<img class="cloudLayer cloud bimg3 bimg31 lightning flashit" name="bimg3" style="opacity:1" src="http://www.takshak.in/2017/public/images/cloud.png"/>
	<img class="cloudLayer cloud bimg3 bimg4" name="bimg4" style="opacity:0.2" src="http://www.takshak.in/2017/public/images/cloud.png"/>
	<img class="cloudLayer cloud bimg3 lightning bimg4 flashit2" name="bimg4" style="opacity:1" src="http://www.takshak.in/2017/public/images/cloud.png"/>
	<script>

	(function() {
		var lastTime = 0;
		var vendors = ['ms', 'moz', 'webkit', 'o'];
		for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
			window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
			window.cancelRequestAnimationFrame = window[vendors[x]+
			  'CancelRequestAnimationFrame'];
		}

		if (!window.requestAnimationFrame)
			window.requestAnimationFrame = function(callback, element) {
				var currTime = new Date().getTime();
				var timeToCall = Math.max(0, 16 - (currTime - lastTime));
				var id = window.setTimeout(function() { callback(currTime + timeToCall); },
				  timeToCall);
				lastTime = currTime + timeToCall;
				return id;
			};

		if (!window.cancelAnimationFrame)
			window.cancelAnimationFrame = function(id) {
				clearTimeout(id);
			};
	}())

	var layers = [],
		objects = [],

		world = document.getElementById( 'world' ),
		viewport = document.getElementById( 'viewport' ),

		d = 0,
		p = 400,
		worldXAngle = 0,
		worldYAngle = 0;

	viewport.style.webkitPerspective = p;
	viewport.style.MozPerspective = p;
	viewport.style.oPerspective = p;

	generate();

	function createCloud() {

		var div = document.getElementById('cloudBase');
		div.className = 'cloudBase';
		var size = Math.round( Math.random() * 10 );
		console.log(size);
		for( var j = 0; j < 5 + size; j++ ) {
			var cloud = document.createElement( 'img' );
			cloud.style.opacity = 0;
			var r = Math.random();
			var src = 'http://www.takshak.in/2017/public/images/cloud.png';
			( function( img ) { img.addEventListener( 'load', function() {
				img.style.opacity = .4;
			} ) } )( cloud );
			cloud.setAttribute( 'src', src );

			var randomCloudClass = Math.random();
			cloud.className = 'cloudLayer movingCloud1';

			if(Math.random() > 0.5){
				cloud.style.animationDirection = "reverse";
			}	
			cloud.style.animationDuration = (22+(Math.random() * 800))+"s";
			cloud.style.animationDelay =  "-"+(10+Math.random() * 1000)+"s";
			
			var x = 256 - ( Math.random() * 512 );
			var y = 256 - ( Math.random() * 512 );
			var z = 1000 - ( Math.random() * 200 );
			console.log("z: "+z);
			var a = Math.random() * 360;
			var s = .75 + Math.random();
			x *= .2; y *= .2;
			cloud.data = {
				x: x,
				y: y,
				z: z,
				a: a,
				s: s,
				speed: .1 * Math.random()
			};
			var t = 'translateX(0px ) translateY( ' + (y) + 'px ) translateZ( ' + (z) + 'px ) scale( ' + s + ')';
			cloud.style.webkitTransform = t;
			cloud.style.MozTransform = t;
			cloud.style.oTransform = t;

			div.appendChild( cloud );
			layers.push( cloud );
		}

		return div;
	}

	function onMouseMove ( e ) {

		var x = e.clientX || e.touches[ 0 ].clientX;
		var y = e.clientY || e.touches[ 0 ].clientY;

		worldYAngle = -( .5 - ( x / window.innerWidth ) ) * 180;
		worldXAngle = ( .5 - ( y / window.innerHeight ) ) * 180;
		updateView();
		event.preventDefault();

	}

	function onContainerMouseWheel( event ) {

		event = event ? event : window.event;
		d = d - ( event.detail ? event.detail * -5 : event.wheelDelta / 8 );
		updateView();
		event.preventDefault();

	}

	function generate() {

		objects = [];
		
		objects.push(document.getElementById('bimg'));
		for( var j = 0; j < 1; j++ ) {
			objects.push( createCloud() );
		}

	}

	function updateView() {
		var t = 'translateZ( ' + d + 'px ) rotateX( ' + worldXAngle + 'deg) rotateY( ' + worldYAngle + 'deg)';
		world.style.webkitTransform = t;
		world.style.MozTransform = t;
		world.style.oTransform = t;
	}
	var zbing = 60;
	var zspeed = 0.01;
	function update (){

		for( var j = 0; j < layers.length; j++ ) {
			var layer = layers[ j ];
			layer.data.a += layer.data.speed;
			var t = 'translateX(0px) translateY( ' + (layer.data.y*j) + 'px ) translateZ( ' + (layer.data.z*j) + 'px ) rotateY( ' + ( - worldYAngle ) + 'deg ) rotateX( ' + ( - worldXAngle ) + 'deg ) rotateZ( ' + layer.data.a + 'deg ) scale( ' + layer.data.s + ')';
			layer.style.webkitTransform = t;
			layer.style.MozTransform = t;
			layer.style.oTransform = t;
		}
		requestAnimationFrame( update );

	}

	update();

	</script>

	</body>
</html>
