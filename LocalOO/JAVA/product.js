let currentOrder = [];
let totalAmount = 0;

document.querySelectorAll('.add-to-order').forEach(button => {
    button.addEventListener('click', function() {
        const productId = this.getAttribute('data-id');
        const productName = this.getAttribute('data-name');
        const productPrice = parseFloat(this.getAttribute('data-price'));

        currentOrder.push({ id: productId, name: productName, price: productPrice });
        totalAmount += productPrice;

        updateOrderList();
    });
});

function updateOrderList() {
    let orderList = document.getElementById('order-list');
    orderList.innerHTML = '';

    currentOrder.forEach(item => {
        orderList.innerHTML += `<p>${item.name} - ₱${item.price}</p>`;
    });

    document.getElementById('total-amount').textContent = totalAmount.toFixed(2);
}

document.querySelector('.pay-now').addEventListener('click', function() {
    const orderData = JSON.stringify(currentOrder);

    fetch('process_order.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ order: orderData, total: totalAmount })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Order placed successfully!');
            currentOrder = [];
            totalAmount = 0;
            updateOrderList();
        }
    });
});
