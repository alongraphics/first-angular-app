App.config(function($routeProvider){
    $routeProvider
        .when('/',
        {
            controller: 'homeController',
            templateUrl: 'views/home.html'
        }
    )
        .when('/user/:id',
        {
            controller: 'userController',
            templateUrl: 'views/user.html'
        }
    )
        .when('/edit/user/:id',
            {
                controller: 'editUserController',
                templateUrl: 'views/editUser.html'
            }
    )
        .otherwise({redirectTo: '/'})

});