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
                          <a class="nav-link" href="./"><h3>Home</h3></a>
                        </li>
                    </ul>
                    
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        <h3>Logout</h3>
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
                      <form action="./logout" method="POST">
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <h4>Are you sure you want to logout?</h4>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                              <button type="Submit" class="btn btn-primary">Yes</button>
                            </div> 
                      </form>
                    </div>
                  </div>
                </div>
        <!--*********************************** THIS IS THE MODAL*************************************-->
            
            <h1 class="display-2 text-center" id="<?= ($categoryName['category_name']) ?>"><?= ($categoryName['category_name']) ?></h1>
            
            
            <?php foreach (($units?:[]) as $unit): ?>
            <br>
                <div class="row">
                    <div class="d-flex justify-content-center col-sm-2"><button type="button" class="btn btn-primary btn-warning btn-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Edit</button></div>
                        
                            <div class="d-flex justify-content-center col-sm-8"><a class="btn btn-primary btn-lg btn-block" id="<?= ($unit['unit_name']) ?>" href="./exercisesBackend/<?= ($unit['unit_id']) ?>" role="button"><h4><?= ($unit['unit_name']) ?></h4></a></div>
                        
                    <div class="d-flex justify-content-center col-sm-2"><button type="button" class="btn btn-primary btn-danger btn-lg"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete</button></div>
                </div>
            <?php endforeach; ?>
            
            <br>
            
            <div class="row">
                <div class="d-flex justify-content-center col-sm-2"></div>
                    <div class="d-flex justify-content-center col-sm-8">
                        <button type="button" class="btn btn-primary btn-lg btn-success btn-block">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><h5>Add</h5>
                        </button>
                    </div>
                <div class="d-flex justify-content-center col-sm-2"></div>
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