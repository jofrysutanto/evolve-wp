import LazyLoad from 'vanilla-lazyload';

const lazyLoad = new LazyLoad({
    elements_selector: '.lazy',
});
window._lazy = lazyLoad;
