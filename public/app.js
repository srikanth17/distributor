var myApp = angular.module('dist',['ngAria']);

myApp.controller('mainCtrl', ['$scope', '$http', function ($scope, $http) {
    $scope.init = function (ID) {
        if (ID) {
            $scope.companyId = ID;
        }

        var url = 'https://api.hubapi.com/deals/v1/deal/associated/company/'+$scope.companyId+'/paged?hapikey=992d341f-aa59-4b98-9681-4e0d9a1f74dd&includeAssociations=true&limit=10&properties=dealname';

        $http.get(url).then(function (response) {
            console.log(response);
            $scope.deals = response.data.deals;
        },
            function (error) {

            });
    };
}]);