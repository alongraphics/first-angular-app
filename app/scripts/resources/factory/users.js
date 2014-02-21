App.factory('usersFactory', ['$http', '$q', '$routeParams', function($http, $q, $routeParams){

    var factory = {};

    //GET 1 USER ////////////////////////////////
    factory.getUser = function() {
        var userId = $routeParams.id;
        //console.log(userId);

        var deferred = $q.defer();

        $http({method:"GET", url:"http://localhost:8888/test/crud/user/"+userId})
            .success(function(result){
                //console.log(result);
                deferred.resolve(result[0]);
            });

        console.log(deferred.promise);
        return deferred.promise;
    }

    //GET USERS/////////////////////////////////
    factory.getUsers = function() {

        var deferred = $q.defer();

        $http({method:"GET", url:"http://localhost:8888/test/crud/users"})
            .success(function(result){
                //console.log(result);
                deferred.resolve(result);
            });

        console.log(deferred.promise);
        return deferred.promise;
    }

    //RETURN METHODES TO CONTROLLERS/////////////////
    return factory;

}]);
