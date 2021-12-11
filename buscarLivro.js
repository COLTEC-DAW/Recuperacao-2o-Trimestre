var buttonUp = () => {
    const input = document.querySelector("#searchInput");
    const cards = document.getElementsByClassName("card-box");

    $('#divResultado').removeClass("d-none");
    let filter = input.value.toLowerCase();
    for (let i = 0; i < cards.length; i++) {
        let title = cards[i].querySelector(".card-title");
        let authorOrPublishing = cards[i].querySelector(".card-header");
        if (title.innerText.toLowerCase().indexOf(filter) > -1 || authorOrPublishing.innerText.toLowerCase().indexOf(filter) > -1 ) {
            cards[i].classList.remove("d-none")
        } else {
            cards[i].classList.add("d-none")
        }
    }
    var numCartasRemovidas = $('.card-box.d-none').length;
    var numTotalCartas = $('.card-box').length;
    var numResultados = numTotalCartas - numCartasRemovidas;
    $('#resultado').text(numResultados);
}