App.controller('homeController', ['$http', '$scope', 'usersFactory',
    function($http, $scope, usersFactory){

        function init(){
            var myDataPromise = usersFactory.getUsers();
            myDataPromise.then(function(result) {
                $scope.users = result;
            });
        }
        init();

        $scope.formData = {};
        $scope.processForm = function(){

            var name = $scope.formData.name;
            var email = $scope.formData.email;

            $http({method:"GET", url:"http://localhost:8888/test/crud/user/add/"+name+"/"+email})
                .success(function(){
                    $scope.formData = {};
                    init();
                });
        }

        //$scope.test = 'menu';
       // $scope.$watch('test', function(){
           // alert('changed');
       // })

    }]);

