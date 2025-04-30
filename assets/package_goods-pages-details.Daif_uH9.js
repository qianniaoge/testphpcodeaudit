import {
    d as e,
    a,
    m as t,
    b as s,
    e as l,
    o as i,
    f as r,
    w as o,
    l as u,
    n as d,
    g as n,
    k as c,
    v as p,
    F as g,
    x as _,
    s as m,
    c as y,
    U as v,
    V as h,
    r as I,
    j as f,
    t as S,
    i as k,
    y as E,
    W as C,
    q as A,
    X as w,
    Y as Q,
    z as J,
    G as B,
    M as b,
    A as U,
    B as M,
    Z as x,
    _ as O,
    D as R,
    E as P,
    J as N,
    O as T
} from "./index-DSbEl7l2.js";
import {_ as q} from "./u-loading-icon.DyoSpahm.js";
import {_ as j, r as F} from "./uni-app.es.BJJgkoCH.js";
import {S as H} from "./Shop.ByBh506y.js";
import {T as Z} from "./Tags.CxW3xP2Q.js";
import {_ as V} from "./u-popup.BDLmEoSw.js";
import "./u-status-bar.C8qhzvPy.js";

const K = j({
    name: "u-swiper-indicator",
    mixins: [t, s, e({
        props: {
            length: {type: [String, Number], default: () => a.swiperIndicator.length},
            current: {type: [String, Number], default: () => a.swiperIndicator.current},
            indicatorActiveColor: {type: String, default: () => a.swiperIndicator.indicatorActiveColor},
            indicatorInactiveColor: {type: String, default: () => a.swiperIndicator.indicatorInactiveColor},
            indicatorMode: {type: String, default: () => a.swiperIndicator.indicatorMode}
        }
    })],
    data: () => ({lineWidth: 22}),
    computed: {
        lineStyle() {
            let e = {};
            return e.width = l(this.lineWidth), e.transform = `translateX(${l(this.current * this.lineWidth)})`, e.backgroundColor = this.indicatorActiveColor, e
        }, dotStyle() {
            return e => {
                let a = {};
                return a.backgroundColor = e === this.current ? this.indicatorActiveColor : this.indicatorInactiveColor, a
            }
        }
    },
    methods: {addUnit: l}
}, [["render", function (e, a, t, s, l, y) {
    const v = m;
    return i(), r(v, {class: "u-swiper-indicator"}, {
        default: o((() => ["line" === e.indicatorMode ? (i(), r(v, {
            key: 0,
            class: u(["u-swiper-indicator__wrapper", [`u-swiper-indicator__wrapper--${e.indicatorMode}`]]),
            style: d({width: y.addUnit(l.lineWidth * e.length), backgroundColor: e.indicatorInactiveColor})
        }, {
            default: o((() => [n(v, {
                class: "u-swiper-indicator__wrapper--line__bar",
                style: d([y.lineStyle])
            }, null, 8, ["style"])])), _: 1
        }, 8, ["class", "style"])) : c("", !0), "dot" === e.indicatorMode ? (i(), r(v, {
            key: 1,
            class: "u-swiper-indicator__wrapper"
        }, {
            default: o((() => [(i(!0), p(g, null, _(e.length, ((a, t) => (i(), r(v, {
                class: u(["u-swiper-indicator__wrapper__dot", [t === e.current && "u-swiper-indicator__wrapper__dot--active"]]),
                key: t,
                style: d([y.dotStyle(t)])
            }, null, 8, ["class", "style"])))), 128))])), _: 1
        })) : c("", !0)])), _: 1
    })
}], ["__scopeId", "data-v-4c08e305"]]);
const z = j({
        name: "u-swiper", mixins: [t, s, e({
            props: {
                list: {type: Array, default: () => a.swiper.list},
                indicator: {type: Boolean, default: () => a.swiper.indicator},
                indicatorActiveColor: {type: String, default: () => a.swiper.indicatorActiveColor},
                indicatorInactiveColor: {type: String, default: () => a.swiper.indicatorInactiveColor},
                indicatorStyle: {type: [String, Object], default: () => a.swiper.indicatorStyle},
                indicatorMode: {type: String, default: () => a.swiper.indicatorMode},
                autoplay: {type: Boolean, default: () => a.swiper.autoplay},
                current: {type: [String, Number], default: () => a.swiper.current},
                currentItemId: {type: String, default: () => a.swiper.currentItemId},
                interval: {type: [String, Number], default: () => a.swiper.interval},
                duration: {type: [String, Number], default: () => a.swiper.duration},
                circular: {type: Boolean, default: () => a.swiper.circular},
                previousMargin: {type: [String, Number], default: () => a.swiper.previousMargin},
                nextMargin: {type: [String, Number], default: () => a.swiper.nextMargin},
                acceleration: {type: Boolean, default: () => a.swiper.acceleration},
                displayMultipleItems: {type: Number, default: () => a.swiper.displayMultipleItems},
                easingFunction: {type: String, default: () => a.swiper.easingFunction},
                keyName: {type: String, default: () => a.swiper.keyName},
                imgMode: {type: String, default: () => a.swiper.imgMode},
                height: {type: [String, Number], default: () => a.swiper.height},
                bgColor: {type: String, default: () => a.swiper.bgColor},
                radius: {type: [String, Number], default: () => a.swiper.radius},
                loading: {type: Boolean, default: () => a.swiper.loading},
                showTitle: {type: Boolean, default: () => a.swiper.showTitle}
            }
        })], data: () => ({currentIndex: 0}), watch: {
            current(e, a) {
                e !== a && (this.currentIndex = e)
            }
        }, emits: ["click", "change"], computed: {
            itemStyle() {
                return e => {
                    const a = {};
                    return this.nextMargin && this.previousMargin && (a.borderRadius = l(this.radius), e !== this.currentIndex && (a.transform = "scale(0.92)")), a
                }
            }
        }, methods: {
            addStyle: y, addUnit: l, testObject: v.object, testImage: v.image, getItemType(e) {
                return "string" == typeof e ? v.video(this.getSource(e)) ? "video" : "image" : "object" == typeof e && this.keyName ? e.type ? "image" === e.type ? "image" : "video" === e.type ? "video" : "image" : v.video(this.getSource(e)) ? "video" : "image" : void 0
            }, getSource(e) {
                return "string" == typeof e ? e : "object" == typeof e && this.keyName ? e[this.keyName] : ""
            }, change(e) {
                const {current: a} = e.detail;
                this.pauseVideo(this.currentIndex), this.currentIndex = a, this.$emit("change", e.detail)
            }, pauseVideo(e) {
                const a = this.getSource(this.list[e]);
                if (v.video(a)) {
                    h(`video-${e}`, this).pause()
                }
            }, getPoster: e => "object" == typeof e && e.poster ? e.poster : "", clickHandler(e) {
                this.$emit("click", e)
            }
        }
    }, [["render", function (e, a, t, s, l, u) {
        const y = F(I("u-loading-icon"), q), v = m, h = E, J = C, B = A, b = w, U = Q, M = F(I("u-swiper-indicator"), K);
        return i(), r(v, {
            class: "u-swiper",
            style: d({backgroundColor: e.bgColor, height: u.addUnit(e.height), borderRadius: u.addUnit(e.radius)})
        }, {
            default: o((() => [e.loading ? (i(), r(v, {
                key: 0,
                class: "u-swiper__loading"
            }, {default: o((() => [n(y, {mode: "circle"})])), _: 1})) : (i(), r(U, {
                key: 1,
                class: "u-swiper__wrapper",
                style: d({flex: "1", height: u.addUnit(e.height)}),
                onChange: u.change,
                circular: e.circular,
                interval: e.interval,
                duration: e.duration,
                autoplay: e.autoplay,
                current: e.current,
                currentItemId: e.currentItemId,
                previousMargin: u.addUnit(e.previousMargin),
                nextMargin: u.addUnit(e.nextMargin),
                acceleration: e.acceleration,
                displayMultipleItems: e.displayMultipleItems,
                easingFunction: e.easingFunction
            }, {
                default: o((() => [(i(!0), p(g, null, _(e.list, ((a, t) => (i(), r(b, {
                    class: "u-swiper__wrapper__item",
                    key: t
                }, {
                    default: o((() => [n(v, {
                        class: "u-swiper__wrapper__item__wrapper",
                        style: d([u.itemStyle(t)])
                    }, {
                        default: o((() => ["image" === u.getItemType(a) ? (i(), r(h, {
                            key: 0,
                            class: "u-swiper__wrapper__item__wrapper__image",
                            src: u.getSource(a),
                            mode: e.imgMode,
                            onClick: e => u.clickHandler(t),
                            style: d({height: u.addUnit(e.height), borderRadius: u.addUnit(e.radius)})
                        }, null, 8, ["src", "mode", "onClick", "style"])) : c("", !0), "video" === u.getItemType(a) ? (i(), r(J, {
                            key: 1,
                            class: "u-swiper__wrapper__item__wrapper__video",
                            id: `video-${t}`,
                            "enable-progress-gesture": !1,
                            src: u.getSource(a),
                            poster: u.getPoster(a),
                            title: e.showTitle && u.testObject(a) && a.title ? a.title : "",
                            style: d({height: u.addUnit(e.height)}),
                            controls: "",
                            onClick: e => u.clickHandler(t)
                        }, null, 8, ["id", "src", "poster", "title", "style", "onClick"])) : c("", !0), e.showTitle && u.testObject(a) && a.title && u.testImage(u.getSource(a)) ? (i(), r(B, {
                            key: 2,
                            class: "u-swiper__wrapper__item__wrapper__title u-line-1"
                        }, {default: o((() => [f(S(a.title), 1)])), _: 2}, 1024)) : c("", !0)])), _: 2
                    }, 1032, ["style"])])), _: 2
                }, 1024)))), 128))])), _: 1
            }, 8, ["style", "onChange", "circular", "interval", "duration", "autoplay", "current", "currentItemId", "previousMargin", "nextMargin", "acceleration", "displayMultipleItems", "easingFunction"])), n(v, {
                class: "u-swiper__indicator",
                style: d([u.addStyle(e.indicatorStyle)])
            }, {
                default: o((() => [k(e.$slots, "indicator", {}, (() => [e.loading || !e.indicator || e.showTitle ? c("", !0) : (i(), r(M, {
                    key: 0,
                    indicatorActiveColor: e.indicatorActiveColor,
                    indicatorInactiveColor: e.indicatorInactiveColor,
                    length: e.list.length,
                    current: l.currentIndex,
                    indicatorMode: e.indicatorMode
                }, null, 8, ["indicatorActiveColor", "indicatorInactiveColor", "length", "current", "indicatorMode"]))]), !0)])),
                _: 3
            }, 8, ["style"])])), _: 3
        }, 8, ["style"])
    }], ["__scopeId", "data-v-5fab5a7f"]]),
    G = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAYAAACtWK6eAAAAAXNSR0IArs4c6QAADMlJREFUeF7tnTuMXlcRx2fulgiJBqWNRIkUhIREQwGip0EiQDBxHMeO7ex+1xtn83AcO++nv5n5HCf2OokdEyA8UtBGSBTpkNKkAwkUCjoami1s6xtYERDeeNf3Mfeec+/9u0mROXNmfjM/nV0/9mPCLxAAgV0JMNiAAAjsTgCCYDtAYA8CEATrAQIQBDsAAs0I4AVpxg2nJkIAgkxk0GizGQEI0owbTk2EAASZyKDRZjMCEKQZN5yaCAEIMpFBo81mBCBIM244NRECECSTQa+urn55ZWXlq8z8dSL69MaNG5+cO3fuL5mUN9kyIEgGoy/L8iIRHdpZirt/UBSFichHGZQ5yRIgSOKxl2XpFUo4o6pPV4hDSDABCBIMtE66siz3E9HlimcgSUVQkWEQJJJmjVwbGxtfvHbt2idEdGfVY+5+2syeqRqPuPYEIEh7ho0ylGX5bSL6Q93DkKQusXbxEKQdv8anZ7PZw8z8WsMET6nqsw3P4lgNAhCkBqzI0OPHjx919/MtckKSFvCqHoUgVUkFx62vr39/uVz+tk1aZj4lIs+1yYGzexOAIIk2ZDab3cXMHxLRHW1KcPdTZgZJ2kDc4ywE6QhslbRlWe4joqtVYm8T86SqPh+QByl2EIAgiVeiLMszRHQ6oAxIEgBxZwoI0gHUuimjJGHmkyLyQt37Eb87AQiSyXZESeLuJ80MkgTNFYIEgYxIEyUJET2hqi9G1DT1HBAksw2IkoSZHxeRlzJrb3DlQJAMRwZJ8hkKBMlnFjdVEiWJuz9mZi9n2mb2ZUGQjEcESdIPB4Kkn8GeFURJQkSPquormbebXXkQJLuRfL4gSJJuSBAkHftaN0dJwswbIvJqrcsnHAxBBjT8KEncfcPMIEmF2UOQCpByComShIgeUdWm/2ArJySd1gJBOsXbTXJI0g3XW2WFIP2xDr0pShJmPiEiZ0OLG1EyCDLgYUZJ4u4nzAyS3GIXIMiABdkuPUoSInpYVecDxxFePgQJR9p/QkjSHXMI0h3bXjNHScLM6yIivRaf8WUQJOPh1C0tShJ3XzczSEJEEKTuFmYeHyUJER1XVc283c7LgyCdI+7/gihJmLkUEeu/g3xuhCD5zCK0EkgSgxOCxHDMMkuUJO4+M7NFlk12XBQE6Rhw6vSQpN0EIEg7foM4HSUJEa2p6rlBNB1UJAQJApl7GkjSbEIQpBm3QZ6KkoSZV0Xk9UFCqFk0BKkJbOjhUZK4+6qZjV4SCDL0jW9Qf5QkRPSQqrb5EKAG1fd7BIL0yzub2yBJtVFAkGqcRhkVJQkzHxORN8YICYKMcao1eoqSxN2PmdnoJIEgNZZprKFRkhDRUVV9c0ycIMiYptmiF0hya3gQpMVSje1olCTMfERELoyBDwQZwxQDe4iSZLlcHlksFoOXBIIELtdYUkVJ4u4PmtnFIXOBIEOeXoe1R0lCRIdVdbPDUjtNDUE6xTvs5JAE/yZ92BvcQ/VRkhRFcWg+n1/qoeTQK/CChOIcZ7IoSdz9kJkNShIIMs6dDu8qShIiekBV3wovsKOEEKQjsGNMO0VJIMgYN7nDnqIkYeaDIvJ2h6WGpIYgIRinlSRKEnc/aGZZSwJBprXbYd1GSUJE96vqO2GFBSeCIMFAp5RuCpJAkCltdAe9RknCzAdE5HIHJbZKCUFa4cPhbQJRkiyXywOLxSIrSSAIdjyEQJQkRHSfql4JKSogCQQJgIgU/yEwRkkgCLY7lECUJMy8X0TeDS2uQTII0gAajuxNYEySQBBseycEoiRx93vN7GonRVZICkEqQEJIMwJjkASCNJs9TlUkECUJEf1UVX9W8dqwMAgShhKJdiMQJUlRFPvm8/l7fZKGIH3SnvBdUZK4+z4z600SCDLhpe279ShJiOgnqvrzPuqHIH1Qxh3/IzA0SSAIlrd3AlGSMPM9IvKLLhuAIF3SRe5dCURJ4u73mFlnkkAQLHEyAlGSENGPVfWXXTQCQbqgipyVCeQuCQSpPEoEdkUgShJm/pGIvB9ZJwSJpIlcjQnkKgkEaTxSHIwmECWJu//QzH4VUR8EiaCIHGEEcpMEgoSNFomiCERJwsx3i8iv29QFQdrQw9nOCOQiCQTpbMRI3JZAlCTu/gMz+02TeiBIE2o40xuBIEk+JaLvqOr2f2v9giC1cCE4BYEgSa6o6n1164cgdYkhPgmBCEm2tra+tLm5+c86DUCQOrQQm5RAW0mY+Ssi8tc6TUCQOrQQm5xAG0mY+Zsi8sc6TUCQOrQQm5xAG0GWy+U3FovFx3WagCB1aCE2KYE2cmwXfv369TvPnz//tzpNQJA6tBCbjEBbObYL39ra+sLm5uZWnSYgSB1aiE1CIEIOInpFVR+t2wAEqUsM8b0SKMvy9L8vPNPy0j+trKx86+zZs/+omweC1CWG+N4IBMlB+KsmvY0MF/VFIEqOtn+jFy9IXxPHPZUJ5CLHdsEQpPLYENgHgSg5ov5VIQTpY+q4oxKB3OTAC1JpbAjqg0CUHNE/2QQvSB/Txx17EshVDrwgWNzkBKLk6OqnK+IFSb4i0y0gdznwgkx3N5N3HiUHfnh18lGigGgCUXLg4w+iJ4N8yQlEydHXp0zhe5DkKzOdAoYmB74Hmc5uJu80Sg58iGfyUaKAaAJRcqT4rHR8iRW9Dch3E4Ehy4EvsbDMnRKIksPd7zWzq50Wu0tyvCApqE/gzjHIgRdkAouaosUoOZh5v4i8m6KH/96JFyQl/RHePSY58IKMcEFTthQlBxHdp6pXUvaCFyQH+iOqYYxy4AUZ0YKmbCVKjuVyeWCxWFxO2cvOu/E9SE7TGGAtUXIw8wERyUoOvCADXMicSo6Sg4juV9V3cuoN34PkOI0B1TQFOfCCDGghcyo1Sg53P2hmb+fUG74HyXkaA6gtSg5mPigiWcuBF2QAC5lTiVFyENEDqvpWTr3tVgt+F2sIU8qgxinKgRckg8UbQglRcrj7ITO7NISe8btYQ5pSwlqj5CCiw6q6mbCVRlfjS6xG2KZxaOpy4Eusaex5oy6j5HD3B83sYqMiMjiEFySDIeRWQtBnAm5/stOg5cALkttmZlBPlBzMfERELmTQUqsS8IK0wjeuw5Dj8/OEIOPa8cbdRMlBREdV9c3GhWR2EIJkNpAU5UCO3alDkBQbmdGdUXK4+zEzeyOj1kJKgSAhGIeZJEoOZj4mIqOTA7+LNcy9Dqk6Sg4iekhVz4cUlWESvCAZDqXrkiBHdcIQpDqrUURGyeHuq2b2+iig7NEEBBn7hP+vvyg5mHlVREYvB74HgRxNCKyp6rkmB4d4Bi/IEKdWs+aol4OIJiUHXpCaizbE8Cg53H1mZoshMmhTM16QNvQyPxslR1EUs/l8Pjk58IJkvuBtyouSg5lLEbE2tQz5LF6QIU9vl9qj5CCi46qqI0RUuSUIUhnVMAIhR+ycIEgsz6TZouRw93Uzk6TNZHI5BMlkEG3LiJKDmddFBHJ8NhAI0nYzMzgfJQcRPayq8wxayqYECJLNKJoVAjmacat6CoJUJZVhXJQc7n7CzM5m2GLykiBI8hE0KyBKDmY+ISKQY5cxQJBm+5n0VJQcRPSIqr6WtJnML4cgmQ9oZ3mQo9+BQZB+ebe6LUoOd98ws1dbFTORwxBkIIOOkoOZN0QEclScOwSpCCplWJQcRPSoqr6Sspeh3Q1BMp8Y5Eg7IAiSlv+et0fJ4e6PmdnLGbeabWkQJNPRQI48BgNB8pjDTVVEycHMj4vISxm2OJiSIEhmo4qSg4ieUNUXM2tvcOVAkIxGBjkyGsZnpUCQTGYSJYe7nzSzFzJpa/BlQJAMRhglBzOfFBHIEThTCBIIs0mqKDmI6ElVfb5JDTizOwEIknA7yrLcR0RXA0qAHAEQb5UCgnQE9nZpZ7PZXcz8IRHdcbvYvf6/u58ys+fa5MBZvCDZ7cBsNrubmd9vUxgznxIRyNEG4m3O4gXpEO5eqWez2Rozt/mJhU+p6rOJyp/MtRAk0ajX1tYeK4qi6R/kQY6e5gZBegK985qyLO8hovfqXu/up83smbrnEN+MAARpxq31qbW1te8WRfH7OokgRx1aMbEQJIZjoyxlWV4gosMVD59R1acrxiIsiAAECQLZNE1Zlr8jou/d5jzkaAq45TkI0hJgxPGyLA8S0aWdudz9g6IoTEQ+irgHOeoTgCD1mXVyYjab3VEUxdfc/S4i+ntRFB/P5/M/d3IZklYmAEEqo0LgFAlAkClOHT1XJgBBKqNC4BQJQJApTh09VyYAQSqjQuAUCUCQKU4dPVcmAEEqo0LgFAlAkClOHT1XJgBBKqNC4BQJQJApTh09VyYAQSqjQuAUCUCQKU4dPVcm8C+UFCsFDVzjeAAAAABJRU5ErkJggg==",
    Y = j({
        __name: "Popups",
        props: {
            goodsOthersParams: Array,
            goodsOthersStated: Boolean,
            goodsOthersIndex: Number,
            goodsOthersTitle: String
        },
        emits: ["close"],
        setup(e, {emit: a}) {
            const t = a, s = () => {
                t("close")
            };
            return (a, t) => {
                const l = m, u = F(I("up-popup"), V);
                return i(), r(l, {class: "Popups"}, {
                    default: o((() => [n(u, {
                        show: e.goodsOthersStated,
                        onClose: s,
                        closeable: !0
                    }, {
                        default: o((() => [n(l, {class: "Popups-popup"}, {
                            default: o((() => [n(l, {class: "Popups-popup_title"}, {
                                default: o((() => [f(S(e.goodsOthersTitle), 1)])),
                                _: 1
                            }), e.goodsOthersIndex < 2 ? (i(!0), p(g, {key: 0}, _(e.goodsOthersParams, (e => (i(), p(g, null, [n(l, {class: "Popups-popup_subtitle"}, {
                                default: o((() => [f(S(e.name), 1)])),
                                _: 2
                            }, 1024), n(l, {class: "Popups-popup_desc"}, {
                                default: o((() => [f(S(e.value), 1)])),
                                _: 2
                            }, 1024)], 64)))), 256)) : (i(!0), p(g, {key: 1}, _(e.goodsOthersParams, (e => (i(), r(l, {class: "Popups-popup_item"}, {
                                default: o((() => [n(l, {class: "Popups-popup_item__label"}, {
                                    default: o((() => [f(S(e.name), 1)])),
                                    _: 2
                                }, 1024), n(l, {class: "Popups-popup_item__value"}, {
                                    default: o((() => [f(S(e.value), 1)])),
                                    _: 2
                                }, 1024)])), _: 2
                            }, 1024)))), 256))])), _: 1
                        })])), _: 1
                    }, 8, ["show"])])), _: 1
                })
            }
        }
    }, [["__scopeId", "data-v-8d936b5c"]]), D = j({
        __name: "Pay", props: {details: Object}, setup(e) {
            const a = e, t = J(a.details.show_amount), s = J("请选择规格"), l = J(!1), d = J(0), c = () => {
                l.value = !0, t.value = a.details.specs[d.value].sale, s.value = a.details.specs[d.value].label
            }, y = () => {
                l.value = !1
            }, v = () => {
                y(), B({url: `/package_goods/pages/order?id=${a.details.id}&specs=${d.value}`})
            };
            return (h, k) => {
                const C = m, A = E, w = F(I("up-popup"), V);
                return i(), r(C, {class: "Pay"}, {
                    default: o((() => [n(C, {class: "Pay-btn", onClick: c}, {
                        default: o((() => [f("立即购买")])),
                        _: 1
                    }), n(w, {show: l.value, onClose: y, closeable: !0}, {
                        default: o((() => [n(C, {class: "Pay-popup"}, {
                            default: o((() => [n(C, {class: "Pay-popup_goods"}, {
                                default: o((() => [n(A, {
                                    class: "Pay-popup_goods__image",
                                    src: e.details.cover,
                                    mode: "scaleToFill"
                                }, null, 8, ["src"]), n(C, {class: "Pay-popup_goods__text"}, {
                                    default: o((() => [n(C, {class: "Pay-popup_goods__price"}, {
                                        default: o((() => [f("￥" + S(t.value), 1)])),
                                        _: 1
                                    }), n(C, {class: "Pay-popup_goods__prompt"}, {
                                        default: o((() => [f(S(s.value), 1)])),
                                        _: 1
                                    })])), _: 1
                                })])), _: 1
                            }), n(C, {class: "Pay-popup_main"}, {
                                default: o((() => [n(C, {class: "Pay-popup_styles"}, {
                                    default: o((() => [n(C, {class: "Pay-popup_styles__title"}, {
                                        default: o((() => [f("规格")])),
                                        _: 1
                                    }), n(C, {class: "Pay-popup_styles__content"}, {
                                        default: o((() => [(i(!0), p(g, null, _(e.details.specs, ((e, l) => (i(), r(C, {
                                            class: u("Pay-popup_styles__item " + (d.value === l ? "Pay-popup_styles__active" : "")),
                                            key: l,
                                            onClick: e => (e => {
                                                a.details.specs[d.value].sale, d.value = e, t.value = a.details.specs[d.value].sale, s.value = a.details.specs[d.value].label
                                            })(l)
                                        }, {
                                            default: o((() => [n(C, {class: "Pay-popup_styles__name"}, {
                                                default: o((() => [f(S(e.label) + " ￥" + S(e.sale), 1)])),
                                                _: 2
                                            }, 1024)])), _: 2
                                        }, 1032, ["class", "onClick"])))), 128))])), _: 1
                                    })])), _: 1
                                })])), _: 1
                            }), n(C, {class: "Pay-popup_btn", onClick: v}, {default: o((() => [f("立即支付")])), _: 1})])),
                            _: 1
                        })])), _: 1
                    }, 8, ["show"])])), _: 1
                })
            }
        }
    }, [["__scopeId", "data-v-7e0b146c"]]), L = j({
        __name: "details", setup(e) {
            const a = b(), t = J([]), s = J([]), l = J({}), u = J([]), d = J([]), y = J(!1), v = J(null), h = J(""),
                k = J([]), C = J(0), A = J([]), w = J([]), Q = J([]),
                q = J([{name: "首页", icon: "/static/home.png", url: "/pages/index/index"}, {
                    name: "客服",
                    icon: "/static/customer.png",
                    url: "/pages/index/customer"
                }, {name: "订单", icon: "/static/order.png", url: "/pages/index/order"}]);
            U({title: "加载中", mask: !0});
            const j = () => {
                y.value = !1, v.value = null, d.value = {}, h.value = ""
            }, V = () => {
                B({url: `/package_goods/pages/evaluate?id=${s.value.id}`})
            };
            return M((() => {
                (async () => {
                    const e = await x({goods_id: parseInt(a.query.id)});
                    t.value = O(e.result.carousel_image), u.value = [e.result.after_sales, e.result.logistics], e.result.params && u.value.push(e.result.params), k.value = e.result.evaluate, C.value = e.result.evaluate_total, A.value = e.result.detail_image, w.value = e.result.params, Q.value = e.result.specs, s.value = {
                        id: e.result.id,
                        cover: e.result.cover,
                        show_amount: e.result.show_amount,
                        sales: e.result.sales,
                        name: e.result.name,
                        tags: e.result.tags,
                        after_sales: e.result.after_sales,
                        logistics: e.result.logistics,
                        params: e.result.params,
                        evaluate: e.result.evaluate,
                        specs: e.result.specs
                    }, R()
                })(), (async () => {
                    const e = await P();
                    l.value = e.result
                })()
            })), (e, a) => {
                const w = F(I("up-swiper"), z), Q = m, J = E, B = F(I("Shop"), H);
                return i(), r(Q, {class: "details"}, {
                    default: o((() => [n(w, {
                        class: "details-banner",
                        radius: "0",
                        height: "500",
                        list: t.value,
                        indicator: "",
                        indicatorMode: "line",
                        circular: ""
                    }, null, 8, ["list"]), n(Q, {class: "details-main"}, {
                        default: o((() => [n(Q, {class: "details-main_price"}, {
                            default: o((() => [n(Q, {class: "details-main_price__normal"}, {
                                default: o((() => [f("￥" + S(s.value.show_amount), 1)])),
                                _: 1
                            }), n(Q, {class: "details-main_price__sold"}, {
                                default: o((() => [f("已售" + S(s.value.sales), 1)])),
                                _: 1
                            })])), _: 1
                        }), n(Q, {class: "details-main_name"}, {
                            default: o((() => [f(S(s.value.name), 1)])),
                            _: 1
                        }), n(Q, {class: "details-main_tags"}, {
                            default: o((() => [n(Z, {tags: s.value.tags}, null, 8, ["tags"])])),
                            _: 1
                        })])), _: 1
                    }), n(Q, {class: "details-main_other"}, {
                        default: o((() => [n(Q, {class: "details-main_card"}, {
                            default: o((() => [(i(!0), p(g, null, _(u.value, ((e, a) => (i(), r(Q, {
                                class: "details-main_other__item",
                                key: a,
                                onClick: e => (e => {
                                    switch (e) {
                                        case 0:
                                            d.value = s.value.after_sales.items, h.value = s.value.after_sales.title;
                                            break;
                                        case 1:
                                            d.value = s.value.logistics.items, h.value = s.value.logistics.title;
                                            break;
                                        case 2:
                                            d.value = s.value.params.items, h.value = s.value.params.title
                                    }
                                    y.value = !0, v.value = e
                                })(a)
                            }, {
                                default: o((() => [n(J, {
                                    class: "details-main_other__image",
                                    src: e.icon,
                                    mode: "scaleToFill"
                                }, null, 8, ["src"]), n(Q, {class: "details-main_other__title u-line-1"}, {
                                    default: o((() => [f(S(e.tips), 1)])),
                                    _: 2
                                }, 1024), n(J, {class: "details-main_other__more", src: G, mode: "scaleToFill"})])), _: 2
                            }, 1032, ["onClick"])))), 128))])), _: 1
                        })])), _: 1
                    }), n(Q, {class: "details-shop"}, {
                        default: o((() => [n(B, {shop: l.value}, null, 8, ["shop"])])),
                        _: 1
                    }), n(Q, {class: "details-main_evaluate"}, {
                        default: o((() => [n(Q, {class: "details-main_card"}, {
                            default: o((() => [n(Q, {class: "details-main_evaluate__title"}, {
                                default: o((() => [f("商品评价(" + S(C.value) + ") ", 1), N("div", {
                                    class: "details-main_evaluate__more",
                                    onClick: V
                                }, [f("查看全部 "), n(J, {
                                    class: "details-main_other__more",
                                    src: G,
                                    mode: "scaleToFill"
                                })])])), _: 1
                            }), (i(!0), p(g, null, _(k.value, (e => (i(), r(Q, {
                                class: "details-main_evaluate__item",
                                key: e.id
                            }, {
                                default: o((() => [n(Q, {class: "details-main_evaluate__left"}, {
                                    default: o((() => [n(Q, {class: "details-main_evaluate__top"}, {
                                        default: o((() => [n(J, {
                                            src: e.profile,
                                            mode: "scaleToFill",
                                            class: "details-main_evaluate__image"
                                        }, null, 8, ["src"]), n(Q, {class: "details-main_evaluate__name"}, {
                                            default: o((() => [f(S(e.title), 1)])),
                                            _: 2
                                        }, 1024)])), _: 2
                                    }, 1024), n(Q, {class: "details-main_evaluate__bottom u-line-2"}, {
                                        default: o((() => [f(S(e.content), 1)])),
                                        _: 2
                                    }, 1024), n(Z, {tags: e.tags}, null, 8, ["tags"])])), _: 2
                                }, 1024), e.picture.length ? (i(), r(Q, {
                                    key: 0,
                                    class: "details-main_evaluate__right"
                                }, {
                                    default: o((() => [n(J, {
                                        class: "details-main_evaluate__imgs",
                                        src: e.picture[0],
                                        mode: "scaleToFill"
                                    }, null, 8, ["src"]), n(Q, {class: "details-main_evaluate__imgsNum"}, {
                                        default: o((() => [f(S(e.picture.length), 1)])),
                                        _: 2
                                    }, 1024)])), _: 2
                                }, 1024)) : c("", !0)])), _: 2
                            }, 1024)))), 128))])), _: 1
                        })])), _: 1
                    }), n(Q, {class: "details-main_details"}, {
                        default: o((() => [n(Q, {class: "details-main_details__title"}, {
                            default: o((() => [f(" ———— 商品详情 ———— ")])),
                            _: 1
                        }), A.value.length > 0 ? (i(), r(Q, {
                            key: 0,
                            class: "details-main_details__content"
                        }, {
                            default: o((() => [(i(!0), p(g, null, _(A.value, ((e, a) => (i(), r(J, {
                                key: a,
                                src: e,
                                mode: "widthFix"
                            }, null, 8, ["src"])))), 128))])), _: 1
                        })) : c("", !0)])), _: 1
                    }), n(Y, {
                        goodsOthersParams: d.value,
                        goodsOthersIndex: v.value,
                        goodsOthersStated: y.value,
                        goodsOthersTitle: h.value,
                        onClose: j
                    }, null, 8, ["goodsOthersParams", "goodsOthersIndex", "goodsOthersStated", "goodsOthersTitle"]), n(Q, {class: "details-nav"}, {
                        default: o((() => [(i(!0), p(g, null, _(q.value, (e => (i(), r(Q, {
                            class: "details-nav_item",
                            onClick: a => {
                                return t = e.url, void T({url: t});
                                var t
                            }
                        }, {
                            default: o((() => [n(J, {
                                class: "details-nav_item__icon",
                                src: e.icon,
                                mode: "widthFix"
                            }, null, 8, ["src"]), n(Q, {class: "details-nav_item__name"}, {
                                default: o((() => [f(S(e.name), 1)])),
                                _: 2
                            }, 1024)])), _: 2
                        }, 1032, ["onClick"])))), 256)), n(D, {details: s.value}, null, 8, ["details"])])), _: 1
                    })])), _: 1
                })
            }
        }
    }, [["__scopeId", "data-v-50c96da9"]]);
export {L as default};
