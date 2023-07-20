

const keyword = document.querySelector("#keyword");
const content = document.querySelector(".container");

keyword.addEventListener("input", () => {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange= () =>{
        if(xhr.readyState == 4 && xhr.status == 200){
            content.innerHTML = xhr.responseText;
        }
    }

    xhr.open("GET", "../ajax/data.php?keyword=" + keyword.value,true);
    xhr.send();
})