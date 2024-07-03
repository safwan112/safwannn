// Login Menu
document.addEventListener('DOMContentLoaded', function () {
    const loginButton = document.getElementById('loginButton');
    const loginMenu = document.getElementById('loginMenu');
    const closeLoginMenuButton = document.getElementById('closeLoginMenuButton');

    // Show the login menu only if there was a login error
    if (showLoginMenuOnError) {
        loginMenu.style.transform = 'translateX(0)';
    } else {
        loginMenu.style.transform = 'translateX(-100%)';
    }

    if (loginButton) {
        loginButton.addEventListener('click', function (event) {
            event.preventDefault();
            loginMenu.style.transform = 'translateX(0)';
            document.querySelector('body').style.overflowY = 'hidden'
        });
    }

    closeLoginMenuButton.addEventListener('click', function () {
        loginMenu.style.transform = 'translateX(-100%)';
        document.querySelector('body').style.overflowY = 'visible'
    });


    // close login menu when clicking outside of it
    loginMenu.addEventListener('click', (e) => {
        if (e.target == loginMenu) {
            loginMenu.style.transform = 'translateX(-100%)';
            document.querySelector('body').style.overflowY = 'visible'
        }
    })



    // my account when user is logged-in


    const AccountMenuButton = document.getElementById('AccountMenuButton');
    const AccountMenu = document.getElementById('AccountMenu');
    const closeAccountMenuButton = document.getElementById('closeAccountMenuButton');

    if (AccountMenuButton) {
        AccountMenuButton.addEventListener('click', function (event) {
            event.preventDefault();
            AccountMenu.style.transform = 'translateX(0)';
            document.querySelector('body').style.overflowY = 'hidden'
        });


        closeAccountMenuButton.addEventListener('click', function () {
            AccountMenu.style.transform = 'translateX(-100%)';
            document.querySelector('body').style.overflowY = 'visible'
        });

        // Optional: Close menu when clicking outside

        AccountMenu.addEventListener('click', (e) => {
            if (e.target == AccountMenu) {
                AccountMenu.style.transform = 'translateX(-100%)';
                document.querySelector('body').style.overflowY = 'visible'
            }
        })
    }
})
