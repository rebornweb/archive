
siteApp.controller('sectionCtrl', function ($scope,JsonService) {
  JsonService.get(function(data){
 
  $scope.items = data.items;
  //Remember to chain to get the data
   $scope.items.title = data.title;
 
  
  });

});
