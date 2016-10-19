<html ng-app="applicationApp">
  
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YES Application Dashboard</title>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="node_modules/angular/angular.js"></script>
    <script src="node_modules/angularfire/dist/angularfire.js"></script>
    <script src="https://cdn.firebase.com/js/client/2.2.4/firebase.js"></script>
    <script src="https://cdn.firebase.com/libs/angularfire/1.2.0/angularfire.min.js"></script>
    <script src="node_modules/firebase/firebase-app.js"></script>
    <script src="node_modules/firebase/firebase-storage.js"></script>
    <script src="node_modules/firebase/firebase-database.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
    <script src="app/app.js"></script>
    <script src="res/pdf.js"></script>
    <script src="res/ng-pdfviewer.js"></script>
    <script src="res/pdf.compat.js"></script>
  </head>

  <body class="" style="height: auto;" ng-controller="FormCtrl">
    <div class="container">
      <div class="row">

        <div class="modal">
          <div class="col-md-12">
            <p>hello</p>
          </div>
        </div>



        <div class="col-md-12">
          <div>
            <nav class="navbar navbar-default">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">K-L YES Application Dashboard</a>
              </div>
            </nav>
          </div>



          <table class="table fixed table-bordered table-striped">
            <div>
              <input type="text" class="form-control" placeholder="Search any field" ng-model="searchInput">
              <br>
            </div>
            <tr>
              <th width="15%" >Applicant ID</th>
              <th width="25%">Name</th>
              <th width="20%">Father's name</th>
              <th width="20%">Email</th>
              <th width="20%">Action</th>
            </tr>

            <tr ng-repeat="(name, applicant) in applicants | filter:searchInput">
              <td>@{{applicant.applicant_id}}</td>
              <td>@{{applicant.first_name}} @{{applicant.middle_name}} @{{applicant.last_name}}</td>
              <td>@{{applicant.fatherFirstName}} @{{applicant.fatherMiddleName}} @{{applicant.fatherLastName}}</td>
              <td>@{{applicant.email}}</td>
              <td>
                <!-- <button class="btn btn-danger" ng-click="applicants.$remove(applicant)"><span class="glyphicon glyphicon-trash"></span></button> -->
                <div>
                  <div class="col-md-5" ng-init="showDeleteModal=false">
                    <button class="btn btn-danger" ng-click="showDeleteModal = !showDeleteModal"><span class="glyphicon glyphicon-trash"></span></button>
                    <div class="modal fade in" aria-hidden="false" style="display: block;" ng-show="showDeleteModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3>Are you sure?</h3>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" ng-click="applicants.$remove(applicant) ; showDeleteModal=false">Delete</button>
                                  <button type="button" class="btn btn-primary" ng-click="showDeleteModal=false">Cancel</button>
                              </div>
                            </div>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-5" ng-init="showDetailsModal=false">
                    <button class="btn btn-default" ng-click="showDetailsModal = !showDetailsModal"><span class="glyphicon glyphicon-info-sign"></span></button>
                    <div class="modal fade in" aria-hidden="false" style="display: block; max-height: 95%; overflow-y: auto;" ng-show="showDetailsModal">
                        <div class="modal-dialog" style="width: 90%">
                            <div class="modal-content">
                              <div class="modal-header">
                                <div style="float: right;">
                                  <div style="height: 50px; width: 50px; vertical-align: middle;" class="glyphicon glyphicon-remove" ng-click="showDetailsModal=false">

                                  </div>
                                </div>
                                <h3>@{{applicant.first_name}}'s Details</h3>
                              </div>

                              <br>
                              <div class="modal-body" style=" background-color: #CACFE9;height: auto;">
                                <div ng-include="'/yes_program/student_details.html'"></div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" ng-click="applicants.$save(applicant) ; showDetailsModal=false">Update</button>
                                  <button type="button" class="btn btn-primary" ng-click="showDetailsModal=false">Cancel</button>
                                  <br>
                                  <br>
                              </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <!-- <div class="col-md-5">
                     <button class="btn btn-default" ng-click="showDetails(applicant.$id)"><span class="glyphicon glyphicon-info-sign"></span></button>
                  </div> -->
                </div>
              </td>
              <!-- <input ng-model="applicant.first_name" ng-change="applicants.$save(applicant)" /> -->
              <!-- delete an applicant -->
            </tr>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
