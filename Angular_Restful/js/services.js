angular.module('jsonService', ['ngResource'])
.factory('JsonService', function($resource) {
  return $resource('js/data.json');
});