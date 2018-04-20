<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>

                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta charset="utf-8">
                <meta name="description" content="">
                <meta name="author" content="">
                <meta name="viewport" content="width=device-width, initial-scale=1">


         <!-- bootstrap -->
                <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
                      rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

                <!--[if lt IE 9]>
                <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>

                <!--Custom css-->
                <link rel="stylesheet" href="css/login.css" type="text/css" />
    </head>


        <body>

            <div class="container panel panel-default" id="loginSection">
                <div class="row">
                    <div class="col-sm-12">

                            <!--<form action="./category" method="post">-->
                                <b><h3 id="signUpHeading">Log In </h3></b>
                                <p id="wrongPasswordOrUsername">Wrong password or username.</p>
                                <p class="usernameBlank" id="wrongPasswordOrUsername">Username can't be blank</p>
                                <p class="passwordBlank" id="wrongPasswordOrUsername">Password can't be blank</p>
                                <legend><label></label></legend>

                                <input type="text" id="username" name="username" placeholder="Username">
                                <input type="password" id="password" name="password" placeholder="Password">
                                <!-- <a href="#" id="forgotPassword">Forgot your password?</a> -->
                                <a href="./category"><button type="submit" class="btn btn-primary">Submit</button></a>
                            <!--</form>-->

                    </div>
                </div>
            </div>




            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>
            <!-- Personal login -->
            <script type="text/javascript" src="js/loginScript.js"></script>

        </body>
</html>
