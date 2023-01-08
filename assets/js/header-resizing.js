const r = document.querySelector(':root');

const observer = new ResizeObserver(entries => {
    for (let entry of entries) {
        r.style.setProperty('--header-height', `${entry.contentRect.height}px`);
    }
});

observer.observe(document.querySelector('header'));