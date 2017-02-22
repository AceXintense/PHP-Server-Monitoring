angular.module('myApp', ['ngMaterial', 'chart.js'])
    .controller('MyController', ['$scope', '$http', function ($scope, $http) {

        $http.get('/api/getServerList')
        .then(
            function (response) {
                $scope.servers = response.data;
            }
        );

        $http.post('/api/getCPUFrequency', {serverId: 'cf8e23d8-6c0f-4f8c-87a2-a73622b55cd7'})
        .then(
            function (response) {
                $scope.cpuFrequency = response.data['5 Minutes'];
            }
        );


        $scope.cardRows = [
            [
                {
                    id: 1,
                    name: 'CPU Information',
                    subheading: 'CPU last updated less than a minute ago...'
                },
                {
                    id: 2,
                    name: 'Memory Information',
                    subheading: 'Memory last updated less than a minute ago...'
                }
            ],
            [
                {
                    id: 3,
                    name: 'Disk Information',
                    subheading: 'Disk last updated less than a minute ago...'
                },
                {
                    id: 4,
                    name: 'Servers',
                    subheading: 'Servers last updated less than a minute ago...'
                }
            ]
        ];

        $scope.colors = ['#45b7cd', '#ff6384', '#ff8e72'];

        $scope.cpuLabels = ['5 minutes', '10 minutes', '15 minutes', '20 minutes', '25 minutes', '30 minutes'];
        $scope.memoryLabels = ['5 minutes', '10 minutes', '15 minutes', '20 minutes', '25 minutes', '30 minutes'];
        $scope.diskLabels = ['/', '/dev', '/boot', '/home'];

        $scope.cpuData = [
            [65, 50, 100, 65, 50, 100, 10, 10],
            [65, 50, 100, 65, 50, 100, 10, 10]
        ];

        $scope.memoryData = [
            [65, 50, 100, 65, 50, 100, 10, 10],
            [65, 50, 100, 65, 50, 100, 10, 10]
        ];

        $scope.diskData = [
            [65, 50, 100, 65]
        ];

        $scope.cpuChart = [
            {
                label: "Bar chart",
                borderWidth: 1,
                type: 'bar'
            }
        ];
        $scope.memoryChart = [
            {
                label: "Bar chart",
                borderWidth: 1,
                type: 'bar'
            }
        ];
        $scope.diskChart = [
            {
                label: "Bar chart",
                borderWidth: 1,
                type: 'doughnut'
            }
        ];

    }]);

angular.element(function() {
    angular.bootstrap(document, ['myApp']);
});

// var serverList = [];
// var partitionList = ['/dev', '/boot', '/home', '/bin'];
//
// function getServerList() {
//     $.ajax({
//         url: "/api/getServerList",
//         type: "GET",
//         success: function(data) {
//             for (var i = 0; i < data.length; i++) {
//                 serverList.push(data[i]['server_name']);
//             }
//             console.log(serverList);
//             createCharts();
//         }
//     });
// }
//
// getServerList();