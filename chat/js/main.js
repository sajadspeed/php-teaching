var name = "";

var object = {
	messages: [
		{
			message: "Hello",
			fullName: "Sajad Momeni",
			date: "2021/5/2"
		},
		{
			message: "Hello",
			fullName: "Sajad Momeni",
			date: "2021/5/2"
		},
		{
			message: "Hello",
			fullName: "Sajad Momeni",
			date: "2021/5/2"
		}
	]
}

$("document").ready(function(){
	loadMessages();
})

$("#message_input").on('keyup', function(e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
        sendMessage();
    }
});

function loadMessages() {
	$.ajax({
		url: "ajax/get_messages.php",
		success: function(response) {
			var responseParse = JSON.parse(response);
			var result = "";

			for (const message of responseParse) {
				result += '<div class="message">'+
								'<span>'+message.name+'</span>' + 
								'<p>'+message.message+'</p>' + 
							'</div>'	
			}

			$("#chat_container").html(result);
		},
		error: function(error) {
			console.log("Error:", error)
		}
	})
	
    //$("#chat_container").load("ajax/get_messages.php");
}

function sendMessage(){
	if(name == "")
		name = prompt("Please insert your name:");
		
	var message = $("#message_input").val();

	$.ajax({
		url: "ajax/add_messages.php",
		type: "POST",
		data: {name: name, message: message},
		success: function(response) {
			loadMessages();
		},
		error: function(error) {
			console.log("Error:", error)
		}
	})

	/*
	$.post("ajax/add_messages.php", {name: name, message: message}, function(result){
		if(result == 0)
			alert("Problem in operation");
	});
	*/

	$("#message_input").val("");
	$("#message_input").focus();
}

setInterval(function(){
	loadMessages()
}, 500);
