<?php
	if(($isAuth == 1) AND ($is_admin)){ 
?>	
<?php
	} else {
?>	
	
		<div class="main-head">
			<div class="container">
				<div class="subheader col-sm-12">
					<h3>Hubungi Kami</h3>
				</div>
			</div>
		</div>
		<div class="main-content">
			<div class="container">
				<div class="contact-page box-list col-sm-12">
					<div class="col-sm-6">
						<div class="static-content">
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, sed do eiusmod tempor incididunt ut labore et dolore magna ali.
							</p>
						</div>
						<form class="form-contact" role="form" method="post" id="form-contact" action="/projects/bisikq/contacts/sentemail">
						<!--<form class="form-contact" role="form" method="post" id="form-contact" action="/projects/bisikq/contacts/add">-->
						  <div class="form-group">
							<label for="exampleInputName">Nama</label>
							<input type="text" name="data[Contact][name]" class="form-control" id="exampleInputName" placeholder="Masukan nama" required>
						  </div>
						  <div class="form-group">
							<label for="exampleInputEmail">Email</label>
							<input type="email" name="data[Contact][email]" class="form-control" id="exampleInputEmail" placeholder="Masukan email" required>
						  </div>
						  <div class="form-group">
							<label for="exampleInputSubject">Subjek</label>
							<input type="text" name="data[Contact][subject]" class="form-control" id="exampleInputSubject" placeholder="Masukan subjek" required>
						  </div>
						  <div class="form-group">
							<label for="exampleInputDesc">Pesan</label>
							<textarea name="data[Contact][description]" class="form-control" id="exampleInputDesc" required></textarea>
						  </div>
						  <button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
					<div class="col-sm-6">
						<h3>Lokasi Kami</h3>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253840.478949799!2d106.829518!3d-6.2297465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta%2C+Daerah+Khusus+Ibukota+Jakarta!5e0!3m2!1sid!2sid!4v1418630382949" width="100%" height="200" frameborder="0" style="border:0"></iframe>
						<div class="contact-detail">
							<h4><i class="glyphicon glyphicon-map-marker"></i> Lorem ipsum dolor sit</h4>
							Awesome sample lorem <br />
							Tel. 0000000000 <br />
							Fax. 0000000000 <br /><br />
							Email : <a href="mailto:">lorem@lorem.com</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
<?php	
	}
?>

<script>
	$("#form-contact").validate();
</script>
