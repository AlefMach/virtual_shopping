const urlParams = new URLSearchParams(window.location.search);
const errorParam = urlParams.get('error');

if (errorParam === 'true') {
    alert('Usuário não encontrado :/');
}