let peopleAll = '';
fetch('../api/people.php')
  .then(response => response.json())
  .then(data => { 
  peopleAll = data;
 	const selectPeople = document.querySelector('#peoples');
 	

	// for (const propiedad in peopleAll){
	// 	console.log(`${propiedad} : ${peopleAll[propiedad]}`);
	// }
	});

