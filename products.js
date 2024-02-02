
    function openCart() {
        document.getElementById('cart-popup').style.display = 'block';
    }

    function closeCart() {
        document.getElementById('cart-popup').style.display = 'none';
    }

    document.querySelectorAll('.add-cart').forEach(item => {
        item.addEventListener('click', event => {
            const product = event.target.parentElement;
            const productName = product.querySelector('h3').innerText;
            const productPrice = parseFloat(product.querySelector('.price').innerText.replace('$', ''));
    
            const li = document.createElement('li');
            li.className = 'cart-item';
            li.innerHTML = `
                <img src="${product.querySelector('.product-images').src}" alt="${productName}" width="50">
                <span>${productName} - $${productPrice.toFixed(2)}</span>
            `;
    
            document.getElementById('cart-items').appendChild(li);
    
            openCart();
    
            const totalPrice = Array.from(document.querySelectorAll('.cart-item'))
                .map(item => parseFloat(item.textContent.match(/\$\d+\.\d+/)[0].replace('$', '')))
                .reduce((total, price) => total + price, 0);
    
            document.getElementById('total-price').innerText = `Total: $${totalPrice.toFixed(2)}`;
        });
    });
    
    document.querySelector('.checkout-btn').addEventListener('click', () => {
        alert('Thank you for your purchase!');
        closeCart();
    });
    

const cartPopup = document.getElementById('cart-popup');

let initialX;
let initialY;
let offsetX = 0;
let offsetY = 0;
let isDragging = false;

function handleMouseDown(e) {
    isDragging = true;
    initialX = e.clientX - offsetX;
    initialY = e.clientY - offsetY;
}

function handleMouseMove(e) {
    if (isDragging) {
        e.preventDefault();
        offsetX = e.clientX - initialX;
        offsetY = e.clientY - initialY;
        setTranslate(offsetX, offsetY, cartPopup);
    }
}

function handleMouseUp() {
    isDragging = false;
}

function setTranslate(xPos, yPos, el) {
    el.style.transform = `translate(${xPos}px, ${yPos}px)`;
}

cartPopup.addEventListener('mousedown', handleMouseDown);
document.addEventListener('mousemove', handleMouseMove);
document.addEventListener('mouseup', handleMouseUp);

