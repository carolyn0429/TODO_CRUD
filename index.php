<?php

require_once("init.php");
$itemQuery = $db->prepare("SELECT id, task, user, done FROM task WHERE user= :user");

$itemQuery->execute(["user"=>$_SESSION['user_id']]);

$items = $itemQuery->rowCount() ? $itemQuery :  [];
/*foreach ($items as $item) {
  # code...
  echo $item['task'];
 print_r($item);
}*/

?>
<!DOCTYPE html>
<html lang="en" ng-app="myapp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AngularJS PHP MySQL CRUD Practice</title>

     <!-- Font Google CSS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/starter-template.css" rel="stylesheet">
  </head>

  <body ng-controller="AddCtrl">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#/about">About</a></li>
            <li><a href="#/contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1 class="header">AngularJS PHP MySQL CRUD Practice</h1>
        <div class="list">

            <div style="text-align:left !important;">
              <h2 class="header">To Do</h2>
              <?php if (!empty($items)):?>
              <ul class="items">
              <?php foreach($items as $item):?>
                  <li>
                    <span class="item<?php echo $item['done'] ? 'done' : "" ?>"><?php echo $item['task']; ?></span>
                      <?php if ($item['done']): ?>
                        <a href="mark.php?as=done&item=<?php echo $item['id']; ?>" class="done-button">Mark as done</a>
                      <?php endif; ?>
                 </li>
               <?php endforeach; ?>

              </ul>
            <?php else:?>
              <p>You haven't created an item</p>
            <?php endif;?>
              <form class="item-add" action="add.php" method="post">
                <input type="text" name="name" placeholder="Enter the task..." class="input" autocomplete="off" required>
                 <input type="submit" value="Add" class="submit">
              </form>
            </div>



        <!--  <form role="form" style="text-align:left !important;">
            <div class="form-group">
              <label for="task">Add task:</label>
              <input type="task" class="form-control" id="task" ng-model="task">
              <input type="submit" class="btn btn-default" value="Add">
                          
             </div>
           </form> -->
        </div>
      </div>
    <!--    <div class="container">
          <div ng-view></div>
        </div>-->
    </div><!-- /.container -->

  <!-- Required externally sourced Javascript files: -->
    <script type="text/javascript" src="angular-1.4.6/angular-1.4.6/angular.js"></script>
    <script type="text/javascript" src="angular-1.4.6/angular-1.4.6/angular-route.js"></script>
    <script type="text/javascript" src="angular-1.4.6/angular-1.4.6/angular-resource.js"></script>
    <script type="text/javascript" src="angular-1.4.6/angular-1.4.6/angular-animate.js"></script>
    
    <script type="text/javascript" src="js/ui-bootstrap-tpls-0.13.4.min.js"></script>
    <!-- Your application Javascript: -->
    <script type="text/javascript" src="js/app.js"></script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular-local-storage.min.js"></script>
   
  </body>
</html>
