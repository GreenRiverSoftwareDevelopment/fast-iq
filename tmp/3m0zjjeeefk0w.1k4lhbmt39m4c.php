<!DOCTYPE html>
    <html>
        <head>
            <title>Fast-IQ</title>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- bootstrap -->
                <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                <link href="css/categorySecond.css" rel="stylesheet" media="screen"> 
			    <!--[if lt IE 9]>
                <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
                <![endif]-->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        </head>
        <body>
            <div>
            <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                      <a class="nav-link" href="./"><h3>Home</h3></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="./category"><h3>Category</h3></a>
                    </li>
                </ul>
              
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
					<h3>Login</h3>
                </button>

            </nav>
            </div>
            
            <!--*********************************** THIS IS THE MODAL*************************************-->
            
           
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login To Make Changes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="./login" method="POST">
                            <div class="modal-body">
                                <div class="form-group row">
                                  <label for="example-time-input" class="col-2 col-form-label">Email</label>
                                  <div class="col-10">
                                    <input class="form-control form-control-lg" type="Text" name="username" placeholder="username" id="username" required="true">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="example-color-input" class="col-2 col-form-label">Password</label>
                                  <div class="col-10">
                                    <input class="form-control" type="password" name="password" placeholder="password" id="password" required="true">
                                  </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="Submit" class="btn btn-primary">Login</button>
                            </div> 
                      </form>
                    </div>
                  </div>
                </div>
        <!--*********************************** THIS IS THE MODAL*************************************-->
		
		<br>
		<br>

		<!--Buttom ROW OF COLS-->
                    <div class="row">
						<div class="col-sm-3"></div>
                            <div class= "col-sm-2">
								<div id="form">
								  <h3 class="text-center">Select a Category:</h3>
								  <select class="form-control form-control-lg" id="category_select">
									<option disabled selected>Please select</option>
									
									 <?php foreach (($categories?:[]) as $category): ?>
										<option value="<?= ($category['category_id']) ?>"><?= ($category['category_name']) ?></option>
                                    <?php endforeach; ?>
								  </select>
								</div>
                            </div>
                            <div class= "col-sm-2">
								<h3 class="text-center">Select a Unit:</h3>
                               	  <select class="form-control form-control-lg" id="unit_select">
									<!--What ever is being echoed is echoed here-->
								  </select>
                            </div>
                            
                            <div class= "col-sm-2">
								<h3 class="text-center">Select a Exercise:</h3>
								 <select class="form-control form-control-lg" id="excercise_select">
									<!--What ever is being echoed is echoed here-->
								  </select>
							</div>
                        <div class="col-sm-3"></div>    
                    
                    </div>
           <!--End of COLS Bottom--> 
		
		
            <!--This is the Main body of the page-->
		<div class="summary-view" id="summary-view">
            <h1 class="display-2 text-center">Summary Page</h1>
            
            
            <br>
			<!-- Collapse for Summary-->
                <div class="row">
					
					
                    <div class="col-sm-3">
					</div>
                    <div class="col-sm-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed"><h1 id="tabHeading">Exercise Summary</h1>
							</div></a>
								<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
										<div class="panel-body">
										</div>
									</div>
								</div>
						</div>
                
				<!-- Collapse for Videos-->
                <div class="row">
                    <div class="col-sm-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<a role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed"><h1 id="tabHeading">Video</h1>
							</div></a>
							<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<div class="panel-body">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<!-- Collapse for questions-->
				<div class="row">
                    <div class="col-sm-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<a role="button" data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed"><h1 id="tabHeading">Questions</h1>
							</div></a>
								<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
										<div class="panel-body">
										 <h1>1. Why are the tires always black in color?</h1>
											<h4>Tires are black due to the proportion of carbon mixed in it during vulcanization of rubber. Without it, tires can’t bear the friction heat and road stress.</h4>
										</div>
									</div>
								</div>   
						</div>
					</div>
				</div>
					
				<!-- Collapse for pictures-->	
				<div class="row">
                    <div class="col-sm-12"><div class="panel panel-primary">
						<div class="panel-heading">
							<a role="button" data-toggle="collapse" href="#collapseFour" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed"><h1 id="tabHeading">Pictures</h1>
						</div></a>
							<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<div class="panel-body">
										<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
										  <ol class="carousel-indicators">
											<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
											<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
											<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
										  </ol>
										  <div class="carousel-inner">
											<div class="carousel-item active">
											  <img class="d-block w-100" src="http://benbri.com.au/shared/content/uploads/service-hydraulics-benbriairandfluidsystems.jpg" alt="First slide">
											</div>
											<div class="carousel-item">
											  <img class="d-block w-100" src="https://www.mechanicshub.com/wp-content/uploads/diesel-engine-mechanicst-mechanics-technicians-jobs-hiring.jpg" alt="Second slide">
											</div>
											<div class="carousel-item">
											  <img class="d-block w-100" src="https://fthmb.tqn.com/DXcKnjs9QK-gNxHhAGotDU63_M8=/768x0/filters:no_upscale()/gears-by-Guy-Sie-58b8792e3df78c353cbc4f91.jpg" alt="Third slide">
											</div>
										  </div>
										  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="sr-only">Previous</span>
										  </a>
										  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="sr-only">Next</span>
										  </a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>                
                </div>					
                                                
   
					</div>
		</div>
            
          
            <br>
                

              <script>
				
				var summary_view = document.getElementById("summary-view");
				summary_view.style.display = "none";
				
				function updateUnits() {
				  var cat_select = document.getElementById("category_select");
				  var subcat_select = document.getElementById("unit_select");
		  
				  var cat_id = cat_select.options[cat_select.selectedIndex].value;
		  
				  var url = './grabUnits/' + cat_id;
				  console.log(cat_id);
					
				  var xhr = new XMLHttpRequest();
				  xhr.open('GET', url, true);
				  xhr.onreadystatechange = function () {
				   
					  //cat_select.innerHTML = xhr.responseText;
					  subcat_select.innerHTML = xhr.responseText;
					  console.log(xhr.responseText);
					  if(summary_view.style.display === "block")
					  {
						summary_view.style.display = "none";
					  }
					  $('#collapseOne').collapse('show');
					  //subcat_select.style.display = 'inline';
					
				  };
				  xhr.send();
				}
		  
				var cat_select = document.getElementById("category_select");
				cat_select.addEventListener("change", updateUnits);
				
				
				function updateExcercise() {
				  var unit_select = document.getElementById("unit_select");
				  var exercise_select = document.getElementById("excercise_select");
				  
				  var unit_id = unit_select.options[unit_select.selectedIndex].value;
		  
				  var url = './grabExercise/' + unit_id;
				  console.log(unit_id);
					
				  var xhr = new XMLHttpRequest();
				  xhr.open('GET', url, true);
				  xhr.onreadystatechange = function () {
				   
					  //cat_select.innerHTML = xhr.responseText;
					  exercise_select.innerHTML = xhr.responseText;
					  console.log(xhr.responseText);
					  if(summary_view.style.display === "block")
					  {
						summary_view.style.display = "none";
					  }
					  
					  
					 //subcat_select.style.display = 'inline';
					
				  };
				  xhr.send();
				}
		  
				var unit_select = document.getElementById("unit_select");
				unit_select.addEventListener("change", updateExcercise);
				
				
				//Summary
				function updateSummary() {
				  var excercise_select = document.getElementById("excercise_select");
				  var summary_select = document.getElementById("collapseOne");
		  
		
				var summary_view = document.getElementById("summary-view");
				
				  var summary_id = excercise_select.options[excercise_select.selectedIndex].value;
		  
				  var url = './summaryExercise/' + summary_id;
				  console.log(summary_id);
					
				  var xhr = new XMLHttpRequest();
				  xhr.open('GET', url, true);
				  xhr.onreadystatechange = function () {
				   
					//cat_select.innerHTML = xhr.responseText;
					summary_select.innerHTML = xhr.responseText;
					console.log(xhr.responseText);
					if(summary_view.style.display === "none")
					  {
						
						summary_view.style.display = "block";
					  }
					  
					//  if(summary_view.style.display === "none")
					//  {
					//	summary_view.style.display = "block";
					//  }
					 //subcat_select.style.display = 'inline';
					
				  };
				  xhr.send();
				}
		  
				var unit_select = document.getElementById("excercise_select");
				unit_select.addEventListener("change", updateSummary);
				
				
								//Summary
				function updateVideo() {
				  var excercise_select = document.getElementById("excercise_select");
				  var video_select = document.getElementById("collapseTwo");
		  
				  var video_id = excercise_select.options[excercise_select.selectedIndex].value;
		  
				  var url = './videoExercise/' + video_id;
				  console.log(video_id);
					
				  var xhr = new XMLHttpRequest();
				  xhr.open('GET', url, true);
				  xhr.onreadystatechange = function () {
				   
					  //cat_select.innerHTML = xhr.responseText;
					  video_select.innerHTML = xhr.responseText;
					  console.log(xhr.responseText);
					 //subcat_select.style.display = 'inline';
					
				  };
				  xhr.send();
				}
		  
				var unit_select = document.getElementById("excercise_select");
				unit_select.addEventListener("change", updateVideo);
			  </script>
            
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </body>
    </html>
