app.controller('bowlingCtrl', ['$scope', '$http', function($scope, $http) {
                               
    $scope.frames = [];
    $scope.score = 0;
    
    $scope.submitFrames = function ()
    {
        console.log('Submitting ' + $scope.frames.length + ' frame(s)');
        $http({method: 'POST', url: 'http://127.0.0.1:8888/bowling/score', data: { frames: $scope.frames }})
            .success(function (response, status) {
                if (typeof response.score != 'undefined') {
                    // Set score from response
                    $scope.score = response.score;
                }
        });
    }
    
    $scope.$watch('frames.length', function ()
    {
        // Frames array changed, submit frames
        $scope.submitFrames();
    });
    
}]);