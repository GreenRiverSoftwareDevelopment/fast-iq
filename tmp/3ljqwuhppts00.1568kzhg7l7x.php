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
                            <a class="nav-link" href="./unitsBackend/<?= ($categoryID) ?>"><h3>Go Back</h3></a>
                        </li>
                        <li class="nav-item">
                          <a data-toggle="modal" data-target="#signUpModal"><h3>Create New Admin now</h3></a>
                        </li>
                    </ul>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        <h3>Logout</h3>
                    </button>
                </nav>
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
        <!--*********************************** THIS IS THE CREATE A NEW ADMIN MODAL*************************************-->
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
        <!--*********************************** THIS IS THE END OF THE CREATE A NEW ADMIN MODAL*************************************-->

            <h1 class="display-2 text-center" id="<?= ($unitName['unit_name']) ?>">
                <strong><a href="./unitsBackend/<?= ($categoryID) ?>">Category - <?= ($categoryName['category_name']) ?></a></strong> >
                <strong><?= ($unitName['unit_name']) ?></strong>
            </h1>


            <?php foreach (($exercises?:[]) as $exercise): ?>
            <br>
                <div class="row">
                            <div class="d-flex justify-content-center col-sm-1"></div>
                            <div class="d-flex justify-content-center col-sm-10">
                                <a class="btn btn-primary btn-lg btn-block" id="<?= ($exercise['exercise_name']) ?>" href="./exerciseSummaryBackend/<?= ($exercise['exercise_id']) ?>" role="button">
                                    <h4><?= ($exercise['exercise_name']) ?></h4>
                                </a>
                            </div>
                            <div class="d-flex justify-content-center col-sm-1"></div>
                </div>
            <?php endforeach; ?>

            <br>

            <div class="row">
                <div class="d-flex justify-content-center col-sm-1">
                    
                </div>
                
                <div class="d-flex justify-content-center col-sm-2">
                    <button type="button" class="btn btn-primary btn-lg btn-warning btn-block" data-toggle="modal" data-target=".editExercise">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Edit
                    </button>
                </div>
                <!--*********************************** START OF EDIT MODAL *************************************-->
                <div class="modal fade editExercise" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" id="modalcontent">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Exercises</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- inner modal -->
                            <form action="./editExerciseNames" method="post" class="form-horizontal">
                                <br>
                                <br>
                                <div class="col-sm-2"></div>

                                <div class="col-sm-8 text-center">
                                    <div class="form-group">
                                        <label for="category"><h3>Exercise Names</h3></label>
                                        
                                        <?php foreach (($exercises?:[]) as $exercise): ?>
                                            <div class="input-group input-group-lg">
                                                <input class="form-control" type="text" name="exercise_name[]" id="exercise_name" placeholder="<?= ($exercise['exercise_name']) ?>" value="<?= ($exercise['exercise_name']) ?>"required>
                                                <input class="form-control" type="hidden" name="exercise_id[]" id="exercise_id" value="<?= ($exercise['exercise_id']) ?>"required>
                                            </div>
                                            <br>
                                        <?php endforeach; ?>

                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-warning btn-lg" type="submit" value="Edit">
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--*********************************** END OF EDIT MODAL *************************************-->
            
                <div class="d-flex justify-content-center col-sm-6">
                    <button type="button" class="btn btn-primary btn-lg btn-success btn-block" data-toggle="modal" data-target=".addExercise<?= ($exercise['exercise_id']) ?>">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><h5>Add</h5>
                    </button>
                </div>

                <!--*********************************** START OF ADD MODAL *************************************-->
                <div class="modal fade addExercise<?= ($exercise['exercise_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" id="modalcontent">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add a Exercise</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- inner modal-->
                            <form action="./addExercise/<?= ($unitName['unit_id']) ?>" method="post" class="form-horizontal">
                                <br>
                                <br>
                                <div class="col-sm-2"></div>

                                <div class="col-sm-8 text-center">
                                    <div class="form-group">
                                        <label for="exercise"><h3>Exercise Name</h3></label>
                                        <div class="input-group input-group-lg">
                                            <input class="form-control" type="text" name="exercise_name" id="exercise_name" placeholder="Exercise Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-success btn-lg" id="add" type="submit" value="Add">
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--*********************************** END OF ADD MODAL *************************************-->

                <div class="d-flex justify-content-center col-sm-2">
                    <button type="button" class="btn btn-primary btn-lg btn-danger btn-block" data-toggle="modal" data-target=".confirmation">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete
                    </button>
                </div>
                
                <!--*********************************** START OF CONFIRMATION DELETE MODAL *************************************-->
                <div class="modal fade confirmation" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" id="modalcontent">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete a Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- inner modal -->
                            <form action="./deleteCategory" method="post" class="form-horizontal">
                                <br>
                                <br>
								<div class="row">
									<div class="col-sm-1"></div>
	
									<div class="col-sm-10 text-center">
										<h2 class="text-center">Deleting a Exercise will delete everything in its hierarchy.</h2>
										<h2 class="text-center">Are you sure you want to continue?</h2>
										<br>
										<br>
										<br>
									</div>
									<div class="col-sm-1"></div>
								</div>
								<div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-2 text-center">
											<input class="btn btn-light btn-lg" type="button" data-dismiss="modal" value="No">
										</div>
										<div class="col-sm-4"></div>
                                        <div class="col-sm-2 text-center">
											<button type="button" class="btn btn-primary btn-lg btn-danger btn-block" data-dismiss="modal" data-toggle="modal" data-target=".deleteExercise">
												<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Yes
											</button>
										</div>
                                        <div class="col-sm-2"></div>
                                </div>
								<br>
								<br>
                            </form>
                        </div>
                    </div>
                </div>
                <!--*********************************** END OF CONFIRMATION DELETE MODAL *************************************-->
                
                <!--*********************************** START OF DELETE MODAL *************************************-->
                <div class="modal fade deleteExercise" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" id="modalcontent">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete a Exercise</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- inner modal -->
                            <form action="./deleteExercise" method="post" class="form-horizontal">
                                <br>
                                <br>
                                <div class="col-sm-2"></div>

                                <div class="col-sm-8 text-center">
                                    <label><h2>Exercise Name</h2></label>
                                    <h4>(Check the boxes that you want to delete)</h4>
                                    <br>
                                    
                                    <?php foreach (($exercises?:[]) as $exercise): ?>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-2 text-center">
                                            <div class="form-check">
                                                <input class="input-group" type="checkbox" name="exercise_id[]" value="<?= ($exercise['exercise_id']) ?>" id="<?= ($exercise['exercise_name']) ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-check-label" for="<?= ($exercise['exercise_id']) ?>">
                                                <h4><?= ($exercise['exercise_name']) ?></h4>
                                            </label>
                                        </div>
                                        <div class="col-sm-3"></div>
                                    </div>
                                    <?php endforeach; ?>
                                    
                                    <div class="form-group">
                                        <div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-2 text-center">
												<input class="btn btn-light btn-lg" type="button" data-dismiss="modal" value="No">
											</div>
											<div class="col-sm-4"></div>
											<div class="col-sm-2 text-center">
												<input class="btn btn-danger btn-lg" id="delete" type="submit" value="Delete">
											</div>
											<div class="col-sm-2"></div>
										</div>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--*********************************** END OF DELETE MODAL *************************************-->
                
                <div class="d-flex justify-content-center col-sm-1">
                    
                </div>
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

