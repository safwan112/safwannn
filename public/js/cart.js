
document.addEventListener('DOMContentLoaded', () => {
    // cart Menu
    const cartMenu = document.getElementById('cartMenu');
    const divCartContent = document.getElementById('divcartcontent');
    const cartMenuButton = document.getElementById('cartMenuButton');
    const closeCartButton = document.getElementById('closeCartButton');

    // Open cart menu
    cartMenuButton.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent default action
        e.stopPropagation(); // Prevent this click from propagating to the document level
        cartMenu.style.transform = 'translateX(0%)';
        document.body.style.overflow = 'hidden'; // Prevent body from scrolling when cart menu is open
    });

    // Close cart menu via the close button
    closeCartButton.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent default action
        e.stopPropagation(); // Prevent this click from propagating to the document level
        cartMenu.style.transform = 'translateX(100%)';
        document.body.style.overflow = ''; // Allow body to scroll when cart menu is closed
    });

    // close cart menu when clicking outside of it
    cartMenu.addEventListener('click', (e) => {
        if (e.target == cartMenu) {
            cartMenu.style.transform = 'translateX(100%)';
            document.body.style.overflow = ''; // Allow body to scroll when cart menu is closed
        }
    });

    // Prevent scrolling of body when scrolling the cartMenu to its limits
    divCartContent.addEventListener('wheel', function(e) {
        const { deltaY } = e;
        const { scrollTop, scrollHeight, clientHeight } = this;

        if ((scrollTop === 0 && deltaY < 0) || (scrollTop + clientHeight >= scrollHeight && deltaY > 0)) {
            e.preventDefault(); // Prevent scrolling the body when at the top or bottom of the cart menu
        }
    }, { passive: false }); // Disable passive listening to be able to prevent default
});


document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('click', function(e) {
        const target = e.target.closest('.addToCartButton');
        if (target) {
            e.preventDefault();
            // Temporarily remove the button text and show spinner
            const originalButtonText = target.textContent.trim();
            target.innerHTML = '<span class="customSpinner"></span>'; // Adjust the spinner HTML as needed

            // Attempt to fetch the user's login status
            fetch('/login-status')
                .then(response => response.json())
                .then(data => {
                    if (!data.isLoggedIn) {
                        // Handle not logged in
                        target.textContent = originalButtonText; // Restore the original button text
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            iconColor: 'white',
                            customClass: {
                                popup: 'colored-toast',
                            },
                            showConfirmButton: false,
                            timer: 3500,
                            timerProgressBar: true,
                        });

                        Toast.fire({
                            icon: 'error',
                            title: 'يجب عليك تسجيل الدخول لإضافة العناصر إلى سلة التسوق.',
                        });
                    } else {
                        const productId = target.getAttribute('data-product-id');
                        const quantityInput = target.closest('.product').querySelector('.quantity-input');
                        const quantity = quantityInput ? parseInt(quantityInput.getAttribute('data-value'), 10) : 1;

                        fetch('/add-to-cart', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            },
                            body: JSON.stringify({ productId, quantity }),
                        })
                            .then(response => response.json())
                            .then(data => {
                                // Operation completed: Restore original button text
                                target.innerHTML = originalButtonText;

                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    iconColor: 'white',
                                    customClass: {
                                        popup: 'colored-toast',
                                    },
                                    showConfirmButton: false,
                                    timer: 3500,
                                    timerProgressBar: true,
                                });

                                let titleMessage = 'تمت اضافة المنتج بنجاح !';
                                if (data.action && data.action === 'updated') {
                                    titleMessage = 'تم تحديث الكمية بنجاح !';
                                }

                                Toast.fire({
                                    icon: 'success',
                                    title: titleMessage,
                                });
                                fetchCartContents();
                                fetchCartCount();
                                fetchCartItems();

                            })
                            .catch(error => {
                                console.error('Error:', error);
                                // In case of error, also restore the original button text
                                target.innerHTML = originalButtonText;
                            });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    target.innerHTML = originalButtonText; // Ensure text is restored even if there's an error checking login status
                });
        }
    });
});


//get Number Product in Cart

function fetchCartCount() {
    fetch('/cart-count')
        .then(response => response.json())
        .then(data => {
            const cartCountSpans = document.querySelectorAll('#cartCount'); // Select all spans with ID "cartCount"
            cartCountSpans.forEach(span => {
                span.innerText = data.count; // Update the text content of each span
            });
        })
        .catch(error => console.error('Error fetching cart count:', error));
}

