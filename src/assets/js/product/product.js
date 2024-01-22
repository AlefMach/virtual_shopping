
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

function addToCart(productId, tax_rate, price) {
    $.ajax({
        url: '/products/add-to-cart',
        data: {
            productId: productId,
            tax_rate: tax_rate,
            price: price
        },
        type: 'POST',
        success: function (data) {
            alert('Produto adicionado ao carrinho com sucesso!');
        },
        error: function (error) {
            alert('Erro ao adicionar o produto ao carrinho.');
        }
    });
}