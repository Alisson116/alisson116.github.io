const login = document.getElementById("login") 
const cadastro = document.getElementById("cadastro")
const conectar = document.getElementById("conectar")
const nome = document.getElementById("nome")

fetch("http://alisson116.wuaze.com/verificar_login.php")
.then((response) => response.json())
.then((data) => {
    if (data.logado)
    {
        nome.innerText = data.usuario;
        conectar.style.display = "none";
    }
    else{
        nome.innerText = "";
        conectar.style.display = "block";
    }
}
);

