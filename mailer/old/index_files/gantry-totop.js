window.addEvent('domready', function () {
    new SmoothScroll({
        duration: 250
    });
    var go = $('gototop');
    go.setStyle('opacity', '0');
    go.setStyle('display', 'block');
    window.addEvent('scroll', function (e) {
        if (window.getScrollHeight() > window.getHeight()) {
            var effect = new Fx.Style(go, 'opacity', {
                duration: 500
            });
            if (window.getScrollTop() != '0') {
                go.setStyle('opacity', '1')
            } else {
                go.setStyle('opacity', '0')
            }
        }
    })
});