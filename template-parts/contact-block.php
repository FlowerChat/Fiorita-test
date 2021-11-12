<?php
?>
<!--- contact block to show  with get function--->
<section class="contact-block my-5">
	<h3 class="subheader-front">Kontaktujte nás</h3>
		<div class="contact-container">
			<div class="row row-all-elements-contact"> 
				<div class="d-flex col-12 col-md-4 contact-form-container">
					<div class="form-shell p-4">
						<h3 class="contact-form-title">Napište nám</h3>
							<div class="form-shell-inner">
								<form class="contact-form" action="contactform.php" method="post" name="Kontakt CZ">
									<div class="row mb-3">
										<label for="form-field-name" class="col-sm-2 col-form-label">Jméno*</label>
										<div class="col-sm-10">
										<input type="text" class="form-control form-field-label-text" name="CustomerName" id="form-field-name" placeholder="" required="required" aria-required="true">
										</div>
									</div>
									<div class="row mb-3">
										<label for="form-field-email" class="col-sm-2 col-form-label">Email*</label>
										<div class="col-sm-10">
										<input type="email" class="form-control form-field-label-text" name="CustomerEmail" id="form-field-email"  placeholder="" required="required" aria-required="true">
										</div>
									</div>
									<div class="row mb-3">
									<label for="form-field-phone" class="col-sm-2 col-form-label">Telefon</label>
										<div class="col-sm-6">
										<input type="tel" class="form-control form-field-label-text" name="CustomerPhone" id="form-field-phone" placeholder="" required="" aria-required="">
										</div>
										<div class="col-sm-4">
										
											<label class="form-check-label" for="gridCheck1">
											WhatsApp?
											</label>
											<input class="form-check-input" type="checkbox" id="gridCheck1" name="WhatAppTrue">
										</div>
									</div>
									<div class="row mb-3">
										<label for="form-field-message" class="col-sm-2 col-form-label">Zpráva*</label>
										<div class="col-sm-10">
										<textarea class="form-control form-field-label-text" id="form-field-message" rows="4" name="CustomerMessage"  placeholder="" required="required" aria-required="true">
										</textarea>
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-2">
											<label class="form-check-label" for="gridCheck2">
											GDPR*
											</label>
											<input class="form-check-input" type="checkbox" id="gridCheck2" name="GDPRTrue">
										</div>
										<div class="col-sm-10">
											<p>Odesláním objednávky z internetového objednávkového formuláře potvrzujete, že jste seznámen/a s <span style="text-decoration: underline;"><strong><a href="https://fiorita.cz/podminky-ochrany-osobnich-udaju/" target="_blank">podmínkami ochrany osobních údajů</a></strong></span> a že je v celém rozsahu přijímáte.</p>
											


										</div>



									</div>

									<p>* Povinné údaje</p>
									
									
									<button type="submit" class="btn btn-primary btn-lg">Odeslat</button>
								</form>
										
							</div>
						</div>
					</div>
					<div class="d-flex col-12 col-md-8 noform-container">
						<div class="row contacts-numbers">
							<div class="col-12 col-md-6 contact-map-container p-4">
							
								<h3 class="contact-form-title">Květiny Fiorita</h3>
								<a href="tel:+420607817716" style="text-decoration: none;"><h4 class="contact-details-icons"><i class="bi bi-telephone" ></i>&nbsp&nbsp&nbsp +420 607 817 716</h4></a>
								<a href="https://wa.me/420607817716" style="text-decoration: none;"><h4 class="contact-details-icons"><i class="bi bi-whatsapp"></i>&nbsp&nbsp&nbsp +420 607 817 716</h4></a>
								<a href="mailto:kvetiny@fiorita.cz" style="text-decoration: none;"><h4 class="contact-details-icons"><i class="bi bi-envelope"></i>&nbsp&nbsp&nbsp kvetiny@fiorita.cz</h4></a>
								<a href="https://g.page/Fiorita-Flowers" style="text-decoration: none;"><h4 class="contact-details-icons"><i class="bi bi-house"></i>&nbsp&nbsp&nbsp Rooseveltova 892/49,<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 16000 Praha 6</h4></a>

							</div>

							<div class="col-12 col-md-6 p-4  contact-element">
								<h3 class="contact-form-title">Kudy za námi</h3>
									<div class="map-container">
										<img class="map-pic" src="https://fiorita.cz/wp-content/uploads/2021/10/Kvetiny-Fiorita-map-small.jpg">
										
										<div class="map-navigate">
											<a href="https://g.page/Fiorita-Flowers" class="btn btn-primary btn-lg">Navigovat</a>
										</div>

									</div>
											
								
						</div>


					</div>
					<div class="row">
						<div class="d-flex col-12 contacts-description p-4">
							<div class="contacts-description-holder">
								<h4>Od stanice metra Dejvická a Vítězného náměstí</h4>
								<p>cca 4 minuty chůze ulicí Jugoslávských partyzánů, první zatáčka doprava</p>
								<h4>Od zastávky Lotyšská</h4>
								<p>cca 2 minuty chůze ulicí Jugoslávských partyzánů směrem k Vítěznému náměstí / metru Dejvická</p>
							</div>
							
						</div>
					</div>


				</div>						
			</div>
		</div>
</section>