<!DOCTYPE html>
<html ng-app="applicationApp">
<head>
	<title>Upload File</title>
	<!--<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">-->
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
 <!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
    <!-- Optional theme -->
 <!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->
 <!--   <script src="yes_program/node_modules/angular/angular.js"></script>-->
 <!--   <script src="yes_program/node_modules/angularfire/dist/angularfire.js"></script>-->
 <!--   <script src="https://cdn.firebase.com/js/client/2.2.4/firebase.js"></script>-->
 <!--   <script src="https://cdn.firebase.com/libs/angularfire/1.2.0/angularfire.min.js"></script>-->
 <!--   <script src="yes_program/node_modules/firebase/firebase-app.js"></script>-->
 <!--   <script src="yes_program/node_modules/firebase/firebase-storage.js"></script>-->
 <!--   <script src="yes_program/node_modules/firebase/firebase-database.js"></script>-->
 <!--   <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>-->
 <!--   <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>-->
 <!--   <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>-->
 <!--   <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>-->
    <!-- Angular Material Library -->
 <!--   <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>-->
 <!--   <script src="yes_program/app/app.js"></script>-->
    <!-- Latest compiled and minified JavaScript -->
 <!--   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
 <!-- Angular Material style sheet -->
    <link rel="stylesheet" href="yes_program/node_modules/angular-material/angular-material.min.css">
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="yes_program/node_modules/bootstrap/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="yes_program/node_modules/bootstrap/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="yes_program/node_modules/angular/angular.js"></script>
    <script src="yes_program/node_modules/angularfire/dist/angularfire.js"></script>
    <script src="yes_program/node_modules/firebase/firebase.js"></script>
    <script src="yes_program/node_modules/angularfire/dist/angularfire.min.js"></script>
    <script src="yes_program/node_modules/firebase/firebase-app.js"></script>
    <script src="yes_program/node_modules/firebase/firebase-storage.js"></script>
    <script src="yes_program/node_modules/firebase/firebase-database.js"></script>
    <script src="yes_program/node_modules/angular-animate/angular-animate.min.js"></script>
    <script src="yes_program/node_modules/angular-aria/angular-aria.min.js"></script>
    <script   src="yes_program/node_modules/jquery/dist/jquery.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
    <script src="yes_program/node_modules/angular-messages/angular-messages.min.js"></script>
    <!-- Angular Material Library -->
    <script src="yes_program/node_modules/angular-material/angular-material.min.js"></script>
    <script src="yes_program/app/app.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="yes_program/node_modules/bootstrap/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="yes_program/other_library/jquery-ui/jquery-ui.css">

</head>
<body class="container" ng-controller="UploadCtrl">
	<div>
		<h3>Select a file and upload to database.</h3>
	</div>
	<br>
	<div>
		<input id ="file"  ng-model= "file" type="file" name="file"/>
		<button ng-click="uploadFile()">Upload</button>
		<button ng-click="file.value = null; file_location=''">Clear</button>
		<p>@{{message}}</p>
	</div>
	<br>
	<div>
		<input style="width: 97%" ng-model="file_location" type="text" name="url">
	</div>
</body>
</html>