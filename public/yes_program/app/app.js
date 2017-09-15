var app = angular.module("applicationApp", ["ngMaterial", "firebase"]);

// Initialize Firebase
var config = {
 apiKey: "AIzaSyBKa9Fe0wHJjotKpHAz2Xu-Nd8xVUPsQcc",
 authDomain: "yesprogram-dcb5c.firebaseapp.com",
 databaseURL: "https://yesprogram-dcb5c.firebaseio.com",
 storageBucket: "yesprogram-dcb5c.appspot.com",
 messagingSenderId: "1045002739928"
};
firebase.initializeApp(config);


app.controller("UploadCtrl",[ '$scope',  function($scope){

  function guid() {
   return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
    s4() + '-' + s4() + s4() + s4();
  }

  function s4() {
   return Math.floor((1 + Math.random()) * 0x10000)
    .toString(16)
    .substring(1);
  }

  $scope.uploadFile = function(){
    $scope.message = "Please Wait..."
    var uuid = guid();
    var file = document.getElementById("file").files[0];
    var storage = firebase.storage().ref('file/' + uuid + "-" + file.name);
    storage.put(file).then(function(snapshot) {

      console.log(snapshot['a']['downloadURLs'][0]);
      $scope.$apply(function () {
        $scope.file_location = snapshot['a']['downloadURLs'][0];
        $scope.message = "Uploaded."
      });

    })
  };
}]);

