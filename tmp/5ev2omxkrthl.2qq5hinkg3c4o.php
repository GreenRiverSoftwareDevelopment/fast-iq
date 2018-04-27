<!DOCTYPE html>
    <html>
        <head>
            <title>Fast-IQ</title>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">


            <style>


/*.hoverImage {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .hoverImage {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}*/

.text {

  color: white;
  font-size: 16px;
  padding: 16px 32px;
}

p {
  font-size: medium;
}

input {
    font-size: medium;
}

li {
  font-size: medium;
}
	 a:hover{
			text-decoration: none;
			color:white;
}
            </style>
            <!-- bootstrap -->
                <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
				<link href="css/categorySecond.css" rel="stylesheet" media="screen">
				<link href="css/categorystyle.css" rel="stylesheet" media="screen">
                <!--[if lt IE 9]>
                <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
                <![endif]-->


        </head>
        <body>
            <div>
                <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link" href="./categoryBackend"><h3>Home</h3></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./exercisesBackend/<?= ($unitID) ?>"><h3>Go Back</h3></a>
                        </li>
                        <li class="nav-item">
                          <a data-toggle="modal" data-target="#signUpModal"><h3>Create New Admin</h3></a>
                        </li>
                    </ul>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        <h3>Logout</h3>
                    </button>
                </nav>
            </div>
  <!--*********************************** THIS IS THE create a new admin MODAL*************************************-->
                <div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create a new admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="container-fluid">
                        <form action="./createAdmin" method="post">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter username">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                          </div>
                          <button type="submit" class="btn btn-primary" id="createdAdminBtn">Create</button>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>
            <!--*********************************** THIS IS LOGOUT THE MODAL*************************************-->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Logout</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="./logout" method="GET">
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <h3>Are you sure you want to logout?</h3>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">No</button>
                              <button type="Submit" class="btn btn-primary btn-lg">Yes</button>
                            </div>
                      </form>
                    </div>
                  </div>
                </div>
        <!--*********************************** THIS IS LOGOUT THE MODAL*************************************-->




	<h1 class="display-3 text-center">
		<strong><a href="./unitsBackend/<?= ($categoryID) ?>">Category - <?= ($categoryName['category_name']) ?></a></strong> >
		<strong><a href="./exercisesBackend/<?= ($unitID) ?>"><?= ($unitName['unit_name']) ?></a></strong> >
		<strong><?= ($exercise['exercise_name']) ?></strong>
	</h1>
	<br>
			<div class="col-xs-11 col-sm-7">
    <div class="panel-group" id="accordion">

        <!-- start panel left -->
        <!--<div class="panel-left col-sm-6">-->
		<div class="col-sm-10 col-sm-offset-5">


            <!-- start panel -->
            <div class="panel panel-primary">

                <div class="panel-heading">

                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#TEST_1">
						<h1 id="tabHeading">Exercise Summary</h1>
                    </h4>
                </div></a>

                <div id="TEST_1" class="panel-collapse show">
                    <div class="panel-body">
						<div class="row">
							<div class="col-sm-6">
								<form action="./editExerciseSummary/<?= ($exerciseID) ?>" id="summary" method="post" class="form-horizontal">
									<div class="input-group">
										<textarea rows="8" cols="50" class="form-control"  name="exercise_summary" id="exercise_summary" placeholder="Enter a Summary here" value="<?= ($exercise['exercise_summary']) ?>" style="font-size: 14px"><?= ($exercise['exercise_summary']) ?></textarea>
									</div>
								
							</div>
							<div class="justify-content-center col-sm-1">
							</div>
							<div class="justify-content-center col-sm-2">
								
							</div>
						</div>

                    <!-- Start of edit module-->
                                    <div class="modal fade editExerciseSummary<?= ($exercise['exercise_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content" id="modalcontent">
												<div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Save changes for summary</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <!-- inner modal -->
                                                    <br>
                                                    <br>
                                                    <div class="col-sm-12 text-center">
                                                            <label for="exercise"><h3>Are you sure you want to save changes?</h3></label>
                                                        <div class="form-group">
                                                            <input form="summary" class="btn btn-info btn-lg" type="submit" value="Save">
                                                        </div>
                                                        <br>
                                                        <br>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                    <!-- End of edit module-->
                    </div>
                </div>
            </div>

            <!-- end panel -->

            <!-- start panel -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#TEST_2">
                        <h1 id="tabHeading">Media</h1>
                    </a>
                    </h4>
                </div>
                <div id="TEST_2" class="panel-collapse collapse show">
                    <div class="panel-body">
                        <div class="container">
						<div class="hoverImage">

                         <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= ($youtubeEmbededCode) ?>" width="100%" height="460px" allowfullscreen></iframe>
						
						</div>

                      <!-- Edit and Delete hover over 
                        <div class="middle">

							<div class="text">
								<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target=".editExerciseVideo<?= ($exercise['exercise_id']) ?>">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Edit
								</button>
							</div>
                        </div>-->
                        <!-- Edit and Delete hover over end -->
						<?php foreach (($videoLinkExcercises?:[]) as $videoLinkExcercise): ?>
							
							 <!--<a href="<?= ($videoLinkExcercise['link']) ?>" target="_blank"><h2><?= ($videoLinkExcercise['link']) ?></h2></a>-->
							 <textarea rows="3" cols="50" class="form-control"  name="videolink" id="videolink" placeholder="Enter a link here" value= "<?= ($videoLinkExcercise['link']) ?>" style="font-size: 14px"><?= ($videoLinkExcercise['link']) ?></textarea>
								<br>
						<?php endforeach; ?>
						
						
								<!--
								 <form action="./editExerciseVideo/<?= ($exerciseID) ?>" id="video" method="post" class="form-horizontal">					

											<li id="list-group">
												<!--<div class="input-group input-group-lg">
													<input name="questions[]" id="questions" class="form-control" type="text" placeholder="Enter a new question here"></input>
												</div>
												<textarea rows="3" cols="50" class="form-control"  name="questions[]" id="questions" placeholder="Enter a new link here" style="font-size: 14px"></textarea>
								
											</li>
									</form>-->





                        <!-- Start of edit module
                                    <div class="modal fade editExerciseVideo<?= ($exercise['exercise_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content" id="modalcontent">
												<div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Save changes for video</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <!-- inner modal 
                                                    <br>
                                                    <br>
                                                    <div class="col-sm-12 text-center">
                                                            <label for="exercise"></label>
																<h3>Enter a YouTube link.</h3>
																<!--
                                                                <form action="./editExerciseVideo/<?= ($exerciseID) ?>" id="video" method="post" class="form-horizontal">
																	<div class="input-group input-group-lg">
																		<input class="form-control" name="videolink" id="videolink"  value="<?= ($exercise['exercise_video']) ?>">
																	</div>
                                                                </form>
																
																<br>
                                                        <div class="form-group">
                                                            <input form="video" class="btn btn-info btn-lg" type="submit" value="Save">
                                                        </div>
                                                        <br>
                                                        <br>
						</div>
					
                                            </div>
                                        </div>
                                    </div>
                     End of edit module-->
						</div>
					</div>
				</div>
            </div>
            <!-- end panel -->



            <!-- start panel -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#TEST_3">
							<h1 id="tabHeading">Questions</h1>
						</a>
                    </h4>
                </div>

                <div id="TEST_3" class="panel-collapse show">
                    <div class="panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div contenteditable="true">
									<!--<form action="./editExerciseQuestion/<?= ($exerciseID) ?>" id="question" method="post" class="form-horizontal">-->

										<?php foreach (($questions_array?:[]) as $question): ?>
											
											<li id="list-group">
												
												<!-- <div class="input-group input-group-lg">
													<input name="questions[]" id="questions" class="form-control" type="text" placeholder="Enter a new question here" value="<?= ($question) ?>"></input>
												-->
												<textarea rows="3" cols="50" class="form-control"  name="questions[]" id="questions" placeholder="Enter a question here" value="<?= ($question) ?>" style="font-size: 14px"><?= ($question) ?></textarea>
								
												
												<!--</div>-->
											</li>
											<br>
										<?php endforeach; ?>

											<li id="list-group">
												<!--<div class="input-group input-group-lg">
													<input name="questions[]" id="questions" class="form-control" type="text" placeholder="Enter a new question here"></input>
												</div>-->
												<textarea rows="3" cols="50" class="form-control"  name="questions[]" id="questions" placeholder="Enter a new question here" style="font-size: 14px"></textarea>
								
											</li>
									<!--</form>-->
								</div>
							</div>
							<div class="justify-content-center col-sm-1">
							</div>
							<div class="justify-content-center col-sm-2">
								<!--<button type="button" class="btn btn-primary btn-success btn-lg" data-toggle="modal" data-target=".editExerciseQuestion<?= ($exercise['exercise_id']) ?>">
									<span class="glyphicon glyphicon-saved" aria-hidden="true"></span>  Save
								</button>-->
							</div>
						</div>
                        <br>


                           <!-- Start of edit module
                                    <div class="modal fade editExerciseQuestion<?= ($exercise['exercise_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content" id="modalcontent">
												<div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Save changes for questions</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <!-- inner modal 
                                                    <br>
                                                    <br>
													<div class="col-sm-12 text-center">
                                                            <label for="exercise"><h3>Are you sure you want to save changes?</h3></label>
                                                        <div class="form-group">
                                                            <input form="question" class="btn btn-info btn-lg" type="submit" value="Save">
                                                        </div>
                                                        <br>
                                                        <br>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                     End of edit module-->
                        <!--<?= ($exercise['exercise_questions']) ?>-->
                    </div>
                </div>
            </div>
            <!-- end panel -->



            <!-- start panel -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#TEST_4">
                        <h1 id="tabHeading">Photos</h1>
                     </a>
                    </h4>
                </div>
                <div id="TEST_4" class="panel-collapse collapse show">
                    <div class="panel-body">
                        <!--<?= ($exercise['exercise_image']) ?>-->
                        <div class="container">
                            <div class="hoverImage">
						<img src="<?= ($exercise['exercise_image']) ?>" class="img-fluid" alt="Responsive image">

                        </div>
							
							
											<li id="list-group">
												<!-- <div class="input-group input-group-lg">
													<input name="questions[]" id="questions" class="form-control" type="text" placeholder="Enter a new question here" value="<?= ($question) ?>"></input>
												-->
												<textarea rows="3" cols="50" class="form-control"  name="imagelink" id="imagelink" placeholder="image link here " value="<?= ($exercise['exsercise_image']) ?>" style="font-size: 14px"><?= ($exercise['exercise_image']) ?></textarea>
								
												
												<!--</div>-->
											</li>
											<br>
										
									
							
							
                        <!-- Edit and Delete hover over 
                        <div class="middle">
							<div class="text">
								<button type="button" class="btn btn-primary btn-warning btn-lg" data-toggle="modal" data-target=".editExerciseImage<?= ($exercise['exsercise_id']) ?>">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Edit
								</button>
							</div>
                        </div>-->
                         <!-- Start of edit module
                                    <div class="modal fade editExerciseImage<?= ($exercise['exercise_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content" id="modalcontent">
												<div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Save changes for images</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <!-- inner modal 
                                                    <br>
                                                    <br>
                                                    <div class="col-sm-12 text-center">
                                                            <label for="exercise"></label>
																<h3>Enter a Photo link.</h3>
																	<form action="./editExerciseImage/<?= ($exerciseID) ?>" id="image" method="post" class="form-horizontal">
																		<div class="input-group input-group-lg">
																			<input class="form-control" name="imagelink" id="imagelink"  value="<?= ($exercise['exercise_image']) ?>">
																		</div>
																	</form>
																	<br>
                                                        <div class="form-group">
                                                            <input form="image" class="btn btn-info btn-lg" type="submit" value="Save">
                                                        </div>
                                                        <br>
                                                        <br>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>-->
						<!-- End of edit module-->
                        <!-- Edit and Delete hover over end -->
                        </div>
                    </div>
						
                </div>
			</div>
				<br>
					<button type="submit" class="btn btn-primary btn-success btn-lg btn-block" data-toggle="modal" data-target=".editExerciseSummary<?= ($exercise['exercise_id']) ?>">
									<span class="glyphicon glyphicon-saved" aria-hidden="true"></span>  Save
								</button>
					</form>
			</div>

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>
			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </body>
    </html>

