(async function(){
	let response = await fetch(`${window.appData.apiRoot}/todos`, {
		headers: {
			'Accept': 'application/json'
		}
	});
	
	let data = await response.json();
	console.log(data);

})();
