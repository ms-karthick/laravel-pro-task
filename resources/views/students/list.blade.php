<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student List </title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body class="antialiased" ng-app="myApp" ng-controller="crudCtrl">
    <div class="container">
        <!-- main app container -->
        <div class="readersack">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ">
                        <h3>Student List</h3>
                    

                        <div id="search">

                            <form id="searchform" name="searchform">
                                <div class="row">

                                    <div class="form-group col-3">
                                        <label>Search by Roll No</label>
                                        <input type="text" name="roll_no" value="{{request()->get('roll_no','')}}" class="form-control" />
                                    </div>
                                    
                                </div>
                                <button class='btn btn-success'>Search</button>
                            </form>


                        </div>
                        <div id="pagination_data">
                            <table class="table table-striped table-light table-bordered">
                                <tr>
                                    <th>No.</th>
                                    <th>Roll No</th>
                                    <th>Name</th>
                                    <th>Standard</th>
                                    <th>Section</th>

                                    <th>Father Name</th>
                                    <th>Mother Name</th>
                                    <th>DOB</th>
                                    <th>Mob No</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($student as $students)
                                <tr>
                                    <td>{{$students->id}}</td>
                                    <td>{{$students->roll_no}}</td>

                                    <td>{{$students->name}}</td>
                                    <td>{{$students->std}}</td>
                                    <td>{{$students->section}}</td>
                                    <td>{{$students->father_name}}</td>
                                    <td>{{$students->mother_name}}</td>
                                    <td>{{$students->dob}}</td>
                                    <td>{{$students->mobile_no}}</td>
                                  
                                    <td>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div id="pagination">
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- credits -->
        <div class="text-center">
           
        </div>
    </div>

</body>

</html>


<script>
var app = angular.module('myApp', []);
app.controller('crudCtrl', function($scope,$http) {

    $http.get("http://127.0.0.1:8000/")
  .then(function(response) {
    // First function handles success
    $scope.content = response.data;
    console.log(response)
  }, function(response) {
    // Second function handles error
    $scope.content = "Something went wrong";
  });

});
</script>