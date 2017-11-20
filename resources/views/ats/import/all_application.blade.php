@extends('ats.layout')

<!-- Main Content -->
@section('ats_content')
    <style>
        #myInput {
            background-image: url('/css/searchicon.png'); /* Add a search icon to input */
            background-position: 10px 12px; /* Position the search icon */
            background-repeat: no-repeat; /* Do not repeat the icon image */
            width: 100%; /* Full-width */
            font-size: 16px; /* Increase font-size */
            padding: 12px 20px 12px 40px; /* Add some padding */
            border: 1px solid #ddd; /* Add a grey border */
            margin-bottom: 12px; /* Add some space below the input */
        }

        #student_table {
            border-collapse: collapse; /* Collapse borders */
            width: 100%; /* Full-width */
            border: 1px solid #ddd; /* Add a grey border */
            font-size: 18px; /* Increase font-size */
        }

        #student_table th, #student_table td {
            text-align: left; /* Left-align text */
            padding: 12px; /* Add padding */
        }

        #student_table tr {
            /* Add a bottom border to all table rows */
            border-bottom: 1px solid #ddd;
        }

        #student_table tr.header, #student_table tr:hover {
            /* Add a grey background color to the table header and on hover */
            background-color: #f1f1f1;
        }</style>
    <div class="row">
        <div class="col-md-12">
            <button onclick="importAll()">Sync All</button>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

            <table id="student_table" border="1">

                <tbody>
                <tr>
                    <td>Id</td>
                    <td>First Name</td>
                    <td>Import</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://www.gstatic.com/firebasejs/4.6.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.6.0/firebase-database.js"></script>

    <script src="https://www.gstatic.com/firebasejs/4.6.1/firebase.js"></script>
    <script>

        // Initialize Firebase
        var config = {
            apiKey: "{{env('FIREBASE_API_KEY')}}",
            authDomain: "{{ env('FIREBASE_AUTH_DOMAIN') }}",
            databaseURL: "{{env('FIREBASE_DATBASE_URL')}}",
            projectId: "{{env('FIREBASE_PROJECT_ID')}}",
            storageBucket: "",
            messagingSenderId: "{{env('FIREBASE_MESSAGING_SENDER_ID')}}"
        };
        firebase.initializeApp(config);

        // Get a reference to the /users/ada node

        var leadsRef = firebase.database().ref("applicants");
        leadsRef.on('value', function(snapshot) {
            snapshot.forEach(function(childSnapshot) {
                var childData = childSnapshot.val();
                var function_name =  "childData('"+childSnapshot.key+"')";
                $("#student_table").find('tbody')
                    .append($('<tr>')
                        .append($('<td>').text(childData.applicant_id)
                        )
                        .append($('<td>').text(childData.first_name
                            )
                        )
                        .append($('<td>')
                            .append($('<button>').text('Sync').attr('onClick', function_name)
                            )
                        )
                    );


            });
        });
    </script>
    <script>
        function childData(input) {
            confirm("Do you want to sync this student?");
            var url = "/api/sync/" + input;
            console.log(url);
            $.get(
                url, null,
                function(data) {
                    if(data.success == true){
                        console.log("Student synced");
                    }

                }
            );

        }

        function importAll(){
            confirm("Do you want to import all students");
            var url = "/api/sync/all";
            console.log(url);
            $.get(
                url, null,
                function(data) {
                    if(data.success == true){
                        alert("All students synced successfully");
                    }

                }
            );
        }


    </script>

    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("student_table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }

                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

@endsection
