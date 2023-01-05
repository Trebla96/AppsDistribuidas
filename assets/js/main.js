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

// Delete highcharts credits
$('.highcharts-credits').remove();

