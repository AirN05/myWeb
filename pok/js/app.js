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

.value('scoreUser', {
    score:0
    
})

.controller("gameController", function($scope,$log,$http, $location, scoreUser){
   
    $scope.level=1;
    $scope.health=100;
    $scope.score=scoreUser.score;
    

    $http.get('?controller=pokemon&id=0')
            .success(function(data, status, headers, config){
                 $scope.pokemon = data;
                 $log.log("игра работает "+status);})

            $scope.addUser=function(scoreUser){
                $log.log("score "+ $scope.score);
                $log.log('send');
                $log.log("name" + $scope.username);
                $http.post('/?controller=user',  {name: $scope.username, score: $scope.score})
                    .success(function () {

                $location.path('/page/3');
            });

        }


})
.directive("pokemon", function(){
    return {
        templateUrl:"assets/directives/pokemon.html",
        replace: true,
        restrict: 'E',

    controller: function($scope,$log,$rootScope, $http,$interval, $window, $location, scoreUser){
        
        $scope.ballPos={'X':0,'Y':0};
        var tictac, tic=0;

        $scope.start=function(){

            var startTime = Date.now();
            scoreUser.score=0;


            $log.log("click");
            tictac=$interval(function(){//взяла у Юли

                $scope.timePassed = parseInt(10-(Date.now() - startTime)/1000);

                if ($scope.timePassed <=0) {
                //clearInterval(tictac);
                $scope.next();
                $scope.health = parseInt($scope.health) - parseInt($scope.pokemon.power);
                startTime = Date.now();
            }

               tic++;
                $scope.ballPos.X=50*Math.sin(tic*2/50);
                $scope.ballPos.Y=20*Math.cos(tic*2/20);
                
        },50);  
        }

       

        $scope.next=function(){

            
            scoreUser.score += $scope.pokemon.power * parseInt($scope.timePassed);
            $log.log($scope.score);
            

            if ($scope.level==4 || $scope.health <= 0)
            {
                  $scope.end();
            } 
            else{

            $http.get('?controller=pokemon&id='+parseInt($scope.level))
            .success(function(data, status, headers, config) {
                $scope.pokemon = data;
                $log.log("тыкнули на покемона "+status);
            })
            
            $scope.level++;
            

            }
            
        }

        $scope.end=function(){

            $interval.cancel(tictac);
            $location.path('/page/5');



        }

    }
    }
})








