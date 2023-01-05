const root = $(':root');

const MAX_FONT_SIZE = 24;
const MIN_FONT_SIZE = 12;

localStorage.getItem('font-size') && root.css('--font-size', localStorage.getItem('font-size'));

$('.font-size-menu>button:nth-child(1)').on('click', function () {
    const prevFontSize = Number(root.css('--font-size'));
    if (prevFontSize <= MIN_FONT_SIZE) {
        return;
    }
    root.css('--font-size', prevFontSize - 2);
    localStorage.setItem('font-size', root.css('--font-size'));
})

$('.font-size-menu>button:nth-child(2)').on('click', function () {
    root.css('--font-size', 16);
    localStorage.setItem('font-size', root.css('--font-size'));
});

$('.font-size-menu>button:nth-child(3)').on('click', function () {
    const prevFontSize = Number(root.css('--font-size'));
    if (prevFontSize >= MAX_FONT_SIZE) {
        return;
    }
    root.css('--font-size', prevFontSize + 2);
    localStorage.setItem('font-size', root.css('--font-size'));
});

// ================= Font control ============================= //
// Fix problem with dropdown menu closing on click
$('#font-size-container>.dropdown-menu').on('click', function (event) {
    // The event won't be propagated up to the document NODE and 
    // therefore delegated events won't be fired
    event.stopPropagation();
});