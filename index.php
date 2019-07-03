
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title>Generate QR Code</title>
  </head>
  <body style="background-color: black;">
    <div class="jumbotron text-center text-white" style="background-color: black">
    	<h2>Generate QR Code</h2><br><br>
    	<div class="row">
    		<div class="col-md-1"></div>
    		<div class="col-md-4">
    			<form name="form" action="qr.php" method="post" target="qr_area">
    				<label style="float: left;">Type:</label>
    				<select name="type" class="form-control" id="type" onchange="sl()">
    					<option value="1">Text</option>
    					<option value="2">URL</option>
    					<option value="3">Email</option>
    					<option value="4">Phone</option>
    					<option value="5">SMS</option>
						<option value="6">Contact</option>
						<option value="7">UPI</option>
						<option value="8">WIFI</option>
    				</select>
    				<br>
    				<div id="form1" style="color: white;">
    					
    				</div>
    				<br>
    				<input type="submit" name="submit" value="Generate QR" class="btn btn-primary btn-block">
				</form><br>
				<button class="btn btn-block btn-success" id="down" onclick="down()">Download</button>
    		</div>
    		<div class="col-md-1"></div>
    		<div class="col-md-6">
    			<iframe class="mt-3" name="qr_area" id="qr_area" src="qr.php" width="300" height="300" style="border: none;">
    				
    			</iframe>
    			<br><br>
				<h3>By: Avinash Vidyarthi</h3>
				<a href="qr.png" download id="img_down"></a>
    		</div>
    	</div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

<script>
	var val=1;
	var div=document.getElementById("form1")
	sl();
	function sl(){
		val=document.form.type.value;
		//print();
		if(val==1){
			div.innerHTML="<label style='float:left;'>Text:</label><textarea name='text' class='form-control' height=300px width=100%></textarea>";
		}
		else if(val==2){
			div.innerHTML="<label style='float:left;'>URL:</label><input type='text' class='form-control' placeholder='URL' name='url'>";
		}
		else if(val==3){
			div.innerHTML="<label style='float:left;'>Mail To:</label><input type='email' class='form-control' name='mail_to' placeholder='Email'><br><label style='float:left;'>Subject:</label><input class='form-control' placeholder='Subject' name='subject'><br><label style='float:left;'>Body:</label><textarea name='body' class='form-control' height=300px width=100%></textarea>";
		}
		else if(val==4){
			div.innerHTML="<label style='float:left;'>Phone No:</label><input type='text' class='form-control' placeholder='Phone Number' name='phone'>";
		}
		else if(val==5){
			div.innerHTML="<label style='float:left;'>SMS To:</label><input type='text' class='form-control' name='sms_to' placeholder='Phone No'><br><label style='float:left;'>Body:</label><textarea name='body' class='form-control' height=300px width=100%></textarea>";
		}
		else if(val==6){
			div.innerHTML="<label style='float:left;'>Name:</label><input type='text' class='form-control' placeholder='Name' name='name'><br><label style='float:left;'>Email:</label><input type='email' class='form-control' name='email' placeholder='Email'><br><label style='float:left;'>Phone No:</label><input type='text' class='form-control' placeholder='Phone Number' name='phone'><br><label style='float:left;'>Address:</label><textarea name='address' class='form-control' height=300px width=100%></textarea>";
		}else if(val==7){
			div.innerHTML="<label style='float:left;'>Payee UPI:</label><input type='text' class='form-control' placeholder='UPI Id' name='pay_to'><br><label style='float:left;'>Amount:</label><input type='text' class='form-control' name='amount' placeholder='Amount'><br><label style='float:left;'>Messege:</label><input type='text' class='form-control' placeholder='Messege' name='msg'>";
		}
		else if(val==8){
			div.innerHTML="<label style='float:left;'>Encryption type:</label> <select class='form-control' name='enc'><option value='WPA'>WPA</option><option value='WEP'>WEP</option></select><br><label style='float:left'>Network SSID:</label><input type='text' class='form-control' placeholder='Network SSID' name='net_ssid'><br><label style='float:left'>Network Password:</label><input type='text' class='form-control' placeholder='Network Password' name='net_pass'>";
		}
	}
	function print(){
		console.log(val);
	}
	function irel(){
		document.getElementById('qr_area').src = document.getElementById('qr_area').src;
		console.log("refreshed");
	}

	function down(){
		var form_data=$("form").serializeArray();
		var send_data={
			submit:'download'
		}
		$.each(form_data,function(i,form_field){
			send_data[form_field.name]=form_field.value;
		});
		$.ajax({
			type: "POST",
			url: "qr.php",
			data: send_data,
			beforeSend: function(){
				$("#down").html("Genrating...");
				$("#down").attr('disabled','disabled');
			},
			success: function (response,status) {
				$("#down").html("Downloading...");
				$("#img_down")[0].click();
				$("#down").html("Download");
				$("#down").removeAttr("disabled");
			}
		});
	}

</script>