// product images change

document.addEventListener('DOMContentLoaded', () => {

    const bigProductImg = document.querySelector(' #bigProductImg')
    const smallProductPics = document.getElementsByClassName('smallProductPic')


    smallProductPics[0].style.opacity = "1";

    Array.from(smallProductPics).forEach((pic) => {

        pic.addEventListener('click', (e) => {

            for (let i = 0; i < smallProductPics.length; i++) {
                smallProductPics[i].style.opacity = '0.5'
            }

            e.target.style.opacity = '1'

            bigProductImg.src = e.target.src
            bigProductImg.style.animation = 'fadeIn 1s'

            bigProductImg.addEventListener('animationend', () => {
                bigProductImg.style.animation = '';
            });
        })
    })

    console.log(smallProductPics)

})
