const table = document.querySelector("table");

table.addEventListener('click', function(event){
    // console.log(event.target.tagName);
    if (event.target.tagName === "TD"){
        let id = event.target.getAttribute("data-id");
        let form = document.querySelector(`form[data-id="${id}"]`);
        form.submit();
    }
});