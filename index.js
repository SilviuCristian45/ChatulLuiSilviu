let username;
let pass;
setInterval(update_chat,250);
function update_chat(){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("msg_container").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "messages.php", true);
      xhttp.send();
}

function mesajLogare() {
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("welcome").innerHTML = this.responseText;
      }
    };
    username  = document.getElementById("utilizator").value;
    pass = document.getElementById("parola").value;
    if(username && pass){
    xhttp.open("GET","login.php"+"?"+"username="+username+"&"+"password="+pass, true);
    xhttp.send();
    }
    else alert("Eroare : nu ai completat unul dintre campurile 'parola' sau 'Nume de utilizator' ");
}

function trimiteMesaj()
{
  let xhttp = new XMLHttpRequest();
  let mesaj = document.getElementById("casetaText").value;
  let estelogat = document.getElementById("welcome").innerHTML;
  let mesaj_nelogare = "ai gresit user-ul sau parola";
  let mesaj_default = "Salut";
  console.log(estelogat);
    if(estelogat.trim() == mesaj_nelogare.trim() || estelogat.trim() == mesaj_default.trim())
      alert("trebuie sa fi logat ca sa trimiti mesaje ");
      else{
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {

          }
        };
        xhttp.open("GET", "sendmsg.php"+"?"+"username="+String(username)+"&"+"msg="+String(mesaj), true);
        xhttp.send();
      }
}
