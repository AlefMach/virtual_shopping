
function openImage(imagePath) {
    window.open(imagePath, '_blank');
}

function formatDateTime(dateTimeString) {
    const date = new Date(dateTimeString);

    date.setHours(date.getHours() - 3);

    const options = { day: 'numeric', month: 'numeric', year: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' };
    const formattedDateTime = date.toLocaleString('pt-BR', options);
    return formattedDateTime;
}

function addToCart(productId) {
    window.location.href = '/cart';
}