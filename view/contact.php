<?php 
    include './shared/header.php';
?>
<?php 
	$get_data = new Data();
?>
<!-- End of header.php -->
<!-- Start of content -->
<div id="content">
	<div>
		<h3>Get in touch with Ecothunder!</h3>
		<p>This website template has been designed by <a href="http://www.freewebsitetemplates.com/">Free Website Templates</a> for you, for free. You can replace all this text with your own text. You can remove any link to our website from this website template, you're free to use this website template without linking back to us. If you're having problems editing this website template, then don't hesitate to ask for help on the <a href="http://www.freewebsitetemplates.com/forum/">Forum</a>.</p>
		<form method="post">
			<table>
				<tr>
					<td><label for="name"><strong>Name:<strong></label></td>
					<td><input type="text" maxlength="30" id="name" name="name"/> </td>
					<td><label class="email" for="email">Email:</label></td> 
					<td><input type="text" maxlength="30" id="email" name="email"/></td>
				</tr>
				<tr>
					<td><label for="subject"><strong>Subject:</strong></label></td>
					<td><input type="text" maxlength="30" id="subject" name="subject"/></td>
				</tr>
				<tr>
					<td class="message"><label for="message"><strong>Message:</strong></label></td>
					<td colspan="3"><textarea name="message" id="message" cols="30" rows="10" name="message"></textarea></td>
				</tr>
				<tr>
				<td></td>
						<td colspan="2"><label class="newsletter" for="newsletter"><input type="checkbox" id="newsletter" /><span> Subscribe to newsletter</span></label> <label for="terms"><input type="checkbox" id="terms" /><span> I agree to the Terms and Conditions</span></label></td>
					<td colspan="1"><input type="submit" value="" id="send" name="send"/></td>
				</tr>
			</table>
		</form>
		<?php 
			if(isset($_POST['send'])){
				// kiểm tra dữ liệu nhập vào
				$name = $_POST['name'];
				$email = $_POST['email'];
				$subject = $_POST['subject'];
				$message = $_POST['message'];
				// neu dung thi insert vao database
				if(empty($name) || empty($email) || empty($subject) || empty($message)){
					echo "<script>alert('Please fill all the fields')</script>";
				}else{
					$insert_data = $get_data->addContact($name, $email, $subject, $message);
					if($insert_data){
						echo "<script>alert('Your message has been sent')</script>";
					}else{
						echo "<script>alert('Your message has not been sent')</script>";
					}
				}
			}
		?>
	</div>
</div>
<!-- End of content -->
<!-- Start of footer.php -->
<?php 
    include './shared/fooder.php';
?>