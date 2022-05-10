const btn_close = document.querySelector('#btn_close');

btn_close.addEventListener('click' ,  (e)=>{
	document.querySelector('.modal_form').classList.toggle('hidden');	
})
