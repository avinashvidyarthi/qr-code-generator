<?php
	if(isset($_POST['submit']))
	{
		// include QR_BarCode class 
		include "QR_BarCode.php"; 

		// QR_BarCode object 
		$qr = new QR_BarCode(); 

		if($_POST['type']==1)
			$qr->text($_POST['text']); 
		else if($_POST['type']==2)
			$qr->url($_POST['url']);
		else if($_POST['type']==3)
			$qr->email($_POST['mail_to'],$_POST['subject'],$_POST['body']);
		else if($_POST['type']==4)
			$qr->phone($_POST['phone']);
		else if($_POST['type']==5)
			$qr->sms($_POST['sms_to'],$_POST['body']);
		else if($_POST['type']==6)
			$qr->contact($_POST['name'],$_POST['address'],$_POST['phone'],$_POST['email']);
		else if($_POST['type']==7){
			$text="upi://pay?pa=".$_POST['pay_to']."&tn=".rawurlencode($_POST['msg'])."&am=".$_POST['amount']."&cu=INR&pn=a";
			$qr->text($text);
		}else if($_POST['type']==8){
			$text="WIFI:T:\"".$_POST['enc']."\";S:\"".$_POST['net_ssid']."\";P:\"".$_POST['net_pass']."\";;";
			$qr->text($text);
		}

		// display QR code image
		if($_POST['submit']=="download"){
			$qr->qrCode(300,"qr");
			return("done");
		}
		$qr->qrCode();
		
	}
	else
	{
		// include QR_BarCode class 
		include "QR_BarCode.php"; 

		// QR_BarCode object 
		$qr = new QR_BarCode(); 

		// create text QR code 
		$qr->text('DEMO'); 

		// display QR code image
		$r=$qr->qrCode();
		//echo "$r";	
	}
	//header("refresh:2;url=qr.php");
?>