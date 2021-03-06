<!DOCTYPE html>
    <html>
        <head>
            <title>Fast-IQ</title>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
			<!-- logo -->
				<link rel="icon" href="logo/fastiqlogo.png">
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
                          <a data-toggle="modal" data-target="#signUpModal" class="createAdminLink"><button type="button" class="btn btn-primary btn-lg"><h3 >Create New Admin</h3></button></a>
                        </li>
						
                    </ul>
					<a href="./studentInfo"><button id="studentInfo" type="button" class="btn btn-primary btn-lg">
						<h3>Student Info</h3>
					</button></a>
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
        <!--*********************************** THIS IS THE Sign Up MODAL*************************************-->
            
            <br>
            <br>
            <div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-2 text-center">
				</div>
				


				<div class="col-md-2 text-center">
				</div>
				<div class="col-md-3">
				</div>
			</div>
            <br>
            <br>


            <h1 class="display-2 text-center">Categories</h1>


            <?php foreach (($categories?:[]) as $category): ?>
            <br>
            
                <div class="row">
                    <div class="d-flex justify-content-center col-sm-1"></div>
                    <div class="d-flex justify-content-center col-sm-10">
                        <a class="btn btn-primary btn-lg btn-block" id="<?= ($category['category_name']) ?>" href="./unitsBackend/<?= ($category['category_id']) ?>" role="button">
                            <h4><?= ($category['category_name']) ?></h4>
                        </a>
                    </div>
                    <div class="d-flex justify-content-center col-sm-1"></div>
                </div>
                
            <?php endforeach; ?>


            <br>

            <div class="row">
                
                <div class="d-flex justify-content-center col-sm-1"></div>
                
                <div class="d-flex justify-content-center col-sm-2">
                    <button type="button" class="btn btn-primary btn-lg btn-warning btn-block" data-toggle="modal" data-target=".editCategory">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Edit
                    </button>
                </div>
                <!--*********************************** START OF EDIT MODAL *************************************-->
                <div class="modal fade editCategory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" id="modalcontent">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Categories</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- inner modal -->
                            <form action="./editCategoryNames" method="post" class="form-horizontal">
                                <br>
                                <br>
                                <div class="col-sm-2"></div>

                                <div class="col-sm-8 text-center">
                                    <div class="form-group">
                                        <label for="category"><h3>Category Names</h3></label>
                                        
                                        <?php foreach (($categories?:[]) as $category): ?>
                                            <div class="input-group input-group-lg">
                                                <input class="form-control" type="text" name="category_name[]" id="category_name" placeholder="<?= ($category['category_name']) ?>" value="<?= ($category['category_name']) ?>"required>
                                                <input class="form-control" type="hidden" name="category_id[]" id="category_id" value="<?= ($category['category_id']) ?>"required>
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
                    <button type="button" class="btn btn-primary btn-lg btn-success btn-block" data-toggle="modal" data-target=".addCategory">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><h5>Add</h5>
                    </button>
                </div>

                <!--*********************************** START OF ADD MODAL *************************************-->
                <div class="modal fade addCategory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" id="modalcontent">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add a Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- inner modal -->
                            <form action="./addCategory/<?= ($category['category_id']) ?>" method="post" class="form-horizontal">
                                <br>
                                <br>
                                <div class="col-sm-2"></div>

                                <div class="col-sm-8 text-center">
                                    <div class="form-group">
                                        <label for="category"><h3>Category Name</h3></label>
                                        
                                        <div class="input-group input-group-lg">
                                            <input class="form-control" type="text" name="category_name" id="category_name" placeholder="Category Name" required>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-success btn-lg" type="submit" value="Add">
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
										<h2 class="text-center">Deleting a Category will delete everything in its hierarchy.</h2>
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
											<button type="button" class="btn btn-primary btn-lg btn-danger btn-block" data-dismiss="modal" data-toggle="modal" data-target=".deleteCategory">
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
                <div class="modal fade deleteCategory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                <div class="col-sm-2"></div>

                                <div class="col-sm-8 text-center">
                                    <label><h2>Category Names</h2></label>
                                    <h4>(Check the boxes that you want to delete)</h4>
                                    <br>
                                    
                                    <?php foreach (($categories?:[]) as $category): ?>
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <input class="input-group" type="checkbox" name="category_id[]" value="<?= ($category['category_id']) ?>" id="<?= ($category['category_id']) ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-check-label" for="<?= ($category['category_id']) ?>">
                                                <h4><?= ($category['category_name']) ?></h4>
                                            </label>
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                    <?php endforeach; ?>
                                    
                                    <div class="form-group">
                                        <br>
										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-2 text-center">
												<input class="btn btn-light btn-lg" type="button" data-dismiss="modal" value="No">
											</div>
											<div class="col-sm-4"></div>
											<div class="col-sm-2 text-center">
												<input class="btn btn-danger btn-lg" type="submit" value="Delete">
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
				
                
                <div class="d-flex justify-content-center col-sm-1"></div>
                
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

