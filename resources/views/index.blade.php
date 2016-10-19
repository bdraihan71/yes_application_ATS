<!doctype html>
<html ng-app="applicationApp">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kennedy-Lugar Youth Exchange and Study (YES) Program</title>
  <!-- Angular Material style sheet -->
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
  <!-- Bootstrap -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <script src="yes_program/node_modules/angular/angular.js"></script>
  <script src="yes_program/node_modules/angularfire/dist/angularfire.js"></script>
  <script src="https://cdn.firebase.com/js/client/2.2.4/firebase.js"></script>
  <script src="https://cdn.firebase.com/libs/angularfire/1.2.0/angularfire.min.js"></script>
  <script src="yes_program/node_modules/firebase/firebase-app.js"></script>
  <script src="yes_program/node_modules/firebase/firebase-storage.js"></script>
  <script src="yes_program/node_modules/firebase/firebase-database.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
  <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
  <!-- Angular Material Library -->
  <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
  <script src="yes_program/app/app.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script
      src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
      integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
      crossorigin="anonymous"></script>
  <script>
      $( function() {
      $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
      });
    } );
  </script>
  <style>
    li {
      display: inline;
      padding: 3px;
      background: yellow;
    }
    #necc {
      padding: 3px;
      color: white;
      background: #ea2e2e;
    }

    ul {
      background: yellow;
    }
  </style>
