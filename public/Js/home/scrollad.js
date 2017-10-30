function buffer(a, b, c) {
    var d;
    return function() {
        if (d) return;
        d = setTimeout(function() {
            a.call(this),
            d = undefined
        },
        b)
    }
} (function() {
    function e() {
        var d = document.body.scrollTop || document.documentElement.scrollTop;
        d > b ? (a.className = "item1 item2", c && (a.style.top = d - b + "px")) : a.className = "item1"
    }
    var a = document.getElementById("right-ad");
    if (a == undefined) return ! 1;
    var b = 0,
    c,
    d = a;
    while (d) b += d.offsetTop,
    d = d.offsetParent;
    c = window.ActiveXObject && !window.XMLHttpRequest;
    if (!c || !0) window.onscroll = buffer(e, 0, this)
})()