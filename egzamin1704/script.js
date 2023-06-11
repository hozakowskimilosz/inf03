const img=document.querySelector('#img');
const curve=document.querySelector('#curve');
const text=document.querySelector('#text');

img.addEventListener('click', () => {
    if(img.getAttribute('src')==='icon-off.png') {
        img.src='icon-on.png';
    }
    else {
        img.src='icon-off.png';
    }
})

curve.addEventListener('change', () => {
    text.classList.toggle('curved');
})
