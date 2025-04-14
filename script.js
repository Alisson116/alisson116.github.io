const produtos = {
    sofa_promocao : "disponivel",
    sofa : "indisponivel",
    mesa_jantar : "disponivel",
    mesa_madeira : "disponivel",
    kit_cadeiras : "indisponivel",
    estante_madeira : "disponivel",
};
function verificar_disponibilidade(produto) {
    if (produtos[produto] === "disponivel") {
        window.location.href = "comprar.html";
    } else {
        window.location.href = "indisponivel.html";
    }
}