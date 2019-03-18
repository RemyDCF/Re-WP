<?php

function rewp_cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

if (get_option('rewp_allow-svg')) {
    add_filter('upload_mimes', 'rewp_cc_mime_types');
}

if (get_option('rewp_add-font-awesome')) {
    wp_enqueue_script('rewp_fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/js/all.js', array(), 'v5.7.2');
}

function rewp_chrome_bar_color()
{
    echo '<meta name="theme-color" content="#' . get_option('rewp_chrome-bar-color') . '">';
}

if (get_option('rewp_chrome-bar-color') != "") {
    add_action('wp_head', 'rewp_chrome_bar_color');
}

if (get_option('rewp_g-analytics-id') != "") {
    wp_enqueue_script('rewp_google_analytics', plugins_url('js/google_analytics.js', __FILE__), array(), 'v1.0', true);
    wp_add_inline_script('rewp_google_analytics', '(function (a, b, c) { const d = a.history, e = document, f = navigator || {}, g = localStorage, h = encodeURIComponent, i = d.pushState, j = () => Math.random().toString(36), k = () => (g.cid || (g.cid = j()), g.cid), l = a => { var b = []; for (var c in a) a.hasOwnProperty(c) && void 0 !== a[c] && b.push(h(c) + "=" + h(a[c])); return b.join("&") }, m = (d, g, h, i, j, m, n) => { const o = l({ v: "1", ds: "web", aip: c.anonymizeIp ? 1 : void 0, tid: b, cid: k(), t: d || "pageview", sd: c.colorDepth && screen.colorDepth ? `${screen.colorDepth}-bits` : void 0, dr: e.referrer || void 0, dt: e.title, dl: e.location.origin + e.location.pathname + e.location.search, ul: c.language ? (f.language || "").toLowerCase() : void 0, de: c.characterSet ? e.characterSet : void 0, sr: c.screenSize ? `${(a.screen || {}).width}x${(a.screen || {}).height}` : void 0, vp: c.screenSize && a.visualViewport ? `${(a.visualViewport || {}).width}x${(a.visualViewport || {}).height}` : void 0, ec: g || void 0, ea: h || void 0, el: i || void 0, ev: j || void 0, exd: m || void 0, exf: "undefined" != typeof n && !1 == !!n ? 0 : void 0 }); if (f.sendBeacon) f.sendBeacon("https://www.google-analytics.com/collect", o); else { var p = new XMLHttpRequest; p.open("POST", "https://www.google-analytics.com/collect", !0), p.send(o) } }; d.pushState = function (a) { return "function" == typeof d.onpushstate && d.onpushstate({ state: a }), setTimeout(m, c.delay || 10), i.apply(d, arguments) }, m(), a.ma = { trackEvent: (a, b, c, d) => m("event", a, b, c, d), trackException: (a, b) => m("exception", null, null, null, null, a, b) } })(window, "' . get_option('g-analytics-id') . '", { anonymizeIp: !0, colorDepth: !0, characterSet: !0, screenSize: !0, language: !0 });');
}
