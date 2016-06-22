<div class="col-sm-6">
	<form id="ContactForm" role="form" class="form-horizontal" method="post">
		<div class="form-group">
			<label class="col-sm-2" for="name">Name:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="name" name="name" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2" for="email">Email:</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" id="email" name="email" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2" for="subject">Subject:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="subject" name="subject">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2" for="message">Message:</label>
			<div class="col-sm-10">
				<textarea class="form-control" rows="5" id="message" name="message" required></textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" id="submit" class="btn btn-primary">Send Message</button>
			</div>
		</div>
	</form>
	<div class="row"><div class="col-sm-10 col-sm-offset-2" id="form-messages"></div></div>
</div>