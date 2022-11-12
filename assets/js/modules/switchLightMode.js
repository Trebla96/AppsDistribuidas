/**
 *  Light Switch @version v0.1.4
 */

import { toggleGraphicsLightMode } from './../main.js';

(function () {
    let lightSwitch = document.getElementById('lightSwitch');
    if (!lightSwitch) {
        return;
    }

    /**
     * @function darkmode
     * @summary: changes the theme to 'dark mode' and save settings to local stroage.
     * Basically, replaces/toggles every CSS class that has '-light' class with '-dark'
     */
    function darkMode() {
        document.querySelectorAll('.bg-light').forEach((element) => {
            element.className = element.className.replace(/-light/g, '-dark');
        });

        document.body.classList.add('bg-dark');

        if (document.body.classList.contains('text-dark')) {
            document.body.classList.replace('text-dark', 'text-light');
        } else {
            document.body.classList.add('text-light');
        }

        // Tables
        let tables = document.querySelectorAll('table');
        for (let i = 0; i < tables.length; i++) {
            // add table-dark class to each table
            tables[i].classList.add('table-dark');
        }

        // set light switch input to true
        if (!lightSwitch.checked) {
            lightSwitch.checked = true;
        }
        localStorage.setItem('lightSwitch', 'dark');

        // 212529
        document.querySelectorAll('.card').forEach((element) => {
            element.classList.replace('text-dark', 'text-light');
        });

        $('.nav-pills .nav-link').addClass('dark').removeClass('light');

    }

    /**
     * @function lightmode
     * @summary: changes the theme to 'light mode' and save settings to local stroage.
     */
    function lightMode() {
        document.querySelectorAll('.bg-dark').forEach((element) => {
            element.className = element.className.replace(/-dark/g, '-light');
        });

        document.body.classList.add('bg-light');

        if (document.body.classList.contains('text-light')) {
            document.body.classList.replace('text-light', 'text-dark');
        } else {
            document.body.classList.add('text-dark');
        }

        // Tables
        let tables = document.querySelectorAll('table');
        for (let i = 0; i < tables.length; i++) {
            if (tables[i].classList.contains('table-dark')) {
                tables[i].classList.remove('table-dark');
            }
        }

        if (lightSwitch.checked) {
            lightSwitch.checked = false;
        }
        localStorage.setItem('lightSwitch', 'light');

        document.querySelectorAll('.card').forEach((element) => {
            element.classList.replace('text-light', 'text-dark');
        });

        $('.nav-pills .nav-link').addClass('light').removeClass('dark');

    }

    /**
     * @function onToggleMode
     * @summary: the event handler attached to the switch. calling @darkMode or @lightMode depending on the checked state.
     */
    function onToggleMode() {
        if (lightSwitch.checked) {
            darkMode();
        } else {
            lightMode();
        }
        toggleGraphicsLightMode();
    }

    /**
     * @function getSystemDefaultTheme
     * @summary: get system default theme by media query
     */
    function getSystemDefaultTheme() {
        const darkThemeMq = window.matchMedia('(prefers-color-scheme: dark)');
        if (darkThemeMq.matches) {
            return 'dark';
        }
        return 'light';
    }

    function setup() {
        let settings = localStorage.getItem('lightSwitch');
        if (settings == null) {
            settings = getSystemDefaultTheme();
        }

        if (settings == 'dark') {
            lightSwitch.checked = true;
        }

        lightSwitch.addEventListener('change', onToggleMode);
        onToggleMode();
    }

    setup();
})();
