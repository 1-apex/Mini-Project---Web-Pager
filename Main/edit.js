function submit()
{
    alert("Webpage updated successfully!");

    let myweb = document.getElementById("my_web")
    let wn1 = document.getElementById("wn1").value;

    myweb.innerText = wn1;
}