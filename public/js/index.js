document.addEventListener('DOMContentLoaded', function () {

    // Slider

    var swiper = new Swiper('.mySwiper', {
        loop: true,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.custom-next button',
            prevEl: '.custom-prev button',
        },
    });




    var swiperProducts = new Swiper('.swiper-container-products', {
        // Default settings (for desktops and larger screens)
        loop: true,
        slidesPerView: 5,
        spaceBetween: 30,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination-products',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next-products',
            prevEl: '.swiper-button-prev-products',
        },
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 4,
                spaceBetween: 30
            },
            // when window width is >= 768px
            900: {
                slidesPerView: 7,
                spaceBetween: 30
            },
            1200: {
                slidesPerView: 9,
                spaceBetween: 30
            },
            1400: {
                slidesPerView: 9,
                spaceBetween: 30
            },
            1600: {
                slidesPerView: 9,
                spaceBetween: 30
            },

            // Add more breakpoints as needed
        }
    });

    var swiperProductsContent = new Swiper('.swiper-container-ProductsContent', {
        // Default settings (for desktops and larger screens)
        loop: true,
        slidesPerView: 5,
        spaceBetween: 30,
        autoplay: {
            delay: 4500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination-ProductsContent',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next-ProductsContent',
            prevEl: '.swiper-button-prev-ProductsContent',
        },
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1.2,
                spaceBetween: 20
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            // when window width is >= 768px
            900: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 30
            },
            1400: {
                slidesPerView: 5,
                spaceBetween: 30
            },
            1600: {
                slidesPerView: 6,
                spaceBetween: 30
            },

            // Add more breakpoints as needed
        }
    });

    // getting the current year for the copyright

    const date = new Date();
    const copyrightDateSpan = document.getElementById('copyrightDate')

    copyrightDateSpan.innerHTML = date.getFullYear()


    // close offerBar

    const offerBar = document.getElementById('offerBar')
    const closeOfferBar = document.getElementById('closeOfferBar')

    closeOfferBar.addEventListener("click", () => {

        offerBar.style.animation = 'fadeOut 0.4s'

        offerBar.addEventListener('animationend', () => {
            offerBar.style.display = 'none'
        })
    })

    // moblile menu

    document.getElementById('mobileMenuButton').addEventListener('click', function () {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.style.transform = 'translateX(0%)';
        document.querySelector('body').style.overflowY = 'hidden'
    });

    // close mobile menu with a button

    document.getElementById('closeMenuButton').addEventListener('click', function () {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.style.transform = 'translateX(100%)';
        document.querySelector('body').style.overflowY = 'visible'
    });

    // close mobile menu if click outside

    mobileMenu.addEventListener('click', (e) => {
        console.log(e.target)

        if (e.target == mobileMenu) {
            mobileMenu.style.transform = 'translateX(100%)';
            document.querySelector('body').style.overflowY = 'visible'
        }
    })



    // open and close subcategories in navBar

    const OandC_Sub_Category_nav = Array.from(document.querySelectorAll(' .OandC_S_Category'))
    const navSubCategory = Array.from(document.querySelectorAll(' .navSubCategory'))

    OandC_Sub_Category_nav.forEach((btn) => {
        btn.addEventListener('click', () => {
            let targetedDiv = navSubCategory[OandC_Sub_Category_nav.indexOf(btn)]

            if (targetedDiv.style.maxHeight) {
                targetedDiv.style.maxHeight = null;

                btn.className = 'fa-solid fa-plus cursor-pointer'
            } else {
                targetedDiv.style.maxHeight = targetedDiv.scrollHeight + 'px';
                btn.className = 'fa-solid fa-minus cursor-pointer'
            }

            btn.style.animation = 'fadeIn 1s'

            btn.addEventListener('animationend', () => {
                btn.style.animation = ''
            })


        })
    })

    // search menu

    // open search bar with both the icon and the search input

    const openSrachBarBTNs = Array.from(document.querySelectorAll(' .openSrachBarBTNs'))

    openSrachBarBTNs.forEach((btn) => {
        btn.addEventListener('click', function () {
            const searchMenu = document.getElementById('searchMenu');
            searchMenu.style.transform = 'translateX(0%)';

            document.querySelector('body').style.overflowY = 'hidden'
        });
    })


    // close search menu

    document.getElementById('closeSearchButton').addEventListener('click', function () {
        const searchMenu = document.getElementById('searchMenu');
        searchMenu.style.transform = 'translateX(100%)';

        document.querySelector('body').style.overflowY = 'visible'
    });

    // close search menu when clicking outside of it

    searchMenu.addEventListener('click', (e) => {
        console.log(e.target)

        if (e.target == searchMenu) {
            searchMenu.style.transform = 'translateX(100%)';
            document.querySelector('body').style.overflowY = 'visible'
        }
    })




    // Function to reset the mobile menu to its initial state

    function resetMobileMenu() {
        // Hide all submenus
        document.querySelectorAll('#mobileMenu .submenu').forEach(submenu => {
            submenu.style.display = 'none';
        });

        // // Show the main menu items
        // const mainMenuItems = document.querySelector('#mobileMenu > div:not(.submenu)');
        // mainMenuItems.style.display = 'block';
    }

    // Event listener for the close button
    document.getElementById('closeMenuButton').addEventListener('click', function () {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.style.transform = 'translateX(100%)';
        resetMobileMenu(); // Reset the menu state
    });

    // Event listener for clicking outside the menu
    document.addEventListener('click', function (event) {
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const productFilter = document.getElementById('productFilter');

        if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
            mobileMenu.style.transform = 'translateX(100%)';
            resetMobileMenu(); // Reset the menu state
        }
    });

    function closeSubMenu() {
        // Hide the submenu
        this.parentElement.style.display = 'none';

        // Show the main menu items
        const mainMenuItems = document.querySelector('#mobileMenu > div:not(.submenu)');
        mainMenuItems.style.display = 'block';
    }

    // Attach event listeners to each close submenu button
    document.querySelectorAll('.closeSubMenuButton').forEach(button => {
        button.addEventListener('click', closeSubMenu);
    });


    // search input


    // const searchInputMoblie = document.getElementById('searchInputMoblie');
    // const trendSearchDiv = document.getElementById('trendSearchDiv');
    // const searchResultDiv = document.getElementById('searchResultDiv');

    // searchInputMoblie.addEventListener('input', () => {

    //     trendSearchDiv.style.animation = searchInputMoblie.value != '' ? 'fadeOut 1s' : 'fadeIn 1s'
    //     trendSearchDiv.style.display = searchInputMoblie.value != '' ? 'none' : 'flex'

    //     searchResultDiv.style.display = searchInputMoblie.value != '' ? 'flex' : 'none'
    //     searchResultDiv.style.animation = searchInputMoblie.value != '' ? 'fadeIn 1s' : 'fadeOut 1s'

    // })



    // open and close filter divs

    const open_close_FilterDiv_BTN = Array.from(document.querySelectorAll(' .open_close_FilterDiv_BTN'))

    open_close_FilterDiv_BTN.forEach((btn) => {

        btn.addEventListener('click', () => {

            const filterDiv = Array.from(document.querySelectorAll(' .filterDiv'))

            const targetedDiv = filterDiv[open_close_FilterDiv_BTN.indexOf(btn)]

            if (targetedDiv.style.maxHeight) {
                targetedDiv.style.maxHeight = null;

                btn.className = 'fa-solid fa-bars cursor-pointer'
            } else {
                targetedDiv.style.maxHeight = targetedDiv.scrollHeight + 'px';
                btn.className = 'fa-solid fa-x cursor-pointer'
            }

            btn.style.animation = 'fadeIn 1s'

            btn.addEventListener('animationend', () => {
                btn.style.animation = ''
            })
        });

    })


    // open and close ProductFilter

    const openProductFilter = document.getElementById('openProductFilter')
    const closeFilterButton = document.getElementById('closeFilterButton')

    if (openProductFilter) {
        openProductFilter.addEventListener('click', () => {
            const productFilter = document.getElementById('productFilter')
            productFilter.style.transform = 'translateY(0%)'
            document.querySelector('body').style.overflowY = 'hidden'
        })

    }

    if (closeFilterButton) {

        const productFilter = document.getElementById('productFilter')

        closeFilterButton.addEventListener('click', () => {
            productFilter.style.transform = 'translateY(-100%)'
            document.querySelector('body').style.overflowY = 'visible'
        })

        // close productFilter menu when clicking outside of it


        productFilter.addEventListener('click', (e) => {
            if (e.target == productFilter) {
                productFilter.style.transform = 'translateY(-100%)';
                document.querySelector('body').style.overflowY = 'visible'
            }
        })

    }

    // open and close openProductSort

    const openProductSort = document.getElementById('openProductSort')
    const closeSortButton = document.getElementById('closeSortButton')

    if (openProductSort) {
        openProductSort.addEventListener('click', () => {
            const productSort = document.getElementById('productSort')
            productSort.style.transform = 'translateY(0%)'
            document.querySelector('body').style.overflowY = 'hidden'
        })
    }

    if (closeSortButton) {
        const productSort = document.getElementById('productSort')
        closeSortButton.addEventListener('click', () => {
            productSort.style.transform = 'translateY(100%)'
            document.querySelector('body').style.overflowY = 'visible'
        })

        // close productSort menu when clicking outside of it


        productSort.addEventListener('click', (e) => {
            if (e.target == productSort) {
                productSort.style.transform = 'translateY(100%)';
                document.querySelector('body').style.overflowY = 'visible'
            }
        })
    }

    // open categories Bar

    const openCategoryBTN = document.getElementById('openCategoryBTN')

    if (openCategoryBTN) {

        openCategoryBTN.addEventListener('click', () => {
            const categoryDiv = document.getElementById('categoryDiv');

            if (categoryDiv.style.maxHeight) {
                categoryDiv.style.maxHeight = null;

                openCategoryBTN.className = 'fa-solid fa-bars cursor-pointer'
            } else {
                categoryDiv.style.maxHeight = categoryDiv.scrollHeight + 'px';
                openCategoryBTN.className = 'fa-solid fa-x cursor-pointer'
            }

            openCategoryBTN.style.animation = 'fadeIn 1s'

            openCategoryBTN.addEventListener('animationend', () => {
                openCategoryBTN.style.animation = ''
            })
        });

    }

    // fix nav when scroll


    const nav = document.getElementById('mainNav');
    const offset = nav.offsetTop; // Get the offset position of the navbar

    window.onscroll = () => {
        if (window.pageYOffset > offset) {
            // User has scrolled past the navigation bar
            nav.classList.add('nav-scrolled');
        } else {
            // User is at the top of the page
            nav.classList.remove('nav-scrolled');
        }
    };




});
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.toggleSubCategory').forEach((btn) => {
        btn.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target-id');
            const targetedDiv = document.querySelector(`ul[data-target-id="${targetId}"]`);

            if (targetedDiv) {
                // Check if the targetedDiv is currently visible by checking its style directly or computed style if not set inline
                let isOpen = targetedDiv.style.maxHeight && targetedDiv.style.maxHeight !== '0px';
                if (!isOpen) {
                    // If computed style is needed, uncomment the following line
                    // isOpen = window.getComputedStyle(targetedDiv).maxHeight !== '0px';
                    targetedDiv.style.maxHeight = targetedDiv.scrollHeight + 'px';
                    this.className = 'toggleSubCategory fa-solid fa-minus cursor-pointer';
                } else {
                    targetedDiv.style.maxHeight = null;
                    this.className = 'toggleSubCategory fa-solid fa-plus cursor-pointer';
                }
            }
        });
    });

    // Initially close all subCategoryList
    document.querySelectorAll('.subCategoryList').forEach((list) => {
        list.style.maxHeight = null; // Ensure they are closed
    });
});

