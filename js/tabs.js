// document.querySelector('.tabs_nav').onclick = function(){
// 	function ftabs(event){
// 		console.log(event);
// 	}
// }


//   e.target.classList.add('active');
  
// }
let wrapObj = document.querySelector('.label-cont');
let form1 = document.querySelector('.form1');
let form2 = document.querySelector('.form2');


wrapObj.onclick = function(e){
	
	for(let i = 0; i < wrapObj.children.length; i++){

		wrapObj.children[i].classList.remove('active');
	}
	
	e.target.classList.add('active');
	console.log(e);
	if(e.target.title == "Вкладка 1" ){
       // console.log("вкладка 1");
       form1.classList.add('active-2'); 
	} 
	if (e.target.title == "Вкладка 2"){
		form1.classList.remove('active-2');
       	form2.classList.add('active-2');
       	
	}
	else{
		form2.classList.remove('active-2');
	}
	
}
	




// document.querySelector('.form-container').onclick = function(){
		
// 		console.log(this);
// }