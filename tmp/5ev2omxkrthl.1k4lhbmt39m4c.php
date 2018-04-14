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
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
							<h3>Login</h3>
						</button>
                    </li>
                </ul>
              
                

            </nav>
            </div>
            
            <!--*********************************** THIS IS THE MODAL*************************************-->
            
           
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel">Login To Make Changes</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="./login" method="POST">
                            <div class="modal-body">
                                <div class="form-group row">
                                  <label for="example-time-input" class="col-2 col-form-label"><h4>Email</h4></label>
                                  <div class="col-10">
									<div class="input-group input-group-lg">
										<input class="form-control form-control-lg" type="Text" name="username" placeholder="username" id="username" required="true">
									</div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="example-color-input" class="col-2 col-form-label"><h4>Password</h4></label>
                                  <div class="col-10">
									<div class="input-group input-group-lg">
										<input class="form-control" type="password" name="password" placeholder="password" id="password" required="true">
									</div>
                                  </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                              <button type="Submit" class="btn btn-primary btn-lg">Login</button>
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
											</div>
										</div>
									</div>
								</div>
							</div>                
						</div>		
					</div>
				</div>
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-3 text-center">
					<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".grade<?= ($exercise_id) ?>">
						<h3>Grade Students</h3>
					</button>
				</div>
									<!-- Start of Grade module-->
                                    <div class="modal fade grade<?= ($exercise_id) ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content" id="modalcontent">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit <?= ($exercise['exercise_name']) ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <!-- inner modal -->
                                                <form action="./editExercise/<?= ($exercise_id) ?>" method="post" class="form-horizontal">
                                                    <br>
                                                    <br>
                                                    <div class="col-sm-2"></div>
                                                    
                                                    <div class="col-sm-8 text-center">
                                                        <div class="form-group">
                                                            <label for="exercise"><h3><?= ($exercise_id) ?></h3></label>
                                                            <div class="input-group input-group-lg">
                                                                <input class="form-control" type="text" name="exercise_name" id="exercise_name" value="<?= ($exercise['exercise_name']) ?>" placeholder="Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="btn btn-warning btn-lg" type="submit" value="Save">
                                                        </div>
                                                        <br>
                                                        <br>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
									<!-- End of Grade module-->
				<div class="col-md-3 text-center">
					<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target=".attendance<?= ($exercise_id) ?>">
						<h3>Student Attendance</h3>
					</button>
				</div>
									<!-- Start of Attendance module-->
                                    <div class="modal fade attendance<?= ($exercise_id) ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content" id="modalcontent">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit <?= ($exercise['exercise_name']) ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <!-- inner modal -->
                                                <form action="./editExercise/<?= ($exercise_id) ?>" method="post" class="form-horizontal">
                                                    <br>
                                                    <br>
                                                    <div class="col-sm-2"></div>
                                                    
                                                    <div class="col-sm-8 text-center">
                                                        <div class="form-group">
                                                            <label for="exercise"><h3><?= ($exercise_id) ?></h3></label>
                                                            <div class="input-group input-group-lg">
                                                                <input class="form-control" type="text" name="exercise_name" id="exercise_name" value="<?= ($exercise['exercise_name']) ?>" placeholder="Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="btn btn-warning btn-lg" type="submit" value="Save">
                                                        </div>
                                                        <br>
                                                        <br>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
									<!-- End of Attendance module-->
				<div class="col-md-3">
					
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
				  var exercise_select = document.getElementById("excercise_select");
				  
		  
				  var cat_id = cat_select.options[cat_select.selectedIndex].value;
		  
				  var url = './grabUnits/' + cat_id;
				  console.log(cat_id);
					
				  var xhr = new XMLHttpRequest();
				  xhr.open('GET', url, true);
				  xhr.onreadystatechange = function () {
				   
					  //cat_select.innerHTML = xhr.responseText;
					  subcat_select.innerHTML = xhr.responseText;
					  exercise_select.innerHTML = " ";
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
				
				
				//Video
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
				
				//Questions
				function updateQuestions() {
				  var excercise_select = document.getElementById("excercise_select");
				  var question_select = document.getElementById("collapseThree");
		  
				  var question_id = excercise_select.options[excercise_select.selectedIndex].value;
					
				  
		  
				  var url = './questionsExercise/' + question_id;
				  console.log(question_id);
					
				  var xhr = new XMLHttpRequest();
				  xhr.open('GET', url, true);
				  xhr.onreadystatechange = function () {
				   
					  //cat_select.innerHTML = xhr.responseText;
					  question_select.innerHTML = xhr.responseText;
					  console.log(xhr.responseText);
					 //subcat_select.style.display = 'inline';
					
				  };
				  xhr.send();
				}
				
				//Picture
				function updatePicture() {
				  var excercise_select = document.getElementById("excercise_select");
				  var picture_select = document.getElementById("collapseFour");
		  
				  var picture_id = excercise_select.options[excercise_select.selectedIndex].value;
		  
				  var url = './pictureExercise/' + picture_id;
				  console.log(picture_id);
					
				  var xhr = new XMLHttpRequest();
				  xhr.open('GET', url, true);
				  xhr.onreadystatechange = function () {
				   
					  //cat_select.innerHTML = xhr.responseText;
					  picture_select.innerHTML = xhr.responseText;
					  console.log(xhr.responseText);
					 //subcat_select.style.display = 'inline';
					
				  };
				  xhr.send();
				}
		  
				unit_select.addEventListener("change", updateVideo);
				unit_select.addEventListener("change", updateQuestions);
				unit_select.addEventListener("change", updatePicture);
				
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
