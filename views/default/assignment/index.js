var $location = $injector.get('$location');
var $pageInfo = $injector.get('$pageInfo');

$scope.q = '';

var onSearch = false;
var panding = false;

var query = function (params) {
    onSearch = true;
    var query = angular.merge({
        q: $scope.q,
        expand: 'assignments'
    }, params);
    Assignment.query(query, function (rows, headerCallback) {
        $pageInfo(headerCallback, $scope.provider);
        $scope.rows = rows;
        onSearch = false;
        if(panding){
            $scope.search();
        }
    },function (){
        onSearch = false;
        if(panding){
            $scope.search();
        }
    });
};
query();

// data provider
$scope.provider = {
    paging: function () {
        query({page: this.page});
    }
};

$scope.search = function(){
    if(!onSearch){
        panding = false;
        query();
    }else{
        panding = true;
    }
};
