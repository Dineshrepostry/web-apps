function username(){
				document.getElementById("username").innerHTML=localStorage.getItem("name");
			}
function logout(){
				localStorage.setItem("name","user");
			}