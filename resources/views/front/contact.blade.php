@extends('layouts.masterFront')

    @section('content')

         <!-- contact section start -->
 <section class="contact-section">
 	<div class="container">
        <div class="section-title">
            <h2 data-text="Contact">Get In Touch</h2>
        </div>

 		<div class="row">
 			<div class="contact-form">
 				<form>
 					<div class="row">
 					  <div class="input-group input-3">
 					  	 <input type="text" placeholder="Name" class="input-control" required>
 					  </div>
 					  <div class="input-group input-3">
 					  	 <input type="tel" placeholder="Phone" class="input-control" required>
 					  </div>
 					  <div class="input-group input-3">
 					  	 <input type="email" placeholder="Email" class="input-control" required>
 					  </div>
 				    </div>
 				    <div class="row">
 				    	<div class="input-group">
 				    		<textarea placeholder="Message" class="input-control" required></textarea>
 				    	</div>
 				    </div>
 				    <div class="row">
 				    	<div class="input-group">
 				    		<button type="submit" class="submit-btn">Send Message</button>
 				    	</div>
 				    </div>
 				</form>
 			</div>
 		</div>
 	</div>
 </section>
 <!-- contact section end -->

    @stop
