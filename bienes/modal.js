const btn_close = document.querySelector('.btn_close');
btn_close.addEventListener('click', function(e) {
	document.querySelector('.alert').classList.toggle('hidden');	
});
