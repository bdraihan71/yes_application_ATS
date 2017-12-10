@extends('ats.report.layout')

<!-- Main Content -->
@section('preliminary_application_content')
    <h1>School</h1>
    <div class="row">
       <div>
           <table id="myTable" class="table table-responsive table-striped table-bordered">
               <thead>
               <tr>
                   <th>Applicant ID</th>
                   <th>School Name</th>
                   <th>District</th>
               </tr>
               </thead>

               <tfoot>
               <tr>
                   <th>Applicant ID</th>
                   <th>School Name</th>
                   <th>District</th>
               </tr>
               </tfoot>

               <tbody>
               @foreach($query as $row)
                   <tr>
                       <td><a href="/ats/student/{{$row->id}}/account/1">{{$row->applicant_id}}</a></td>
                       <td>{{$row->schoolName}}</td>
                       <td>{{$row->district}}</td>
                   </tr>
               @endforeach
               </tbody>

           </table>
       </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#myTable').DataTable();
        });
    </script>
@endsection