</head>
  <body ng-controller="FormCtrl" >
    <div class="container" style="background-color:#CACFE9" >
      <div class="jumbotron" style="margin-top:20px">
        <div class="row">
          <div class="col-md-4">
            <img src="yes_program/res/usdeptlogo.png" width="300" class="img">
          </div>
          <div class="col-md-6" style="font-weight: bold; text-align:center;">
            <h2>Kennedy-Lugar Youth Exchange and Study (YES) Program</h2>
            <h3>Country: Bangladesh</h3>
          </div>
          <div class="col-md-2">
            <img src="yes_program/res/yeslogo.png" width="130" class="img">
          </div>
        </div>
      </div>
      <div>
        <div class="row text-center">
          <h4 id="necc">Necessary Documents</h4>
          <ul>
            <li>1. Attested birth certificate</li>
            <li>2. Attested transcripts/marksheet of current year &amp last two years</li>
            <li>3. One recent passport size photo of the applicant</li>
          </ul>
        </div>

         <div class="text-center" style="color:#0000" >
          <p>Instruction: Type Not Applicable or NA where the field does not apply.</p>
        </div>
        
        <div class="text-center" style="color:#ea2e2e" >
          <p>N:B: You are not eligible for this program if any of your parents is currently employed by the U.S. Embassy.</p>
        </div>
        
   
      </div>
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <form name="myForm" class="form-inline" ng-submit="addApplicant()">
            <div class="row">
              <h4>Student's Info</h4>
              <div class="row">
                <div class="col-md-12">
                  <label>Name:</label>
                </div>
                <div class="col-md-12">
                    <input required style="width:32%" ng-model="firstNameText" type="text" class="form-control" id="firstNameInput" placeholder="first">
                    <input style="width:32%" ng-model="middleNameText" ng-init="middleNameText=''" type="text" class="form-control" id="middleNameInput" placeholder="middle">
                    <input required style="width:32%" ng-model="lastNameText" type="text" class="form-control" id="lastNameInput" placeholder="last">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-3">
                  <div class="radio">
                    <label>
                    <input required type="radio" ng-model="sexText" name="gender" value="male"> Male
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                    <input type="radio" ng-model="sexText" name="gender" value="female"> Female
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Date of Birth:</label>
                  <input type="text" id="datepicker" required ng-model="dobText">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Citizenship:</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <input required style="width:90%" ng-model="citizenshipText" type="text" class="form-control"/>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Contact No:</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <input required style="width:90%" ng-model="contactText" type="text" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-6">
                      <label>E-mail ID:</label>
                    </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <input required style="width:90%" ng-model="emailText" type="text" class="form-control">
                      </div>
                    </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <label>Address:</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <input required style="width:97%" ng-model="addressText" type="text" placeholder="Address" class="form-control">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <input required  ng-model="postalCodeText" type="text" class="form-control" placeholder="Postal Code">
                  <input required  ng-model="thanaText" type="text" class="form-control"  placeholder="Thana">
                  <input required  ng-model="districtText" type="text" class="form-control" placeholder="District">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-12">
                      <label>Facebook profile URL(if any):</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <input style="width:90%" ng-model="facebookURLText" ng-init="facebookURLText=''" type="text" class="form-control" placeholder="www.facebook.com/">
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-12">
                      <label>Twitter Handle(if any):</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <input style="width:90%" ng-model="twitterHandleText" ng-init="twitterHandleText=''" type="text" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-12">
                      <label>Instagram ID(if any):</label>
                    </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                      <input style="width:90%" ng-model="instagramIDText" ng-init="instagramIDText=''" type="text" class="form-control">
                      </div>
                    </div>
                </div>
              </div>
              <br>
            </div>
            <!-- student info -->
            <hr>
            <div class="row">
              <h4>School's Info</h4>
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-6">
                      <label>School Name:</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <input required style="width:97%"  ng-model="schoolNameText" type="text" class="form-control " id="firstNameInput">
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">

                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Address:</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <input required style="width:90%"  ng-model="schoolAddressText" type="text" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Phone:</label>
                    </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                      <input required style="width:94%"  ng-model="schoolPhoneText" type="text" class="form-control">
                      </div>
                    </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-4">
                      <div class="row">
                        <div class="col-md-10">
                          <label>Class currently studying:</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <input required style="width:70%" ng-model="classCurrentlyStudyingText" type="text" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="row">
                        <div class="col-md-10">
                          <label>Class studied in 2015-2016:</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <input required style="width:70%" ng-model="classStudiedIn20152016Text" type="text" class="form-control">
                        </div>
                      </div>
                    </div>

                      <div class="col-md-4">
                      <div class="row">
                        <div class="col-md-10">
                          <label>Class studied in 2014-2015:</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <input required style="width:70%" ng-model="classStudiedIn20142015Text" type="text" class="form-control">
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">

                     <div class="col-md-4">
                      <div class="row">
                        <div class="col-md-10">
                          <label>Current percentage marks:</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <input required style="width:70%" ng-model="currentPercentageMarksText" type="text" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="row">
                        <div class="col-md-10">
                          <label>Percentage makes in 2015-2016:</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <input required style="width:70%" ng-model="percentageMarksIn20152016Text" type="text" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="row">
                        <div class="col-md-10">
                          <label>Percentage makes in 2014-2015:</label>
                        </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                          <input required style="width:70%" ng-model="percentageMarksIn20142015Text" type="text" class="form-control">
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- school's info -->
            <hr>
            <div class="row">
              <h4>Travel & Family Immigration Info</h4>
              <div class="row">

                <div class="col-md-12">
                  <div class="col-md-6">

                    <div class="row">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Have you visited the United States in previous 5 years?:</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="radio">
                            <label>
                            <input required id="visitedUS5" type="radio" ng-model="visitedUS5" name="visitedUS5" value="yes"> Yes
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                            <input type="radio" id="visitedUS5" ng-model="visitedUS5" name="visitedUS5" value="no"> No
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="row">
                        <div class="col-md-12">
                          <label>If yes, when and where?:</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <input id="visitedUS5WhenAndWhereText" ng-model="visitedUS5WhenAndWhereText" ng-init="visitedUS5WhenAndWhereText=''" type="text" class="form-control">
                        </div>
                      </div>
                    </div>

  <!--                   <div class="row">
                      <label>If yes, when and where?:</label>
                      <input  ng-model="visitedUS5WhenAndWhereText" ng-init="visitedUS5WhenAndWhereText=''" type="text" class="form-control">
                    </div> -->

                    <div class="row">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Purpose of your visit:</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <input id="visitedUS5PurposeText"  ng-model="visitedUS5PurposeText" ng-init="visitedUS5PurposeText=''" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
  <!--
                    <div class="row">
                      <label>Purpose of your visit:</label>
                      <input  ng-model="visitedUS5PurposeText" ng-init="visitedUS5PurposeText=''" type="text" class="form-control">
                    </div> -->

                    <div class="row">
                      <div class="row">
                        <div class="col-md-12">
                          <label>How long did you stay?</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <input  id="visitedUS5HowLongText" ng-model="visitedUS5HowLongText" ng-init="visitedUS5HowLongText=''" type="text" class="form-control">
                        </div>
                      </div>
                    </div>

                   <!--  <div class="row">
                      <label>How long did you stay?</label>
                      <input   ng-model="visitedUS5HowLongText" ng-init="visitedUS5HowLongText=''" type="text" class="form-control">
                    </div> -->
                    <br>
                    <div class="row">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Has anyone in your immediate family applied for U.S. immigration?</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="radio">
                            <label>
                            <input required type="radio" ng-model="familyImmigration" name="familyImmigration" value="yes"> Yes
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                            <input type="radio" ng-model="familyImmigration" name="familyImmigration" value="no"> No
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br>

                    <!-- <div class="row">
                      <label>Has anyone in your immediate family applied for U.S. immigration?</label>
                      <div class="radio">
                        <label>
                        <input required type="radio" ng-model="familyImmigration" name="familyImmigration" value="yes"> Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                        <input type="radio" ng-model="familyImmigration" name="familyImmigration" value="no"> No
                        </label>
                      </div>
                    </div> -->

                    <div class="row">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Is anyone in your immediate family a U.S. Green Card holder?</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="radio">
                            <label>
                            <input required type="radio" ng-model="familyGreenCard" name="familyGreenCard" value="yes"> Yes
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                            <input type="radio" ng-model="familyGreenCard" name="familyGreenCard" value="no"> No
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="col-md-6">


                    <!-- <br> -->
                    <!-- <div class="row">
                      <label>Is anyone in your immediate family a U.S. Green Card holder?</label>
                      <div class="radio">
                        <label>
                        <input required type="radio" ng-model="familyGreenCard" name="familyGreenCard" value="yes"> Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                        <input type="radio" ng-model="familyGreenCard" name="familyGreenCard" value="no"> No
                        </label>
                      </div>
                    </div> -->

                    <div class="row">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Is anyone in your immediate family living in U.S.A?</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="radio">
                            <label>
                            <input required type="radio" ng-model="familyLivingInUSA" name="familyLivingInUSA" value="yes"> Yes
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                            <input type="radio" ng-model="familyLivingInUSA" name="familyLivingInUSA" value="no"> No
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br>

                    <!-- <div class="row">
                      <label>Is anyone in your immediate family living in U.S.A?</label>
                      <div class="radio">
                        <label>
                        <input required type="radio" ng-model="familyLivingInUSA" name="familyLivingInUSA" value="yes"> Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                        <input type="radio" ng-model="familyLivingInUSA" name="familyLivingInUSA" value="no"> No
                        </label>
                      </div>
                    </div> -->

                    <div class="row">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Is any of your relatives living in U.S.A?</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="radio">
                            <label>
                            <input required type="radio" ng-model="relativesLivingInUSA" name="relativesLivingInUSA" value="yes"> Yes
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                            <input type="radio" ng-model="relativesLivingInUSA" name="relativesLivingInUSA" value="no"> No
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- <div class="row">
                      <label>Is any of your relatives living in U.S.A?</label>
                      <div class="radio">
                        <label>
                        <input required type="radio" ng-model="relativesLivingInUSA" name="relativesLivingInUSA" value="yes"> Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                        <input type="radio" ng-model="relativesLivingInUSA" name="relativesLivingInUSA" value="no"> No
                        </label>
                      </div>
                    </div> -->

                    <div class="row">
                      <div class="row">
                        <div class="col-md-12">
                          <label>If yes, which state?</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <input id="relativesLivingInUSAState"  ng-model="relativesLivingInUSAState" ng-init="relativesLivingInUSAState=''" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <br>


                    <!-- <div class="row">
                      <label>If yes, which state?</label>
                      <input  ng-model="relativesLivingInUSAState" ng-init="relativesLivingInUSAState=''" type="text" class="form-control">
                    </div> -->

                    <div class="row">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Do you hold a U.S Visa?</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="radio">
                            <label>
                            <input required type="radio" ng-model="holdUSVisa" name="holdUSVisa" value="yes"> Yes
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                            <input type="radio" ng-model="holdUSVisa" name="holdUSVisa" value="no"> No
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>


                    <!-- <div class="row">
                      <label>Do you hold a U.S Visa?</label>
                      <div class="radio">
                        <label>
                        <input required type="radio" ng-model="holdUSVisa" name="holdUSVisa" value="yes"> Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                        <input type="radio" ng-model="holdUSVisa" name="holdUSVisa" value="no"> No
                        </label>
                      </div>
                    </div> -->

                    <div class="row">
                      <div class="row">
                        <div class="col-md-12">
                          <label>If yes, date of expiry?</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <input id="holdUSVisaExpiry" ng-model="holdUSVisaExpiry" ng-init="holdUSVisaExpiry=''" type="text" class="form-control">
                        </div>
                      </div>
                    </div>

                    <!-- <div class="row">
                      <label>If yes, date of expiry?</label>
                      <input  ng-model="holdUSVisaExpiry" ng-init="holdUSVisaExpiry=''" type="text" class="form-control">
                    </div> -->
                  </div>
                </div>
              </div>
              <!-- immigration's info -->
              <hr>
              <div class="row">
                <h4>Please answer the following questions in 100 words or less.</h4>

                <div class="col-md-12">

                  <div class="row">
                    <div class="row">
                      <div class="col-md-12">
                        <label>Tell us about yourself, like your hobbies, activities, interests or anything you will like us to know on this application.</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <textarea style="width:97%" required  class="form-control" rows="3" type="textarea" ng-model="aboutYourself" ></textarea>
                      </div>
                    </div>
                  </div>

                  <br>
                  <div class="row">
                    <div class="row">
                      <div class="col-md-12">
                        <label>Community service is very important part of the program. Please describe any community service projects you have participated. If you have not, what kind of community service projects would you be interested in?</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <textarea style="width:97%" required  class="form-control" rows="3" type="textarea" ng-model="aboutCommunityWork" ></textarea>
                      </div>
                    </div>
                  </div>


                  <!-- <div class="row">
                    <label>Tell us about yourself, like your hobbies, activities, interests or anything you will like us to know on this application.</label>
                    <textarea required  class="form-control" rows="3" type="textarea" ng-model="aboutYourself" ></textarea>
                  </div>
                   -->
                  <!-- <div class="row">
                    <label>Community service is very important part of the program. Please describe any community service projects you have participated. If you have not, what kind of community service projects would you be interested in?</label>
                    <textarea required  class="form-control" rows="3" type="textarea" ng-model="aboutCommunityWork" ></textarea>
                  </div> -->

                </div>

              </div>
              <!-- essays -->
              <hr>
              <div class="row">
                <h4>Father's Info</h4>
                <div class="row">

                  <div class="col-md-12">
                    <label>Name:</label>
                  </div>
                  <div class="col-md-12">
                      <input required style="width:32%" ng-model="fatherFirstNameText" type="text" class="form-control" placeholder="first">
                      <input style="width:32%" ng-model="fatherMiddleNameText" ng-init="fatherMiddleNameText=''" type="text" class="form-control"  placeholder="middle">
                      <input required style="width:32%"  ng-model="fatherLastNameText" type="text" class="form-control" placeholder="last">
                  </div>

                  <!-- <div class="col-md-12">
                    <label>Name:</label>
                    <input required style="width:32%" ng-model="fatherFirstNameText" type="text" class="form-control" placeholder="first">
                    <input style="width:32%" ng-model="fatherMiddleNameText" ng-init="fatherMiddleNameText=''" type="text" class="form-control"  placeholder="middle">
                    <input style="width:32%" required  ng-model="fatherLastNameText" type="text" class="form-control" placeholder="last">
                  </div> -->

                </div>
                <br>

                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Contact No:</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <input required style="width:94%" ng-model="fatherContactText" type="text" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <label>E-mail ID:</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <input  style="width:94%" ng-model="fatherEmailIDText"   ng-init="fatherEmailIDText=''" type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
                <br>

               <!--  <div class="row">
                  <div class="col-md-6">
                    <label>Contact No:</label>
                    <input required  ng-model="fatherContactText" type="text" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>E-mail ID:</label>
                    <input   ng-model="fatherEmailIDText"   ng-init="fatherEmailIDText=''" type="text" class="form-control">
                  </div>
                </div>
   -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Occupation:</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <input required style="width:94%" ng-model="fatherOccupationText"  type="text" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Office Phone:</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <input  style="width:94%"  ng-model="fatherOfficePhoneText" ng-init="fatherOfficePhoneText=''" type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
                <br>


                <!-- <div class="row">
                  <div class="col-md-6">
                    <label>Occupation:</label>
                    <input required   ng-model="fatherOccupationText"  type="text" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Office Phone:</label>
                    <input    ng-model="fatherOfficePhoneText" ng-init="fatherOfficePhoneText=''" type="text" class="form-control">
                  </div>
                </div> -->

              </div>
              <!-- father info -->
              <hr>
              <div class="row">
                <h4>Mother's Info</h4>

                <div class="row">

                  <div class="col-md-12">
                    <label>Name:</label>
                  </div>
                  <div class="col-md-12">
                      <input required style="width:32%" ng-model="motherFirstNameText" type="text" class="form-control" placeholder="first">
                      <input style="width:32%" ng-model="motherMiddleNameText" ng-init="motherMiddleNameText=''" type="text" class="form-control"  placeholder="middle">
                      <input required style="width:32%"  ng-model="motherLastNameText" type="text" class="form-control" placeholder="last">
                  </div>
                </div>
                <br>

  <!--               <div class="row">
                  <div class="col-md-12">
                    <label>Name:</label>
                    <input required  ng-model="motherFirstNameText" type="text" class="form-control" placeholder="first">
                    <input  ng-model="motherMiddleNameText" ng-init="motherMiddleNameText=''" type="text" class="form-control"  placeholder="middle">
                    <input required ng-model="motherLastNameText" type="text" class="form-control" placeholder="last">
                  </div>
                </div> -->

                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Contact No:</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <input required style="width:94%" ng-model="motherContactText" type="text" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <label>E-mail ID:</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <input style="width:94%" ng-model="motherEmailIDText" ng-init="motherEmailIDText=''" type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
                <br>

            <!--     <div class="row">
                  <div class="col-md-6">
                    <label>Contact No:</label>
                    <input required  ng-model="motherContactText" type="text" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>E-mail ID:</label>
                    <input  ng-model="motherEmailIDText" ng-init="motherEmailIDText=''" type="text" class="form-control">
                  </div>
                </div> -->

                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Occupation:</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <input required  style="width:94%" ng-model="motherOccupationText"  type="text" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Office Phone:</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <input  style="width:94%"  ng-model="motherOfficePhoneText" ng-init="motherOfficePhoneText=''" type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
                <br>

                <!-- <div class="row">
                  <div class="col-md-6">
                    <label>Occupation:</label>
                    <input required   ng-model="motherOccupationText"  type="text" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Office Phone:</label>
                    <input   ng-model="motherOfficePhoneText" ng-init="motherOfficePhoneText=''" type="text" class="form-control">
                  </div>
                </div> -->
              </div>


                <div class="row" >
                  <div style=" width:97% ; padding: 5px; border:2px solid black; background: white;">
                    <p style="color:#ea2e2e; font-weight: bold;">
                      Uploading the documents is not mandatory. Please do note, you must send all the required documents along with the signed application by courier or in person at the iEARN-BD office by Nov 24, 2016.
                    </p>

                  </div>
                </div>
              <br>

              <p>Upload Photo (max 2MB)</p>
              <input id ="photo_file"  ng-model= "photo" type="file" name="image"/>
              <p></p>

              <p>Upload Birth Certificate (max 2MB)</p>
              <input id ="birth_certificate_file"  ng-model= "birthCcertificate" type="file" name="image"/>
              <p></p>

              <p>Upload Transcript of Current Year (max 2MB)</p>
              <input id ="current_transcript_file"  ng-model= "currentTranscript" type="file" name="image"/>
              <p></p>

              <p>Upload Transcript of 2015-2016 (max 2MB)</p>
              <input id ="transcript_2015_file"  ng-model= "transcript2015" type="file" name="image"/>
              <p></p>

              <p>Upload Transcript of 2014-2015 (max 2MB)</p>
              <input id ="transcript_2014_file"  ng-model= "transcript2014" type="file" name="image"/>
              <p></p>
              <br>
              <div>
                <p>• Your Birth Certificate, Academic Transcripts and the completed application form must be signed and attested by the Head/Principal of your Educational Institution.
                </p>
                <p>• Without the Parents signature, and the Signature and Seal of your educational Institution, your application will be invalid.
                </p>
                <p>• If you send us your completed application form by courier/postal service, write down your applicant ID on top of the envelope.
                </p>
              </div>
              <br>
              <button type="submit" class="btn btn-primary col-md-10 col-md-offset-1">Submit</button>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
          </form>
          </div>
        </div>
      </div>
      <div class="footer">
        <p style="text-align: center;">Powered by <a target="_blank" href="http://www.techynaf.com">Techynaf</a></p>
      </div>
      <!-- The overlay -->
      <div id="myNav" class="overlay">

        <!-- Button to close the overlay navigation -->
        <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->

        <!-- Overlay content -->
        <div class="overlay-content">
          <h2 style="color:white"><p>Please Wait...</p></h2>
          <h2 style="color:white"><p id="progress">Progress: @{{upload_progress}}</h2>
          <h2 style="color:white">@{{success_message}}</h2>
          <h2 style="color:white">@{{unique_id}}</h2>
          <p style="color:white">@{{note}}</p>
          <a style="color:white" ng-show="download_message != null" class="btn btn-primary col-md-8 col-md-offset-2" href="@{{pdf_url}}">@{{download_message}}</a>
        </div>

      </div>
      <!-- Use any element to open/show the overlay navigation menu -->
      <!-- <span onclick="openNav()">open</span> -->

      <style type="text/css">
        .input-block-level {
          display: block;
          width: 100%;
          min-height: 28px;
          .box-sizing(border-box);
        }
         /* The Overlay (background) */
        .overlay {
            /* Height & width depends on how you want to reveal the overlay (see JS below) */
            height: 100%;
            width: 0;
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            background-color: rgb(0,0,0); /* Black fallback color */
            background-color: rgba(0,0,0, 0.9); /* Black w/opacity */
            overflow-x: hidden; /* Disable horizontal scroll */
            transition: 0.5s; /* 0.5 second transition effect to slide in or slide down the overlay (height or width, depending on reveal) */
        }

        /* Position the content inside the overlay */
        .overlay-content {
            position: relative;
            top: 25%; /* 25% from the top */
            width: 100%; /* 100% width */
            text-align: center; /* Centered text/links */
            margin-top: 30px; /* 30px top margin to avoid conflict with the close button on smaller screens */
        }

        /* The navigation links inside the overlay */
        .overlay a {
            padding: 8px;
            text-decoration: none;
            font-size: 36px;
            color: #818181;
            display: block; /* Display block instead of inline */
            transition: 0.3s; /* Transition effects on hover (color) */
        }

        /* When you mouse over the navigation links, change their color */
        .overlay a:hover, .overlay a:focus {
            color: #f1f1f1;
        }

        /* Position the close button (top right corner) */
        .overlay .closebtn {
            position: absolute;
            top: 20px;
            right: 45px;
            font-size: 60px;
        }

        /* When the height of the screen is less than 450 pixels, change the font-size of the links and position the close button again, so they don't overlap */
        @media screen and (max-height: 450px) {
            .overlay a {font-size: 20px}
            .overlay .closebtn {
                font-size: 40px;
                top: 15px;
                right: 35px;
            }
        }
      </style>

      <script type="text/javascript">
        /* Open when someone clicks on the span element */
        function openNav() {
            document.getElementById("myNav").style.width = "100%";
        }

        /* Close when someone clicks on the "x" symbol inside the overlay */
        function closeNav() {
            document.getElementById("myNav").style.width = "0%";
        }
      </script>
      <script>
        var rad = document.myForm.visitedUS5;
        var prev = null;
        for(var i = 0; i < rad.length; i++) {
            rad[i].onclick = function() {
                // (prev)? console.log(prev.value):null;
                // if(this !== prev) {
                //     prev = this;
                // }
                if(this.value == "yes"){
                  $("#visitedUS5WhenAndWhereText").prop("required", true);
                  $("#visitedUS5PurposeText").prop("required", true);
                  $("#visitedUS5HowLongText").prop("required", true);
                }else{
                  $("#visitedUS5WhenAndWhereText").prop("required", false);
                  $("#visitedUS5PurposeText").prop("required", false);
                  $("#visitedUS5HowLongText").prop("required", false);
                }
            };
        }
      </script>

      <script>
        var rad = document.myForm.relativesLivingInUSA;
        var prev = null;
        for(var i = 0; i < rad.length; i++) {
            rad[i].onclick = function() {
                // (prev)? console.log(prev.value):null;
                // if(this !== prev) {
                //     prev = this;
                // }
                if(this.value == "yes"){
                  $("#relativesLivingInUSAState").prop("required", true);
                }else{
                  $("#relativesLivingInUSAState").prop("required", false);
                }
            };
        }
      </script>

      <script>
        var rad = document.myForm.holdUSVisa;
        var prev = null;
        for(var i = 0; i < rad.length; i++) {
            rad[i].onclick = function() {
                // (prev)? console.log(prev.value):null;
                // if(this !== prev) {
                //     prev = this;
                // }
                if(this.value == "yes"){
                  $("#holdUSVisaExpiry").prop("required", true);
                }else{
                  $("#holdUSVisaExpiry").prop("required", false);
                }
            };
        }
      </script>
    <div>
  </body>
</html>
