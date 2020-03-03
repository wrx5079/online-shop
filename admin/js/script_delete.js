//удаление категорий

let cat_delete = document.querySelector('#delete-cat');
let value1 = document.querySelector('#value1');
let id = document.querySelector('#id')
cat_delete.onclick = function(){
	let select = document.querySelector('#cat_type').getElementsByTagName('option');
	

	for (let i = 0; i < select.length; i++){
		if(select[i].selected){
			let a = select[i].value;
			value1.value = a;
		}
	}
}	


// $('.delete-cat').click(function() {

// 	let select = $("#cat_type option:selected").val();

// 	if(!select)
// 	{
// 	$("#cat_type").css("borderColor","#f4a4a4");

//     }
//     else
//     {
//         $.ajax({
// 		method: "POST",
// 		url: "./actions/delete_category.php",
// 		data: "id=" + select,
// 		dataType: "html",
// 		cache: false,
// 		success: function(data) {

// 			if (data == "delete")
// 			{
// 				$("#cat_type option:selected").remove();
// 			}
// 		}
// 		            });
// 	 }

// });

	
	

// cache: false,




