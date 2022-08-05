const contentCard = document.querySelectorAll('.content-card');
const animated = document.querySelectorAll('.animated');
const links = document.querySelectorAll('a');
const nav = document.querySelector('nav');

nav.addEventListener('animationend', ()=>{
    setTimeout(()=>{
        animated.forEach((e, i) => {
            setTimeout(() => {
                e.style.opacity = 1;
            }, 150 * i);
        })
        contentCard.forEach((e, i) => {
            e.addEventListener('mouseover', ()=> {
                e.lastElementChild.style.transform = 'scale(1.2)';
            })
            e.addEventListener('mouseleave', ()=> {
                e.lastElementChild.style.transform = 'scale(1)';
            })
        })
    }, 20)
})
//Youtube Video Modal and Button  
const coverImg = document.querySelector('.page-cover > img');
const coverBtn = document.querySelector('.page-cover > button');
const modal = document.querySelector('#modal');
let lastScrollPos = 0;
if(coverImg){
    window.addEventListener('scroll', () =>{
        let st = window.pageYOffset || document.documentElement.scrollTop;
        if (st > lastScrollPos){
            coverImg.style.transform = 'scale(1.2)';
            coverBtn.style.opacity = '0';
            coverBtn.style.pointerEvents = 'none';
        } else {
            coverImg.style.transform = 'scale(1)';
            coverBtn.style.opacity = '1';
            coverBtn.style.pointerEvents = 'all';
        }
        lastScrollPos = st <= 0 ? 0 : st;
    }, false);
    coverBtn.addEventListener('click', ()=> {
        coverBtn.style.opacity = '0';
        document.getElementById('modal').style.opacity = '1';
        document.getElementById('modal').style.pointerEvents = 'all';   
        document.querySelector('#modal > iframe').style.transform = 'translateY(0%)';   
    })
    modal.addEventListener('click', ()=> {
        coverBtn.style.opacity = '1';
        document.getElementById('modal').style.opacity = '0';
        document.getElementById('modal').style.pointerEvents = 'none';
        document.querySelector('#modal > iframe').style.transform = 'translateY(100%)';
        const currentSrc = document.querySelector('#modal > iframe').src;
        document.querySelector('#modal > iframe').src = '';
        document.querySelector('#modal > iframe').src = currentSrc;
    }, false)
}