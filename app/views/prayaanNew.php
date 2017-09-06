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

// Merchant key here as provided by Payu
$MERCHANT_KEY = "rjQUPktU";

// Merchant Salt as provided by Payu
$SALT = "e5iIg1jwi8";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
    foreach($_POST as $key => $value) {
        $posted[$key] = $value;

    }
}

$formError = 0;

if(empty($posted['txnid'])) {
    // Generate random transaction id
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
    $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
    if(
        empty($posted['key'])
        || empty($posted['txnid'])
        || empty($posted['amount'])
        || empty($posted['firstname'])
        || empty($posted['email'])
        || empty($posted['phone'])
        || empty($posted['productinfo'])
        || empty($posted['surl'])
        || empty($posted['furl'])
        || empty($posted['service_provider'])
    ) {
        $formError = 1;
    } else {
        //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
        $hashVarsSeq = explode('|', $hashSequence);
        $hash_string = '';
        foreach($hashVarsSeq as $hash_var) {
            $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
            $hash_string .= '|';
        }

        $hash_string .= $SALT;


        $hash = strtolower(hash('sha512', $hash_string));
        $action = $PAYU_BASE_URL . '/_payment';
        try{
            $handler = new PDO("mysql:host=127.0.0.1;dbname=takshak;charset=utf8", "root", "");
            $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            die("Sorry, Error Establishing Connection To Database");
        }
        $query = $handler->prepare("INSERT INTO prayaan VALUES(id, :txid, :name, :email, :number, :college, :accomodation, :semester, :teamStatus, :member1name, :member1email, :member1school, :member1age, :member2name, :member2email, :member2school, :member2age, :member3name, :member3email, :member3school, :member3age, :member4name, :member4email, :member4school, :member4age, :member5name, :member5email, :member5school, :member5age, :valid)");
        $query->bindParam(":txid", $posted['txnid']);
        $name = $_POST['firstname']." ".$_POST['lastname'];
        $query->bindParam(":name", $name);
        $query->bindParam(":email", $posted['email']);
        $query->bindParam(":number", $posted['phone'], PDO::PARAM_INT);
        $query->bindParam(":college", $_POST['form-college-name']);
        $query->bindParam(":accomodation", $_POST['form-accomodation']);
        $query->bindParam(":semester", $_POST['form-college-semester']);
        $query->bindParam(":teamStatus", $_POST['form-as-team-or-not']);
        $member = array();
        if($_POST['form-as-team-or-not']=="as-team"){
            for($i = 1; $i<6; $i++){
                if(isset($_POST['form-member-'.$i.'-name'])&&($_POST['form-member-'.$i.'-name']!='')) {
                    $member[$i] = array("name"=>$_POST['form-member-' . $i . '-name'], "email"=>$_POST['form-member-' . $i . '-email'], "school"=>$_POST['form-member-' . $i . '-school'], "age"=>intval($_POST['form-member-' . $i . '-age']));
                }
                else{
                    $member[$i] = array("name"=>NULL, "email"=>NULL, "school"=>NULL, "age"=>NULL);
                }
            }
        }
        else{
            for($i = 1; $i<6; $i++){
                $member[$i] = array("name"=>NULL, "email"=>NULL, "school"=>NULL, "age"=>NULL);
            }
        }
        $false = false;
        for($i = 1; $i<6; $i++) {
            try{
                if(($member[$i]["name"]=='')||($member[$i]["name"]==NULL)){
                    throw new PDOException("null values!!", NULL);
                }
                else{
                    $query->bindParam(":member" . $i . "name", $member[$i]["name"]);
                    $query->bindParam(":member" . $i . "email", $member[$i]["email"]);
                    $query->bindParam(":member" . $i . "school", $member[$i]["school"]);
                }
            }
            catch(PDOException $e){
                $query->bindParam(":member" . $i . "name", $member[$i]["name"], PDO::PARAM_NULL);
                $query->bindParam(":member" . $i . "email", $member[$i]["email"], PDO::PARAM_NULL);
                $query->bindParam(":member" . $i . "school", $member[$i]["school"], PDO::PARAM_NULL);
            }
            try{
                $query->bindParam(":member" . $i . "age", $member[$i]["age"], PDO::PARAM_INT);
            }
            catch (PDOException $e){
                $query->bindParam(":member" . $i . "age", $member[$i]["age"], PDO::PARAM_NULL);
            }
        }
        $query->bindParam(":valid", $false, PDO::PARAM_BOOL);
        $query->execute();
    }
} elseif(!empty($posted['hash'])) {
    $hash = $posted['hash'];
    $action = $PAYU_BASE_URL . '/_payment';
    try{
        $handler = new PDO("mysql:host=127.0.0.1;dbname=takshak;charset=utf8", "root", "");
        $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        die("Sorry, Error Establishing Connection To Database");
    }
    $query = $handler->prepare("INSERT INTO prayaan VALUES(id, :txid, :name, :email, :number, :college-name, :accomodation, :semester, :teamStatus, :member-1-name, :member-1-email, :member-1-school, :member-1-age, :member-2-name, :member-2-email, :member-2-school, :member-2-age, :member-3-name, :member-3-email, :member-3-school, :member-3-age, :member-4-name, :member-4-email, :member-4-school, :member-4-age, :member-5-name, :member-5-email, :member-5-school, :member-5-age, :valid)");
    $query->bindParam(":txid", $posted['txnid']);
    $name = $_POST['firstname']." ".$_POST['lastname'];
    $query->bindParam(":name", $name);
    $query->bindParam(":email", $posted['email']);
    $query->bindParam(":number", $posted['phone'], PDO::PARAM_INT);
    $query->bindParam(":college-name", $_POST['form-college-name']);
    $query->bindParam(":accomodation", $_POST['form-accomodation']);
    $query->bindParam(":semester", $_POST['form-college-semester']);
    $query->bindParam(":teamStatus", $_POST['form-as-team-or-not']);
    if($_POST['form-as-team-or-not']=="as-team"){
        for($i = 1; $i<6; $i++){
            if(isset($formData['form-member-'.$i.'-name'])) {
                $query->bindParam(":member-" . $i . "-name", $_POST['form-member-' . $i . '-name']);
                $query->bindParam(":member-" . $i . "-email", $_POST['form-member-' . $i . '-email']);
                $query->bindParam(":member-" . $i . "-school", $_POST['form-member-' . $i . '-school']);
                $query->bindParam(":member-" . $i . "-age", $_POST['form-member-' . $i . '-age'], PDO::PARAM_INT);
            }
            else{
                $null = NULL;
                $query->bindParam(":member-" . $i . "-name", $null);
                $query->bindParam(":member-" . $i . "-email", $null);
                $query->bindParam(":member-" . $i . "-school", $null);
                $query->bindParam(":member-" . $i . "-age", $null);
            }
        }
    }
    else{
        for($i = 1; $i<6; $i++){
            $query->bindParam(":member-" . $i . "-name", $null);
            $query->bindParam(":member-" . $i . "-email", $null);
            $query->bindParam(":member-" . $i . "-school", $null);
            $query->bindParam(":member-" . $i . "-age", $null);
        }
    }
    $false = false;
    $query->bindParam(":valid", $false, PDO::PARAM_BOOL);
    $query->execute();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prayaan 2017 | Registeration</title>

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
            max-width:33%;
        }
        .trigg3{
            max-width:30%;
        }
        .trigg4{
            max-width:25%;
        }
    </style>
    <script>
        var PAGE = "prayaan.jpg";
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
                    <a href="#"><img style="height:150px;" src="http://takshak.in/2017/public/images/prayaan.png"></a>
                    <h1><strong>Prayaan 2017</strong> Registration</h1>
                    <div class="description">
                        <p>
                            <b>Prayaan</b> calls you to take the journey through the catacombs of codes and ciphers that narrow the way down to your town!!!<br> be ready with your squad to unlock the levels to pave the way to your own hidden town! Dash up with your enthusiasm and vitality to knock off the challenges ahead of you. It's the time to noodle around with your gang to explore.
                        </p>
                    </div>
                    <div class="top-big-link">
                        <a class="btn launch-modal trigg1" href="#" data-modal-id="modal-register"><img src="http://takshak.in/2017/public/images/Register.png"/></a>
                        <a class="btn launch-modal trigg2" data-modal-id="aboutPrayaan" href="#"><img src="http://takshak.in/2017/public/images/aboutprayaantrig.png"/></a>
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
            </div>

            <div class="modal-body">

                <form role="form" action="http://takshak.in/2017/public/prayaan/submit" method="post" class="registration-form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="sr-only" for="form-college-name">College*</label>
                        <input type="text" name="form-college-name" placeholder="College*" class="form-college-name form-control" id="form-college-name">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-college-semester">Semester*</label>
                        <input type="text" name="form-college-semester" placeholder="Semester*" class="form-college-semester form-control" id="form-college-semester">
                    </div>

                    <div class="form-member">
                        <h5>Member 1</h5>
                        <input type="hidden" name="member1" value="1"/>
                        <div class="form-group">
                            <label class="sr-only" for="form-member-1-name">Name</label>
                            <input type="text" name="form-member-1-name" placeholder="Name" class="form-member-name form-control" id="form-member-1-name" value="<?=$member1name?>">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="form-member-1-email">E-Mail</label>
                            <input type="email" name="form-member-1-email" placeholder="E-Mail" class="form-member-name form-control" id="form-member-1-email" value="<?=$member1name?>">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="form-member-1-number">Contact Number</label>
                            <input type="number" name="form-member-1-number" placeholder="Contact Number" class="form-member-number form-control" id="form-member-1-number" value="<?=$member1name?>">
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
                            <label class="sr-only" for="form-member-2-number">Contact Number</label>
                            <input type="number" name="form-member-2-number" placeholder="Contact Number" class="form-member-number form-optional" id="form-member-2-number" value="<?=$member2name?>">
                        </div>
                    </div>

                    <div class="form-member hidden-form-member">
                        <h5>Member 3</h5>
                        <input type="hidden" name="member3" value="0"/>
                        <div class="form-group">
                            <label class="sr-only" for="form-member-3-name">Name</label>
                            <input type="text" name="form-member-3-name" placeholder="Name" class="form-member-name form-control form-optional" id="form-member-3-name" value="<?=$member3name?>">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="form-member-3-email">E-mail</label>
                            <input type="email" name="form-member-3-email" placeholder="E-Mail" class="form-member-name form-control form-optional" id="form-member-3-email" value="<?=$member2name?>">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="form-member-3-number">Contact Number</label>
                            <input type="number" name="form-member-3-number" placeholder="Contact Number" class="form-member-number form-optional" id="form-member-2-number" value="<?=$member2name?>">
                        </div>
                    </div>

                    <div class="form-member hidden-form-member">
                        <h5>Member 4</h5>
                        <input type="hidden" name="member4" value="0"/>
                        <div class="form-group">
                            <label class="sr-only" for="form-member-4-name">Name</label>
                            <input type="text" name="form-member-4-name" placeholder="Name" class="form-member-name form-control form-optional" id="form-member-4-name" value="<?=$member4name?>" >
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="form-member-4-email">E-Mail</label>
                            <input type="email" name="form-member-4-email" placeholder="E-Mail" class="form-member-name form-control form-optional" id="form-member-4-email" value="<?=$member2name?>">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="form-member-4-number">Contact Number</label>
                            <input type="number" name="form-member-4-number" placeholder="Contact Number" class="form-member-number form-optional" id="form-member-2-number" value="<?=$member2name?>">
                        </div>
                    </div>

                    <div class="form-member hidden-form-member">
                        <h5>Member 5</h5>
                        <input type="hidden" name="member5" value="0"/>
                        <div class="form-group">
                            <label class="sr-only" for="form-member-5-name">Name</label>
                            <input type="text" name="form-member-5-name" placeholder="Name" class="form-member-name form-control form-optional" id="form-member-5-name" value="<?=$member5name?>">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="form-member-5-email">E-Mail</label>
                            <input type="email" name="form-member-5-email" placeholder="E-Mail" class="form-member-name form-control form-optional" id="form-member-5-email" value="<?=$member2name?>">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="form-member-5-number">Contact Number</label>
                            <input type="number" name="form-member-5-number" placeholder="Contact Number" class="form-member-number form-optional" id="form-member-2-number" value="<?=$member2name?>">
                        </div>
                    </div>


                    <div id="addbutton" class="form-member">
                        <button class="btn green" id="newmember" onclick="addmember()" type="button">Add Another Member</button>
                    </div>

                    <hr/>
                    <span style="color:red">Payment details will be given later, fee is 150 Rupees</span>
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

<div class="modal fade" id="aboutPrayaan" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
    <img id="AboutMACE" src="http://takshak.in/2017/public/images/aboutPrayaan.png" data-dismiss="modal">
</div>

</body>

<!-- Javascript -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="http://takshak.in/2017/public/assets/js/jquery.backstretch.min.js"></script>
<script src="http://takshak.in/2017/public/assets/js/scripts.js"></script>
<!--<script src="http://localhost/Takshak17/public/assets/js/scripts.js"></script>-->

<!--[if lt IE 10]>
<script src="http://takshak.in/2017/public/assets/js/placeholder.js"></script>
<![endif]-->

</body>

</html>