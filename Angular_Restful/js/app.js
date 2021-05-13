//Define Site App
var siteApp = angular.module('siteApp',[
'ngRoute','jsonService'

]);





//Define Routing
siteApp.config(['$routeProvider', function($routeProvider) {
  $routeProvider.
	
    
          when('/', {
        templateUrl: 'partials/home.html',
        controller: 'sectionCtrl'
      }).
      when('/about', {
        templateUrl: 'partials/about.html',
        controller: 'sectionCtrl'
      }).
      otherwise({
        redirectTo: '/'
      
      });


    
    
    
    
    }]);




