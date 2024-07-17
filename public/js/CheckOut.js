$(document).ready(function () {
    // Initially show the spinner
    $('#cart-spinner-overlay').removeClass('hidden');
    var productIds = []; // Initialize an array to store product IDs
    var quantity = []; // Initialize an array to store qte
    var originalTotal = 0; // Initialize original total price
    var discountCodes = {
        'MMD2': 0.15,  
        'YSR9': 0.15,
        'SIS4': 0.15,  
        'RDA3': 0.15,
        'OSM1': 0.15,
        'HSR4': 0.15,
    };

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

                originalTotal = total; // Store original total price

                // Append the total price at the end
                itemsHtml += `<p class="total-price">السعر الإجمالي: <span id="total-amount">${total.toFixed(2)}</span> SAR</p>
                                <input type="hidden" value="${productIds}" name='idproducts'>
                                <input type="hidden" value="${quantity}" name='quantity'>
                                <input type="hidden" id="final-total" value="${total}" name='total'>
                `;

                $('#cart-items').html(itemsHtml);

                // Update the total price display
                $('#total-price').text(`SAR ${total.toFixed(2)}`);

                // Hide the spinner after the items are loaded
                $('#cart-spinner-overlay').addClass('hidden');
            }
        });
    }

    fetchCartItems(); // Fetch cart items initially

    // Handle discount code application
    $('#apply-discount').click(function () {
        var discountCode = $('#discount-code').val().trim();
        var discountMessage = $('#discount-message');
        var totalAmount = $('#total-amount');
        var finalTotal = $('#final-total');

        if (discountCodes.hasOwnProperty(discountCode)) {  // Replace 'YOUR_DISCOUNT_CODE' with the actual discount code
            var discountedTotal = originalTotal * 0.85;  // Apply 15% discount
            totalAmount.text(discountedTotal.toFixed(2));
            $('#total-price').text(`SAR ${discountedTotal.toFixed(2)}`);
            finalTotal.val(discountedTotal.toFixed(2));  // Update hidden input for total
            discountMessage.text('تم تطبيق الخصم بنجاح!').css('color', 'green');
        } else {
            discountMessage.text('رمز الخصم غير صالح').css('color', 'red');
        }
    });
});
