@extends('layouts.app')

@section('content')
<div class="container" ng-app="dist">
    <div class="row" ng-controller="mainCtrl">
        <div class="col-md-10 col-md-offset-1" ng-init="init({{ Auth::user()->companyId }})">
            <div class="panel panel-default">
                <div class="panel-heading">Form</div>
                <div class="panel-body">
                    <form name="myForm" class="form-horizontal" novalidate>

                        <div class="form-group required" ng-class="{'has-error': myForm.name.$touched && myForm.name.$invalid}">
                            <label for="name" class="col-md-4 control-label">Field1</label>
                            <div class="col-md-6">
                                <input id="name"
                                       type="text"
                                       class="form-control"
                                       name="name"
                                       ng-model="name"
                                       ng-pattern="/^[A-Z a-z]+$/"
                                       required />

                                <div ng-show="myForm.$submitted || myForm.name.$touched">
                                    <span ng-show="myForm.name.$error.required" class="help-block">
                                        <strong>Enter your name</strong>
                                    </span>
                                    <span ng-show="myForm.name.$error.pattern" class="help-block">
                                        <strong>Enter valid name</strong>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group required" ng-class="{'has-error': myForm.companyId.$touched && myForm.companyId.$invalid}">
                            <label for="companyId" class="col-md-4 control-label">Field2</label>
                            <div class="col-md-6">
                                <input id="companyId"
                                       type="number"
                                       class="form-control"
                                       name="companyId"
                                       ng-model="companyId"
                                       ng-pattern="/^[0-9]+$/"
                                       required />

                                <div ng-show="myForm.$submitted || myForm.companyId.$touched">
                                    <span ng-show="myForm.companyId.$error.required" class="help-block">
                                        <strong>Enter your company ID</strong>
                                    </span>
                                    <span ng-show="myForm.companyId.$error.pattern" class="help-block">
                                        <strong>Enter valid company ID</strong>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" ng-click="register()">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Deal Name</th>
                            <th>Owner</th>
                            <th>Open</th>
                            <th>Won</th>
                            <th>Lost</th>
                            <th>Comments</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="deal in deals">
                            <td>@{{ deal.properties.dealname.value }}</td>
                            <td>@{{ deal.properties.dealname.sourceId}}</td>
                            <td><input type="radio" ng-model="dealStatus" value="Open" /></td>
                            <td><input type="radio" ng-model="dealStatus" value="Won" /></td>
                            <td><input type="radio" ng-model="dealStatus" value="Lost" /></td>
                            <td><textarea ng-model="comments" maxlength="90" ng-trim="true"></textarea></td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" ng-click="send()">
                                <i class="fa fa-paper-plane"></i> Send
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
