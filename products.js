

document.addEventListener('DOMContentLoaded', function() {
    const cartIcon = document.getElementById('cart-icon');

    
    cartIcon.addEventListener('click', function() {
        
        window.location.href = 'loginform.php';
    });

   



document.addEventListener('DOMContentLoaded', function() {
    const cartIcon = document.getElementById('cart-icon');
    const cartPopup = document.getElementById('cart-popup');
    const cartItems = document.getElementById('cart-items');
    const totalPrice = document.getElementById('total-price');

    
    const products = [
        { name: 'Product 1', price: 10, image: 'product1.jpg' },
        { name: 'Product 2', price: 20, image: 'product2.jpg' }
       
    ];

   
    let cart = [];

    
    function updateCartPopup() {
        cartItems.innerHTML = '';
        let total = 0;

        cart.forEach(item => {
            const product = products.find(p => p.name === item.name);
            if (product) {
                const cartItem = document.createElement('div');
                cartItem.classList.add('cart-item');
                cartItem.innerHTML = `
                    <img src="${product.image}" alt="${product.name}" style="width: 50px; height: 50px;">
                    <span>${product.name} - $${product.price.toFixed(2)}</span>
                `;
                cartItems.appendChild(cartItem);
                total += product.price;
            }
        });

        totalPrice.textContent = `Total: $${total.toFixed(2)}`;
    }


    cartIcon.addEventListener('click', function() {
        updateCartPopup();
        cartPopup.style.display = 'block';
    });

   
    document.addEventListener('click', function(event) {
        if (event.target !== cartIcon && !cartPopup.contains(event.target)) {
            cartPopup.style.display = 'none';
        }
    });

    function addToCart(productName) {
        cart.push({ name: productName });
        updateCartPopup();
    }

    const productButtons = document.querySelectorAll('.add-to-cart');
    productButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productName = this.dataset.product;
            addToCart(productName);
        });
    });
});


});


