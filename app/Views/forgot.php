<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-2"><a class="app-logo" href="<?= base_url();?>"><img src="<?= base_url('assets/images/schoollogo.jpg')?>" alt="logo" ></a></div>
					<h1 class="auth-heading text-center mb-3">College of Education,  Lanlate</h1>
                    
                    <h2 class="auth-heading text-center mb-3">Student Portal</h2>
                   
                    <b  style="color:#039">Retrieve Password</b><br> <br> 
			        <div class="auth-form-container text-left">
						<form class="auth-form login-form" action="<?php echo base_url('account/forgetpass'); ?>" method="post">         
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Registration/Application Number</label>
								<input id="signin-email" name="email" type="text" class="form-control signin-email" placeholder="Registration/Application Number" required="required" autocomplete = "off">
							</div><!--//form-group-->
							<div class="password mb-3">
								
								<div class="extra mt-3 row justify-content-between">
									
									
								</div><!--//extra-->
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit"  onclick = "alert('Your Login Details will be sent to your Email if your Registration/Application Number  is correct....')"  class="btn app-btn-primary btn-block theme-btn mx-auto">Reset Password</button>
								
								
						
							</div>
						</form>
						
						<div class="auth-option text-center pt-3">
                        <a href="<?= base_url();?>"> <strong> &lt;&lt; Back to Home</strong> </a> 
                       </div>
                    						 
   <div class="auth-option text-center pt-3">
                        <a href="<?= base_url('portal/reginstructions');?>"> <strong> REGISTRATION INSTRUCTION</strong> </a> 
                       </div>
					</div><!--//auth-form-container-->	

			    </div><!--//auth-body-->
				
		 <?=   view('footer'); ?>
			    <!--//app-auth-footer-->	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				   
				    
                   <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				   
                   
                    <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-left">						        
				                <div class="app-icon-holder icon-holder-mono">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
	  <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
	</svg>
								</div><!--//app-icon-holder-->
					        </div><!--//col-->
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						       
						        <h4 class="notification-title mb-1">Notices</h4>
						        
						        
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">
					    <div class="notification-content">
                        <p align="justify">1. Fee Payment for  All Students commences.</p>
							  <p align="justify">2. School Fees payment can be paid Online or in Bank Branches nationwide with your REMITA RRR .</p>
							  <p align="justify">3. Please endeavor to wait till after 24 hours before you retry payment with your ATM card if you have any technical/failed issue.</p>
							   
 <p align="justify">4. <b>The Portal is Open for payment of Fees for 2020/2021 Session</b>.</p>
		 			</div>
				    </div><!--//app-card-body-->
				   
				</div><!--//app-card-->
                    <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
                    <h4 class="notification-title mb-1"> <p id="demo" style="text-align:center; font-size: 18px; margin-top: 0px; ; color:black"> </p> </h4>
						        
					        
				         
				    </div><!--//app-card-header-->
				   
				</div><marquee class="example5"> <b><?= $marquee; ?> </b></marquee>	
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    </div>
    </div><!--//row-->
<script>
			$(document).ready(function() {
				$('.custom-select').fancySelect(); // Custom select
				$('[data-toggle="tooltip"]').tooltip() // Tooltip
			});
		</script> 
		
		<script>
// Set the date we're counting down to
var countDownDate = new Date("<?= $timer; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = "Payment of  Fees Closes in:  <br> <br> " + days + "Days " + hours + "Hrs "
  + minutes + "Mins " + seconds + "Secs ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Registration is CLOSED";
  }
}, 1000);
</script>

</body>
</html>