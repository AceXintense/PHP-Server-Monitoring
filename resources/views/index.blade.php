<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP Server Monitoring</title>

        <link rel="stylesheet" href="./bower_components/angular-material/angular-material.min.css">
        <link rel="stylesheet" href="css/app.css"/>

        <script src="./bower_components/angular/angular.min.js"></script>
        <script src="./bower_components/angular-aria/angular-aria.min.js"></script>
        <script src="./bower_components/angular-animate/angular-animate.min.js"></script>
        <script src="./bower_components/angular-messages/angular-messages.min.js"></script>
        <script src="./bower_components/angular-material/angular-material.min.js"></script>
        <script src="./bower_components/chart.js/dist/Chart.js"></script>
        <script src="./bower_components/angular-chart.js/dist/angular-chart.min.js"></script>
    </head>
    <body>


    <div ng-controller="MyController">

        <div layout="row">
            <div flex="50" flex-offset="20">
                <h1 id="title">Overview</h1>
                <h2 id="description">Overview of all the servers.</h2>
            </div>
        </div>

        @{{ cpuDetails['30 Minutes'][1].cpu_frequency}}
        {{--@{{ cpuFrequency }}--}}

        <div layout="row" ng-repeat="cardRow in cardRows">
            <div flex="20"></div>
            <md-card flex="30" ng-repeat="card in cardRow">
                <md-card-title>
                    <md-card-title-text>
                        <span class="md-headline">@{{ card.name }}</span>
                        <span class="md-subhead">@{{ card.subheading }}</span>
                    </md-card-title-text>
                </md-card-title>

                <md-card-content>

                    @{{ card.chart }}

                    <md-card>
                        <md-card-content ng-hide="card.id == 4">
                            <canvas ng-show="card.id == 1"
                                    class="chart-bar"
                                    chart-data="cpuData"
                                    chart-labels="cpuLabels"
                                    chart-colors="colors"
                                    chart-dataset-override="cpuChart" >
                            </canvas>
                            <canvas ng-show="card.id == 2"
                                    class="chart-bar"
                                    chart-data="memoryData"
                                    chart-labels="memoryLabels"
                                    chart-colors="colors"
                                    chart-dataset-override="memoryChart" >
                            </canvas>
                            <canvas ng-show="card.id == 3"
                                    class="chart chart-doughnut"
                                    chart-data="diskData"
                                    chart-labels="diskLabels"
                                    chart-colors="colors"
                                    chart-dataset-override="diskChart" >
                            </canvas>
                        </md-card-content>

                        <md-list ng-show="card.id == 4">
                            <md-list-item class="md-3-line" ng-repeat="server in servers" ng-click="null">
                                <div class="md-list-item-text" layout="column">
                                    <div layout="row">
                                        <div flex="60">
                                            <h3>@{{ server.server_name }}</h3>
                                            <p>Last updated (@{{ server.updated_at }})</p>
                                        </div>
                                        <div flex="20">
                                            <md-button>View</md-button>
                                        </div>
                                        <div flex="20">
                                            <md-button class="md-warn">Delete</md-button>
                                        </div>
                                    </div>
                                </div>
                            </md-list-item>
                        </md-list>

                    </md-card>

                    <md-button>Refresh</md-button>

                </md-card-content>

            </md-card>

        </div>
        <div flex="10"></div>

    </div>

    <script src="js/app.js"></script>
    </body>
</html>
