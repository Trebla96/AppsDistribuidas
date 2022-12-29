/**
 * Back to top button
 */
let backtotop = document.querySelector('.back-to-top')
if (backtotop) {
    const toggleBacktotop = () => {
        if (window.scrollY < 50) {
            backtotop.classList.add('opacity-0')
            backtotop.classList.add('pe-none')
        } else {
            backtotop.classList.remove('opacity-0')
            backtotop.classList.remove('pe-none')
        }
    }
    window.addEventListener('load', toggleBacktotop)
    document.addEventListener('scroll', toggleBacktotop)
}