let select_links = document.querySelector('#select-links');
let onclick_link = document.getElementById('onclick_link');
select_links.onclick = function () {
onclick_link.style.display = "flex";
}
window.onclick = function(event){
	if (event.target == select_links ){
		onclick_link.style.display = "flex";
	}
	else{
		onclick_link.style.display = "none";
	}
	
}



