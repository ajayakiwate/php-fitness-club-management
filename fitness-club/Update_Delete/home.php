<?php

$setup = <<<EOD

<script>
	
		$("#logout").parent().addClass("d-none"); 
		$("#login").parent().removeClass("d-none");
		
		$("#lUDE").parent().addClass("d-none");
		$("#lCU").parent().addClass("d-none");
		$("#feedbackData").parent().addClass("d-none");
		$("#userList").parent().addClass("d-none");
		$("#userView").parent().addClass("d-none");

	
</script>

EOD;
 
echo $setup;

$data=<<<EOD

<div class="container-lg">
        <div class="row">
		
            <div class="col-md-6" >
                <div class=" mb-4 bg-light">
			                    
					<div class="card shadow p-3 mt-4">
						<img class="card-img-top" src="./Update_Delete/sample.jpeg" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						</div>
					</div>	

					<div class="card shadow p-3 mt-4">
						<img class="card-img-top" src="./Update_Delete/sample.jpeg" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						</div>
					</div>	
					
					<div class="card shadow p-3 mt-4">
						<img class="card-img-top" src="./Update_Delete/sample.jpeg" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						</div>
					</div>											
                    
				</div>
			</div>
            
            <div class="col-md-6" >
                <div class=" mb-4 bg-light">
			                    
					<div class="card shadow p-3 mt-4">
						<img class="card-img-top" src="./Update_Delete/sample.jpeg" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						</div>
					</div>	

					<div class="card shadow p-3 mt-4">
						<img class="card-img-top" src="./Update_Delete/sample.jpeg" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						</div>
					</div>	
					
					<div class="card shadow p-3 mt-4">
						<img class="card-img-top" src="./Update_Delete/sample.jpeg" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						</div>
					</div>											
                    
				</div>
			</div>
                
        </div>
    </div>
	
	
	<div class=" jumbotron rounded-0 text-center bg-dark mt-2 mb-0">

	<ul class="social-network social-circle">
		<li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
		<li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
		<li><a href="#" class="icoTelegram" title="Telegram"><i class="fa fa-telegram"></i></a></li>
		<li><a href="#" class="icoYoutube" title="Youtube"><i class="fa fa-youtube"></i></a></li>
	</ul>
	
	<p class="mt-4 text-white">Copyright 2015-2021 All Rights Reserved.</p>
	
</div>
EOD;

echo $data;
	
?>