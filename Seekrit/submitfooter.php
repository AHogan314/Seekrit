<nav class="navbar navbar-default navbar-fixed-bottom text-center">
	<div class="container">	
	<!--submit form-->
		<div class="row">
			<form class="form-horizontal" action="submitresult.php#bottomOFThePage" method="post" onsubmit="return validateSubmitFooter();"/>
				<fieldset>
					<input type="hidden" name="formID" value="submit">
					<!-- hashtag -->
					<input type="hidden" name="hashtag" id="hashtag" type="text" value="<?php echo $hashtag; ?>"/>

					<div class="input-group col-md-4 col-md-offset-4 text-center">
						
						<input id="message" name="message" type="text" placeholder="Type a message..." class="form-control">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default btn-primary">Send</button>
						</span>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</nav>