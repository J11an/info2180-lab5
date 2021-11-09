window.onload  = function(){

    let btn = document.querySelector("#lookup");
    let text = document.querySelector("#country").value;
    let result = document.querySelector("#result");

    btn.addEventListener("click", function(e) {
        e.preventDefault();
        fetch("world.php?query="+text.value)
            .then(response => {
                if (response.ok) {
                    return response.text()
                } else {
                    return Promise.reject("Error")
                }
            })
            .then(data => {
                result.innerHTML = data;
            })
            .catch(error => console.log("There was an error: " + error));
        
        });
    }

    