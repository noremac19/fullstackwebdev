// let boxes = document.querySelectorAll("#switch a")
// console.log(boxes)
// for(let i=0; i<boxes.length; i++){
// 	boxes[i].onclick = function(event) {
// 		event.preventDefault()

// 		console.log(boxes)

// 		for(let j=0; j<boxes.length;j++){
// 			if(boxes[j].classList.contains("bold")){
// 				boxes[j].classList.remove("bold")
// 			}
			
// 		}

// 		this.classList.add("bold")

// 	}
// }

function ajax(endpoint){
	let httpRequest = new XMLHttpRequest()

			
	// .open() opens a new http request. two parameters 1) method 2) endpoint
	httpRequest.open("GET", endpoint)
	
	// .send() sends a request to the endpoint
	httpRequest.send()

			

	// create an event handler so that when the itunes doe respond we make it run some code
	httpRequest.onreadystatechange = function(){

		//console.log(httpRequest.readyState)

		// ready state equals 4 when we get a response from itunes
		if(httpRequest.readyState == 4){
			// check if we got a success or error message
			if(httpRequest.status == 200){
				// 200 means success. we got something back
				// .responseText will give us whatever itunes sent back to us in a string
				//console.log(httpRequest.responseText)
				displayResults(httpRequest.responseText)
			}else{
				// anything other than 200 is an error
				console.log("error")
				console.log(httpRequest.status)
				alert("Error")
			}
		}
	}
}


			

let endpoint = "https://cricapi.com/api/matchCalendar?apikey=UEGB64RXkyf72zb6pORlD4CEr0j2"
ajax(endpoint)




function displayResults(results){

	
	let convertedResults = JSON.parse(results)

		

	console.log(convertedResults)


	




	

	for(let i=0;i<convertedResults.data.length;i++){
		let substring = "West Indies"
		let matchname = convertedResults.data[i].name
		if(matchname.includes(substring)){
			let date = convertedResults.data[i].date
			var str = matchname.split(", ")

			let temp2 = document.createElement("div")
			temp2.classList.add("wait")

			let temp3 = document.createElement("div")
			temp3.classList.add("row-flexbox")

			let temp4 = document.createElement("div")
			temp4.classList.add("team")

			let temp5 = document.createElement("img")
			temp5.src = "https://s.ndtvimg.com/images/entities/300/west-indies-women-cricketteams106359-west-indies-women-teamprofile.png"
			//
			
			let temp6 = document.createElement("div")
			temp6.innerHTML = "West Indies"

			let temp7 = document.createElement("div")
			temp7.classList.add("team")

			let temp8 = document.createElement("img")
			temp8.src = "https://upload.wikimedia.org/wikipedia/en/thumb/c/ce/England_cricket_team_logo.svg/1200px-England_cricket_team_logo.svg.png"
			//
			
			let temp9 = document.createElement("div")
			temp9.innerHTML = "England"
			
			let temp10 = document.createElement("div")
			temp10.innerHTML = str[1]

			let temp11 = document.createElement("div")
			temp11.innerHTML = date
			////////////////////////////////////////////
			temp4.appendChild(temp5)
			temp4.appendChild(temp6)

			temp7.appendChild(temp8)
			temp7.appendChild(temp9)
			
			////////////////////////////
			temp3.appendChild(temp4)
			temp3.appendChild(temp7)
			////////////////////////////////
			temp2.appendChild(temp3)
			temp2.appendChild(temp10)
			temp2.appendChild(temp11)
			document.querySelector(".results").appendChild(temp2)
		}
	}
}









let replies = document.querySelectorAll(".expand");
console.log(replies)

for(let i = 0; i < replies.length; i++) {
	replies[i].onclick = function() {
		
		console.log(this.nextElementSibling)
		$(this).next().slideToggle();
		
	}
}


console.log(".expand2")

document.querySelector(".expand2").onclick = function(){
	console.log(this.nextElementSibling)
	
	$(this).next().slideToggle();
}








