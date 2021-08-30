var tasks = new Array() ; 
function compute(){
	var a = document.getElementById("write");
	var temp = document.getElementById("in").value;  
	var textnode = document.createTextNode(temp); 
	var lis = document.createElement("LI");
	lis.appendChild(textnode); 
	if(textnode.length != 0){ 
		a.appendChild(lis);
		tasks.push(textnode); 
	}
	document.getElementById("in").value = ""; 
	if(tasks.size != 0){
		document.getElementById("notask").style.display = "none" ; 
	}
}

function nxt(){
	if(tasks.length == 0){
		var p = document.getElementById("non") ; 
		document.getElementById("next").value = "Click show next Task!" ; 
		p.innerHTML = "There are no tasks right now , Please add a task" ; 
		document.getElementById("notask").style.display = "block" ; 
	}
	else{
		document.getElementById("write").innerHTML="" ; 
		document.getElementById("next").value = tasks[0].data ; 
		tasks.shift() ; 
		var p = document.getElementById("non") ; 
		p.innerHTML = "" ;
		var w = document.getElementById("write") ; 
		for(var i = 0 ; i<tasks.length ; i++){
			var l = document.createElement("LI") ; 
			l.innerHTML = tasks[i].data  ;
			w.appendChild(l) ; 
		}
	}
}
var input = document.getElementById("in");  
input.addEventListener("keyup" , checkKeyPress , false) ; 
function checkKeyPress(key){
	if(key.keyCode == 13){
		document.getElementById("mybtn").click() ; 
	}
}