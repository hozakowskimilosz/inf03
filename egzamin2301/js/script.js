const btnPrev=document.getElementById('btnPrev');
const btnNext=document.getElementById('btnNext');

const mainPhoto=document.getElementById('mainPhoto');
const subPhoto1=document.getElementById('subPhoto1');
const subPhoto2=document.getElementById('subPhoto2');
const subPhoto3=document.getElementById('subPhoto3');
const subPhoto4=document.getElementById('subPhoto4');
const subPhoto5=document.getElementById('subPhoto5');

const array=['1', '2', '3', '4', '5'];

let i=2;

mainPhoto.src=`${array[2]}.jpg`;

subPhoto1.src=`${array[0]}.jpg`;
subPhoto2.src=`${array[1]}.jpg`;
subPhoto3.src=`${array[2]}.jpg`;
subPhoto4.src=`${array[3]}.jpg`;
subPhoto5.src=`${array[4]}.jpg`;

btnPrev.addEventListener('click', () => {
    i-=1;
    
    if(i<0) {
        i=4;
    }

    mainPhoto.src=`${array[i]}.jpg`;
})

btnNext.addEventListener('click', () => {
    i+=1;
    
    if(i>4) {
        i=0;
    }
    
    mainPhoto.src=`${array[i]}.jpg`;
})

const subPhotos=document.querySelectorAll('.subPhoto');

for(let i=0; i<subPhotos.length; i++) {
    subPhotos[i].addEventListener('click', () => {
        mainPhoto.src=subPhotos[i].getAttribute('src');
    })
}