// show product in cart
async function fetchCartContents() {
    const url = document.body.getAttribute('data-cart-contents-url');
    const response = await fetch(url);
    const cartItems = await response.json();
    updateButtonDisplay(cartItems);
    updateCartUI(cartItems);
}

function updateCartUI(cartItems) {
    const cartProductsContainer = document.querySelector('#cartProductsContainer');
    const totalAmountElement = document.querySelector('#totalAmount');
    let totalAmount = 0;

    cartProductsContainer.innerHTML = '';

    if (cartItems.length === 0) {
        cartProductsContainer.innerHTML = ' <div class="flex flex-col gap-10 justify-center items-center w-full md:h-[350px] h-[70vh] text-center"><i class="fa-solid fa-cart-shopping text-[#999] text-8xl"></i><p class="text-[#999] text-xl md:text-2xl">سلة المشتريات الخاصة بك فارغة</p></div>';
        totalAmountElement.textContent = '0 SAR';
    } else {
        cartItems.forEach((item) => {
            const productPrice = parseFloat(item.product_price);
            const quantity = parseInt(item.qte, 10);

            if (!isNaN(productPrice) && !isNaN(quantity)) {
                totalAmount += productPrice * quantity;
            }

            const productElement = document.createElement('div');
            productElement.classList.add('flex', 'justify-between', 'items-center');
            productElement.innerHTML = `
            <div class="flex justify-between items-start mb-4 pb-4 border-b border-gray-200">
                <img src="${item.product_image.includes('https://') ? item.product_image + '?' + Date.now() : '/Product_img/' + item.product_image + '?' + Date.now()}" class="md:w-20 w-14 md:h-24 h-16 ml-8" alt="${item.product_name}">
                <div class="flex-grow flex flex-col justify-start items-start gap-2">
                    <span class="md:w-60 w-full line-clamp-1">${item.product_name}</span>
                    <span class="text-red-600 font-bold" dir="ltr">${productPrice.toFixed(2)} SAR</span>
                    <div class="flex justify-between items-center w-[10.5rem] sm:w-[15rem]">
                        <div class="border border-[#999] md:py-1 md:px-2 px-1 rounded-full flex md:gap-4 gap-2 items-center" data-item-id="${item.id}">
                            <i class="fa-solid fa-plus cursor-pointer md:text-lg text-[10px] increase"></i>
                            <span class="md:text-lg text-[10px] quantity">${quantity}</span>
                            <i class="fa-solid fa-minus cursor-pointer md:text-lg text-[10px] decrease"></i>
                        </div>
                        <i class="fa-solid fa-trash border border-red-400 text-red-400 hover:bg-red-400 hover:text-white p-2 rounded-full cursor-pointer md:hover:scale-110 transition-all"></i>
                    </div>
                </div>
            </div>
        `;

        cartProductsContainer.appendChild(productElement);

            // Add event listeners for increase and decrease buttons
            productElement.querySelector('.increase').addEventListener('click', () => changeQuantity(item.id, true));
            productElement.querySelector('.decrease').addEventListener('click', () => changeQuantity(item.id, false));


            const trashIcon = productElement.querySelector('.fa-trash');
            if (trashIcon) {
                trashIcon.addEventListener('click', function () {
                    removeItemFromCart(item.id); // Assuming item.id is the unique identifier for the cart item
                });
            }

        });

        totalAmountElement.textContent = `${totalAmount.toFixed(2)} SAR`;
    }
}

async function changeQuantity(itemId, increase) {
    // Show the spinner overlay
    document.getElementById('spinner-overlay').classList.remove('hidden');
    // Apply blur effect to the content behind the spinner
    document.getElementById('contentToBlur').style.filter = 'blur(8px)';

    try {
        const response = await fetch('/update-cart-quantity', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // For Laravel CSRF protection
            },
            body: JSON.stringify({
                itemId: itemId,
                increase: increase
            })
        });

        const data = await response.json();
        console.log(data);
        // Refresh your cart UI here if needed
    } catch (error) {
        console.error('Error:', error);
    } finally {
        setTimeout(() => {
            // Hide the spinner overlay and remove blur effect from the content
            document.getElementById('spinner-overlay').classList.add('hidden');
            document.getElementById('contentToBlur').style.filter = 'none';
        }, 500); // Adjust timeout as needed

        fetchCartContents();
        fetchCartCount();
        fetchCartItems();

    }
}