app.controller("FormCtrl", [ '$scope', '$firebaseArray' ,'$sce', '$timeout', function($scope, $firebaseArray, $sce , $timeout) {
 var ref = new Firebase("https://yesprogram-dcb5c.firebaseio.com/applicants");
 var firebaseRef = new Firebase("https://yesprogram-dcb5c.firebaseio.com/");

 var applicant_count = undefined;
 $scope.loadMoreMessage = false;
 $scope.loadMoreButton = false;
 $scope.showSplash = true;
 $scope.showLoadingSpinner = false;


 // create a synchronized array
 $scope.applicants = $firebaseArray(ref);

  $scope.applicants.$loaded().then(function(){
    $scope.loadMoreButton = true;
    $scope.showSplash = false;
  });

  //the controller
  $scope.totalDisplayed = 20;


 $scope.resetLimit = function(){
   $scope.showLoadingSpinner = true;

    $timeout(function() {
      $scope.showLoadingSpinner  = false;
    }, 2000)
   $scope.totalDisplayed = 20;
 }

  $scope.loadMore = function () {
   if($scope.totalDisplayed>$scope.applicants.length){
     console.log("over");

    $scope.loadMoreMessage = true;
     $timeout(function() {
       $scope.loadMoreMessage = false;
     }, 2000)
   }
   $scope.totalDisplayed += 20;
  };
 // add new items to the array
 // the message is automatically added to our Firebase database!
 $scope.showDetails = function($id) {
  var applicants = $firebaseArray(ref);
  applicants.$loaded().then(function(x) {
   var applicant = x.$getRecord($id);
   $scope.selectedApplicant = applicant;
   console.log(applicant);
  }).catch(function(error) {
   console.log("Error:", error);
  });
 };

 $scope.getChildCount = function() {
  incId();
 };

 $scope.pageLoaded = function(curPage, totalPages) {
    $scope.currentPage = curPage;
    $scope.totalPages = totalPages;
  };

  $scope.loadProgress = function(loaded, total, state) {
    console.log('loaded =', loaded, 'total =', total, 'state =', state);
  };

 function incId() {
    // increment the counter
    var counter = firebaseRef.child('counter');
    counter.transaction(function(currentValue) {
        //console.log(currentValue);
        applicant_count = currentValue;
        return (currentValue||0) + 1
    }, function(err, committed, ss) {
        if( err ) {
           setError(err);
        }
        else if( committed ) {
            console.log(applicant_count);
        }
    });
}

 $scope.addApplicant = function() {
  document.getElementById("myNav").style.width = "100%";
  $scope.upload_progress = "uploaded 0 out of 5 files";

  var imagesRef, safename, imageUpload;
  imagesRef = new Firebase("https://yesprogram-dcb5c.firebaseio.com/applicants" + '/images');

  var photo, birthCertificate, transcriptCurrent, transcript2016, transcript2015;

  function guid() {
   return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
    s4() + '-' + s4() + s4() + s4();
  }

  function s4() {
   return Math.floor((1 + Math.random()) * 0x10000)
    .toString(16)
    .substring(1);
  }

  var photo_file = document.getElementById("photo_file").files[0];

  if(!photo_file) {
    console.log("blank file");
     photo_file = new File([""], "blank_file");
  }

  var uuid = guid();

  var storage = firebase.storage().ref('images/' + uuid + "-" + photo_file.name);
  storage.put(photo_file).then(function(snapshot) {



   console.log(snapshot['a']['downloadURLs'][0]);
   photo = snapshot['a']['downloadURLs'][0];


   var birth_certificate_file = document.getElementById("birth_certificate_file").files[0];

    if(!birth_certificate_file) {
      console.log("blank file");
       birth_certificate_file = new File([""], "blank_file");
    }

   $scope.$apply(function () {
          $scope.upload_progress = "uploaded 1 out of 5 files";
    });
   var uuid = guid();

   var storage = firebase.storage().ref('file/' + uuid + "-" + birth_certificate_file.name);
   storage.put(birth_certificate_file).then(function(snapshot2) {
    $scope.$apply(function () {
          $scope.upload_progress = "uploaded 2 out of 5 files";
    });
    console.log(snapshot2['a']['downloadURLs'][0]);
    birthCertificate = snapshot2['a']['downloadURLs'][0];

    var current_transcript_file = document.getElementById("current_transcript_file").files[0];
    if(!current_transcript_file) {
      console.log("blank file");
       current_transcript_file = new File([""], "blank_file");
    }
    var uuid = guid();

    var storage = firebase.storage().ref('file/' + uuid + "-" + current_transcript_file.name);
    storage.put(current_transcript_file).then(function(snapshot3) {
      $scope.$apply(function () {
            $scope.upload_progress = "uploaded 3 out of 5 files";
      });

     console.log(snapshot3['a']['downloadURLs'][0]);
     transcriptCurrent = snapshot3['a']['downloadURLs'][0];

     var transcript_2016_file = document.getElementById("transcript_2016_file").files[0];
     if(!transcript_2016_file) {
        console.log("blank file");
        transcript_2016_file = new File([""], "blank_file");
      }
     var uuid = guid();

     var storage = firebase.storage().ref('file/' + uuid + "-" + transcript_2016_file.name);
     storage.put(transcript_2016_file).then(function(snapshot4) {
      $scope.$apply(function () {
            $scope.upload_progress = "uploaded 4 out of 5 files";
      });
      console.log(snapshot4['a']['downloadURLs'][0]);
      transcript2016 = snapshot4['a']['downloadURLs'][0];

      var transcript_2015_file = document.getElementById("transcript_2015_file").files[0];
      if(!transcript_2015_file) {
        console.log("blank file");
        transcript_2015_file = new File([""], "blank_file");
      }
      var uuid = guid();

      var storage = firebase.storage().ref('file/' + uuid + "-" + transcript_2015_file.name);
      storage.put(transcript_2015_file).then(function(snapshot5) {
      $scope.$apply(function () {
            $scope.upload_progress = "uploaded 5 out of 5 files";
      });
       console.log(snapshot5['a']['downloadURLs'][0]);
       transcript2015 = snapshot5['a']['downloadURLs'][0];

        var dob = $( "#datepicker" ).datepicker( "getDate" );
        console.log(dob);

       var age_on_first_august;
       var age_on_first_august_value;

       var startyear = "1911";
       var endyear = "2011";
       var dat = new Date();
       var curday = 1; //dat.getDate();
       var curmon = 8; //dat.getMonth()+1;
       var curyear = 2018; //dat.getFullYear();

       function checkleapyear(datea) {
        if (datea.getYear() % 4 == 0) {
         if (datea.getYear() % 10 != 0) {
          return true;
         } else {
          if (datea.getYear() % 400 == 0)
           return true;
          else
           return false;
         }
        }
        return false;
       }

       function DaysInMonth(Y, M) {
        with(new Date(Y, M, 1, 12)) {
         setDate(0);
         return getDate();
        }
       }

       function datediff(date1, date2) {
        var y1 = date1.getFullYear(),
         m1 = date1.getMonth(),
         d1 = date1.getDate(),
         y2 = date2.getFullYear(),
         m2 = date2.getMonth(),
         d2 = date2.getDate();
        if (d1 < d2) {
         m1--;
         d1 += DaysInMonth(y2, m2);
        }
        if (m1 < m2) {
         y1--;
         m1 += 12;
        }
        return [y1 - y2, m1 - m2, d1 - d2];
       }


       var calday = dob.getDate();
       var calmon = (dob.getMonth()+1);
       var calyear = dob.getFullYear();
       if (curday == "" || curmon == "" || curyear == "" || calday == "" || calmon == "" || calyear == "") {
        console.log("please fill all the values and click go -");
       } else {
        var curd = new Date(curyear, curmon - 1, curday);
        var cald = new Date(calyear, calmon - 1, calday);
        var diff =
         Date.UTC(curyear, curmon, curday, 0, 0, 0) - Date.UTC(calyear, calmon, calday, 0, 0, 0);
        var dife = datediff(curd, cald);
        age_on_first_august = dife[0] + " years, " + dife[1] + " months, and " + dife[2] + " days";
        age_on_first_august_value = dife[0] + (dife[1] / 12);
        $scope.age_on_first_august = age_on_first_august;
       }

       console.log(age_on_first_august);
       console.log(age_on_first_august_value);

        var counter = firebaseRef.child('counter');
        counter.transaction(function(currentValue) {
            applicant_count = currentValue;
            return (currentValue||0) + 1
        }, function(err, committed, ss) {
            if( err ) {
               console.log(err);
            }
            else if( committed ) {
              console.log(applicant_count);
              addRecord(applicant_count+1);
            }
        });


       function addRecord(applicant_count){
         var res = $scope.applicants.$add({
          first_name: $scope.firstNameText,
          middle_name: $scope.middleNameText,
          last_name: $scope.lastNameText,
          sex: $scope.sexText,
          date_of_birth: dob.getDate()+"/"+(dob.getMonth()+1)+"/"+dob.getFullYear(),
          citizenship: $scope.citizenshipText,
          contact: $scope.contactText,
          email: $scope.emailText,
          address: $scope.addressText,
          postalCode: $scope.postalCodeText,
          thana: $scope.thanaText,
          district: $scope.districtText,
          facebookURL: $scope.facebookURLText,
          twitterHandle: $scope.twitterHandleText,
          instagramID: $scope.instagramIDText,
          schoolName: $scope.schoolNameText,
          schoolAddress: $scope.schoolAddressText,
          schoolPhone: $scope.schoolPhoneText,
          classCurrentlyStudying: $scope.classCurrentlyStudyingText,
          currentPercentageMarks: $scope.currentPercentageMarksText,
          classStudiedIn20162017: $scope.classStudiedIn20162017Text,
          percentageMarksIn20162017: $scope.percentageMarksIn20162017Text,
          classStudiedIn20152016: $scope.classStudiedIn20152016Text,
          percentageMarksIn20152016: $scope.percentageMarksIn20152016Text,
          visitedUS5: $scope.visitedUS5,
          visitedUS5WhenAndWhere: $scope.visitedUS5WhenAndWhereText,
          visitedUS5Purpose: $scope.visitedUS5PurposeText,
          visitedUS5HowLong: $scope.visitedUS5HowLongText,
          familyImmigration: $scope.familyImmigration,
          familyGreenCard: $scope.familyGreenCard,
          familyLivingInUSA: $scope.familyLivingInUSA,
          relativesLivingInUSA: $scope.relativesLivingInUSA,
          relativesLivingInUSAState: $scope.relativesLivingInUSAState,
          holdUSVisa: $scope.holdUSVisa,
          holdUSVisaExpiry: $scope.holdUSVisaExpiry,
          aboutYourself: $scope.aboutYourself,
          aboutCommunityWork: $scope.aboutCommunityWork,
          fatherFirstName: $scope.fatherFirstNameText,
          fatherMiddleName: $scope.fatherMiddleNameText,
          fatherLastName: $scope.fatherLastNameText,
          fatherContact: $scope.fatherContactText,
          fatherEmailID: $scope.fatherEmailIDText,
          fatherOccupation: $scope.fatherOccupationText,
          fatherNameOfWorkplace: $scope.fatherNameOfWorkplaceText,
          motherFirstName: $scope.motherFirstNameText,
          motherMiddleName: $scope.motherMiddleNameText,
          motherLastName: $scope.motherLastNameText,
          motherContact: $scope.motherContactText,
          motherEmailID: $scope.motherEmailIDText,
          motherOccupation: $scope.motherOccupationText,
          motherNameOfWorkplace: $scope.motherNameOfWorkplaceText,
          ageOnFirstAugust: age_on_first_august_value,

          photo: photo,
          birthCertificate: birthCertificate,
          transcriptCurrent: transcriptCurrent,
          transcript2016: transcript2016,
          transcript2015: transcript2015,
          status: "Pending",
          applicant_id: applicant_count
         }).then(function(p){
          console.log(p.key());
          console.log(p);
          console.log(res);
          // $scope.$apply(function () {
          $scope.success_message = "Application submitted! Your applicant id is: ";
          $scope.unique_id = applicant_count;//p.key();

          var pdf_base_url = "http://election.yesalumnibd.org/process-pdf?";

          var pdf_download_url = pdf_base_url+
            "unique_id="+ encodeURIComponent(applicant_count)+"&"+
            "first_name="+ encodeURIComponent($scope.firstNameText)+"&"+
            "middle_name="+ encodeURIComponent($scope.middleNameText)+"&"+
            "last_name="+ encodeURIComponent($scope.lastNameText)+"&"+
            "sex="+ encodeURIComponent($scope.sexText)+"&"+
            "dob="+ encodeURIComponent(dob.getDate()+"/"+(dob.getMonth()+1)+"/"+dob.getFullYear())+"&"+
            "citizenship="+ encodeURIComponent($scope.citizenshipText)+"&"+
            "contact="+ encodeURIComponent($scope.contactText)+"&"+
            "email="+ encodeURIComponent($scope.emailText)+"&"+
            "address="+ encodeURIComponent($scope.addressText)+"&"+
            "postalCode="+ encodeURIComponent($scope.postalCodeText)+"&"+
            "thana="+ encodeURIComponent($scope.thanaText)+"&"+
            "district="+ encodeURIComponent($scope.districtText)+"&"+
            "facebookURL="+ encodeURIComponent($scope.facebookURLText)+"&"+
            "twitterHandle="+ encodeURIComponent($scope.twitterHandleText)+"&"+
            "instagramID="+ encodeURIComponent($scope.instagramIDText)+"&"+
            "schoolName="+ encodeURIComponent($scope.schoolNameText)+"&"+
            "schoolAddress="+ encodeURIComponent($scope.schoolAddressText)+"&"+
            "schoolPhone="+ encodeURIComponent($scope.schoolPhoneText)+"&"+
            "classCurrentlyStudying="+ encodeURIComponent($scope.classCurrentlyStudyingText)+"&"+
            "currentPercentageMarks="+ encodeURIComponent($scope.currentPercentageMarksText)+"&"+
            "classStudiedIn20152016="+ encodeURIComponent($scope.classStudiedIn20152016Text)+"&"+
            "percentageMarksIn20152016="+ encodeURIComponent($scope.percentageMarksIn20152016Text)+"&"+
            "classStudiedIn20142015="+ encodeURIComponent($scope.classStudiedIn20142015Text)+"&"+
            "percentageMarksIn20142015="+ encodeURIComponent($scope.percentageMarksIn20142015Text)+"&"+
            "visitedUS5="+ encodeURIComponent($scope.visitedUS5)+"&"+
            "visitedUS5WhenAndWhere="+ encodeURIComponent($scope.visitedUS5WhenAndWhereText)+"&"+
            "visitedUS5Purpose="+ encodeURIComponent($scope.visitedUS5PurposeText)+"&"+
            "visitedUS5HowLong="+ encodeURIComponent($scope.visitedUS5HowLongText)+"&"+
            "familyImmigration="+ encodeURIComponent($scope.familyImmigration)+"&"+
            "familyGreenCard="+ encodeURIComponent($scope.familyGreenCard)+"&"+
            "familyLivingInUSA="+ encodeURIComponent($scope.familyLivingInUSA)+"&"+
            "relativesLivingInUSA="+ encodeURIComponent($scope.relativesLivingInUSA)+"&"+
            "relativesLivingInUSAState="+ encodeURIComponent($scope.relativesLivingInUSAState)+"&"+
            "holdUSVisa="+ encodeURIComponent($scope.holdUSVisa)+"&"+
            "holdUSVisaExpiry="+ encodeURIComponent($scope.holdUSVisaExpiry)+"&"+
            "aboutYourself="+ encodeURIComponent($scope.aboutYourself)+"&"+
            "aboutCommunityWork="+ encodeURIComponent($scope.aboutCommunityWork)+"&"+
            "fatherFirstName="+ encodeURIComponent($scope.fatherFirstNameText)+"&"+
            "fatherMiddleName="+ encodeURIComponent($scope.fatherMiddleNameText)+"&"+
            "fatherLastName="+ encodeURIComponent($scope.fatherLastNameText)+"&"+
            "fatherContact="+ encodeURIComponent($scope.fatherContactText)+"&"+
            "fatherEmailID="+ encodeURIComponent($scope.fatherEmailIDText)+"&"+
            "fatherOccupation="+ encodeURIComponent($scope.fatherOccupationText)+"&"+
            "fatherNameOfWorkplace="+ encodeURIComponent($scope.fatherNameOfWorkplaceText)+"&"+
            "motherFirstName="+ encodeURIComponent($scope.motherFirstNameText)+"&"+
            "motherMiddleName="+ encodeURIComponent($scope.motherMiddleNameText)+"&"+
            "motherLastName="+ encodeURIComponent($scope.motherLastNameText)+"&"+
            "motherContact="+ encodeURIComponent($scope.motherContactText)+"&"+
            "motherEmailID="+ encodeURIComponent($scope.motherEmailIDText)+"&"+
            "motherOccupation="+ encodeURIComponent($scope.motherOccupationText)+"&"+
            "motherNameOfWorkplace="+ encodeURIComponent($scope.motherNameOfWorkplaceText)+"&"+
            "ageOnFirstAugust="+ age_on_first_august_value;
            "note"+"";

          console.log(pdf_download_url);
          $scope.pdf_url = pdf_download_url;
          $scope.download_message = "Download this file";
          $scope.note = "Please download this PDF file. This must be signed by the applicant, parents and educational institution's principal or headmaster/headmistress. You MUST send this form along with the attested mandatory documents to the iEARN-BD office by 16th November, 2017.";

        });
       };
      });
     });
    });
   });
  });
 };
}]);
