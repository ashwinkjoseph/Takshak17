<?php



// To avoid typing again , when backend found any mistake in input data.
$nameofproject = "";
$college = "";

$member1name = "";
$member1school = "";
$member1age = "";

$member2name = "";
$member2school = "";
$member2age = "";

$member3name = "";
$member3school = "";
$member3age = "";

$member4name = "";
$member4school = "";
$member4age = "";

$member5name = "";
$member5school = "";
$member5age = "";

$member6name = "";
$member6school = "";
$member6age = "";

$cost = "";

?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Angry Rockets 2017 | Registeration</title>

        <!-- CSS -->
       
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="http://takshak.in/2017/public/assets/css/form-elements.css">
        <link rel="stylesheet" href="http://takshak.in/2017/public/assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="http://takshak.in/2017/public/assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://takshak.in/2017/public/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://takshak.in/2017/public/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://takshak.in/2017/public/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="http://takshak.in/2017/public/assets/ico/apple-touch-icon-57-precomposed.png">
        <style>
            body{
                background: black;
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
 /* #AboutMACE{ */
		/* z-index:10; */
		/* position: absolute; */
		/* top: -10%; */
		/* -webkit-transition: 10s; */
		/* -moz-transition: 10s; */
		/* -o-transition: 10s; */
		/* transition: 10s; */
		/* margin-top: -100px; */
		/* margin-left: 120px; */
        /* height: 500px; */
        /* width: 100%; */
    /* } */
    #AboutMACE{
        height : 100vh;
    }
    .trigg1{
        max-width:25%;
    }
    .trigg2{
        max-width:40%;
    }
    .trigg3{
        max-width:30%;
    }
    .trigg4{
        max-width:25%;
    }
        </style>
        <script>
            var PAGE = "1.jpg";
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
        </script>
    </head>

    <body>
        
            
    <div id="overlay">
        <div id="progstat"></div>
        <div id="progress"></div>
    </div>
        <div class="cloudbase" style="opacity: 0.6">
            <img class="cloudLayer bimg3 bimg31 lightning flashit" name="bimg3" style="opacity:1;transform:perspective(1000px) translateZ( 845px ) translateX(50px)" src="http://www.takshak.in/2017/public/images/cloud.png" />
            <img class="cloudLayer bimg3 lightning bimg4 flashit2" name="bimg4" style="opacity:1;transform: perspective(1000px) translateX(-350px) translateY(160px) translateZ( 500px )" src="http://www.takshak.in/2017/public/images/cloud.png"/>
        </div>
        <!-- Content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        	<a href="index.html"><img style="height:100px;" src="http://takshak.in/2017/public/images/angry.png"></a>
                            <h1><strong>Angry Rockets 2017</strong> Registration</h1>
                            <!-- <div class="description">
                            	<p>
	                            	<b>Hackathon,</b> is a stage for you to showcase your ideas and your skills and be rewarded for your work <br>

                                    If you have a great idea to solve an issue with the help of software, gather up a team,come participate in our hackathon and implement your idea as an actual product and pitch it to us.<br>

                                    If you can convience us that your product / idea is worth it, you will be awarded cash prices ranging from 5K to 10K.<br>

                                    Even if you dont, you stand the chance of being placed at Cognicor.<br>
                            	</p>
                            </div> -->
                            <div class="top-big-link">
                                <a class="btn launch-modal trigg1" href="#" data-modal-id="modal-register"><img src="http://takshak.in/2017/public/images/Register.png"/></a>
                                <a class="btn launch-modal trigg2" href="#" data-modal-id="aboutAngry"><img src="http://takshak.in/2017/public/images/aboutangryrig.png"/></a>
                                <a class="btn launch-modal trigg3" data-modal-id="aboutTakshak" href="#"><img src="http://takshak.in/2017/public/images/aboutTriggers1.png"/></a>
                                <a class="btn launch-modal trigg4" data-modal-id="aboutMACE" href="#"><img src="http://takshak.in/2017/public/images/aboutTriggers2.png"/></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <!-- MODAL -->
        <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">
        					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        				</button>
        				<h3 class="modal-title" id="modal-register-label">Fill The Form</h3>
        				<!-- <p>Please fill in the form and wait for confirmation mail</p> -->
        			</div>
        			
        			<div class="modal-body">
        				
	                    <form role="form" action="http://takshak.in/2017/public/angryrockets/submit" method="post" class="registration-form" enctype="multipart/form-data">
	                    	<div class="form-group">
	                    		<label class="sr-only" for="form-project-name">Name Of Team*</label>
	                        	<input type="text" name="form-project-name" placeholder="Name of Team*" class="form-project-name form-control" id="form-project-name" value="<?=$nameofproject?>">
	                        </div>
                            <!-- <div class="form-group">
                                <label class="sr-only" for="form-college">College / School *</label>
                                <input type="text" name="form-college" placeholder="College / School *" class="form-college form-control" id="form-college" value="<?=$college?>">
                            </div> -->
                            <hr/>

                            <div class="form-member">
                                <h5>Member 1</h5>
                                <input type="hidden" name="member1" value="1"/>
                                <div class="form-group">
                                    <label class="sr-only" for="form-member-1-name">Name</label>
                                    <input type="text" name="form-member-1-name" placeholder="Name*" class="form-member-name form-control" id="form-member-1-name" value="<?=$member1name?>">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-member-1-email">E-Mail</label>
                                    <input type="email" name="form-member-1-email" placeholder="E-Mail*" class="form-member-name form-control" id="form-member-1-email" value="<?=$member1name?>">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-member-1-contact">Contact</label>
                                    <input type="number" name="form-member-1-contact" placeholder="Contact Number*" class="form-member-school form-control" id="form-member-1-contact" value="<?=$member1school?>">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-member-1-school">School</label>
                                    <input type="text" name="form-member-1-school" placeholder="Name Of College / School " class="form-member-school form-optional form-control" id="form-member-1-school" value="<?=$member1school?>">
                                </div>
                            </div>

                            <div class="form-member hidden-form-member">
                                <h5>Member 2</h5>
                                <input type="hidden" name="member2" value="0"/>
                                <div class="form-group">
                                    <label class="sr-only" for="form-member-2-name">Name</label>
                                    <input type="text" name="form-member-2-name" placeholder="Name" class="form-member-name form-control form-optional" id="form-member-2-name" value="<?=$member2name?>">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-member-2-email">E-Mail</label>
                                    <input type="email" name="form-member-2-email" placeholder="E-Mail" class="form-member-name form-control form-optional" id="form-member-2-email" value="<?=$member2name?>">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-member-2-contact">Contact</label>
                                    <input type="number" name="form-member-2-contact" placeholder="Contact Number" class="form-member-school form-optional form-control" id="form-member-2-contact" value="<?=$member1school?>">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-member-2-school">School</label>
                                    <input type="text" name="form-member-2-school" placeholder="Name Of College / School " class="form-member-school form-control form-optional" id="form-member-2-school" value="<?=$member2school?>">
                                </div>
                            </div>

                            <div class="form-member hidden-form-member">
                                <h5>Member 3</h5>
                                <input type="hidden" name="member3" value="0"/>
                                <div class="form-group">
                                    <label class="sr-only" for="form-member-3-name">Name</label>
                                    <input type="text" name="form-member-3-name" placeholder="Name" class="form-member-name form-control form-optional" id="form-member-3-name" value="<?=$member2name?>">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-member-3-email">E-mail</label>
                                    <input type="email" name="form-member-3-email" placeholder="E-Mail" class="form-member-name form-control form-optional" id="form-member-3-email" value="<?=$member2name?>">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-member-3-contact">Contact</label>
                                    <input type="number" name="form-member-3-contact" placeholder="Contact Number" class="form-member-school form-optional form-control" id="form-member-3-contact" value="<?=$member1school?>">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-member-3-school">School</label>
                                    <input type="text" name="form-member-3-school" placeholder="Name Of College / School " class="form-member-school form-control form-optional" id="form-member-3-school" value="<?=$member2school?>">
                                </div>
                            </div>
                            
                            <div class="form-member">
                                <button class="btn green" id="newmember" onclick="addmember()" type="button">Add Another Member</button>
                            </div>

                            <hr/>

                            <!-- <span style="color:red">Payment details will be given later, fee is 250 Rupees per Team Member</span> -->
	                        <button type="submit" class="btn">Send The Form &amp; Register</button>
	                    </form>
	                    
        			</div>
        			
        		</div>
        	</div>
        </div>

        <div class="modal fade" id="aboutMACE" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
        	<img id="AboutMACE" src="http://takshak.in/2017/public/images/AboutMACE.png" data-dismiss="modal">
        </div>

        <div class="modal fade" id="aboutTakshak" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
        	<img id="AboutMACE" src="http://takshak.in/2017/public/images/AboutTakshak.png" data-dismiss="modal">
        </div>

        <div class="modal fade" id="aboutAngry" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" style="padding-left:30%;">
                    <div class="item active">
                        <img id="AboutMACE" src="http://takshak.in/2017/public/images/aboutangry1.png" data-dismiss="modal">
                    </div>

                    <div class="item">
                        <img id="AboutMACE" src="http://takshak.in/2017/public/images/aboutangry2.png" data-dismiss="modal">
                    </div>
                    
                    <div class="item">
                        <img id="AboutMACE" src="http://takshak.in/2017/public/images/aboutangry3.png" data-dismiss="modal">
                    </div>

                    <div class="item">
                        <img id="AboutMACE" src="http://takshak.in/2017/public/images/aboutangry4.png" data-dismiss="modal">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </body>

        <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="http://takshak.in/2017/public/assets/js/jquery.backstretch.min.js"></script>
        <script src="http://takshak.in/2017/public/assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="http://takshak.in/2017/public/assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>