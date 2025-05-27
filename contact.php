<?php 
  if(isset($_POST['submit'])){
    $name = $_POST['name'];
	$email = $_POST['email'];
	$terms = $_POST['terms'];
    $comment = $_POST['comment'];

 
    $errorEmpty = false;
	$errorEmail = false;
	$errorTerms = false;
		
		if(empty($name) || empty($email) ){
			echo "<span class='form-error'>Fill in all fields</span>";
			$errorEmpty = true;
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo "<span class='form-error'>Email not valid</span>";
			$errorEmail = true;
		} else {
			echo "<span class='form-sucess'>Thank you for your email.</span>";

      $mailTo = "dcbiggs@mweb.co.za";
      $headers = "From: ".$name."\n\n Email: ".$email." \n\n Message: ".$comment." \n\n";
      $txt = "Contact me from chbinspection.com/\n\n";

      mail($mailTo, $txt, $headers);
      header("Location: index.php?mailsend");
    }

} else{
  echo "There was an error";
}
?>
<script>
	$("#fname-contact, #email-contact").removeClass("input-error");	
	
	var errorEmpty = "<?php echo $errorEmpty; ?>";
	var errorEmail = "<?php echo $errorEmail; ?>";
	
	if(errorEmpty == true){
		$("#fname-contact, #email-contact").addClass("input-error");	
	}
	
	if(errorEmail == true){
		$("#email-contact").addClass("input-error");	
	}
	
	if(errorEmpty == false && errorEmail == false){
		$("#fname-contact, #email-contact").val("");
	}
</script>