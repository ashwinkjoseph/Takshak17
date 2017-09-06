<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Takshak `17 | MACE</title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="http://takshak.in/2017/public/assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://takshak.in/2017/public/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://takshak.in/2017/public/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://takshak.in/2017/public/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="http://takshak.in/2017/public/assets/ico/apple-touch-icon-57-precomposed.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://takshak.in/2017/public/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="http://takshak.in/2017/public/assets/css/responsive.css">
    <script src="http://takshak.in/2017/public/assets/js/script.js"></script>
    <script>
        // var timeout = setTimeout(function(){
        //     $('.mobview').prepend("Optimised for slow connections");
        //     $('.deskview').css("display", "none");
        //     $('.mobview').css("display", "block");
        // }, 30000);    
    </script>
</head>

<body>
    <section class="screenfit home" style="color:#FFFFFF;display: block;" id="home">
        <div class="container">
            <br><br><br><br><br>
            <center>
                <img src="http://takshak.in/2017/public/assets/img/new/logo.png" class="mainlogo"><br>
                <span class="subtitle">BEGIN WITHIN</span><br/> 2017 SEPTEMBER 22,23<br>
            </center>
        </div>
    </section>
    <section class="screenfit about">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Takshak</h1>
                    <p>
                        The only way of discovering the limits of the possible is to venture a little past them into the impossible. Here's a college that's obsessed with jumping limitations. It just can't seem to stop. The name's Mar Athanasius College of Engineering, or simply
                        MACE by popular slang. The MACE rests on a low lying mountain at a sun-licked spot in Kothamangalam. They say that the MACE was made out of stardust sprinkled into the gust at the gateway to the western ghats. The college on the
                        mountains is a cool place to be at, and it's not just the altitude. What's cooler is the encouragement the college gives to all technical, cultural and co-curricular endeavours from the students. When you're visiting, if you ask
                        around about MACE, you'll probably hear that the college has been there since forever. But that's a tad untrue, because the college was, established in 1961 as the first in Asia under Christian management, and the first engineering
                        college to affiliate with the Mahatma Gandhi University. Up above, blocks in red and beige house five branches in engineering, one in MCA, other post graduate programmes, and a whole lot of bustling students.
                    </p>
                    <h1 style="margin-top: 40px;">MACE</h1>
                    <p>
                        In the beginning there was a mountain. Somewhere on it were the students, a bunch trying to make sense of the world, perhaps reach out into the unknown. Technology was there too. And then, Takshak happened! It had to. Because bit by bit, piece by piece,
                        the students on the mountain got acquainted with technology. They were fascinated by it, they were curious about it. But, little did they know that this curiosity would get the better of them, that it would crouch within to set
                        their souls on fire. Technology is like that: it surprises you, it excites you, it touches you, it liberates you, it becomes you. Since, the students on the mountain have come and gone, but the fire remains. They continue to celebrate
                        technology, year after year, as if it were a call of the mountains. You see, Takshak is the annual national technical festival of MACE. Some say that it's the Vegas every engineer dreams of, while some like to think of it as a
                        platform that hears out every idea that breaks conventions, no matter how big or small. In truth, ours is simply a festival that celebrates your innovation and prowess. Takshak '17 happens on the 22nd and 23rd of September, this
                        year. This time it's out to rekindle the fire within and awaken the sleeping spirit of innovation.
                    </p>
                </div>
                <div class="col-sm-6"><br><br><br><img src="http://takshak.in/2017/public/assets/img/new/mace-watercolor.png" style="width: 100%"></div>
            </div>
        </div>
    </section>
    <section class="screenfit events">
        <div class="deskview"  style="background: url(http://takshak.in/2017/public/assets/img/new/sea.jpg);background-size: 100% 100%; ">
            <div class="container">
                <br>
                <h1 id="eventLoader" style="color: #EEEEEE">Loading....</h1>
                <img src="http://takshak.in/2017/public/assets/img/new/terrain2.png" id="terrain">
                <!-- <canvas style="margin-left: -120px; position:relative; z-index:1" height="680px" width="900px" id="myCanvas"></canvas> -->
            </div>
        </div>
        <div class="mobview"  style="background: url(http://takshak.in/2017/public/assets/img/new/texture-paper-1.jpg);">
            <div class="container">
                <h1>EVENTS</h1>
                <p>[ Select a department to view Events under it ]</p><br/>
                <span class="depart_mob" onclick="events('Computer Science')">
                    <span class="dep_img"><img src="http://takshak.in/2017/public/assets/img/new/building1.png"></span>
                   <span class="dep_title">
                       <span class="ttle">Computer Department</span>
                       <span class="evts">Total 14 Events</span>
                    </span>
                </span>
                <span class="depart_mob" onclick="events('Civil')">
                    <span class="dep_img"><img src="http://takshak.in/2017/public/assets/img/new/building2.png"></span>
                   <span class="dep_title">
                       <span class="ttle">Civil Department</span>
                       <span class="evts">Total 10 Events</span>
                    </span>
                </span>
                <span class="depart_mob" onclick="events('Mechanical')">
                    <span class="dep_img"><img src="http://takshak.in/2017/public/assets/img/new/building3.png"></span>
                   <span class="dep_title">
                       <span class="ttle">Mechanical Department</span>
                       <span class="evts">Total 18 Events</span>
                    </span>
                </span>
                <span class="depart_mob" onclick="events('Electrical')">
                    <span class="dep_img"><img src="http://takshak.in/2017/public/assets/img/new/building4.png"></span>
                   <span class="dep_title">
                       <span class="ttle">EEE Department</span>
                       <span class="evts">Total 18 Events</span>
                    </span>
                </span>
                <span class="depart_mob" onclick="events('ElectronicsandCommunication')">
                    <span class="dep_img"><img src="http://takshak.in/2017/public/assets/img/new/building5.png"></span>
                   <span class="dep_title">
                       <span class="ttle">EC Department</span>
                       <span class="evts">Total 18 Events</span>
                    </span>
                </span>
            </div>
        </div>

    </section>
    <section class="sponsors screenfit" style="background: url(http://takshak.in/2017/public/assets/img/new/texture-paper-1.jpg);padding-bottom:80px;">
        <div class="container" style="line-height: 24px;">
            <h1 style="padding:60px 0 20px;font-size: 42px;font-weight: bold;color: #4b3829;text-shadow: 0 2px 2px rgba(0,0,0,0.1); ">Sponsors</h1>
            <div class="row">
                <div class="col-sm-4">
                    Mar Athanasius College of Engineering beyond doubt occupies a top position among all store­ houses of knowledge in the state of Kerala. As an esteemed institution, which has a glorious past of 54 years, we intend to present TAKSHAK on an audacious scale
                    that very few other institutions would dare doing.The previous edition of TAKSHAK had witnessed participants from the most elite institutions in the state. With the scale even higher this time round, the turnout of students, in terms
                    of both number and quality is expected to skyrocket at an un­ precedented rate.
                </div>
                <div class="col-sm-4">
                    <h5 style="font-size: 16px;font-weight: bold;color: #4b3829; ">CURRENT LIST OF PARTNERS</h5>
                    <ul>
                        <li>BAJAJ Motors
                            <li>TVS Motors
                                <li>TATA Consultancy Services
                                    <li>SELZAR Polymers
                                        <li>Nandilath G Mart
                                            <li>Geojith
                                                <li>KP Chacko Gold
                                                    <li>Bobby chemanoor jewellers
                                                        <li>Chachu tour&amp;travels
                                                            <li>Malabar Gold &amp; Diamonds
                                                                <li>American Power Corporation
                                                                    <li>Landmark apartments
                                                                        <li>Uncle John ice cream
                                                                            <li>Cloud 9 Hotels
                                                                                <li>Maria International
                    </ul>
                </div>
                <div class="col-sm-4">
                    <ul>
                        <li>Rajasthan marbles
                            <li>Merriboy Icecream
                                <li>SG electronia
                                    <li>KP Varkey Gold &amp; Dimaonds
                                        <li>Pytakulam marbles
                                            <li>Gateforum
                                                <li>Kaithary.com
                                                    <li>Nellore home appilance
                                                        <li>Think force Ernakulam
                                                            <li>Fortune muvattupuzha
                                                                <li>Neospark perumbavoor
                                                                    <li>Embsoft
                                                                        <li>IPSR solutions kottayam
                                                                            <li>Snowhite Fashions
                                                                                <li>List Incomplete...
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="highlights screenfit" style="background: #111111">
        <div class="container">
            <center>
                <h3 style="font-size: 24px; font-weight: bold; margin: 50px 0 20px ; padding: 8px 6px; color:#FFF;border:3px solid #FFFFFF; border-width: 3px 0; letter-spacing: 5px;display: inline-block;">HIGHLIGHTS</h3>
            </center>

            <div class="row">
                <span class="hlite">
                    <div class="view view-second">
                        <img src="http://localhost/Takshak17/public/images/autoshow.jpg" />
                        <div class="mask"></div>
                        <div class="hltcontent">
                            <h2>Auto Show</h2>
                            <p>Some description</p>
                            <a href="http://takshak.in/2017/public/autoshow" class="info">Read More</a>
                        </div>
                    </div>
                </span>
            </div>
            <div class="row">
                <span class="hlite">
                    <div class="view view-second">
                        <img src="http://localhost/Takshak17/public/images/bmx.jpg" />
                        <div class="mask"></div>
                        <div class="hltcontent">
                            <h2>BMX</h2>
                            <p>Some description</p>
                            <a href="http://takshak.in/2017/public/autoshow" class="info">Read More</a>
                        </div>
                    </div>
                </span>
            </div>
        </div>
    </section>
    <section class="screenfit contacts" style="background: url(http://takshak.in/2017/public/assets/img/new/texture-paper-1.jpg);">
        <div class="container">
            <center>
                <h3 style="font-size: 24px; font-weight: bold; margin: 70px 0 0 ; padding: 8px 8px; color:#4b3829;border:3px solid #4b3829; border-width: 3px 0; letter-spacing: 5px;display: inline-block;">FOLLOW US</h3><br>
                <span style="font-size: 13px; font-weight: bold; color:#4b3829; margin:4px 0 40px;letter-spacing: 3px;display: inline-block;">LET US GET IN TOUCH</span>
                <br/>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="contact_data">
                            <span class="map"><iframe style="width:100%;height: 160px;border:0" frameborder="0" src="https://www.google.com/maps/embed/v1/view?zoom=17&center=10.0542,76.6192&key=AIzaSyDbB6aoV0aq5-ic2BnpgZ7z74rkaDItJzU" allowfullscreen></iframe></span>
                            <span class="ovds">Ready to start your technical journey with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</span>
                            <span class="mobno"><span class="glyphicon glyphicon-earphone"></span>&nbsp;&nbsp;9994 - 223 - 442</span>
                            <span class="mailo"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;info@takshak.in</span>
                            <a href="#" class="facebook">Facebook</a>
                            <a href="#" class="twitter">Twitter</a>
                        </div>
                        <br/><br/><br/>
                        <span style="font-size: 12px;font-style: italic;">Designed By <a href="http://www.facebook.com/shameel.kadannamanna">Shameel</a> &amp; <a href="#">Jospeh Aswin</a></span>
                    </div>
                    <div class="col-sm-8">
                        <div class="table">
                            <table id="contacts_table" width="100%">
                                <tr>
                                    <th>PRINCIPAL</th>
                                    <td>Prof. Soosan George/td>
                                    <td>+91 9446072363</td>
                                </tr>
                                <tr>
                                    <th>COORDINATOR</th>
                                    <td>Mr. Mohammed Sahal TK</td>
                                    <td>+91 7736876187</td>
                                </tr>
                                <tr>
                                    <th>CONVENOR</th>
                                    <td>Mr. Bennet Benny</td>
                                    <td>+91 8281240420</td>
                                </tr>
                                <tr>
                                    <th>EVENTS HEAD</th>
                                    <td>Mr. Ren Shibu</td>
                                    <td>+91 9539700666</td>
                                </tr>
                                <tr>
                                    <th>EVENTS HEAD</th>
                                    <td>Mr. Felix Boban</td>
                                    <td>+91 8075178751</td>
                                </tr>
                                <tr>
                                    <th>EVENTS HEAD</th>
                                    <td>Mr. Shilpa joseph</td>
                                    <td>+91 9497029418</td>
                                </tr>
                                <tr>
                                    <th>FINANCE HEAD</th>
                                    <td>Mr. Malik Ibnu easa</td>
                                    <td>+91 8281854922</td>
                                </tr>
                                <tr>
                                    <th>FINANCE HEAD</th>
                                    <td>Mr. Rhwitwik Ms</td>
                                    <td>+91 9497650415</td>
                                </tr>
                                <tr>
                                    <th>SPONSORSHIP HEAD</th>
                                    <td>Mr. Nevin joseph</td>
                                    <td>+91 7558800983</td>
                                </tr>
                                <tr>
                                    <th>SPONSORSHIP HEAD</th>
                                    <td>Mr. Ajay Shibu</td>
                                    <td>+91 8301876139 </td>
                                </tr>
                                <tr>
                                    <th>PUBLICITY HEAD</th>
                                    <td>Mr. Earnest George</td>
                                    <td>+91 9846497450</td>
                                </tr>
                                <tr>
                                    <th>PUBLICITY HEAD</th>
                                    <td>Ms. Jefin joseph</td>
                                    <td>+91 8301087601</td>
                                </tr>
                                <!-- <tr>
                                    <th>DECORATIONS HEAD</th>
                                    <td>Mr. Nikhin Raj KK</td>
                                    <td>+91 9605366056</td>
                                </tr> -->
                                <tr>
                                    <th>DESIGN HEAD</th>
                                    <td>Mr. Bony Mons</td>
                                    <td>+91 8547203643</td>
                                </tr>
                                <tr>
                                    <th>WEB DEV . TECHNICAL</th>
                                    <td>Mr. Joseph Ashwin Kottapurath</td>
                                    <td>+91 9745511318</td>
                                </tr>
                            </table>
                            <br><br>
                            <b><u>SUPPORTING CREW</u></b><br><br>John,Mishal Aboobacker,Sreenath,Akshay Ramachandran,<br> Amjad Bin Raji,Rishan S ali,Abey,<br> Deepak,Mathews Joseph,Adarsh Jith<br> Abay Balan, Romariyo Johnson,Anjaly Kumaran
                        </div>
                    </div>
                </div>

            </center>
        </div>
    </section>
    <div class="intro-map-bg screenfit"><img src="http://takshak.in/2017/public/assets/img/new/mapbg1.jpg" id="bgimage" style="height: 100%;transform:scale(2.4,2.4);transition: all 1500ms ease-out;"></div>

    <nav class="navig active">
        <ul>
            <li><a href="#" onclick="openpage('about');return false;">ABOUT</a></li>
            <li><a href="#" onclick="openpage('events');return false;">EVENTS</a></li>
            <li><a href="#" onclick="openpage('sponsors');return false;">SPONSORS</a></li>
            <!-- <li><a href="#" onclick="openpage('highlights');return false;">HIGHLIGHTS</a></li> -->
            <li><a href="#" onclick="openpage('contacts');return false;">FOLLOW US</a></li>
        </ul>
    </nav>

    <div class="event_popup" style="background-image: url(http://takshak.in/2017/public/assets/img/new/event_civil.jpg)">
        <div class="content" id="content">
            <h3 class="evntby">EVENTS BY</h3>
            <h1 class="depart" id="depart"></h1>
        </div>
        <a href="#" onclick="events('close');return false;" class="eventclose"><span class="glyphicon glyphicon-chevron-left"></span></a>
    </div>
    <div class="backtohome" style="display: none;"><a href="#" onclick="openpage('home');return false;"><span class="glyphicon glyphicon-chevron-up backup"></span><span class="glyphicon glyphicon-remove backclose"></span></a></div>
    <div class="mobilenav"><a href="#" onclick="opennav();return false;"><span class="glyphicon glyphicon-align-justify"></span></a></div>
    <!-- <script src="http://takshak.in/2017/public/assets/js/canvasAnimator.js"></script> -->
    <script type="text/javascript">
        divtitle = document.getElementById("home");
        bg = document.getElementById("bgimage");
        divtitle.addEventListener("mousemove", function(event) {
            var mouseX = event.pageX;
            var mouseY = event.pageY;
            var scale = (mouseX / document.documentElement.clientWidth - 0.5) * 2;
            bg.style.transform = "translate(" + (-mouseX + document.documentElement.clientWidth / 2) + "px," + (-mouseY + document.documentElement.clientHeight / 2 - 130) + "px) scale(2.3,2.3) rotateZ(" + (10 * scale) + "deg)";
        });
        eventdiv = document.querySelector(".events");
        terrain = document.getElementById("terrain");
        var flag = true;
        eventdiv.addEventListener("mousemove", function(event) {
            var mouseXX = event.pageX;
            var mouseYY = event.pageY;
            var scale = (mouseXX / document.documentElement.clientWidth - 0.5) * 2;
            if(scale<0){
                scale = -scale;
            }
            scale = 1 - scale;
            scale = scale *1.5;
            var Xposition = "";
            var Yposition = "";
            Yposition = (-mouseYY + document.documentElement.clientHeight / 2 - 130);
            if(mouseXX>1300){
                Xposition = (document.documentElement.clientWidth / 2) - (mouseXX);
                Xposition = (Xposition+496)*3;
            }
            else{
                Xposition = (document.documentElement.clientWidth / 2) + (mouseXX*2);
                Xposition = (Xposition-1075);
            }
            document.getElementById("eventLoader").innerHTML = "mouseX: "+mouseXX+" | mouseY: "+mouseYY+" | xposition:"+Xposition+" | yposition:"+Yposition+" | "+(-mouseYY + document.documentElement.clientHeight / 2 - 130);
            if(mouseXX>400&&mouseXX<1350){
                terrain.style.transform = "";
                flag = false;
            }
            else{
                // if(!flag){
                //     if(mouseXX>1300){
                //         Xposition = document.documentElement.clientWidth;
                //     }
                //     else{
                //         Xposition = 400;
                //     }
                //     flag = true;
                // }
                terrain.style.transform = "translate(" + Xposition + "px," + Yposition + "px) scale("+scale+","+scale+") rotateZ(" + (10 * scale) + "deg)";
            }
        });
    </script>
</body>

</html>