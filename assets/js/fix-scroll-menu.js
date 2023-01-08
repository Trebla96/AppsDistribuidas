const elements = document.querySelectorAll('button.highcharts-a11y-proxy-button.highcharts-no-tooltip');
elements.forEach((element) => {
    element.addEventListener('focus', (event) => {

        event.preventDefault();
        event.stopPropagation();
        let x = window.scrollX, y = window.scrollY;
        event.target.focus();
        window.scrollTo(x, y);
        console.log("focused")
    });
    // element.focus(
    //     {
    //         preventScroll: true
    //     }
    // );
});