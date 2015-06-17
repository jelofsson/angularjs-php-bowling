app.directive('frameForm', function() {
  return {
    restrict: 'E',
    templateUrl: 'templates/directive/_frameForm.html',
    link: function($scope, element, attrs) {
        
        // Set max value of second input
        $scope.$watchGroup(['first','frames.length'], function ()
        {
            $scope.secondMax = ($scope.frames.length < 9) ? 10-$scope.first : 10;
        });
        
        // Set max value of bonus input
        $scope.$watchGroup(['first','second'], function ()
        {
            $scope.bonusMax = ($scope.frames.length == 9 && $scope.first+$scope.second >= 10) ? 10 : 0;
        });
        
        // Add frame to array
        $scope.addFrameToArray = function ()
        {
            if ($scope.frameForm.$valid) 
            {
                $scope.frames.push({
                    first: $scope.first,
                    second: $scope.second,
                    bonus: $scope.bonus
                });
            }
        }
        
    }
  };
});

app.directive('frameList', function() {
  return {
    restrict: 'E',
    templateUrl: 'templates/directive/_frameList.html'
  };
});