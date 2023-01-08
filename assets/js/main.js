import { lightTheme, darkTheme } from "./themes.js";
import { consumptionEngineSizeGraphic, consumptionModelMakeGraphic, emissionsFuelGraphic, consumptionMakeGraphic } from "./plots.js"
import { worldMap } from "./map.js";
import { toggleLightIcon } from "./modules/switchLightMode.js";

// Enable tooltips
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

// ================= Switch light mode ============================= //
const graphics = [consumptionMakeGraphic, emissionsFuelGraphic, consumptionModelMakeGraphic, consumptionEngineSizeGraphic, worldMap];

export function toggleGraphicsLightMode() {
    const lightMode = localStorage.getItem('lightSwitch');
    const options = {
        'dark': {
            theme: darkTheme,
        },
        'light': {
            theme: lightTheme,
        }
    }

    const theme = options[lightMode].theme
    graphics.forEach((graphic) => {
        graphic.update(theme);
    });

    toggleLightIcon();
}

// Delete highcharts credits
$('.highcharts-credits').remove();

