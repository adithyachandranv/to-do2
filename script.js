
function addDiv() {
    var input = document.getElementById("input-btn").value;
    if (input.value = true) {
        const div = document.createElement("div");
        div.style.width = "100px";
        div.style.height = "100px";
        div.style.background = "red";
        div.style.color = "white";
        div.innerHTML = input;
        document.body.appendChild(div);
    }

    input.value = "jamama";
}


function buttonpress() {
    var button = document.getElementById("add-btn");
    button.addEventListener("click", addDiv)
}

buttonpress();





