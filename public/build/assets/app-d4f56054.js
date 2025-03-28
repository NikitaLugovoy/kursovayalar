(async function(){let a=await(await fetch(`${window.appData.apiRoot}/todos`,{headers:{Accept:"application/json"}})).json();console.log(a)})();
