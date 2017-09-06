
<!DOCTYPE html>
<html lang="en">
<head>
<title>LIS</title> 
<!-- For-Mobile-Apps-and-Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //For-Mobile-Apps-and-Meta-Tags -->
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all"> 
<link rel="stylesheet" href="css/jquery-ui.css" />
<link rel="stylesheet" href="css/bootstrap.css" type='text/css' media="all" />
<!-- //Custom Theme files -->
<!-- font-awesome-icons -->
<link rel="stylesheet" href="css/font-awesome.min.css" />
<!-- //font-awesome-icons -->
<!-- js -->
<script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
<script type='text/javascript' src='js/bootstrap.min.js'></script>
<!-- //js -->
<!-- web-fonts -->  
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Bitter:400,400i,700&subset=latin-ext" rel="stylesheet">
<script type="text/javascript">
	function modalSubmit()
	{
		var offerPin=$("#usr").val();
		var modalCode=localStorage.getItem('code');
		var modalOffer=localStorage.getItem('offer');
		var modalOutlet=localStorage.getItem('outlet');
		var uid=localStorage.getItem('uid');
		var mobile=localStorage.getItem('mobile');
		var name=localStorage.getItem('name');
		var loc=localStorage.getItem('loc_pin');

		$.ajax({

			type: "GET",
			url: "http://192.155.90.42:8082/lisOfferValidate.php?loc_pin="+loc+"&offer_pin="+offerPin+"&offer_code="+modalCode+"&uid="+uid+"&phone="+mobile+"&uname="+name+"&offer_name="+encodeURIComponent(modalOffer)+"&outlet_name="+modalOutlet,
			 success: function (data) {
				
				console.log(data);

				if(data =="Availed")
				{
					
					window.location = "success.php"
				}

				else if(data == "You have already availed an offer"){
					alert("You have already availed an offer");

				} else if(data == "Invalid offer code"){
					alert("Invalid offer code");
				}
			

			},
			error: function (err) {

				console.log(err.responseText);
				if(err.responseText =="Availed")
				{
					
					window.location = "success.php"
				}

				else if(err.responseText == "You have already availed an offer"){
					alert("You have already availed an offer");

				} else if(err.responseText == "Invalid offer code"){
					alert("Invalid offer code");
				}
			}
		});




}

$(document).ready(function () {




    $('#myModal1').on('show.bs.modal', function (event) {
    	$("#usr").val('');

        var button = $(event.relatedTarget);
        // Button that triggered the modal
        var code = button.data('code');
        var outlet = button.data('outlet');
        var offer = button.data('offername');
        var msg = button.data('msg');
      
        localStorage.setItem('code',code);
        localStorage.setItem('outlet',outlet);
        localStorage.setItem('offer',offer);
        localStorage.setItem('msg',msg);

    });



		var data=localStorage.getItem("data");
		var val=JSON.parse(data) ;
		console.log(val)
		for(var i=0;i<val.length;i++){

			$("#appendDiv").append('<div class=\"agile_grid\"><div class=\"view view-sixth\"><a data-toggle=\"modal\" data-target=\"#myModal1\" data-code='+val[i].code+' data-msg="'+val[i].thanks_message+'"  data-outlet='+val[i].id+'  data-offername="'+val[i].outlet_name+'" ><img src="http://lis.gobuzz.mobi/media/'+val[i].thumbnail+ '" class=\"img-responsive\" /></a><h3>'+val[i].offer_details+'</h3></div></div>')
		}
						
	});

	
</script>

<!-- //web-fonts -->
</head>
<body class="bg">
<!-- logo -->
	<div class="agileinfo_logo">
		<div class="agile_container">
			<a href="index.php"><img src="images/logo-lis.png"></a><hr>
		</div>
	</div>
<!-- //logo -->

<!-- delicious-food -->
	<div class="delicious_food">
		<div class="container">
			<div class="agile_grids" id="appendDiv">
				
				<!-- Modal -->
				<div id="myModal1" class="modal fade" role="dialog">
				  <div class="modal-dialog">

				   
				    <div class="modal-content" style="margin-top: 50px;">
				      
				      <div class="modal-body">
				       	<div class="form-group"><br>
						  <input type="text" class="form-control" id="usr" placeholder="Enter Offer Code"><br>
						  <button type="button" class="btn btn-info" onclick="modalSubmit()">Submit</button>
						</div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				    </div>

				  </div>
				</div>
		
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //delicious-food -->

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