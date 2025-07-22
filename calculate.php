<!doctype HTML>

<html>
    <head>
        <title>Calculate</title>
        <link rel = "stylesheet" href = "style.css">
        <script>
            function validate(){
                let errorCredits = document.getElementById('errorCredits');
                let errorResidency = document.getElementById('errorResidency');

                let text = document.getElementById("CR").value;
                let creditHours = parseInt(text);
                let isValid = true
                if (isNaN(creditHours)){
                    errorCredits.innerHTML = "Please input a valid number";
                    isValid = false;
                }
                else{
                    errorCredits.innerHTML = "";
                }

                let ischosen = false;
                let radioButtons = document.querySelectorAll("input[name='residency']");
                for (let button of radioButtons){
                    if (button.checked){
                        ischosen = true;
                        break;
                    }
                }

                if (!ischosen){
                    errorResidency.innerHTML = "Please select residency";
                    isValid = false;
                }
                else{
                    errorResidency.innerHTML = "";
                }

                return isValid;
            }

            var http = createRequestObject();
			
			function ProcessForm(){
				if(validate()){
					MakeAjaxCall();
				}
                else{
                }
			}

			function createRequestObject() {
				var ro;
				var browser = navigator.appName;
				if(browser == "Microsoft Internet Explorer"){
					ro = new ActiveXObject("Microsoft.XMLHTTP");
				}else{
					ro = new XMLHttpRequest();
				}
				return ro;
			}


			function MakeAjaxCall() {
				url="resultAjax.php?";
				credits=document.getElementById("CR").value;
				residency = document.querySelector('input[name="residency"]:checked').value;
				url=url+"credits="+ credits + "&residency=" + residency;
                console.log(url);
				http.open('get', url);
				http.onreadystatechange = handleResponse;
				http.send(null);
			}

			function handleResponse() {
				if(http.readyState == 4){
				
					document.getElementById("results").innerHTML=http.responseText;
				}
			}
        </script>
    </head>
    <body>
        <?php
            include "header.php";
            include "navigation.php";
        ?>

        <form method="post" action="result.php" onsubmit="return validate();">
            <div class="center">
                <p>How many credit hours will you be taking?</p>
                <input type="text" name="credits" id="CR">
                <p>Choose residency status:</p>
                <div class="radio">
                    <div class="right">
                        <label for="IC">In County</label>
                        <input name="residency" type="radio" id="IC" value="IC">
                    </div>
                    <div class="right">
                        <label for="OC">Out of County</label>
                        <input name="residency" type="radio" id="OC" value="OC">
                    </div>
                    <div class="right">
                        <label for="OS">Out of state</label>
                        <input name="residency" type="radio" id="OS" value="OS">
                    </div>
                </div><input  type="button" value="Calculate" name="btnCalculate"  onclick="ProcessForm();">
                <p id='errorCredits'></p>
                <p id='errorResidency'></p>
				<span id="errors"></span>
                <span id="results" class="center"></span>
            </div>
        </form>

        <?php
            include "footer.php";
        ?>
    </body>
</html>