async function removeItemFromCart(itemId) {
    // Show the spinner overlay
    document.getElementById('spinner-overlay').classList.remove('hidden');
    // Apply blur effect to the content behind the spinner
    document.getElementById('contentToBlur').style.filter = 'blur(8px)';

    try {
        const response = await fetch('/remove-from-cart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ itemId: itemId }),
        });

        const data = await response.json();

        if (response.ok) {
            // Optionally, refresh your cart UI here if needed
        fetchCartItems();
        fetchCartContents();
        } else {
            console.error('Failed to remove item:', data);
        }
    } catch (error) {
        console.error('Error:', error);
    } finally {
        setTimeout(() => {
            // Hide the spinner overlay and remove blur effect from the content
            document.getElementById('spinner-overlay').classList.add('hidden');
            document.getElementById('contentToBlur').style.filter = 'none';
        }, 500); // Adjust timeout as needed
        fetchCartContents();
        fetchCartCount();
        fetchCartItems();

    }
}

function updateButtonDisplay(cartItems) {
    var emptyCartMessage = document.getElementById("Buttondisplay"); // Make sure the ID matches your HTML

    if (cartItems.length > 0) {
        // If the cart count is greater than 1, show the element
        emptyCartMessage.style.display = "flex";
    } else {
        // Otherwise, hide the element
        emptyCartMessage.style.display = "none";
    }
}

async function clearCart() {
    // Show the spinner overlay
    document.getElementById('spinner-overlay').classList.remove('hidden');
    // Apply blur effect to the content behind the spinner
    document.getElementById('contentToBlur').style.filter = 'blur(8px)';

    try {
        // Optionally, show loading state here, e.g., document.getElementById('loading').style.display = 'block';

        const response = await fetch('/clear-cart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({}), // Adjust if your endpoint expects data
        });

        if (response.ok) {
            console.log('Cart cleared successfully.');
            // Clear the cart UI
            // Update any related UI elements, e.g., cart count
            // document.getElementById('cartCount').innerText = '0';
        } else {
            console.error('Failed to clear cart.');
            // Optionally, handle HTTP error statuses (4xx, 5xx) with more specific messages
        }
    } catch (error) {
        console.error('Error:', error);
    } finally {
        setTimeout(() => {
            // Hide the spinner overlay and remove blur effect from the content
            document.getElementById('spinner-overlay').classList.add('hidden');
            document.getElementById('contentToBlur').style.filter = 'none';
        }, 500); // Adjust timeout as needed
        fetchCartContents();
        fetchCartItems();
        fetchCartCount();
    }

}



document.addEventListener('DOMContentLoaded', () => {


    //call remove all items
    const clearCartBtn = document.getElementById('clearCart');

    if (clearCartBtn) {
        clearCartBtn.addEventListener('click', clearCart);
    }

    // Check if the user is logged in
    const userStatus = document.querySelector('meta[name="user-status"]').getAttribute('content');

    if (userStatus === 'logged-in') {
        fetchCartCount();
        fetchCartContents();
        fetchCartItems();


    }

    // fix scroll in cart menu
    document.getElementById('cartProductsContainer').addEventListener('wheel', function(e) {
        // Prevent the default page scroll behavior when scrolling inside the container
        e.preventDefault();

        // Customize the scroll speed. The higher the multiplier, the faster the scroll.
        var scrollSpeedMultiplier = 0.18;
        var deltaY = e.deltaY * scrollSpeedMultiplier;

        // Calculate the new scroll position
        var newScrollPosition = this.scrollTop + deltaY;

        // Optional: Prevent scrolling beyond the top or bottom of the container
        var maxScrollTop = this.scrollHeight - this.offsetHeight; // Maximum scrollable distance
        if (newScrollPosition < 0) {
            // Trying to scroll above the top, set to 0
            this.scrollTop = 0;
        } else if (newScrollPosition > maxScrollTop) {
            // Trying to scroll beyond the bottom, set to max scrollable distance
            this.scrollTop = maxScrollTop;
        } else {
            // Normal scroll within the bounds
            this.scrollTop = newScrollPosition;
        }
    }, {passive: false}); // 'passive: false' indicates that the event listener calls preventDefault()


});


 