var curr=0;
			function Player(SongName){
				var song=document.getElementById("player");
				song.pause;
				/*var songs=["Raja_Raja_Chozan_Naan.mp3","madai_thiranthu.mp3"]
				
				switch(val){
					case 'next': val=1;
								 break;
					case 'prev': val=-1;
								 break;
				};
				curr+=val;
				if(curr<0){
					curr=songs.length-1;
					//console.log(curr)
					}
				else if (curr > (songs.length-1)){
					curr=0;
					}*/
				song.src=SongName;
				console.log(curr);
				song.play;	
            }
			function logout(){
				localStorage.setItem("name","user");
			}
			function username(){
				document.getElementById("username").innerHTML=localStorage.getItem("name");
			}
