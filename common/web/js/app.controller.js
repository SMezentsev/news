var app = angular.module('app',[]);


app.controller('AppController', ['$scope', function($scope) {
alert('sdfsdf')
	
	$scope.getPage = function() {
		console.log('window.pageeeww',window.page)
		return window.page;
	} 
	
	
//	
//	$('.vertical-wrapper').hide();
//	$('.vertical-wrapper').on('hover', {
//		
//		$('.vertical-wrapper').show();
//		
//	});
//	
	
		
}]);