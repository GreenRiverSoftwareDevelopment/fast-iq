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
                        <a class="nav-link" href="./categoryBackend"><h3>Home</h3></a>
                    </li>
                    <li class="nav-item">

                    </li>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        <h3>Logout</h3>
                    </button>
                </ul>
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


        <h1 class="display-2 text-center">Student Information</h1>
		<br>
		<br>
		<br>
		
		<div class="row">
			<div class="col-md-3">
			</div>
			<!--<div class="col-md-3 text-center">
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target=".grade">
					<h3>Grade Students</h3>
				</button>
			</div>
				<!--*********************************** START OF GRADE MODAL *************************************-->
				<div class="modal fade grade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content" id="modalcontent">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Grading Students</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<!-- inner modal -->
							<form action="./studentGrade" method="post" class="form-horizontal">
								<br>
								<br>
								<div class="col-sm-2"></div>

								<div class="col-sm-8 text-center">
									<div class="form-group">
										<h3 for="student">Students</h3>
										<select class="form-control form-control-lg" name="student" id="student" required>
											<?php foreach (($students?:[]) as $student): ?>
												<option id="<?= ($student['student_id']) ?>" value="<?= ($student['student_id']) ?>"><?= ($student['fName']) ?> <?= ($student['lName']) ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group">
										<h3 for="exercise">Exercises</h3>
										<select class="form-control form-control-lg" name="exercise" id="exercise" required>
											<?php foreach (($exercises?:[]) as $exercise): ?>
												<option id="<?= ($exercise['exercise_id']) ?>" value="<?= ($exercise['exercise_id']) ?>"><?= ($exercise['exercise_name']) ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group">
										<h3 for="grade">Grade</h3>
										<select class="form-control form-control-lg" name="grade" id="grade" required>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
										</select>
									</div>
									<div class="form-group">
										<input class="btn btn-success btn-lg" type="submit" value="Save">
									</div>
									<br>
									<br>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--*********************************** START OF GRADE MODAL *************************************-->



		<! **** START OF EDITING STUDENT -->
			<div class="col-md-3 text-center">
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target=".studentEdit">
					<h3>Edit Student Name</h3>
				</button>
			</div>
				<!--*********************************** START OF GRADE MODAL *************************************-->
				<div class="modal fade studentEdit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content" id="modalcontent">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Editing Students Name</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<!-- inner modal -->
							<form action="./studentEdit" method="post" class="form-horizontal">
								<br>
								<br>
								<div class="col-sm-2"></div>

								<div class="col-sm-8 text-center">
									<div class="form-group">
										<h3 for="student">Students</h3>
									
									<?php foreach (($students?:[]) as $student): ?>
                                            <div class="input-group input-group-lg">
                                                <input class="form-control" type="text" name="student_fName[]" id="student_fName" placeholder="<?= ($student['fName']) ?>" value="<?= ($student['fName']) ?>" required>
												 <input class="form-control" type="text" name="student_lName[]" id="student_lName" placeholder="<?= ($student['lName']) ?>" value="<?= ($student['lName']) ?>" required>
                                            
                                                <input class="form-control" type="hidden" name="student_id[]" id="student_id" value="<?= ($student['student_id']) ?>"required>
                                            </div>
                                            <br>
                                        <?php endforeach; ?>
									
										
									</div>
									
								
									<div class="form-group">
										<input class="btn btn-success btn-lg" type="submit" value="Save">
									</div>
									<br>
									<br>
								</div>
							</form>
						</div>
					</div>
				</div>



	<!--*********************************** START OF GRADE MODAL *************************************-->

			<div class="col-md-3 text-center">
				<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target=".deleteStudent">
					<h3>Delete Student </h3>
				</button>
			</div>
			
			<!--*********************************** START OF DELETE MODAL *************************************-->
				<div class="modal fade deleteStudent" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content" id="modalcontent">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Delete Students</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							
								<form action="./deleteStudent" method="post" class="form-horizontal">
								<br>
								<br>
								<div class="col-sm-2"></div>

								<div class="col-sm-8 text-center">
									<div class="form-group">
										<h3 for="student">Choose a student you wish to delete from the database</h3>
										<select class="form-control form-control-lg" name="student" id="student" required>
											<?php foreach (($students?:[]) as $student): ?>
												<option id="<?= ($student['student_id']) ?>" value="<?= ($student['student_id']) ?>"><?= ($student['fName']) ?> <?= ($student['lName']) ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									
									<div class="form-group">
										<input class="btn btn-success btn-lg" type="submit" value="Save">
									</div>
									<br>
									<br>
								</div>
							</form>
						</div>
					</div>
				</div>
				
			<!--				commenting the attendannce out 
			<div class="col-md-3 text-center">
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target=".attendance">
					<h3>Student Attendance</h3>
				</button>
			</div>
				<!--*********************************** START OF ATTENDANCE MODAL *************************************-->
				<div class="modal fade attendance" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content" id="modalcontent">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Attendance for Students</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<!-- inner modal -->
							<form action="./studentAttendance" method="post" class="form-horizontal">
								<br>
								<br>
								<div class="col-sm-2"></div>

								<div class="col-sm-8 text-center">
									<div class="form-group">
										<h3 for="student">Student</h3>
										<select class="form-control form-control-lg" name="student" id="student" required>
											<?php foreach (($students?:[]) as $student): ?>
												<option id="<?= ($student['student_id']) ?>" value="<?= ($student['student_id']) ?>"><?= ($student['fName']) ?> <?= ($student['lName']) ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group">
										<h3 for="hoursMissed">How many hours were missed?</h3>
										<select class="form-control form-control-lg" name="hoursMissed" id="hoursMissed" required>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</div>
									<div class="form-group">
										<input class="btn btn-success btn-lg" type="submit" value="Save">
									</div>
									<br>
									<br>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--*********************************** START OF ATTENDANCE MODAL *************************************-->
			<div class="col-md-3">
			</div>
		</div>
		<br>
		<br>
		<br>
		
			<div class="row">
				<div class="col-md-4">

                </div>
				<div class="col-md-4">
					<form action="./addStudent" method="post" class="form-horizontal">
						<div class="form-group">
							<h3 for="fName">First Name</h3>
							<input class="form-control form-control-lg" name="fName" id="fName" required>
							</input>
						</div>
						<div class="form-group">
							<h3 for="lName">Last Name</h3>
							<input class="form-control form-control-lg" name="lName" id="lName" required>
							</input>
						</div>
						<div class="form-group">
							<input class="btn btn-success btn-lg" type="submit" value="Add">
						</div>
						<br>
					</form>
                </div>
				<div class="col-md-4">

                </div>
			</div>-->

		<br>
		<br>
		<br>

			<div class="row">
                <div class="col-md-1">

                </div>
				<div class="col-md-5 text-center">
                    <h3 class="display-3 text-center">Student Attendance</h2>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"><h3>First</h3></th>
                                <th scope="col"><h3>Last</h3></th>
                                <th scope="col"><h3>Hours Missed</h3></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (($students?:[]) as $student): ?>
                            <tr>
                                <th scope="row"><h4><?= ($student['fName']) ?></h4></th>
                                <th><h4><?= ($student['lName']) ?></h4></th>
                                <th><h4><?= ($student['hoursMissed']) ?></h4></th>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
				</div>
				<div class="col-md-5 text-center">
                    <h3 class="display-3 text-center">Student Grades</h2>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"><h3>Student</h3></th>
                                <th scope="col"><h3>Exercise</h3></th>
                                <th scope="col"><h3>Grade</h3></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (($grades?:[]) as $grade): ?>
                            <tr>
                                <th scope="row"><h4><?= ($grade['fName']) ?> <?= ($grade['lName']) ?></h4></th>
                                <th><h4><?= ($grade['exercise_name']) ?></h4></th>
                                <th><h4><?= ($grade['grade']) ?></h4></th>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        </table>
				</div>
                <div class="col-md-1"></div>
			</div>

        <br>


            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </body>
    </html>
