App.controller('editUserController', ['$scope', 'usersFactory',
    function($scope, usersFactory){

        var myDataPromise = usersFactory.getUser();
        myDataPromise.then(function(result) {
            $scope.user = result;
        });

    }]);