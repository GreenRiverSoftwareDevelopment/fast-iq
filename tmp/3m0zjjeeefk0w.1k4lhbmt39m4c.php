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
						<button id="loginButton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
							<h3>Login</h3>
						</button>
                    </li>
                </ul>



            </nav>
            </div>

            <!--*********************************** THIS IS THE LOGIN MODAL*************************************-->


                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel">Login To Make Changes</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="./verifyLogin" method="POST" class="loginInput">
                            <div class="modal-body">
                                <div class="form-group row">
                                  <label for="example-time-input" class="col-2 col-form-label"><h4>Username</h4></label>
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
							
							<div class="col-sm-12">
								<h4 class="text-danger" id="errorMessage" style="display:none;">
									Incorrect Password Or Username
								</h4>
							</div>
							
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                              <button id="submit" type="submit" class="submitButton btn btn-primary btn-lg">Login</button>
                            </div>
                      </form>
                    </div>
                  </div>
                </div>
        <!--*********************************** THIS IS THE LOGIN MODAL*************************************-->

		<br>
		<br>

			<!--Buttom ROW OF COLS-->
                    <div class="row">
						
						<div class="col-sm-3">
							<div class="col-sm-12" id="searchPanel">
								<div class="panel panel-default"  id="searchPanel">
								<div class="panel-heading">
								<div class="form-group">
								<div class="col-sm-12 searchbar"><h3><input type="text" name="searchInput" class="form-control" placeholder="Search Exercise" id="searchBarInput" onKeyUp="getExercise();"></h3></div>
								</div>
								</div>
									<div id="searchResults">
										<?php foreach ((@$exercises?:[]) as $exercise): ?>
										<a href="#"><div class="panel-body" id="<?= ($exercise['exercise_id']) ?>" onclick="getClickedElement(this);"><h4> <?= ($exercise['exercise_name']) ?></h4></div></a>
										<?php endforeach; ?>
									</div>
								</div>
							</div>							
						</div>
						

							<div class="col-sm-9">
								<div class="row">
									<div class= "col-sm-4 col-md-3">
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
									<div class= "col-sm-4 col-md-3">
										<h3 class="text-center">Select a Unit:</h3>
										  <select class="form-control form-control-lg" id="unit_select">
											<!--What ever is being echoed is echoed here-->
										  </select>
									</div>
		
									<div class= "col-sm-4 col-md-3">
										<h3 class="text-center">Select a Exercise:</h3>
										 <select class="form-control form-control-lg" id="excercise_select">
											<!--What ever is being echoed is echoed here-->
										  </select>
									</div>
									
						<!--This is the Main body of the page-->
					<div class="summary-view col-md-9" id="summary-view">
						
						<br>
						<!-- Collapse for Summary-->
							<div class="row">
			
								<div class="col-sm-12">
									<div class="panel panel-primary">
										<div class="panel-heading">
											<a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed"><h1 id="tabHeading">Exercise Summary</h1>
										</div></a>
											<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			
											</div>
									</div>
									<!-- Collapse for Media-->
									<div class="row">
										<div class="col-sm-12">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<a role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed"><h1 id="tabHeading">Media</h1>
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
					</div>
			
					<br>
			
						
			
					<br>
								<div class="col-sm-3"></div>										
								</div>
							
							</div>


                    </div>
			<!--End of COLS Bottom-->



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
				  //console.log(question_id);
				  var xhr = new XMLHttpRequest();
				  xhr.open('GET', url, true);
				  xhr.onreadystatechange = function () {
					  //cat_select.innerHTML = xhr.responseText;
					  question_select.innerHTML = xhr.responseText;
					  //console.log(xhr.responseText);
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
				  //console.log(picture_id);
				  var xhr = new XMLHttpRequest();
				  xhr.open('GET', url, true);
				  xhr.onreadystatechange = function () {
					  //cat_select.innerHTML = xhr.responseText;
					  picture_select.innerHTML = xhr.responseText;
					  //console.log(xhr.responseText);
					 //subcat_select.style.display = 'inline';
				  };
				  xhr.send();
				}
				unit_select.addEventListener("change", updateVideo);
				unit_select.addEventListener("change", updateQuestions);
				unit_select.addEventListener("change", updatePicture);
			</script>

	
			<!--This script will get the input of the user and querry the results frome the database-->
			<script type="text/javascript">
				
				function getClickedElement(clickedElement){
					var elementId = $(clickedElement).attr('id');
					$.ajax({//This call is to get the summary asyc..
						type: 'GET',
						url: './summaryExercise/' + elementId,
						dataType: 'HTML',
						data: {'elementId': elementId},
						success: function(exerciseSummary){
							 var summary_select = document.getElementById("collapseOne");
							 var summary_view = document.getElementById("summary-view");
							 
							 summary_select.innerHTML = exerciseSummary;
							 summary_view.style.display = "block";
							//console.log(exerciseSummary);
							
								$.ajax({//This call on the success of the summary ajax call is going to get the questions
									type: 'GET',
									url: './videoExercise/' + elementId,
									dataType: 'HTML',
									data: {'elementId': elementId},
									success: function(exerciseVideo){
										 var video_select = document.getElementById("collapseTwo");
										 var summary_view = document.getElementById("summary-view");
										 
										  summary_view.style.display = "block";
										 video_select.innerHTML = exerciseVideo;
										 
										//console.log(exerciseSummary);
										$.ajax({//On the success call of it's previous it will get the questions
										type: 'GET',
										url: './questionsExercise/' + elementId,
										dataType: 'HTML',
										data: {'elementId': elementId},
										success: function(exerciseQuestions){
											
											var question_select = document.getElementById("collapseThree");
											  var summary_view = document.getElementById("summary-view");
											 question_select.innerHTML = exerciseQuestions;
											  summary_view.style.display = "block";
											//console.log(exerciseSummary);

												$.ajax({//On the success call of it's previous it will get the questions
												type: 'GET',
												url: './pictureExercise/' + elementId,
												dataType: 'HTML',
												data: {'elementId': elementId},
												success: function(exercisePicture){
													
													var picture_select = document.getElementById("collapseFour");  
													picture_select.innerHTML = exercisePicture;

													console.log(exercisePicture);
		
													
												}
											});											
										}
									});	
								}
							});							
						}
					});
					
					//summary-view.display('block');
					//console.log(elementsId);
				}
				
				function getExercise(){
					var searchInput = $('#searchBarInput').val();
		
					$.ajax({
						type: "POST",
						url: "./searchBarInput",
						dataType: 'html',
						data: {'searchInput': searchInput},
						success: function(result)
						{
							$('#searchResults').html("");
							var resultFromDatabase = JSON.parse(result);
							//console.log(resultFromDatabase);
							for (searchResult in resultFromDatabase){
							 var exerciseId = searchResult;
							 $('#searchResults').append('<a href="#"><div class="panel-body" id="'+exerciseId+'" onclick="getClickedElement(this);"><h4>'+resultFromDatabase[exerciseId]['exercise_name']+'</h4></div></a>');
							 //console.log(searchResult);
							}
						}
						
						
					});
					
					//console.log(searchInput);
				}
			</script>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>
			
			<script
				src="https://code.jquery.com/jquery-3.3.1.min.js"
				integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
				crossorigin="anonymous"></script>
			<script
				src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
				integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
				crossorigin="anonymous"></script>
			
			<script src="js/login.js"></script>
            <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </body>
    </html>
