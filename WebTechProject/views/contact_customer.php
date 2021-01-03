<?php 

    session_start();
    if(!isset($_SESSION["username"])){
		header("Location: hrlogin.php");
	}
	if(!isset($_COOKIE["username"])){
		header("Location: ../controllers/logout.php");
	}
	include_once "../controllers/ContactController.php" ;
	include 'hr_header.php';
?>
      <link rel="stylesheet" href="css/contact_marketingstyle.css">
      <br>
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>
		   <div class="contact-box">
		       <form method="post" onsubmit="return contact_validate()">
			       <input type="text" class="input-field" placeholder="Your Name" id="name" name="name">
				   <span style="color:red;" id="err_name"><?php echo $err_name;?></span>
				   <input type="text" class="input-field" placeholder="Your Email" id="email" name="email">
				   <span style="color:red;" id="err_email"><?php echo $err_email;?></span>
				   <textarea type="text" class="input-field textarea-field" placeholder="Your Message" id="message" name="message"></textarea>
				   <span style="color:red;" id="err_message"><?php echo $err_message;?></span>
				   <br>
				   <br>
				   <button type="submit" class="btn" name="send">Send Message</button>
			   </form>
		   </div>
		  </div> 
        <script src="../js/contact_validation.js"></script>		  
	 </body>
</html>