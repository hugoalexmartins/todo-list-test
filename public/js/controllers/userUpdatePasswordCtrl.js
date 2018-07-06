/*global angular */

/**
 * The controller:
 * (documentation)
 *
 */
angular.module('todomvc')
	.controller('userUpdatePasswordCtrl',function UserUpdatePasswordCtrl($scope, $http, userStorage) {
		'use strict';
    
    
    $scope.passwordUpdate = function(route){
      if (!$scope.form.$valid){
        return false;
      }
      userStorage.put($scope.form.data).then(function(resp){
        if(resp.success == true)
        {
          $scope.form.data = {};
          $scope.confirm = null;
          $scope.form.success = true;
          $scope.form.$setPristine();
          $scope.form.$setUntouched();
        }else{
          if(resp.errors.length){
            $scope.form.old.$error.passwordusermatch = true;
          }  
        }
      });
    }
	})
  .directive('equalWith', function($parse) {
      return {
          require: 'ngModel',
          scope: { equalWith: '&'},
          link: function(scope, elem, attrs, ctrl) {
              ctrl.$validators.equalWith = function (modelValue) {
                  return (modelValue === scope.equalWith())
              }
              scope.$watch(scope.equalWith, function(value){
                ctrl.$validate()
              })
          }
      }
  });