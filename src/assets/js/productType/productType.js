const urlParams = new URLSearchParams(window.location.search);
const successParam = urlParams.get('success');

if (successParam === 'true') {
    alert('Tipo de produto cadastrado com sucesso!');
}