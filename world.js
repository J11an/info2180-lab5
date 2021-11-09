window.onload = function() {

    let btn = document.querySelector("#lookup");
    let filler  = document.querySelector("#country");
    let result = document.querySelector("#result");

    btn.addEventListener("click", function(e) {

        e.preventDefault();
        fetch("world.php?country="+filler.value)

            .then(response => {
                if (response.ok) {
                    return response.text()
                } else {
                    return Promise.reject("Error!")
                }
            })
            .then(data => {
                result.innerHTML = data;
            })
            .catch(error => console.log(error));

    });
} 