var app = angular.module("pokemonGame", ["ngRoute", "ngResource"]);

app.config(function($routeProvider) {
    $routeProvider
    .when("/page/:id", {
                templateUrl : function(page){
                    
        	return "assets/page-"+page.id+".html"
        },
        controller: "pagesController"
    })
    .otherwise("/page/0")
   
})

    .controller("pagesController",function($scope,$http,$rootScope,$routeParams, $location, $log){
        $scope.page=parseInt($routeParams.id) || 0;
        $log.log("hi");
         

    })

.directive("menu", function(){
    return {
        templateUrl:"assets/directives/menu.html",
        replace: true,
        restrict: 'E',
        

            controller: function($scope,$log,$http){

        $http.get('?controller=menu')
            .success(function(data, status, headers, config){
                 $scope.menu = data;
                 $log.log(status);})  
}
}})

.controller("userController", function($scope,$log,$http){
    $http.get('?controller=user')
            .success(function(data, status, headers, config){
                 $scope.users = data;
                 $log.log(status);})
})

.controller("gameController", function($scope,$log,$http){
   
    //$scope.level=1;
   // $scope.health=100;

    $http.get('?controller=pokemon&id=0')
            .success(function(data, status, headers, config){
                 $scope.pokemon = data;
                 $log.log("нормас"+status);})


})
.directive("pokemon", function(){
    return {
        templateUrl:"assets/directives/pokemon.html",
        replace: true,
        restrict: 'E',

    controller: function($scope,$log,$rootScope, $http,$interval){
        $scope.ballPos={'X':0,'Y':0};
        var tictac, tic=0;

        $scope.start=function(){

            $log.log("click");
            tictac=$interval(function(){
                tic++;
                $scope.ballPos.X=50*Math.sin(tic/50);
                $scope.ballPos.Y=20*Math.cos(tic/20);
        },50);  
        }

    }}
})


