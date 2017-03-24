<?php
$req = $_GET['req'];

?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript">

		var accessToken = "ab9ae3bb3f994e35a0f1b667f374665d";
		var baseUrl = "https://api.api.ai/v1/";
        var synth = "";

		$(document).ready(function() {
            var text = $("#req").val();
            setInput(text);
			$.ajax({
				type: "POST",
				url: baseUrl + "query?v=20150910",
				contentType: "application/json; charset=utf-8",
				dataType: "json",
				headers: {
					"Authorization": "Bearer " + accessToken
				},
				data: JSON.stringify({ query: text, lang: "en", sessionId: "minthings" }),

				success: function(data) {
                    $("#response").html(JSON.stringify(data, undefined, 2));
				},
				error: function() {
					$("#response").html("Internal Server Error");
				}
			});
            /*
			$("#input").keypress(function(event) {
				if (event.which == 13) {
					event.preventDefault();
					send();
				}
			});
			$("#rec").click(function(event) {
				switchRecognition();
			});
            */
		});

        /*
		var recognition;

		function startRecognition() {
			recognition = new webkitSpeechRecognition();
			recognition.onstart = function(event) {
				updateRec();
			};
			recognition.onresult = function(event) {
				var text = "";
			    for (var i = event.resultIndex; i < event.results.length; ++i) {
			    	text += event.results[i][0].transcript;
			    }
			    setInput(text);
				stopRecognition();
			};
			recognition.onend = function() {
				stopRecognition();
			};
			recognition.lang = "en-US";
			recognition.start();
		}
	
		function stopRecognition() {
			if (recognition) {
				recognition.stop();
				recognition = null;
			}
			updateRec();
		}

		function switchRecognition() {
			if (recognition) {
				stopRecognition();
			} else {
				startRecognition();
			}
		}
        */

		function setInput(text) {
			$("#input").val(text);
		}

        /*
		function updateRec() {
			$("#rec").text(recognition ? "Stop" : "Speak");
		}
        */

        /*
		function send() {
			var text = $("#req").val();
			$.ajax({
				type: "POST",
				url: baseUrl + "query?v=20150910",
				contentType: "application/json; charset=utf-8",
				dataType: "json",
				headers: {
					"Authorization": "Bearer " + accessToken
				},
				data: JSON.stringify({ query: text, lang: "en", sessionId: "minthings" }),

				success: function(data) {
					setResponse(data);
				},
				error: function() {
					setResponse("Internal Server Error");
				}
			});
			setResponse("Loading...");
		}

		function setResponse(val) {
            JSON.stringify(val, undefined, 2);
            if (val.result) {
                var say=""; 
                say = val.result.fulfillment.speech;
                
                synth = window.speechSynthesis;
                var utterThis = new SpeechSynthesisUtterance(say);
                //utterThis.lang = "en-US";
                synth.speak(utterThis);
            }
			$("#response").html(say);
		}
        */

	</script>
    <input type="hidden" id="req" value="<?php echo $req; ?>" />
    <p id="response"></p>