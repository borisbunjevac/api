<?php

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Read Contacts</title>

        <!-- include material design CSS -->
    <link rel="stylesheet" href="libs/css/materialize/css/materialize.min.css" />
     
    <!-- include material design icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

        <!-- custom CSS -->
<style>
.width-30-pct{
    width:30%;
}
 
.text-align-center{
    text-align:center;
}
 
.margin-bottom-1em{
    margin-bottom:1em;
}
</style>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <script>
$(document).ready(function(){
    $("body").hover(function(){
            var settings = {
"async": true,
"crossDomain": true,
"url": "http://developer.digitalcube.rs:8999/user/login?username=borisbunjevac%40yahoo.com&password=konkurs2016",
"method": "POST"

}
$.ajax(settings).done(function (response) {
console.log(response);
});
   });
});
        </script>

        <script>
$(document).ready(function(){
    $("form").submit(function(){
            var settings = {
"async": true,
"crossDomain": true,
"url": "http://developer.digitalcube.rs:8999/user/login?username=borisbunjevac%40yahoo.com&password=konkurs2016",
"method": "POST"

}
$.ajax(settings).done(function (response) {
console.log(response);
});
   });
});
        </script>

         <script>
$(document).ready(function(){
    $("form").submit(function(){
            var settings = {
"async": true,
"crossDomain": true,
"url": "http://developer.digitalcube.rs:8999/api/contacts",
"method": "GET",
"headers": {
"authorization": "s00000bRI3jd1Y59xkZre5I2vL598Vya2o4pllim6Wx06k7GhDcKfg0gKWsX9OEc"
}
}
$.ajax(settings).done(function (response) {
console.log(response);
});
   });
});
        </script>

        <script>
$(document).ready(function(){
    $("body").hover(function(){
            var settings = {
"async": true,
"crossDomain": true,
"url": "http://developer.digitalcube.rs:8999/api/contacts",
"method": "GET",
"headers": {
"authorization": "s00000bRI3jd1Y59xkZre5I2vL598Vya2o4pllim6Wx06k7GhDcKfg0gKWsX9OEc"
}
}
$.ajax(settings).done(function (response) {
console.log(response);
});
   });
});
        </script>

    </head>
    <body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  User name: <input type="text" name="UserName"><br>
  Password: <input type="password" name="Password"><br>
  <input type="submit" value="Submit">
</form> 

<!-- page content and controls will be here -->
       <div class="container" ng-app="myApp" ng-controller="productsCtrl">
    <div class="row">
        <div class="col s12">
            <h4>Contacts</h4>

            <!-- used for searching the current list -->
<input type="text" ng-model="search" class="form-control" placeholder="Search contact..." />
 
<!-- table that shows product record list -->
<table class="hoverable bordered">
 
    <thead>
        <tr>
            <th class="text-align-center">ID</th>
            <th class="width-10-pct">First Name</th>
            <th class="width-10-pct">Last Name</th>
            <th class="width-10-pct">Phone</th>
            <th class="width-10-pct">Email</th>
            <th class="width-10-pct">City</th>
            <th class="width-10-pct">Country</th>
            <th class="text-align-center">Zip</th>
            <th class="text-align-center">Action</th>
        </tr>
    </thead>
 
    <tbody ng-init="getAll()">
        <tr ng-repeat="d in contacts | filter:search">
            <td class="text-align-center">{{ d.id }}</td>
            <td>{{ d.first_name }}</td>
            <td>{{ d.last_name }}</td>
            <td>{{ d.phones }}</td>
            <td>{{ d.emails }}</td>
            <td>{{ d.city }}</td>
            <td>{{ d.country }}</td>
            <td class="text-align-center">{{ d.zip }}</td>
            <td>
                <a ng-click="readOne(d.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">edit</i>Edit</a>
                <a ng-click="deleteProduct(d.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">delete</i>Delete</a>
            </td>
        </tr>
    </tbody>
</table>

            <!-- modal for for creating new product -->
<div id="modal-product-form" class="modal">
    <div class="modal-content">
        <h4 id="modal-product-title">Create New Product</h4>
        <div class="row">
            <div class="input-field col s12">
                <input ng-model="first_name" type="text" class="validate" id="form-first_name" placeholder="Type first name here..." />
                <label for="first_name">First Name</label>
            </div>
 
            <div class="input-field col s12">
                <input ng-model="csv_phones" type="text" class="validate" id="form-csv_phones" placeholder="Type phone number here..."></input>
                <label for="csv_phones">Phone</label>
            </div>
 
 
            <div class="input-field col s12">
                <input ng-model="csv_emails" type="email" class="validate" id="form-csv_emails" placeholder="Type email here..." />
                <label for="csv_emails">Email</label>
            </div>

             <div class="input-field col s12">
                <input ng-model="last_name" type="text" class="validate" id="form-last_name" placeholder="Type last name here..." />
                <label for="last_name">Last Name</label>
            </div>

            <div class="input-field col s12">
                <input ng-model="zip" type="text" class="validate" id="form-zip" placeholder="Type zip here..." />
                <label for="zip">Zip</label>
            </div>

            <div class="input-field col s12">
                <input ng-model="city" type="text" class="validate" id="form-city" placeholder="Type city here..." />
                <label for="city">City</label>
            </div>            
 
            <div class="input-field col s12">
                <a id="btn-create-product" class="waves-effect waves-light btn margin-bottom-1em" ng-click="createProduct()"><i class="material-icons left">add</i>Create</a>
 
                <a id="btn-update-product" class="waves-effect waves-light btn margin-bottom-1em" ng-click="updateProduct()"><i class="material-icons left">edit</i>Save Changes</a>
 
                <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">close</i>Close</a>
            </div>
        </div>
    </div>
