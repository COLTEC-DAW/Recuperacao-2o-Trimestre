const getLocalStorageBooks = () => JSON.parse(sessionStorage.getItem('books')) ?? [];
const getLocalStorageSearch = () => JSON.parse(localStorage.getItem('booksResult')) ?? [];

const createRow = (book, place) => {
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${book.NomeObra}</td>
        <td>${book.ResumoObra}</td>
        <td>${book.NomeAutor}</td>
        <td>${book.NomeEditora}</td>
        <td>${book.NumExemplares}</td>
        <td>${book.DataCadastro}</td>
    `;

    document.querySelector(`#${place}`).appendChild(newRow);
}


function BuildTable(books){

    if(document.querySelector('#LivrosContainerHome').hasChildNodes){
        $('#TableHome').DataTable().destroy();
        $('#LivrosContainerHome').innerHTML = '';
    }

    books.forEach(book => {
        createRow(book, 'LivrosContainerHome')
    });

    $('#TableHome').DataTable();
}


function BuildTableSearch(books){
    
    if(document.querySelector('#LivrosContainerSearch').hasChildNodes){
        $('#TableSearch').DataTable().destroy();
        $('#LivrosContainerSearch').innerHTML = '';
    }

    books.forEach(book => {
        createRow(book, 'LivrosContainerSearch')
    });

    $('#TableSearch').DataTable();
}