function searchProduct() {
    var query = $('#searchInputMobile').val().trim();

    console.log(" query: ", query); // Log the search query

    // Check if the query is empty
    if (query === '') {
        $('#searchResult').html(`
            <div class="flex flex-col gap-10 justify-center items-center w-full md:h-[350px] h-[60vh] text-center">
                <i class="fa-regular fa-face-frown text-[#999] text-8xl"></i>
                <p class="text-[#999] text-2xl">يرجى إدخال نص للبحث</p>
            </div>
        `);
        return;
    }

    $.ajax({
        url: "/searchproduct", // Use the actual URL instead of Blade syntax
        method: 'GET',
        data: { query: query },
        dataType: 'json',
        success: function(products) {
            console.log("Received products: ", products); // Log the products received

            let html = '';
            if (products.length > 0) {
                products.forEach(function(product) {
                    let imagePath = basePath + '/' + product.image;
                    html += `
                    <div class="flex justify-between items-center mb-4 transition-transform duration-300 hover:scale-95">
                        <a href="/ProductDetails/${product.title}/${product.id}" class="flex items-center w-full">
                            <div class="flex gap-2 items-center w-5/6">
                                ${product.image.includes('https://')
                                    ? `<img src="${product.image}?${Date.now()}" class="w-20 h-20" alt="${product.title}" loading="lazy" onload="imageLoaded(this)">`
                                    : `<img src="/Product_img/${product.image}?${Date.now()}" class="w-20 h-20" alt="${product.title}" loading="lazy" onload="imageLoaded(this)">`
                                }
                                <span class="line-clamp-1">${product.title}</span>
                            </div>
                            <div class="flex flex-col items-end gap-1 w-2/6">
                                <span class="text-red-600 font-bold" dir='ltr'>${product.price} SAR</span>
                            </div>
                        </a>
                    </div>
                    <hr>
                `;
                });
            } else {
                html = `
                <div class="flex flex-col gap-10 justify-center items-center w-full md:h-[350px] h-[60vh] text-center">
                    <i class="fa-regular fa-face-frown text-[#999] text-8xl"></i>
                    <p class="text-[#999] text-2xl">عذرا لا يوجد لدينا هذا المنتوج. إبحث من جديد ...</p>
                </div>`;
            }
            $('#searchResult').html(html);
        },
        error: function(xhr, status, error) {
            console.error("AJAX error: ", status, error); // Log AJAX error information
        }
    });
}


