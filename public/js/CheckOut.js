$(document).ready(function () {
    // Initially show the spinner
    $('#cart-spinner-overlay').removeClass('hidden');
    var productIds = []; // Initialize an array to store product IDs
    var quantity = []; // Initialize an array to store qte
});
    async function fetchCartItems() {
        $.ajax({
            url: '/CheckOut/Items',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var itemsHtml = '';
                var total = 0; // Initialize total price
                productIds = []; // Reset product IDs array for each fetch
                quantity = []; // Reset quantity array for each fetch

                data.forEach(function (item) {
                    // Store each product ID in the array
                    productIds.push(item.product.id.toString()); // Convert to string if not already
                    quantity.push(item.qte.toString()); // Convert to string if not already

                    // Calculate total price
                    var itemTotal = item.qte * parseFloat(item.product.price);
                    total += itemTotal; // Add item total to overall total

                    itemsHtml += `
                    <div class="flex items-center justify-between gap-4 my-2">
                        <div class="relative inline-block">
                            <div class='w-20 h-20 flex justify-center items-center'>
                                <img src="${item.product.image.includes('https://') ? item.product.image + '?' + Date.now() : '/Product_img/' + item.product.image + '?' + Date.now()}" alt="${item.product.title}" class="max-w-16 max-h-16">
                            </div>
                            <div class="absolute top-4 left-[15px] transform -translate-x-1/2 -translate-y-1/2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs">
                                ${item.qte}
                            </div>
                        </div>
                        <span class="md:w-[350px] w-[230px] line-clamp-1">${item.product.title}</span>
                        <div class='w-[80px]'>
                            <span class="lg:text-right text-center">${item.product.price} SAR</span>
                        </div>
                    </div>
                `;

                });

                // Append the total price at the end
                itemsHtml += `<p class="m-5 mx-6 font-bold">المجموع : <span >${total}</span> SAR</p>
                                <input type="hidden" value="${productIds}" name='idproducts'>
                                <input type="hidden" value="${quantity}" name='quantity'>
                                <input type="hidden" value="${total}" name='total'>
                `;

                $('#cart-items').html(itemsHtml);

                // Hide the spinner after the items are loaded
                $('#cart-spinner-overlay').addClass('hidden');
            }
        });
    }

    // Fetch cart items every second
    fetchCartItems();
