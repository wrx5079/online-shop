let blocktabs = document.querySelector('.label-tabs');
let tabs1 = document.querySelector('.tabs-content-1');
let tabs2 = document.querySelector('.tabs-content-2');


blocktabs.onclick = function(e){
	
	for(let i = 0; i < blocktabs.children.length; i++){

		blocktabs.children[i].classList.remove('active1');
	}
	
	e.target.classList.add('active1');
	console.log(e);
	if(e.target.title == "Вкладка 1" ){
       // console.log("вкладка 1");
       tabs1.classList.add('active-2'); 
	} 
	if (e.target.title == "Вкладка 2"){
		tabs1.classList.remove('active-2');
       	tabs2.classList.add('active-2');
       	
	}
	else{
		tabs2.classList.remove('active-2');
	}
	
}	
