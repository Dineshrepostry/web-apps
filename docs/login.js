			localStorage.setItem("name","user");
			function Nameassign(){
			var nm=document.getElementById("name").value;
			var age=document.getElementById("age").value;
			if(nm.length==0 && age<=0){
				alert("enter name and age");
				return false;
			}
			else if(age<=0){
				alert("Enter a valid age")
				return false;
			}
			else{
				localStorage.setItem("name",nm);
				window.location.href = "http://www.w3schools.com";
			}
			}
			
			