document.addEventListener('DOMContentLoaded', function() {
    var sortBySelect = document.getElementById('sort_by');
    if (!sortBySelect) {
        console.log('Sort by select not found');
        return;
    }

    sortBySelect.addEventListener('change', function() {
        var sortBy = this.value;
        var categoryId = document.getElementById('category_id').value; // Ensure you have an element with id="category_id"
        var subcategory_id = document.getElementById('subcategory_id').value; // Ensure you have an element with id="category_id"

        console.log(`Sorting by ${sortBy} within category ${categoryId}`);
        console.log(`Sorting by ${sortBy} within subcategory ${subcategory_id}`);

        fetch(`/sort-products?sort_by=${sortBy}&category_id=${categoryId}&subcategory_id=${subcategory_id}`)
            .then(response => response.json())
            .then(data => {
                var productsContainer = document.querySelector('.ProductSort');
                productsContainer.innerHTML = ''; // Clear current products

                if (data.products && data.products.length > 0) {
                    data.products.forEach(product => {
                        // Create and append new products to the container
                        // Adjust the HTML structure as per your requirement
                        productsContainer.innerHTML += `
                        <div class="product lg:w-[250px] w-[48%]">
                            <div class="product relative w-full h-full bg-white py-6 lg:py-3 px-3 flex flex-col justify-center gap-5 rounded">
                                <a href="/ProductDetails/${product.title}/${product.id}" loading="lazy">
                                    
                                    <div class="w-[150px] h-[150px] flex justify-center items-center sm:mr-[1.5rem] mt-10">
                                        ${product.image.includes('https://')
                                            ? `<img src="${product.image}?${Date.now()}" class="max-h-[150px] max-w-[150px] object-contain" alt="Product Image" loading="lazy" onload="imageLoaded(this)">`
                                            : `<img src="/Product_img/${product.image}?${Date.now()}" class="max-h-[150px] max-w-[150px] object-contain" alt="Product Image" loading="lazy" onload="imageLoaded(this)">`
                                        }
                                    </div>
                                    <p class="text-right lg:h-auto w-full mt-6 overflow-hidden overflow-ellipsis whitespace-nowrap">
                                        ${product.title}
                                    </p>
                                    <div class="font-bold flex gap-2 justify-center mt-4">
                                        <span class="text-red-600" dir="ltr">${product.price} SAR</span>
                                        
                                    </div>
                                    <div class="flex gap-2 justify-center">
                                       
                                    </div>
                                </a>
                                <button class="addToCartButton w-full border border-black rounded-full py-2 px-4 font-bold hover:bg-black hover:text-white hover:border-white" data-product-id="${product.id}">
                                    أضف للسلة
                                </button>
                            </div>
                        </div>
                    `;

                    });
                } else {
                    productsContainer.innerHTML = '<p>عذرا لايوجد منتجات في هذا التصنيف ...</p>';
                }
            })
            .catch(error => console.error('Error:', error));
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var sortByInput = document.getElementsByClassName('sort-element');
    console.log(sortByInput)
    console.log(sortByInput[1])
    if (!sortByInput) {
        console.log('Sort by select not found');
        return;
    }

    for (let i = 0; i < sortByInput.length; i++) {
        $(i).on('click', function() {
            var sortBy = this.value;
        var categoryId = document.getElementById('category_id').value; // Ensure you have an element with id="category_id"
        var subcategory_id = document.getElementById('subcategory_id').value; // Ensure you have an element with id="category_id"

        console.log(`Sorting by ${sortBy} within category ${categoryId}`);
        console.log(`Sorting by ${sortBy} within subcategory ${subcategory_id}`);

        fetch(`/sort-products?sort_by=${sortBy}&category_id=${categoryId}&subcategory_id=${subcategory_id}`)
            .then(response => response.json())
            .then(data => {
                var productsContainer = document.querySelector('.ProductSort');
                productsContainer.innerHTML = ''; // Clear current products

                if (data.products && data.products.length > 0) {
                    data.products.forEach(product => {
                        // Create and append new products to the container
                        // Adjust the HTML structure as per your requirement
                        productsContainer.innerHTML += `
                        <div class="product lg:w-[250px] w-[48%]">
                            <div class="product relative w-full h-full bg-white py-6 lg:py-3 px-3 flex flex-col justify-center gap-5 rounded">
                                <a href="/ProductDetails/${product.title}/${product.id}" loading="lazy">
                                   
                                    <div class="w-[150px] h-[150px] flex justify-center items-center sm:mr-[1.5rem] mt-10">
                                        ${product.image.includes('https://')
                                            ? `<img src="${product.image}?${Date.now()}" class="max-h-[150px] max-w-[150px] object-contain" alt="Product Image" loading="lazy" onload="imageLoaded(this)">`
                                            : `<img src="/Product_img/${product.image}?${Date.now()}" class="max-h-[150px] max-w-[150px] object-contain" alt="Product Image" loading="lazy" onload="imageLoaded(this)">`
                                        }
                                    </div>
                                    <p class="text-right lg:h-auto w-full mt-6 overflow-hidden overflow-ellipsis whitespace-nowrap">
                                        ${product.title}
                                    </p>
                                   
                                    <div class="flex gap-2 justify-center">
                                       
                                    </div>
                                </a>
                                <button class="addToCartButton w-full border border-black rounded-full py-2 px-4 font-bold hover:bg-black hover:text-white hover:border-white" data-product-id="${product.id}">
                                    أضف للسلة
                                </button>
                            </div>
                        </div>
                    `;

                    });
                } else {
                    productsContainer.innerHTML = '<p>عذرا لايوجد منتجات في هذا التصنيف ...</p>';
                }
            })
            .catch(error => console.error('Error:', error));
        })
     }
});