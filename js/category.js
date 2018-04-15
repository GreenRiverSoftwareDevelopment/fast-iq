 console.log("Hello.");
$('document').ready(function() {
   
    var summary_view = document.getElementById("summary-view");
				summary_view.style.display = "none";
				
				function updateUnits() {
				  var cat_select = document.getElementById("category_select");
				  var subcat_select = document.getElementById("unit_select");
		  
				  var cat_id = cat_select.options[cat_select.selectedIndex].value;
		  
				  var url = './grabUnits/' + cat_id;
				  console.log(cat_id);
					
				  var xhr = new XMLHttpRequest();
				  xhr.open('GET', url, true);
				  xhr.onreadystatechange = function () {
				   
					  //cat_select.innerHTML = xhr.responseText;
					  subcat_select.innerHTML = xhr.responseText;
					  console.log(xhr.responseText);
					  if(summary_view.style.display === "block")
					  {
						summary_view.style.display = "none";
					  }
					  $('#collapseOne').collapse('show');
					  //subcat_select.style.display = 'inline';
					
				  };
				  xhr.send();
				}
		  
				var cat_select = document.getElementById("category_select");
				cat_select.addEventListener("change", updateUnits);
				
				
				function updateExcercise() {
				  var unit_select = document.getElementById("unit_select");
				  var exercise_select = document.getElementById("excercise_select");
				  
				  var unit_id = unit_select.options[unit_select.selectedIndex].value;
		  
				  var url = './grabExercise/' + unit_id;
				  console.log(unit_id);
					
				  var xhr = new XMLHttpRequest();
				  xhr.open('GET', url, true);
				  xhr.onreadystatechange = function () {
				   
					  //cat_select.innerHTML = xhr.responseText;
					  exercise_select.innerHTML = xhr.responseText;
					  console.log(xhr.responseText);
					  if(summary_view.style.display === "block")
					  {
						summary_view.style.display = "none";
					  }
					  
					  
					 //subcat_select.style.display = 'inline';
					
				  };
				  xhr.send();
				}
		  
				var unit_select = document.getElementById("unit_select");
				unit_select.addEventListener("change", updateExcercise);
				
				
				//Summary
				function updateSummary() {
				  var excercise_select = document.getElementById("excercise_select");
				  var summary_select = document.getElementById("collapseOne");
		  
		
				var summary_view = document.getElementById("summary-view");
				
				  var summary_id = excercise_select.options[excercise_select.selectedIndex].value;
		  
				  var url = './summaryExercise/' + summary_id;
				  console.log(summary_id);
					
				  var xhr = new XMLHttpRequest();
				  xhr.open('GET', url, true);
				  xhr.onreadystatechange = function () {
				   
					//cat_select.innerHTML = xhr.responseText;
					summary_select.innerHTML = xhr.responseText;
					console.log(xhr.responseText);
					if(summary_view.style.display === "none")
					  {
						
						summary_view.style.display = "block";
					  }
					  
					//  if(summary_view.style.display === "none")
					//  {
					//	summary_view.style.display = "block";
					//  }
					 //subcat_select.style.display = 'inline';
					
				  };
				  xhr.send();
				}
		  
				var unit_select = document.getElementById("excercise_select");
				unit_select.addEventListener("change", updateSummary);
				
				
				//Video
				function updateVideo() {
				  var excercise_select = document.getElementById("excercise_select");
				  var video_select = document.getElementById("collapseTwo");
				
				  var video_id = excercise_select.options[excercise_select.selectedIndex].value;
				
				  var url = './videoExercise/' + video_id;
				  console.log(video_id);
					
				  var xhr = new XMLHttpRequest();
				  xhr.open('GET', url, true);
				  xhr.onreadystatechange = function () {
				   
					  //cat_select.innerHTML = xhr.responseText;
					  video_select.innerHTML = xhr.responseText;
					  console.log(xhr.responseText);
					 //subcat_select.style.display = 'inline';
					
				  };
				  xhr.send();
				}
				
				//Questions
				function updateQuestions() {
				  var excercise_select = document.getElementById("excercise_select");
				  var question_select = document.getElementById("collapseThree");
		  
				  var question_id = excercise_select.options[excercise_select.selectedIndex].value;
					
				  
		  
				  var url = './questionsExercise/' + question_id;
				  console.log(question_id);
					
				  var xhr = new XMLHttpRequest();
				  xhr.open('GET', url, true);
				  xhr.onreadystatechange = function () {
				   
					  //cat_select.innerHTML = xhr.responseText;
					  question_select.innerHTML = xhr.responseText;
					  console.log(xhr.responseText);
					 //subcat_select.style.display = 'inline';
					
				  };
				  xhr.send();
				}
				
				//Picture
				function updatePicture() {
				  var excercise_select = document.getElementById("excercise_select");
				  var picture_select = document.getElementById("collapseFour");
		  
				  var picture_id = excercise_select.options[excercise_select.selectedIndex].value;
		  
				  var url = './pictureExercise/' + picture_id;
				  console.log(picture_id);
					
				  var xhr = new XMLHttpRequest();
				  xhr.open('GET', url, true);
				  xhr.onreadystatechange = function () {
				   
					  //cat_select.innerHTML = xhr.responseText;
					  picture_select.innerHTML = xhr.responseText;
					  //console.log(xhr.responseText);
					 //subcat_select.style.display = 'inline';
					
				  };
				  xhr.send();
				}
		  
				unit_select.addEventListener("change", updateVideo);
				unit_select.addEventListener("change", updateQuestions);
				unit_select.addEventListener("change", updatePicture);
				
    
});
				
				
