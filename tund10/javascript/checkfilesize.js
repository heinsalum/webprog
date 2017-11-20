window.onload = function(){
	document.getElementById("submitPhoto").disabled = true;
	document.getElementById("fileToUpload").addEventListener("change", checkSize);
}

function checkSize(){
	var fileToUpload = document.getElementById("fileToUpload").files[0];
	if (fileToUpload.size <= 2097152){
		document.getElementById("submitPhoto").disabled = false;
		document.getElementById("submitPhoto").innerHTML = "";
	} else {
		document.getElementById("submitPhoto").innerHTML = "Valitud fail on liiga suur! Valige pilt mahuga kuni 2 MB!";
		document.getElementById("submitPhoto").disabled = true;
	}
}