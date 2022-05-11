let peopleAll = '';
fetch('../api/people.php')
  .then(response => response.json())
  .then(data => { 
  peopleAll = data;
 // innerHTLM = 	<option>Person1</option>
 	console.log(peopleAll);
  const selectPeople = document.querySelector('#peoples');
  for (let i = 0; i < peopleAll.length ; i++) {
    selectPeople.innerHTML += `<option>${peopleAll[i].ci} - ${peopleAll[i].full_name} -- ${peopleAll[i].dpto}</option>`;
  }
	
  });