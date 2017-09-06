<?php

$uid = '';
$name = '';
$mobile = '';

if (isset($_REQUEST['uid']))
    $uid = $_REQUEST['uid'];

$results = file_get_contents("http://lis.gobuzz.mobi/api/v1/register_user/?unique_id=$uid");
$results_new = json_decode($results, true);
$name = $results_new['objects'][0]['first_name'];
$mobile = $results_new['objects'][0]['mobile_number'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>LIS</title>
    <!-- For-Mobile-Apps-and-Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content=""/>
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //For-Mobile-Apps-and-Meta-Tags -->
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/jquery-ui.css"/>
    <!-- //Custom Theme files -->
    <!-- font-awesome-icons -->
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <!-- //font-awesome-icons -->
    <!-- js -->
    <script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
    <!-- //js -->
    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
          rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Bitter:400,400i,700&subset=latin-ext" rel="stylesheet">
    <!-- //web-fonts -->
    <script type="text/javascript">

        $(document).ready(function () {
           localStorage.clear();
        });
        function submitData() {
            var uid = $('#uid').val();
            var mobile = $('#mobile').val();
            var name = $('#name').val();
            var loc = $('#loc_pin').val();
            // $.ajax({
            //           type: "GET",
            //           url: "http://192.155.90.42:8082/lisLocationValidate.php?loc_pin="+loc,
            //           contentType:false,
            //           processData:false,
            //           crossDomain:true,
            //           dataType: 'jsonp',
            //           success: function (data) {
            //           	alert("h")
            //               console.log(data);
            //               }
            //       });


            $.ajax({

                type: "GET",
                url: "http://192.155.90.42:8082/lisLocationValidate.php?loc_pin=" + loc,
                success: function (data) {
                    if (data == "Invalid Pin") {

                    }
                    else {

                        console.log(data);
                        localStorage.setItem("data", JSON.stringify(data));
                        localStorage.setItem("name", name);
                        localStorage.setItem("mobile", mobile);
                        localStorage.setItem("uid", uid);
                        localStorage.setItem("loc_pin", loc);
                        window.location = "details.php"
                    }

                    // test(data);
                    // autocompleted(data);


                },
                error: function (err) {

                    console.log(err.responseText);
                    alert("Invalid Pin");
                }
            });


        }


    </script>
</head>
<body class="bg">
<!-- logo -->
<div class="agileinfo_logo">
    <div class="agile_container">
        <a href="index.php"><img src="images/logo-lis.png"></a>
    </div>
</div>
<!-- //logo -->
<!-- newsletter -->
<div class="newsletter">
    <div class="container text-center">
        <h3 class="agileits_head">Enter Location Code<i class="fa fa-gratipay" aria-hidden="true"></i></h3><br>
        <input type="text" id="loc_pin" placeholder="" required="">
        <input type="text" id="name" value="<?php echo $name; ?>" hidden="">
        <input type="text" id="mobile" value="<?php echo $mobile; ?>" hidden="">
        <input type="text" id="uid" value="<?php echo $uid; ?>" hidden="">
        <input type="submit" value="Validate" onclick="submitData()">
    </div>
</div>
<!-- //newsletter -->
<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="w3_agile_copyright">

        </div>
    </div>
</div>
<!-- //footer -->
</body>
</html>
