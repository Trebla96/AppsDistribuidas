import { lightTheme, darkTheme } from "./themes.js";
import { consumptionEngineSizeGraphic, consumptionModelMakeGraphic, emissionsFuelGraphic, consumptionMakeGraphic } from "./plots.js"
import { worldMap } from "./map.js";

// Enable tooltips
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

// ================= Switch light mode ============================= //
const graphics = [consumptionMakeGraphic, emissionsFuelGraphic, consumptionModelMakeGraphic, consumptionEngineSizeGraphic, worldMap];
const sunSVG = $('#svg-sun');
const moonSVG = $('#svg-moon');
export function toggleGraphicsLightMode() {
    const lightMode = localStorage.getItem('lightSwitch');
    const options = {
        'dark': {
            theme: darkTheme,
            moonSVGHidden: true,
            sunSVGHidden: false
        },
        'light': {
            theme: lightTheme,
            moonSVGHidden: false,
            sunSVGHidden: true
        }
    }

    const theme = options[lightMode].theme
    graphics.forEach((graphic) => {
        graphic.update(theme);
    });

    sunSVG.attr('hidden', options[lightMode].sunSVGHidden ? true : null)
    moonSVG.attr('hidden', options[lightMode].moonSVGHidden ? true : null)
}

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

// Delete highcharts credits
$('.highcharts-credits').remove();