</div>

        <!-- floating button for creating product -->
<div class="fixed-action-btn" style="bottom:45px; right:24px;">
    <a class="waves-effect waves-light btn modal-trigger btn-floating btn-large red" href="#modal-product-form" ng-click="showCreateForm()"><i class="large material-icons">add</i></a
</div>
                 
        </div> <!-- end col s12 -->
    </div> <!-- end row -->
</div> <!-- end container -->
        
        <!-- include jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 
<!-- material design js -->
<script src="libs/css/materialize/js/materialize.min.js"></script>
 
<!-- include angular js -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
 
<script>
// angular js codes will be here
var app = angular.module('myApp', []);
app.controller('productsCtrl', function($scope, $http) {
    // more angular JS codes will be here
    $scope.showCreateForm = function(){
    // clear form
    $scope.clearForm();
     
    // change modal title
    $('#modal-product-title').text("Create New Product");
     
    // hide update product button
    $('#btn-update-product').hide();
     
    // show create product button
    $('#btn-create-product').show();
     
}
    // clear variable / form values
$scope.clearForm = function(){
    $scope.id = "";
    $scope.first_name = "";
    $scope.csv_phones = "";
    $scope.csv_emails = "";
    $scope.last_name = "";
    $scope.zip = "";
    $scope.city = "";
}
    // create new product 
$scope.createProduct = function(){
         
    // fields in key-value pairs
    $http.put('http://developer.digitalcube.rs:8999/api/contacts', {
            'first_name' : $scope.first_name, 
            'csv_phones' : $scope.csv_phones, 
            'csv_emails' : $scope.csv_emails,
            'last_name' : $scope.last_name,
            'zip' : $scope.zip,
            'city' : $scope.city
        }
    ).success(function (data, status, headers, config) {
        console.log(data);
        // tell the user new product was created
        Materialize.toast(data, 4000);
         
        // close modal
        $('#modal-product-form').modal('close');
         
        // clear modal content
        $scope.clearForm();
         
        // refresh the list
        $scope.getAll();
    });
}
    // read products
$scope.getAll = function(){
    $http.get("http://developer.digitalcube.rs:8999/api/contacts").success(function(response){
        $scope.contacts = response.records;
    });
}
// retrieve record to fill out the form
$scope.readOne = function(id){
     
    // change modal title
    $('#modal-product-title').text("Edit Product");
     
    // show udpate product button
    $('#btn-update-product').show();
     
    // show create product button
    $('#btn-create-product').hide();
     
    // post id of product to be edited
    $http.get('http://developer.digitalcube.rs:8999/api/contacts/id_contact/[ID_CONTACT]', {
        'id' : id 
    })
    .success(function(data, status, headers, config){
         
        // put the values in form
        $scope.id = data[0]["id"];
        $scope.phones = data[0]["phones"];
        $scope.first_name = data[0]["first_name"];
        $scope.last_name = data[0]["last_name"];
        $scope.zip = data[0]["zip"];
        $scope.emails = data[0]["emails"];
        $scope.country = data[0]["country"];
        $scope.city = data[0]["city"];
         
        // show modal
        $('#modal-product-form').modal('open');
    })
    .error(function(data, status, headers, config){
        Materialize.toast('Unable to retrieve record.', 4000);
    });
}
// update product record / save changes
$scope.updateProduct = function(){
    $http.patch('http://developer.digitalcube.rs:8999/api/contacts/id_contact/[ID_CONTACT]?[Param]', {
        'id' : $scope.id,
        'phones' : $scope.phones, 
        'first_name' : $scope.first_name, 
        'last_name' : $scope.last_name,
        'zip' : $scope.zip,
        'emails' : $scope.emails,
        'country' : $scope.country,
        'city' : $scope.city
    })
    .success(function (data, status, headers, config){             
        // tell the user product record was updated
        Materialize.toast(data, 4000);
         
        // close modal
        $('#modal-product-form').modal('close');
         
        // clear modal content
        $scope.clearForm();
         
        // refresh the product list
        $scope.getAll();
    });
}
// delete product
$scope.deleteProduct = function(id){
     
    // ask the user if he is sure to delete the record
    if(confirm("Are you sure?")){
        // post the id of product to be deleted
        $http.delete('http://developer.digitalcube.rs:8999/api/contacts/id_contact/[ID_CONTACT]', {
            'id' : id
        }).success(function (data, status, headers, config){
             
            // tell the user product was deleted
            Materialize.toast(data, 4000);
             
            // refresh the list
            $scope.getAll();
        });
    }
}
});
 
// jquery codes will be here
$(document).ready(function(){
    // initialize modal
    $('.modal').modal();
});
</script>
         
    </body>
</html>
