angular.module('todomvc')
	.factory('userStorage', function ($http, $resource, apiToken) {
		'use strict';
    
		// Add Headers to Authenticate in API
    $http.defaults.headers.common['Authorization'] = 'Bearer ' + apiToken;
    
    var store = {
			user: {},
			api: $resource('/api/v1/user/:id', null,
				{
					update: { method:'PUT' },
				}
			),
			get: function () {
				return store.api.query(function (resp) {
					angular.copy(resp, store.todos);
				});
			},
			put: function (data) {
				return store.api.update({}, data)
					.$promise;
			}
		};

		return store;
	});