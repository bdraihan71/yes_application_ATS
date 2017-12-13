@extends('ats.report.layout')

<!-- Main Content -->
@section('preliminary_application_content')
    <h1>Districtwise</h1>
    <div class="row">
       <div>
           <table id="myTable" class="table table-responsive table-striped table-bordered">
               <thead>
               <tr>
                   <th>District</th>
                   <th>Preliminary Total</th>
                   <th>Preliminary Male</th>
                   <th>Preliminary Female</th>
                   <th>Phone Interview Total</th>
                   <th>Phone Interview Male</th>
                   <th>Phone Interview Female</th>
                   <th>ELTiS Total</th>
                   <th>ELTiS Male</th>
                   <th>ELTiS Female</th>
                   <th>Final Application Total</th>
                   <th>Final Application Male</th>
                   <th>Final Application Female</th>
               </tr>
               </thead>

               <tfoot>
               <tr>
                   <th>District</th>
                   <th>Preliminary Total</th>
                   <th>Preliminary Male</th>
                   <th>Preliminary Female</th>
                   <th>Phone Interview Total</th>
                   <th>Phone Interview Male</th>
                   <th>Phone Interview Female</th>
                   <th>ELTiS Total</th>
                   <th>ELTiS Male</th>
                   <th>ELTiS Female</th>
                   <th>Final Application Total</th>
                   <th>Final Application Male</th>
                   <th>Final Application Female</th>
               </tr>
               </tfoot>

               <tbody>
               @foreach($query as $row)
                   <tr>
                       <td>{{$row->district}}</td>
                       <td>{{$row->total}}</td>
                       <td>{{$row->males}}</td>
                       <td>{{$row->females}}</td>
                       <td>{{$row->total2}}</td>
                       <td>{{$row->males2}}</td>
                       <td>{{$row->females2}}</td>
                       <td>{{$row->total3}}</td>
                       <td>{{$row->males3}}</td>
                       <td>{{$row->females3}}</td>
                       <td>{{$row->total4}}</td>
                       <td>{{$row->males4}}</td>
                       <td>{{$row->females4}}</td>
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


