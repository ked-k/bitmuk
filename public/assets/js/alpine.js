import _regeneratorRuntime from "@babel/runtime/regenerator";

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) {
    try {
        var info = gen[key](arg);
        var value = info.value;
    } catch (error) {
        reject(error);
        return;
    }
    if (info.done) {
        resolve(value);
    } else {
        Promise.resolve(value).then(_next, _throw);
    }
}

function _asyncToGenerator(fn) {
    return function () {
        var self = this, args = arguments;
        return new Promise(function (resolve, reject) {
            var gen = fn.apply(self, args);

            function _next(value) {
                asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value);
            }

            function _throw(err) {
                asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err);
            }

            _next(undefined);
        });
    };
}

function _typeof(obj) {
    "@babel/helpers - typeof";
    return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) {
        return typeof obj;
    } : function (obj) {
        return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    }, _typeof(obj);
}

function ownKeys(object, enumerableOnly) {
    var keys = Object.keys(object);
    if (Object.getOwnPropertySymbols) {
        var symbols = Object.getOwnPropertySymbols(object);
        enumerableOnly && (symbols = symbols.filter(function (sym) {
            return Object.getOwnPropertyDescriptor(object, sym).enumerable;
        })), keys.push.apply(keys, symbols);
    }
    return keys;
}

function _objectSpread(target) {
    for (var i = 1; i < arguments.length; i++) {
        var source = null != arguments[i] ? arguments[i] : {};
        i % 2 ? ownKeys(Object(source), !0).forEach(function (key) {
            _defineProperty(target, key, source[key]);
        }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) {
            Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key));
        });
    }
    return target;
}

function _defineProperty(obj, key, value) {
    if (key in obj) {
        Object.defineProperty(obj, key, {value: value, enumerable: true, configurable: true, writable: true});
    } else {
        obj[key] = value;
    }
    return obj;
}

function _toConsumableArray(arr) {
    return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread();
}

function _nonIterableSpread() {
    throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

function _iterableToArray(iter) {
    if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter);
}

function _arrayWithoutHoles(arr) {
    if (Array.isArray(arr)) return _arrayLikeToArray(arr);
}

function _slicedToArray(arr, i) {
    return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest();
}

function _nonIterableRest() {
    throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

function _unsupportedIterableToArray(o, minLen) {
    if (!o) return;
    if (typeof o === "string") return _arrayLikeToArray(o, minLen);
    var n = Object.prototype.toString.call(o).slice(8, -1);
    if (n === "Object" && o.constructor) n = o.constructor.name;
    if (n === "Map" || n === "Set") return Array.from(o);
    if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen);
}

function _arrayLikeToArray(arr, len) {
    if (len == null || len > arr.length) len = arr.length;
    for (var i = 0, arr2 = new Array(len); i < len; i++) {
        arr2[i] = arr[i];
    }
    return arr2;
}

function _iterableToArrayLimit(arr, i) {
    var _i = arr == null ? null : typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"];
    if (_i == null) return;
    var _arr = [];
    var _n = true;
    var _d = false;
    var _s, _e;
    try {
        for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) {
            _arr.push(_s.value);
            if (i && _arr.length === i) break;
        }
    } catch (err) {
        _d = true;
        _e = err;
    } finally {
        try {
            if (!_n && _i["return"] != null) _i["return"]();
        } finally {
            if (_d) throw _e;
        }
    }
    return _arr;
}

function _arrayWithHoles(arr) {
    if (Array.isArray(arr)) return arr;
}

(function () {
    var _Wo, _Go;

    var Ve = !1,
        He = !1,
        ee = [];

    function Rt(e) {
        Xr(e);
    }

    function Xr(e) {
        ee.includes(e) || ee.push(e), en();
    }

    function en() {
        !He && !Ve && (Ve = !0, queueMicrotask(tn));
    }

    function tn() {
        Ve = !1, He = !0;

        for (var e = 0; e < ee.length; e++) {
            ee[e]();
        }

        ee.length = 0, He = !1;
    }

    var O,
        k,
        G,
        qe,
        Ue = !0;

    function Mt(e) {
        Ue = !1, e(), Ue = !0;
    }

    function Nt(e) {
        O = e.reactive, G = e.release, k = function k(t) {
            return e.effect(t, {
                scheduler: function scheduler(r) {
                    Ue ? Rt(r) : r();
                }
            });
        }, qe = e.raw;
    }

    function We(e) {
        k = e;
    }

    function kt(e) {
        var t = function t() {
        };

        return [function (n) {
            var i = k(n);
            e._x_effects || (e._x_effects = new Set(), e._x_runEffects = function () {
                e._x_effects.forEach(function (o) {
                    return o();
                });
            }), e._x_effects.add(i), t = function t() {
                i !== void 0 && (e._x_effects["delete"](i), G(i));
            };
        }, function () {
            t();
        }];
    }

    var Pt = [],
        It = [],
        Dt = [];

    function $t(e) {
        Dt.push(e);
    }

    function Lt(e) {
        It.push(e);
    }

    function jt(e) {
        Pt.push(e);
    }

    function Ft(e, t, r) {
        e._x_attributeCleanups || (e._x_attributeCleanups = {}), e._x_attributeCleanups[t] || (e._x_attributeCleanups[t] = []), e._x_attributeCleanups[t].push(r);
    }

    function Ge(e, t) {
        !e._x_attributeCleanups || Object.entries(e._x_attributeCleanups).forEach(function (_ref) {
            var _ref2 = _slicedToArray(_ref, 2),
                r = _ref2[0],
                n = _ref2[1];

            (t === void 0 || t.includes(r)) && (n.forEach(function (i) {
                return i();
            }), delete e._x_attributeCleanups[r]);
        });
    }

    var Je = new MutationObserver(Ye),
        Ze = !1;

    function Qe() {
        Je.observe(document, {
            subtree: !0,
            childList: !0,
            attributes: !0,
            attributeOldValue: !0
        }), Ze = !0;
    }

    function nn() {
        rn(), Je.disconnect(), Ze = !1;
    }

    var te = [],
        Xe = !1;

    function rn() {
        te = te.concat(Je.takeRecords()), te.length && !Xe && (Xe = !0, queueMicrotask(function () {
            on(), Xe = !1;
        }));
    }

    function on() {
        Ye(te), te.length = 0;
    }

    function m(e) {
        if (!Ze) return e();
        nn();
        var t = e();
        return Qe(), t;
    }

    var et = !1,
        he = [];

    function Kt() {
        et = !0;
    }

    function zt() {
        et = !1, Ye(he), he = [];
    }

    function Ye(e) {
        if (et) {
            he = he.concat(e);
            return;
        }

        var t = [],
            r = [],
            n = new Map(),
            i = new Map();

        for (var o = 0; o < e.length; o++) {
            if (!e[o].target._x_ignoreMutationObserver && (e[o].type === "childList" && (e[o].addedNodes.forEach(function (s) {
                return s.nodeType === 1 && t.push(s);
            }), e[o].removedNodes.forEach(function (s) {
                return s.nodeType === 1 && r.push(s);
            })), e[o].type === "attributes")) {
                (function () {
                    var s = e[o].target,
                        a = e[o].attributeName,
                        c = e[o].oldValue,
                        l = function l() {
                            n.has(s) || n.set(s, []), n.get(s).push({
                                name: a,
                                value: s.getAttribute(a)
                            });
                        },
                        u = function u() {
                            i.has(s) || i.set(s, []), i.get(s).push(a);
                        };

                    s.hasAttribute(a) && c === null ? l() : s.hasAttribute(a) ? (u(), l()) : u();
                })();
            }
        }

        i.forEach(function (o, s) {
            Ge(s, o);
        }), n.forEach(function (o, s) {
            Pt.forEach(function (a) {
                return a(s, o);
            });
        });

        var _loop = function _loop() {
            var o = _r2[_i2];
            t.includes(o) || It.forEach(function (s) {
                return s(o);
            });
        };

        for (var _i2 = 0, _r2 = r; _i2 < _r2.length; _i2++) {
            _loop();
        }

        t.forEach(function (o) {
            o._x_ignoreSelf = !0, o._x_ignore = !0;
        });

        var _loop2 = function _loop2() {
            var o = _t2[_i3];
            r.includes(o) || !o.isConnected || (delete o._x_ignoreSelf, delete o._x_ignore, Dt.forEach(function (s) {
                return s(o);
            }), o._x_ignore = !0, o._x_ignoreSelf = !0);
        };

        for (var _i3 = 0, _t2 = t; _i3 < _t2.length; _i3++) {
            _loop2();
        }

        t.forEach(function (o) {
            delete o._x_ignoreSelf, delete o._x_ignore;
        }), t = null, r = null, n = null, i = null;
    }

    function _e(e) {
        return I(P(e));
    }

    function C(e, t, r) {
        return e._x_dataStack = [t].concat(_toConsumableArray(P(r || e))), function () {
            e._x_dataStack = e._x_dataStack.filter(function (n) {
                return n !== t;
            });
        };
    }

    function tt(e, t) {
        var r = e._x_dataStack[0];
        Object.entries(t).forEach(function (_ref3) {
            var _ref4 = _slicedToArray(_ref3, 2),
                n = _ref4[0],
                i = _ref4[1];

            r[n] = i;
        });
    }

    function P(e) {
        return e._x_dataStack ? e._x_dataStack : typeof ShadowRoot == "function" && e instanceof ShadowRoot ? P(e.host) : e.parentNode ? P(e.parentNode) : [];
    }

    function I(e) {
        var t = new Proxy({}, {
            ownKeys: function ownKeys() {
                return Array.from(new Set(e.flatMap(function (r) {
                    return Object.keys(r);
                })));
            },
            has: function has(r, n) {
                return e.some(function (i) {
                    return i.hasOwnProperty(n);
                });
            },
            get: function get(r, n) {
                return (e.find(function (i) {
                    if (i.hasOwnProperty(n)) {
                        var o = Object.getOwnPropertyDescriptor(i, n);
                        if (o.get && o.get._x_alreadyBound || o.set && o.set._x_alreadyBound) return !0;

                        if ((o.get || o.set) && o.enumerable) {
                            var s = o.get,
                                a = o.set,
                                c = o;
                            s = s && s.bind(t), a = a && a.bind(t), s && (s._x_alreadyBound = !0), a && (a._x_alreadyBound = !0), Object.defineProperty(i, n, _objectSpread(_objectSpread({}, c), {}, {
                                get: s,
                                set: a
                            }));
                        }

                        return !0;
                    }

                    return !1;
                }) || {})[n];
            },
            set: function set(r, n, i) {
                var o = e.find(function (s) {
                    return s.hasOwnProperty(n);
                });
                return o ? o[n] = i : e[e.length - 1][n] = i, !0;
            }
        });
        return t;
    }

    function ge(e) {
        var t = function t(n) {
                return _typeof(n) == "object" && !Array.isArray(n) && n !== null;
            },
            r = function r(n) {
                var i = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";
                Object.entries(Object.getOwnPropertyDescriptors(n)).forEach(function (_ref5) {
                    var _ref6 = _slicedToArray(_ref5, 2),
                        o = _ref6[0],
                        _ref6$ = _ref6[1],
                        s = _ref6$.value,
                        a = _ref6$.enumerable;

                    if (a === !1 || s === void 0) return;
                    var c = i === "" ? o : "".concat(i, ".").concat(o);
                    _typeof(s) == "object" && s !== null && s._x_interceptor ? n[o] = s.initialize(e, c, o) : t(s) && s !== n && !(s instanceof Element) && r(s, c);
                });
            };

        return r(e);
    }

    function xe(e) {
        var t = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : function () {
        };
        var r = {
            initialValue: void 0,
            _x_interceptor: !0,
            initialize: function initialize(n, i, o) {
                return e(this.initialValue, function () {
                    return sn(n, i);
                }, function (s) {
                    return rt(n, i, s);
                }, i, o);
            }
        };
        return t(r), function (n) {
            if (_typeof(n) == "object" && n !== null && n._x_interceptor) {
                var i = r.initialize.bind(r);

                r.initialize = function (o, s, a) {
                    var c = n.initialize(o, s, a);
                    return r.initialValue = c, i(o, s, a);
                };
            } else r.initialValue = n;

            return r;
        };
    }

    function sn(e, t) {
        return t.split(".").reduce(function (r, n) {
            return r[n];
        }, e);
    }

    function rt(e, t, r) {
        if (typeof t == "string" && (t = t.split(".")), t.length === 1) e[t[0]] = r; else {
            if (t.length === 0) throw error;
            return e[t[0]] || (e[t[0]] = {}), rt(e[t[0]], t.slice(1), r);
        }
    }

    var Bt = {};

    function y(e, t) {
        Bt[e] = t;
    }

    function re(e, t) {
        return Object.entries(Bt).forEach(function (_ref7) {
            var _ref8 = _slicedToArray(_ref7, 2),
                r = _ref8[0],
                n = _ref8[1];

            Object.defineProperty(e, "$".concat(r), {
                get: function get() {
                    return n(t, {
                        Alpine: R,
                        interceptor: xe
                    });
                },
                enumerable: !1
            });
        }), e;
    }

    function Vt(e, t, r) {
        try {
            for (var _len = arguments.length, n = new Array(_len > 3 ? _len - 3 : 0), _key = 3; _key < _len; _key++) {
                n[_key - 3] = arguments[_key];
            }

            return r.apply(void 0, n);
        } catch (i) {
            Y(i, e, t);
        }
    }

    function Y(e, t) {
        var r = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : void 0;
        Object.assign(e, {
            el: t,
            expression: r
        }), console.warn("Alpine Expression Error: ".concat(e.message, "\n\n").concat(r ? 'Expression: "' + r + "\"\n\n" : ""), t), setTimeout(function () {
            throw e;
        }, 0);
    }

    function w(e, t) {
        var r = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};
        var n;
        return h(e, t)(function (i) {
            return n = i;
        }, r), n;
    }

    function h() {
        return Ht.apply(void 0, arguments);
    }

    var Ht = nt;

    function qt(e) {
        Ht = e;
    }

    function nt(e, t) {
        var r = {};
        re(r, e);
        var n = [r].concat(_toConsumableArray(P(e)));
        if (typeof t == "function") return an(n, t);
        var i = cn(n, t, e);
        return Vt.bind(null, e, t, i);
    }

    function an(e, t) {
        return function () {
            var r = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : function () {
            };

            var _ref9 = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {},
                _ref9$scope = _ref9.scope,
                n = _ref9$scope === void 0 ? {} : _ref9$scope,
                _ref9$params = _ref9.params,
                i = _ref9$params === void 0 ? [] : _ref9$params;

            var o = t.apply(I([n].concat(_toConsumableArray(e))), i);
            ye(r, o);
        };
    }

    var it = {};

    function ln(e, t) {
        if (it[e]) return it[e];

        var r = Object.getPrototypeOf( /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_regeneratorRuntime.mark(function _callee() {
                return _regeneratorRuntime.wrap(function _callee$(_context) {
                    while (1) {
                        switch (_context.prev = _context.next) {
                            case 0:
                            case "end":
                                return _context.stop();
                        }
                    }
                }, _callee);
            }))).constructor,
            n = /^[\n\s]*if.*\(.*\)/.test(e) || /^(let|const)\s/.test(e) ? "(() => { ".concat(e, " })()") : e,
            o = function () {
                try {
                    return new r(["__self", "scope"], "with (scope) { __self.result = ".concat(n, " }; __self.finished = true; return __self.result;"));
                } catch (s) {
                    return Y(s, t, e), Promise.resolve();
                }
            }();

        return it[e] = o, o;
    }

    function cn(e, t, r) {
        var n = ln(t, r);
        return function () {
            var i = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : function () {
            };

            var _ref11 = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {},
                _ref11$scope = _ref11.scope,
                o = _ref11$scope === void 0 ? {} : _ref11$scope,
                _ref11$params = _ref11.params,
                s = _ref11$params === void 0 ? [] : _ref11$params;

            n.result = void 0, n.finished = !1;
            var a = I([o].concat(_toConsumableArray(e)));

            if (typeof n == "function") {
                var c = n(n, a)["catch"](function (l) {
                    return Y(l, r, t);
                });
                n.finished ? (ye(i, n.result, a, s, r), n.result = void 0) : c.then(function (l) {
                    ye(i, l, a, s, r);
                })["catch"](function (l) {
                    return Y(l, r, t);
                })["finally"](function () {
                    return n.result = void 0;
                });
            }
        };
    }

    function ye(e, t, r, n, i) {
        if (typeof t == "function") {
            var o = t.apply(r, n);
            o instanceof Promise ? o.then(function (s) {
                return ye(e, s, r, n);
            })["catch"](function (s) {
                return Y(s, i, t);
            }) : e(o);
        } else e(t);
    }

    var ot = "x-";

    function E() {
        var e = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
        return ot + e;
    }

    function Ut(e) {
        ot = e;
    }

    var Wt = {};

    function p(e, t) {
        Wt[e] = t;
    }

    function ne(e, t, r) {
        var n = {};
        return Array.from(t).map(Gt(function (o, s) {
            return n[o] = s;
        })).filter(Yt).map(fn(n, r)).sort(dn).map(function (o) {
            return un(e, o);
        });
    }

    function Jt(e) {
        return Array.from(e).map(Gt()).filter(function (t) {
            return !Yt(t);
        });
    }

    var st = !1,
        ie = new Map(),
        Zt = Symbol();

    function Qt(e) {
        st = !0;
        var t = Symbol();
        Zt = t, ie.set(t, []);

        var r = function r() {
                for (; ie.get(t).length;) {
                    ie.get(t).shift()();
                }

                ie["delete"](t);
            },
            n = function n() {
                st = !1, r();
            };

        e(r), n();
    }

    function un(e, t) {
        var r = function r() {
            },
            n = Wt[t.type] || r,
            i = [],
            o = function o(d) {
                return i.push(d);
            },
            _kt = kt(e),
            _kt2 = _slicedToArray(_kt, 2),
            s = _kt2[0],
            a = _kt2[1];

        i.push(a);

        var c = {
                Alpine: R,
                effect: s,
                cleanup: o,
                evaluateLater: h.bind(h, e),
                evaluate: w.bind(w, e)
            },
            l = function l() {
                return i.forEach(function (d) {
                    return d();
                });
            };

        Ft(e, t.original, l);

        var u = function u() {
            e._x_ignore || e._x_ignoreSelf || (n.inline && n.inline(e, t, c), n = n.bind(n, e, t, c), st ? ie.get(Zt).push(n) : n());
        };

        return u.runCleanups = l, u;
    }

    var be = function be(e, t) {
            return function (_ref12) {
                var r = _ref12.name,
                    n = _ref12.value;
                return r.startsWith(e) && (r = r.replace(e, t)), {
                    name: r,
                    value: n
                };
            };
        },
        ve = function ve(e) {
            return e;
        };

    function Gt() {
        var e = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : function () {
        };
        return function (_ref13) {
            var t = _ref13.name,
                r = _ref13.value;

            var _Xt$reduce = Xt.reduce(function (o, s) {
                    return s(o);
                }, {
                    name: t,
                    value: r
                }),
                n = _Xt$reduce.name,
                i = _Xt$reduce.value;

            return n !== t && e(n, t), {
                name: n,
                value: i
            };
        };
    }

    var Xt = [];

    function J(e) {
        Xt.push(e);
    }

    function Yt(_ref14) {
        var e = _ref14.name;
        return er().test(e);
    }

    var er = function er() {
        return new RegExp("^".concat(ot, "([^:^.]+)\\b"));
    };

    function fn(e, t) {
        return function (_ref15) {
            var r = _ref15.name,
                n = _ref15.value;
            var i = r.match(er()),
                o = r.match(/:([a-zA-Z0-9\-:]+)/),
                s = r.match(/\.[^.\]]+(?=[^\]]*$)/g) || [],
                a = t || e[r] || r;
            return {
                type: i ? i[1] : null,
                value: o ? o[1] : null,
                modifiers: s.map(function (c) {
                    return c.replace(".", "");
                }),
                expression: n,
                original: a
            };
        };
    }

    var at = "DEFAULT",
        we = ["ignore", "ref", "data", "id", "bind", "init", "for", "model", "transition", "show", "if", at, "teleport", "element"];

    function dn(e, t) {
        var r = we.indexOf(e.type) === -1 ? at : e.type,
            n = we.indexOf(t.type) === -1 ? at : t.type;
        return we.indexOf(r) - we.indexOf(n);
    }

    function K(e, t) {
        var r = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};
        e.dispatchEvent(new CustomEvent(t, {
            detail: r,
            bubbles: !0,
            composed: !0,
            cancelable: !0
        }));
    }

    var ct = [],
        lt = !1;

    function Se(e) {
        ct.push(e), queueMicrotask(function () {
            lt || setTimeout(function () {
                Ee();
            });
        });
    }

    function Ee() {
        for (lt = !1; ct.length;) {
            ct.shift()();
        }
    }

    function tr() {
        lt = !0;
    }

    function D(e, t) {
        if (typeof ShadowRoot == "function" && e instanceof ShadowRoot) {
            Array.from(e.children).forEach(function (i) {
                return D(i, t);
            });
            return;
        }

        var r = !1;
        if (t(e, function () {
            return r = !0;
        }), r) return;
        var n = e.firstElementChild;

        for (; n;) {
            D(n, t, !1), n = n.nextElementSibling;
        }
    }

    function z(e) {
        var _console;

        for (var _len2 = arguments.length, t = new Array(_len2 > 1 ? _len2 - 1 : 0), _key2 = 1; _key2 < _len2; _key2++) {
            t[_key2 - 1] = arguments[_key2];
        }

        (_console = console).warn.apply(_console, ["Alpine Warning: ".concat(e)].concat(t));
    }

    function nr() {
        document.body || z("Unable to initialize. Trying to load Alpine before `<body>` is available. Did you forget to add `defer` in Alpine's `<script>` tag?"), K(document, "alpine:init"), K(document, "alpine:initializing"), Qe(), $t(function (t) {
            return S(t, D);
        }), Lt(function (t) {
            return pn(t);
        }), jt(function (t, r) {
            ne(t, r).forEach(function (n) {
                return n();
            });
        });

        var e = function e(t) {
            return !B(t.parentElement, !0);
        };

        Array.from(document.querySelectorAll(rr())).filter(e).forEach(function (t) {
            S(t);
        }), K(document, "alpine:initialized");
    }

    var ut = [],
        ir = [];

    function or() {
        return ut.map(function (e) {
            return e();
        });
    }

    function rr() {
        return ut.concat(ir).map(function (e) {
            return e();
        });
    }

    function Ae(e) {
        ut.push(e);
    }

    function Oe(e) {
        ir.push(e);
    }

    function B(e) {
        var t = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : !1;
        return Z(e, function (r) {
            if ((t ? rr() : or()).some(function (i) {
                return r.matches(i);
            })) return !0;
        });
    }

    function Z(e, t) {
        if (!!e) {
            if (t(e)) return e;
            if (e._x_teleportBack && (e = e._x_teleportBack), !!e.parentElement) return Z(e.parentElement, t);
        }
    }

    function sr(e) {
        return or().some(function (t) {
            return e.matches(t);
        });
    }

    function S(e) {
        var t = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : D;
        Qt(function () {
            t(e, function (r, n) {
                ne(r, r.attributes).forEach(function (i) {
                    return i();
                }), r._x_ignore && n();
            });
        });
    }

    function pn(e) {
        D(e, function (t) {
            return Ge(t);
        });
    }

    function oe(e, t) {
        return Array.isArray(t) ? ar(e, t.join(" ")) : _typeof(t) == "object" && t !== null ? mn(e, t) : typeof t == "function" ? oe(e, t()) : ar(e, t);
    }

    function ar(e, t) {
        var r = function r(o) {
                return o.split(" ").filter(Boolean);
            },
            n = function n(o) {
                return o.split(" ").filter(function (s) {
                    return !e.classList.contains(s);
                }).filter(Boolean);
            },
            i = function i(o) {
                var _e$classList;

                return (_e$classList = e.classList).add.apply(_e$classList, _toConsumableArray(o)), function () {
                    var _e$classList2;

                    (_e$classList2 = e.classList).remove.apply(_e$classList2, _toConsumableArray(o));
                };
            };

        return t = t === !0 ? t = "" : t || "", i(n(t));
    }

    function mn(e, t) {
        var r = function r(a) {
                return a.split(" ").filter(Boolean);
            },
            n = Object.entries(t).flatMap(function (_ref16) {
                var _ref17 = _slicedToArray(_ref16, 2),
                    a = _ref17[0],
                    c = _ref17[1];

                return c ? r(a) : !1;
            }).filter(Boolean),
            i = Object.entries(t).flatMap(function (_ref18) {
                var _ref19 = _slicedToArray(_ref18, 2),
                    a = _ref19[0],
                    c = _ref19[1];

                return c ? !1 : r(a);
            }).filter(Boolean),
            o = [],
            s = [];

        return i.forEach(function (a) {
            e.classList.contains(a) && (e.classList.remove(a), s.push(a));
        }), n.forEach(function (a) {
            e.classList.contains(a) || (e.classList.add(a), o.push(a));
        }), function () {
            s.forEach(function (a) {
                return e.classList.add(a);
            }), o.forEach(function (a) {
                return e.classList.remove(a);
            });
        };
    }

    function V(e, t) {
        return _typeof(t) == "object" && t !== null ? hn(e, t) : _n(e, t);
    }

    function hn(e, t) {
        var r = {};
        return Object.entries(t).forEach(function (_ref20) {
            var _ref21 = _slicedToArray(_ref20, 2),
                n = _ref21[0],
                i = _ref21[1];

            r[n] = e.style[n], e.style.setProperty(gn(n), i);
        }), setTimeout(function () {
            e.style.length === 0 && e.removeAttribute("style");
        }), function () {
            V(e, r);
        };
    }

    function _n(e, t) {
        var r = e.getAttribute("style", t);
        return e.setAttribute("style", t), function () {
            e.setAttribute("style", r || "");
        };
    }

    function gn(e) {
        return e.replace(/([a-z])([A-Z])/g, "$1-$2").toLowerCase();
    }

    function se(e) {
        var t = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : function () {
        };
        var r = !1;
        return function () {
            r ? t.apply(this, arguments) : (r = !0, e.apply(this, arguments));
        };
    }

    p("transition", function (e, _ref22, _ref23) {
        var t = _ref22.value,
            r = _ref22.modifiers,
            n = _ref22.expression;
        var i = _ref23.evaluate;
        typeof n == "function" && (n = i(n)), n ? xn(e, n, t) : yn(e, r, t);
    });

    function xn(e, t, r) {
        cr(e, oe, ""), {
            enter: function enter(i) {
                e._x_transition.enter.during = i;
            },
            "enter-start": function enterStart(i) {
                e._x_transition.enter.start = i;
            },
            "enter-end": function enterEnd(i) {
                e._x_transition.enter.end = i;
            },
            leave: function leave(i) {
                e._x_transition.leave.during = i;
            },
            "leave-start": function leaveStart(i) {
                e._x_transition.leave.start = i;
            },
            "leave-end": function leaveEnd(i) {
                e._x_transition.leave.end = i;
            }
        }[r](t);
    }

    function yn(e, t, r) {
        cr(e, V);
        var n = !t.includes("in") && !t.includes("out") && !r,
            i = n || t.includes("in") || ["enter"].includes(r),
            o = n || t.includes("out") || ["leave"].includes(r);
        t.includes("in") && !n && (t = t.filter(function (g, b) {
            return b < t.indexOf("out");
        })), t.includes("out") && !n && (t = t.filter(function (g, b) {
            return b > t.indexOf("out");
        }));
        var s = !t.includes("opacity") && !t.includes("scale"),
            a = s || t.includes("opacity"),
            c = s || t.includes("scale"),
            l = a ? 0 : 1,
            u = c ? ae(t, "scale", 95) / 100 : 1,
            d = ae(t, "delay", 0),
            x = ae(t, "origin", "center"),
            N = "opacity, transform",
            U = ae(t, "duration", 150) / 1e3,
            pe = ae(t, "duration", 75) / 1e3,
            f = "cubic-bezier(0.4, 0.0, 0.2, 1)";
        i && (e._x_transition.enter.during = {
            transformOrigin: x,
            transitionDelay: d,
            transitionProperty: N,
            transitionDuration: "".concat(U, "s"),
            transitionTimingFunction: f
        }, e._x_transition.enter.start = {
            opacity: l,
            transform: "scale(".concat(u, ")")
        }, e._x_transition.enter.end = {
            opacity: 1,
            transform: "scale(1)"
        }), o && (e._x_transition.leave.during = {
            transformOrigin: x,
            transitionDelay: d,
            transitionProperty: N,
            transitionDuration: "".concat(pe, "s"),
            transitionTimingFunction: f
        }, e._x_transition.leave.start = {
            opacity: 1,
            transform: "scale(1)"
        }, e._x_transition.leave.end = {
            opacity: l,
            transform: "scale(".concat(u, ")")
        });
    }

    function cr(e, t) {
        var r = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};
        e._x_transition || (e._x_transition = {
            enter: {
                during: r,
                start: r,
                end: r
            },
            leave: {
                during: r,
                start: r,
                end: r
            },
            "in": function _in() {
                var n = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : function () {
                };
                var i = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : function () {
                };
                Te(e, t, {
                    during: this.enter.during,
                    start: this.enter.start,
                    end: this.enter.end
                }, n, i);
            },
            out: function out() {
                var n = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : function () {
                };
                var i = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : function () {
                };
                Te(e, t, {
                    during: this.leave.during,
                    start: this.leave.start,
                    end: this.leave.end
                }, n, i);
            }
        });
    }

    window.Element.prototype._x_toggleAndCascadeWithTransitions = function (e, t, r, n) {
        var i = function i() {
            document.visibilityState === "visible" ? requestAnimationFrame(r) : setTimeout(r);
        };

        if (t) {
            e._x_transition && (e._x_transition.enter || e._x_transition.leave) ? e._x_transition.enter && (Object.entries(e._x_transition.enter.during).length || Object.entries(e._x_transition.enter.start).length || Object.entries(e._x_transition.enter.end).length) ? e._x_transition["in"](r) : i() : e._x_transition ? e._x_transition["in"](r) : i();
            return;
        }

        e._x_hidePromise = e._x_transition ? new Promise(function (o, s) {
            e._x_transition.out(function () {
            }, function () {
                return o(n);
            }), e._x_transitioning.beforeCancel(function () {
                return s({
                    isFromCancelledTransition: !0
                });
            });
        }) : Promise.resolve(n), queueMicrotask(function () {
            var o = lr(e);
            o ? (o._x_hideChildren || (o._x_hideChildren = []), o._x_hideChildren.push(e)) : queueMicrotask(function () {
                var s = function s(a) {
                    var c = Promise.all([a._x_hidePromise].concat(_toConsumableArray((a._x_hideChildren || []).map(s)))).then(function (_ref24) {
                        var _ref25 = _slicedToArray(_ref24, 1),
                            l = _ref25[0];

                        return l();
                    });
                    return delete a._x_hidePromise, delete a._x_hideChildren, c;
                };

                s(e)["catch"](function (a) {
                    if (!a.isFromCancelledTransition) throw a;
                });
            });
        });
    };

    function lr(e) {
        var t = e.parentNode;
        if (!!t) return t._x_hidePromise ? t : lr(t);
    }

    function Te(e, t) {
        var _ref26 = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {},
            r = _ref26.during,
            n = _ref26.start,
            i = _ref26.end;

        var o = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : function () {
        };
        var s = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : function () {
        };

        if (e._x_transitioning && e._x_transitioning.cancel(), Object.keys(r).length === 0 && Object.keys(n).length === 0 && Object.keys(i).length === 0) {
            o(), s();
            return;
        }

        var a, c, l;
        bn(e, {
            start: function start() {
                a = t(e, n);
            },
            during: function during() {
                c = t(e, r);
            },
            before: o,
            end: function end() {
                a(), l = t(e, i);
            },
            after: s,
            cleanup: function cleanup() {
                c(), l();
            }
        });
    }

    function bn(e, t) {
        var r,
            n,
            i,
            o = se(function () {
                m(function () {
                    r = !0, n || t.before(), i || (t.end(), Ee()), t.after(), e.isConnected && t.cleanup(), delete e._x_transitioning;
                });
            });
        e._x_transitioning = {
            beforeCancels: [],
            beforeCancel: function beforeCancel(s) {
                this.beforeCancels.push(s);
            },
            cancel: se(function () {
                for (; this.beforeCancels.length;) {
                    this.beforeCancels.shift()();
                }

                o();
            }),
            finish: o
        }, m(function () {
            t.start(), t.during();
        }), tr(), requestAnimationFrame(function () {
            if (r) return;
            var s = Number(getComputedStyle(e).transitionDuration.replace(/,.*/, "").replace("s", "")) * 1e3,
                a = Number(getComputedStyle(e).transitionDelay.replace(/,.*/, "").replace("s", "")) * 1e3;
            s === 0 && (s = Number(getComputedStyle(e).animationDuration.replace("s", "")) * 1e3), m(function () {
                t.before();
            }), n = !0, requestAnimationFrame(function () {
                r || (m(function () {
                    t.end();
                }), Ee(), setTimeout(e._x_transitioning.finish, s + a), i = !0);
            });
        });
    }

    function ae(e, t, r) {
        if (e.indexOf(t) === -1) return r;
        var n = e[e.indexOf(t) + 1];
        if (!n || t === "scale" && isNaN(n)) return r;

        if (t === "duration") {
            var i = n.match(/([0-9]+)ms/);
            if (i) return i[1];
        }

        return t === "origin" && ["top", "right", "left", "center", "bottom"].includes(e[e.indexOf(t) + 2]) ? [n, e[e.indexOf(t) + 2]].join(" ") : n;
    }

    var ft = !1;

    function $(e) {
        var t = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : function () {
        };
        return function () {
            return ft ? t.apply(void 0, arguments) : e.apply(void 0, arguments);
        };
    }

    function ur(e, t) {
        t._x_dataStack || (t._x_dataStack = e._x_dataStack), ft = !0, wn(function () {
            vn(t);
        }), ft = !1;
    }

    function vn(e) {
        var t = !1;
        S(e, function (n, i) {
            D(n, function (o, s) {
                if (t && sr(o)) return s();
                t = !0, i(o, s);
            });
        });
    }

    function wn(e) {
        var t = k;
        We(function (r, n) {
            var i = t(r);
            return G(i), function () {
            };
        }), e(), We(t);
    }

    function ce(e, t, r) {
        var n = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : [];

        switch (e._x_bindings || (e._x_bindings = O({})), e._x_bindings[t] = r, t = n.includes("camel") ? Tn(t) : t, t) {
            case "value":
                En(e, r);
                break;

            case "style":
                An(e, r);
                break;

            case "class":
                Sn(e, r);
                break;

            default:
                On(e, t, r);
                break;
        }
    }

    function En(e, t) {
        if (e.type === "radio") e.attributes.value === void 0 && (e.value = t), window.fromModel && (e.checked = fr(e.value, t)); else if (e.type === "checkbox") Number.isInteger(t) ? e.value = t : !Number.isInteger(t) && !Array.isArray(t) && typeof t != "boolean" && ![null, void 0].includes(t) ? e.value = String(t) : Array.isArray(t) ? e.checked = t.some(function (r) {
            return fr(r, e.value);
        }) : e.checked = !!t; else if (e.tagName === "SELECT") Cn(e, t); else {
            if (e.value === t) return;
            e.value = t;
        }
    }

    function Sn(e, t) {
        e._x_undoAddedClasses && e._x_undoAddedClasses(), e._x_undoAddedClasses = oe(e, t);
    }

    function An(e, t) {
        e._x_undoAddedStyles && e._x_undoAddedStyles(), e._x_undoAddedStyles = V(e, t);
    }

    function On(e, t, r) {
        [null, void 0, !1].includes(r) && Mn(t) ? e.removeAttribute(t) : (dr(t) && (r = t), Rn(e, t, r));
    }

    function Rn(e, t, r) {
        e.getAttribute(t) != r && e.setAttribute(t, r);
    }

    function Cn(e, t) {
        var r = [].concat(t).map(function (n) {
            return n + "";
        });
        Array.from(e.options).forEach(function (n) {
            n.selected = r.includes(n.value);
        });
    }

    function Tn(e) {
        return e.toLowerCase().replace(/-(\w)/g, function (t, r) {
            return r.toUpperCase();
        });
    }

    function fr(e, t) {
        return e == t;
    }

    function dr(e) {
        return ["disabled", "checked", "required", "readonly", "hidden", "open", "selected", "autofocus", "itemscope", "multiple", "novalidate", "allowfullscreen", "allowpaymentrequest", "formnovalidate", "autoplay", "controls", "loop", "muted", "playsinline", "default", "ismap", "reversed", "async", "defer", "nomodule"].includes(e);
    }

    function Mn(e) {
        return !["aria-pressed", "aria-checked", "aria-expanded", "aria-selected"].includes(e);
    }

    function pr(e, t, r) {
        if (e._x_bindings && e._x_bindings[t] !== void 0) return e._x_bindings[t];
        var n = e.getAttribute(t);
        return n === null ? typeof r == "function" ? r() : r : dr(t) ? !![t, "true"].includes(n) : n === "" ? !0 : n;
    }

    function Ce(e, t) {
        var r;
        return function () {
            var n = this,
                i = arguments,
                o = function o() {
                    r = null, e.apply(n, i);
                };

            clearTimeout(r), r = setTimeout(o, t);
        };
    }

    function Re(e, t) {
        var r;
        return function () {
            var n = this,
                i = arguments;
            r || (e.apply(n, i), r = !0, setTimeout(function () {
                return r = !1;
            }, t));
        };
    }

    function mr(e) {
        e(R);
    }

    var H = {},
        hr = !1;

    function _r(e, t) {
        if (hr || (H = O(H), hr = !0), t === void 0) return H[e];
        H[e] = t, _typeof(t) == "object" && t !== null && t.hasOwnProperty("init") && typeof t.init == "function" && H[e].init(), ge(H[e]);
    }

    function gr() {
        return H;
    }

    var xr = {};

    function yr(e, t) {
        xr[e] = typeof t != "function" ? function () {
            return t;
        } : t;
    }

    function br(e) {
        return Object.entries(xr).forEach(function (_ref27) {
            var _ref28 = _slicedToArray(_ref27, 2),
                t = _ref28[0],
                r = _ref28[1];

            Object.defineProperty(e, t, {
                get: function get() {
                    return function () {
                        return r.apply(void 0, arguments);
                    };
                }
            });
        }), e;
    }

    var vr = {};

    function wr(e, t) {
        vr[e] = t;
    }

    function Er(e, t) {
        return Object.entries(vr).forEach(function (_ref29) {
            var _ref30 = _slicedToArray(_ref29, 2),
                r = _ref30[0],
                n = _ref30[1];

            Object.defineProperty(e, r, {
                get: function get() {
                    return function () {
                        return n.bind(t).apply(void 0, arguments);
                    };
                },
                enumerable: !1
            });
        }), e;
    }

    var Nn = {
            get reactive() {
                return O;
            },

            get release() {
                return G;
            },

            get effect() {
                return k;
            },

            get raw() {
                return qe;
            },

            version: "3.8.1",
            flushAndStopDeferringMutations: zt,
            disableEffectScheduling: Mt,
            setReactivityEngine: Nt,
            closestDataStack: P,
            skipDuringClone: $,
            addRootSelector: Ae,
            addInitSelector: Oe,
            addScopeToNode: C,
            deferMutations: Kt,
            mapAttributes: J,
            evaluateLater: h,
            setEvaluator: qt,
            mergeProxies: I,
            findClosest: Z,
            closestRoot: B,
            interceptor: xe,
            transition: Te,
            setStyles: V,
            mutateDom: m,
            directive: p,
            throttle: Re,
            debounce: Ce,
            evaluate: w,
            initTree: S,
            nextTick: Se,
            prefixed: E,
            prefix: Ut,
            plugin: mr,
            magic: y,
            store: _r,
            start: nr,
            clone: ur,
            bound: pr,
            $data: _e,
            data: wr,
            bind: yr
        },
        R = Nn;

    function dt(e, t) {
        var r = Object.create(null),
            n = e.split(",");

        for (var i = 0; i < n.length; i++) {
            r[n[i]] = !0;
        }

        return t ? function (i) {
            return !!r[i.toLowerCase()];
        } : function (i) {
            return !!r[i];
        };
    }

    var Wo = (_Wo = {}, _defineProperty(_Wo, 1, "TEXT"), _defineProperty(_Wo, 2, "CLASS"), _defineProperty(_Wo, 4, "STYLE"), _defineProperty(_Wo, 8, "PROPS"), _defineProperty(_Wo, 16, "FULL_PROPS"), _defineProperty(_Wo, 32, "HYDRATE_EVENTS"), _defineProperty(_Wo, 64, "STABLE_FRAGMENT"), _defineProperty(_Wo, 128, "KEYED_FRAGMENT"), _defineProperty(_Wo, 256, "UNKEYED_FRAGMENT"), _defineProperty(_Wo, 512, "NEED_PATCH"), _defineProperty(_Wo, 1024, "DYNAMIC_SLOTS"), _defineProperty(_Wo, 2048, "DEV_ROOT_FRAGMENT"), _defineProperty(_Wo, -1, "HOISTED"), _defineProperty(_Wo, -2, "BAIL"), _Wo),
        Go = (_Go = {}, _defineProperty(_Go, 1, "STABLE"), _defineProperty(_Go, 2, "DYNAMIC"), _defineProperty(_Go, 3, "FORWARDED"), _Go);
    var kn = "itemscope,allowfullscreen,formnovalidate,ismap,nomodule,novalidate,readonly";
    var Yo = dt(kn + ",async,autofocus,autoplay,controls,default,defer,disabled,hidden,loop,open,required,reversed,scoped,seamless,checked,muted,multiple,selected");
    var Sr = Object.freeze({}),
        Jo = Object.freeze([]);
    var pt = Object.assign;

    var Pn = Object.prototype.hasOwnProperty,
        le = function le(e, t) {
            return Pn.call(e, t);
        },
        L = Array.isArray,
        Q = function Q(e) {
            return Ar(e) === "[object Map]";
        };

    var In = function In(e) {
            return typeof e == "string";
        },
        Me = function Me(e) {
            return _typeof(e) == "symbol";
        },
        ue = function ue(e) {
            return e !== null && _typeof(e) == "object";
        };

    var Dn = Object.prototype.toString,
        Ar = function Ar(e) {
            return Dn.call(e);
        },
        mt = function mt(e) {
            return Ar(e).slice(8, -1);
        };

    var Ne = function Ne(e) {
        return In(e) && e !== "NaN" && e[0] !== "-" && "" + parseInt(e, 10) === e;
    };

    var ke = function ke(e) {
            var t = Object.create(null);
            return function (r) {
                return t[r] || (t[r] = e(r));
            };
        },
        $n = /-(\w)/g,
        Zo = ke(function (e) {
            return e.replace($n, function (t, r) {
                return r ? r.toUpperCase() : "";
            });
        }),
        Ln = /\B([A-Z])/g,
        Qo = ke(function (e) {
            return e.replace(Ln, "-$1").toLowerCase();
        }),
        ht = ke(function (e) {
            return e.charAt(0).toUpperCase() + e.slice(1);
        }),
        Xo = ke(function (e) {
            return e ? "on".concat(ht(e)) : "";
        }),
        _t = function _t(e, t) {
            return e !== t && (e === e || t === t);
        };

    var gt = new WeakMap(),
        fe = [],
        M,
        q = Symbol("iterate"),
        xt = Symbol("Map key iterate");

    function jn(e) {
        return e && e._isEffect === !0;
    }

    function Or(e) {
        var t = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : Sr;
        jn(e) && (e = e.raw);
        var r = Fn(e, t);
        return t.lazy || r(), r;
    }

    function Cr(e) {
        e.active && (Tr(e), e.options.onStop && e.options.onStop(), e.active = !1);
    }

    var Kn = 0;

    function Fn(e, t) {
        var r = function r() {
            if (!r.active) return e();

            if (!fe.includes(r)) {
                Tr(r);

                try {
                    return zn(), fe.push(r), M = r, e();
                } finally {
                    fe.pop(), Rr(), M = fe[fe.length - 1];
                }
            }
        };

        return r.id = Kn++, r.allowRecurse = !!t.allowRecurse, r._isEffect = !0, r.active = !0, r.raw = e, r.deps = [], r.options = t, r;
    }

    function Tr(e) {
        var t = e.deps;

        if (t.length) {
            for (var r = 0; r < t.length; r++) {
                t[r]["delete"](e);
            }

            t.length = 0;
        }
    }

    var X = !0,
        yt = [];

    function Bn() {
        yt.push(X), X = !1;
    }

    function zn() {
        yt.push(X), X = !0;
    }

    function Rr() {
        var e = yt.pop();
        X = e === void 0 ? !0 : e;
    }

    function T(e, t, r) {
        if (!X || M === void 0) return;
        var n = gt.get(e);
        n || gt.set(e, n = new Map());
        var i = n.get(r);
        i || n.set(r, i = new Set()), i.has(M) || (i.add(M), M.deps.push(i), M.options.onTrack && M.options.onTrack({
            effect: M,
            target: e,
            type: t,
            key: r
        }));
    }

    function j(e, t, r, n, i, o) {
        var s = gt.get(e);
        if (!s) return;

        var a = new Set(),
            c = function c(u) {
                u && u.forEach(function (d) {
                    (d !== M || d.allowRecurse) && a.add(d);
                });
            };

        if (t === "clear") s.forEach(c); else if (r === "length" && L(e)) s.forEach(function (u, d) {
            (d === "length" || d >= n) && c(u);
        }); else switch (r !== void 0 && c(s.get(r)), t) {
            case "add":
                L(e) ? Ne(r) && c(s.get("length")) : (c(s.get(q)), Q(e) && c(s.get(xt)));
                break;

            case "delete":
                L(e) || (c(s.get(q)), Q(e) && c(s.get(xt)));
                break;

            case "set":
                Q(e) && c(s.get(q));
                break;
        }

        var l = function l(u) {
            u.options.onTrigger && u.options.onTrigger({
                effect: u,
                target: e,
                key: r,
                type: t,
                newValue: n,
                oldValue: i,
                oldTarget: o
            }), u.options.scheduler ? u.options.scheduler(u) : u();
        };

        a.forEach(l);
    }

    var Vn = dt("__proto__,__v_isRef,__isVue"),
        Mr = new Set(Object.getOwnPropertyNames(Symbol).map(function (e) {
            return Symbol[e];
        }).filter(Me)),
        Hn = Pe(),
        qn = Pe(!1, !0),
        Un = Pe(!0),
        Wn = Pe(!0, !0),
        Ie = {};
    ["includes", "indexOf", "lastIndexOf"].forEach(function (e) {
        var t = Array.prototype[e];

        Ie[e] = function () {
            var n = _(this);

            for (var o = 0, s = this.length; o < s; o++) {
                T(n, "get", o + "");
            }

            for (var _len3 = arguments.length, r = new Array(_len3), _key3 = 0; _key3 < _len3; _key3++) {
                r[_key3] = arguments[_key3];
            }

            var i = t.apply(n, r);
            return i === -1 || i === !1 ? t.apply(n, r.map(_)) : i;
        };
    });
    ["push", "pop", "shift", "unshift", "splice"].forEach(function (e) {
        var t = Array.prototype[e];

        Ie[e] = function () {
            Bn();

            for (var _len4 = arguments.length, r = new Array(_len4), _key4 = 0; _key4 < _len4; _key4++) {
                r[_key4] = arguments[_key4];
            }

            var n = t.apply(this, r);
            return Rr(), n;
        };
    });

    function Pe() {
        var e = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : !1;
        var t = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : !1;
        return function (n, i, o) {
            if (i === "__v_isReactive") return !e;
            if (i === "__v_isReadonly") return e;
            if (i === "__v_raw" && o === (e ? t ? Yn : kr : t ? Gn : Nr).get(n)) return n;
            var s = L(n);
            if (!e && s && le(Ie, i)) return Reflect.get(Ie, i, o);
            var a = Reflect.get(n, i, o);
            return (Me(i) ? Mr.has(i) : Vn(i)) || (e || T(n, "get", i), t) ? a : bt(a) ? !s || !Ne(i) ? a.value : a : ue(a) ? e ? Pr(a) : De(a) : a;
        };
    }

    var Jn = Ir(),
        Zn = Ir(!0);

    function Ir() {
        var e = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : !1;
        return function (r, n, i, o) {
            var s = r[n];
            if (!e && (i = _(i), s = _(s), !L(r) && bt(s) && !bt(i))) return s.value = i, !0;
            var a = L(r) && Ne(n) ? Number(n) < r.length : le(r, n),
                c = Reflect.set(r, n, i, o);
            return r === _(o) && (a ? _t(i, s) && j(r, "set", n, i, s) : j(r, "add", n, i)), c;
        };
    }

    function Qn(e, t) {
        var r = le(e, t),
            n = e[t],
            i = Reflect.deleteProperty(e, t);
        return i && r && j(e, "delete", t, void 0, n), i;
    }

    function Xn(e, t) {
        var r = Reflect.has(e, t);
        return (!Me(t) || !Mr.has(t)) && T(e, "has", t), r;
    }

    function ei(e) {
        return T(e, "iterate", L(e) ? "length" : q), Reflect.ownKeys(e);
    }

    var Dr = {
            get: Hn,
            set: Jn,
            deleteProperty: Qn,
            has: Xn,
            ownKeys: ei
        },
        $r = {
            get: Un,
            set: function set(e, t) {
                return console.warn("Set operation on key \"".concat(String(t), "\" failed: target is readonly."), e), !0;
            },
            deleteProperty: function deleteProperty(e, t) {
                return console.warn("Delete operation on key \"".concat(String(t), "\" failed: target is readonly."), e), !0;
            }
        },
        os = pt({}, Dr, {
            get: qn,
            set: Zn
        }),
        ss = pt({}, $r, {
            get: Wn
        }),
        vt = function vt(e) {
            return ue(e) ? De(e) : e;
        },
        wt = function wt(e) {
            return ue(e) ? Pr(e) : e;
        },
        Et = function Et(e) {
            return e;
        },
        $e = function $e(e) {
            return Reflect.getPrototypeOf(e);
        };

    function Le(e, t) {
        var r = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : !1;
        var n = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : !1;
        e = e.__v_raw;

        var i = _(e),
            o = _(t);

        t !== o && !r && T(i, "get", t), !r && T(i, "get", o);

        var _$e = $e(i),
            s = _$e.has,
            a = n ? Et : r ? wt : vt;

        if (s.call(i, t)) return a(e.get(t));
        if (s.call(i, o)) return a(e.get(o));
        e !== i && e.get(t);
    }

    function je(e) {
        var t = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : !1;

        var r = this.__v_raw,
            n = _(r),
            i = _(e);

        return e !== i && !t && T(n, "has", e), !t && T(n, "has", i), e === i ? r.has(e) : r.has(e) || r.has(i);
    }

    function Fe(e) {
        var t = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : !1;
        return e = e.__v_raw, !t && T(_(e), "iterate", q), Reflect.get(e, "size", e);
    }

    function Lr(e) {
        e = _(e);

        var t = _(this);

        return $e(t).has.call(t, e) || (t.add(e), j(t, "add", e, e)), this;
    }

    function Fr(e, t) {
        t = _(t);

        var r = _(this),
            _$e2 = $e(r),
            n = _$e2.has,
            i = _$e2.get,
            o = n.call(r, e);

        o ? jr(r, n, e) : (e = _(e), o = n.call(r, e));
        var s = i.call(r, e);
        return r.set(e, t), o ? _t(t, s) && j(r, "set", e, t, s) : j(r, "add", e, t), this;
    }

    function Kr(e) {
        var t = _(this),
            _$e3 = $e(t),
            r = _$e3.has,
            n = _$e3.get,
            i = r.call(t, e);

        i ? jr(t, r, e) : (e = _(e), i = r.call(t, e));
        var o = n ? n.call(t, e) : void 0,
            s = t["delete"](e);
        return i && j(t, "delete", e, void 0, o), s;
    }

    function zr() {
        var e = _(this),
            t = e.size !== 0,
            r = Q(e) ? new Map(e) : new Set(e),
            n = e.clear();

        return t && j(e, "clear", void 0, void 0, r), n;
    }

    function Ke(e, t) {
        return function (n, i) {
            var o = this,
                s = o.__v_raw,
                a = _(s),
                c = t ? Et : e ? wt : vt;

            return !e && T(a, "iterate", q), s.forEach(function (l, u) {
                return n.call(i, c(l), c(u), o);
            });
        };
    }

    function ze(e, t, r) {
        return function () {
            var i = this.__v_raw,
                o = _(i),
                s = Q(o),
                a = e === "entries" || e === Symbol.iterator && s,
                c = e === "keys" && s,
                l = i[e].apply(i, arguments),
                u = r ? Et : t ? wt : vt;

            return !t && T(o, "iterate", c ? xt : q), _defineProperty({
                next: function next() {
                    var _l$next = l.next(),
                        d = _l$next.value,
                        x = _l$next.done;

                    return x ? {
                        value: d,
                        done: x
                    } : {
                        value: a ? [u(d[0]), u(d[1])] : u(d),
                        done: x
                    };
                }
            }, Symbol.iterator, function () {
                return this;
            });
        };
    }

    function F(e) {
        return function () {
            {
                var r = (arguments.length <= 0 ? undefined : arguments[0]) ? "on key \"".concat(arguments.length <= 0 ? undefined : arguments[0], "\" ") : "";
                console.warn("".concat(ht(e), " operation ").concat(r, "failed: target is readonly."), _(this));
            }
            return e === "delete" ? !1 : this;
        };
    }

    var Br = {
            get: function get(e) {
                return Le(this, e);
            },

            get size() {
                return Fe(this);
            },

            has: je,
            add: Lr,
            set: Fr,
            "delete": Kr,
            clear: zr,
            forEach: Ke(!1, !1)
        },
        Vr = {
            get: function get(e) {
                return Le(this, e, !1, !0);
            },

            get size() {
                return Fe(this);
            },

            has: je,
            add: Lr,
            set: Fr,
            "delete": Kr,
            clear: zr,
            forEach: Ke(!1, !0)
        },
        Hr = {
            get: function get(e) {
                return Le(this, e, !0);
            },

            get size() {
                return Fe(this, !0);
            },

            has: function has(e) {
                return je.call(this, e, !0);
            },
            add: F("add"),
            set: F("set"),
            "delete": F("delete"),
            clear: F("clear"),
            forEach: Ke(!0, !1)
        },
        qr = {
            get: function get(e) {
                return Le(this, e, !0, !0);
            },

            get size() {
                return Fe(this, !0);
            },

            has: function has(e) {
                return je.call(this, e, !0);
            },
            add: F("add"),
            set: F("set"),
            "delete": F("delete"),
            clear: F("clear"),
            forEach: Ke(!0, !0)
        },
        ti = ["keys", "values", "entries", Symbol.iterator];
    ti.forEach(function (e) {
        Br[e] = ze(e, !1, !1), Hr[e] = ze(e, !0, !1), Vr[e] = ze(e, !1, !0), qr[e] = ze(e, !0, !0);
    });

    function Be(e, t) {
        var r = t ? e ? qr : Vr : e ? Hr : Br;
        return function (n, i, o) {
            return i === "__v_isReactive" ? !e : i === "__v_isReadonly" ? e : i === "__v_raw" ? n : Reflect.get(le(r, i) && i in n ? r : n, i, o);
        };
    }

    var ri = {
            get: Be(!1, !1)
        },
        as = {
            get: Be(!1, !0)
        },
        ni = {
            get: Be(!0, !1)
        },
        cs = {
            get: Be(!0, !0)
        };

    function jr(e, t, r) {
        var n = _(r);

        if (n !== r && t.call(e, n)) {
            var i = mt(e);
            console.warn("Reactive ".concat(i, " contains both the raw and reactive versions of the same object").concat(i === "Map" ? " as keys" : "", ", which can lead to inconsistencies. Avoid differentiating between the raw and reactive versions of an object and only use the reactive version if possible."));
        }
    }

    var Nr = new WeakMap(),
        Gn = new WeakMap(),
        kr = new WeakMap(),
        Yn = new WeakMap();

    function ii(e) {
        switch (e) {
            case "Object":
            case "Array":
                return 1;

            case "Map":
            case "Set":
            case "WeakMap":
            case "WeakSet":
                return 2;

            default:
                return 0;
        }
    }

    function oi(e) {
        return e.__v_skip || !Object.isExtensible(e) ? 0 : ii(mt(e));
    }

    function De(e) {
        return e && e.__v_isReadonly ? e : Ur(e, !1, Dr, ri, Nr);
    }

    function Pr(e) {
        return Ur(e, !0, $r, ni, kr);
    }

    function Ur(e, t, r, n, i) {
        if (!ue(e)) return console.warn("value cannot be made reactive: ".concat(String(e))), e;
        if (e.__v_raw && !(t && e.__v_isReactive)) return e;
        var o = i.get(e);
        if (o) return o;
        var s = oi(e);
        if (s === 0) return e;
        var a = new Proxy(e, s === 2 ? n : r);
        return i.set(e, a), a;
    }

    function _(e) {
        return e && _(e.__v_raw) || e;
    }

    function bt(e) {
        return Boolean(e && e.__v_isRef === !0);
    }

    y("nextTick", function () {
        return Se;
    });
    y("dispatch", function (e) {
        return K.bind(K, e);
    });
    y("watch", function (e) {
        return function (t, r) {
            var n = h(e, t),
                i = !0,
                o;
            k(function () {
                return n(function (s) {
                    JSON.stringify(s), i ? o = s : queueMicrotask(function () {
                        r(s, o), o = s;
                    }), i = !1;
                });
            });
        };
    });
    y("store", gr);
    y("data", function (e) {
        return _e(e);
    });
    y("root", function (e) {
        return B(e);
    });
    y("refs", function (e) {
        return e._x_refs_proxy || (e._x_refs_proxy = I(si(e))), e._x_refs_proxy;
    });

    function si(e) {
        var t = [],
            r = e;

        for (; r;) {
            r._x_refs && t.push(r._x_refs), r = r.parentNode;
        }

        return t;
    }

    var St = {};

    function At(e) {
        return St[e] || (St[e] = 0), ++St[e];
    }

    function Wr(e, t) {
        return Z(e, function (r) {
            if (r._x_ids && r._x_ids[t]) return !0;
        });
    }

    function Gr(e, t) {
        e._x_ids || (e._x_ids = {}), e._x_ids[t] || (e._x_ids[t] = At(t));
    }

    y("id", function (e) {
        return function (t) {
            var r = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
            var n = Wr(e, t),
                i = n ? n._x_ids[t] : At(t);
            return r ? "".concat(t, "-").concat(i, "-").concat(r) : "".concat(t, "-").concat(i);
        };
    });
    y("el", function (e) {
        return e;
    });
    p("teleport", function (e, _ref32, _ref33) {
        var t = _ref32.expression;
        var r = _ref33.cleanup;
        e.tagName.toLowerCase() !== "template" && z("x-teleport can only be used on a <template> tag", e);
        var n = document.querySelector(t);
        n || z("Cannot find x-teleport element for selector: \"".concat(t, "\""));
        var i = e.content.cloneNode(!0).firstElementChild;
        e._x_teleport = i, i._x_teleportBack = e, e._x_forwardEvents && e._x_forwardEvents.forEach(function (o) {
            i.addEventListener(o, function (s) {
                s.stopPropagation(), e.dispatchEvent(new s.constructor(s.type, s));
            });
        }), C(i, {}, e), m(function () {
            n.appendChild(i), S(i), i._x_ignore = !0;
        }), r(function () {
            return i.remove();
        });
    });

    var Yr = function Yr() {
    };

    Yr.inline = function (e, _ref34, _ref35) {
        var t = _ref34.modifiers;
        var r = _ref35.cleanup;
        t.includes("self") ? e._x_ignoreSelf = !0 : e._x_ignore = !0, r(function () {
            t.includes("self") ? delete e._x_ignoreSelf : delete e._x_ignore;
        });
    };

    p("ignore", Yr);
    p("effect", function (e, _ref36, _ref37) {
        var t = _ref36.expression;
        var r = _ref37.effect;
        return r(h(e, t));
    });

    function de(e, t, r, n) {
        var i = e,
            o = function o(c) {
                return n(c);
            },
            s = {},
            a = function a(c, l) {
                return function (u) {
                    return l(c, u);
                };
            };

        if (r.includes("dot") && (t = ai(t)), r.includes("camel") && (t = ci(t)), r.includes("passive") && (s.passive = !0), r.includes("capture") && (s.capture = !0), r.includes("window") && (i = window), r.includes("document") && (i = document), r.includes("prevent") && (o = a(o, function (c, l) {
            l.preventDefault(), c(l);
        })), r.includes("stop") && (o = a(o, function (c, l) {
            l.stopPropagation(), c(l);
        })), r.includes("self") && (o = a(o, function (c, l) {
            l.target === e && c(l);
        })), (r.includes("away") || r.includes("outside")) && (i = document, o = a(o, function (c, l) {
            e.contains(l.target) || e.offsetWidth < 1 && e.offsetHeight < 1 || e._x_isShown !== !1 && c(l);
        })), o = a(o, function (c, l) {
            li(t) && ui(l, r) || c(l);
        }), r.includes("debounce")) {
            var c = r[r.indexOf("debounce") + 1] || "invalid-wait",
                l = Ot(c.split("ms")[0]) ? Number(c.split("ms")[0]) : 250;
            o = Ce(o, l);
        }

        if (r.includes("throttle")) {
            var _c = r[r.indexOf("throttle") + 1] || "invalid-wait",
                _l = Ot(_c.split("ms")[0]) ? Number(_c.split("ms")[0]) : 250;

            o = Re(o, _l);
        }

        return r.includes("once") && (o = a(o, function (c, l) {
            c(l), i.removeEventListener(t, o, s);
        })), i.addEventListener(t, o, s), function () {
            i.removeEventListener(t, o, s);
        };
    }

    function ai(e) {
        return e.replace(/-/g, ".");
    }

    function ci(e) {
        return e.toLowerCase().replace(/-(\w)/g, function (t, r) {
            return r.toUpperCase();
        });
    }

    function Ot(e) {
        return !Array.isArray(e) && !isNaN(e);
    }

    function fi(e) {
        return e.replace(/([a-z])([A-Z])/g, "$1-$2").replace(/[_\s]/, "-").toLowerCase();
    }

    function li(e) {
        return ["keydown", "keyup"].includes(e);
    }

    function ui(e, t) {
        var r = t.filter(function (o) {
            return !["window", "document", "prevent", "stop", "once"].includes(o);
        });

        if (r.includes("debounce")) {
            var o = r.indexOf("debounce");
            r.splice(o, Ot((r[o + 1] || "invalid-wait").split("ms")[0]) ? 2 : 1);
        }

        if (r.length === 0 || r.length === 1 && Jr(e.key).includes(r[0])) return !1;
        var i = ["ctrl", "shift", "alt", "meta", "cmd", "super"].filter(function (o) {
            return r.includes(o);
        });
        return r = r.filter(function (o) {
            return !i.includes(o);
        }), !(i.length > 0 && i.filter(function (s) {
            return (s === "cmd" || s === "super") && (s = "meta"), e["".concat(s, "Key")];
        }).length === i.length && Jr(e.key).includes(r[0]));
    }

    function Jr(e) {
        if (!e) return [];
        e = fi(e);
        var t = {
            ctrl: "control",
            slash: "/",
            space: "-",
            spacebar: "-",
            cmd: "meta",
            esc: "escape",
            up: "arrow-up",
            down: "arrow-down",
            left: "arrow-left",
            right: "arrow-right",
            period: ".",
            equal: "="
        };
        return t[e] = e, Object.keys(t).map(function (r) {
            if (t[r] === e) return r;
        }).filter(function (r) {
            return r;
        });
    }

    p("model", function (e, _ref38, _ref39) {
        var t = _ref38.modifiers,
            r = _ref38.expression;
        var n = _ref39.effect,
            i = _ref39.cleanup;
        var o = h(e, r),
            s = "".concat(r, " = rightSideOfExpression($event, ").concat(r, ")"),
            a = h(e, s);
        var c = e.tagName.toLowerCase() === "select" || ["checkbox", "radio"].includes(e.type) || t.includes("lazy") ? "change" : "input";
        var l = di(e, t, r),
            u = de(e, c, t, function (x) {
                a(function () {
                }, {
                    scope: {
                        $event: x,
                        rightSideOfExpression: l
                    }
                });
            });
        i(function () {
            return u();
        });
        var d = h(e, "".concat(r, " = __placeholder"));
        e._x_model = {
            get: function get() {
                var x;
                return o(function (N) {
                    return x = N;
                }), x;
            },
            set: function set(x) {
                d(function () {
                }, {
                    scope: {
                        __placeholder: x
                    }
                });
            }
        }, e._x_forceModelUpdate = function () {
            o(function (x) {
                x === void 0 && r.match(/\./) && (x = ""), window.fromModel = !0, m(function () {
                    return ce(e, "value", x);
                }), delete window.fromModel;
            });
        }, n(function () {
            t.includes("unintrusive") && document.activeElement.isSameNode(e) || e._x_forceModelUpdate();
        });
    });

    function di(e, t, r) {
        return e.type === "radio" && m(function () {
            e.hasAttribute("name") || e.setAttribute("name", r);
        }), function (n, i) {
            return m(function () {
                if (n instanceof CustomEvent && n.detail !== void 0) return n.detail || n.target.value;
                if (e.type === "checkbox") {
                    if (Array.isArray(i)) {
                        var o = t.includes("number") ? Tt(n.target.value) : n.target.value;
                        return n.target.checked ? i.concat([o]) : i.filter(function (s) {
                            return !pi(s, o);
                        });
                    } else return n.target.checked;
                } else {
                    if (e.tagName.toLowerCase() === "select" && e.multiple) return t.includes("number") ? Array.from(n.target.selectedOptions).map(function (o) {
                        var s = o.value || o.text;
                        return Tt(s);
                    }) : Array.from(n.target.selectedOptions).map(function (o) {
                        return o.value || o.text;
                    });
                    {
                        var _o = n.target.value;
                        return t.includes("number") ? Tt(_o) : t.includes("trim") ? _o.trim() : _o;
                    }
                }
            });
        };
    }

    function Tt(e) {
        var t = e ? parseFloat(e) : null;
        return mi(t) ? t : e;
    }

    function pi(e, t) {
        return e == t;
    }

    function mi(e) {
        return !Array.isArray(e) && !isNaN(e);
    }

    p("cloak", function (e) {
        return queueMicrotask(function () {
            return m(function () {
                return e.removeAttribute(E("cloak"));
            });
        });
    });
    Oe(function () {
        return "[".concat(E("init"), "]");
    });
    p("init", $(function (e, _ref40) {
        var t = _ref40.expression;
        return typeof t == "string" ? !!t.trim() && w(e, t, {}, !1) : w(e, t, {}, !1);
    }));
    p("text", function (e, _ref41, _ref42) {
        var t = _ref41.expression;
        var r = _ref42.effect,
            n = _ref42.evaluateLater;
        var i = n(t);
        r(function () {
            i(function (o) {
                m(function () {
                    e.textContent = o;
                });
            });
        });
    });
    p("html", function (e, _ref43, _ref44) {
        var t = _ref43.expression;
        var r = _ref44.effect,
            n = _ref44.evaluateLater;
        var i = n(t);
        r(function () {
            i(function (o) {
                e.innerHTML = o;
            });
        });
    });
    J(be(":", ve(E("bind:"))));
    p("bind", function (e, _ref45, _ref46) {
        var t = _ref45.value,
            r = _ref45.modifiers,
            n = _ref45.expression,
            i = _ref45.original;
        var o = _ref46.effect;
        if (!t) return hi(e, n, i, o);
        if (t === "key") return _i(e, n);
        var s = h(e, n);
        o(function () {
            return s(function (a) {
                a === void 0 && n.match(/\./) && (a = ""), m(function () {
                    return ce(e, t, a, r);
                });
            });
        });
    });

    function hi(e, t, r, n) {
        var i = {};
        br(i);
        var o = h(e, t),
            s = [];

        for (; s.length;) {
            s.pop()();
        }

        o(function (a) {
            var c = Object.entries(a).map(function (_ref47) {
                    var _ref48 = _slicedToArray(_ref47, 2),
                        u = _ref48[0],
                        d = _ref48[1];

                    return {
                        name: u,
                        value: d
                    };
                }),
                l = Jt(c);
            c = c.map(function (u) {
                return l.find(function (d) {
                    return d.name === u.name;
                }) ? {
                    name: "x-bind:".concat(u.name),
                    value: "\"".concat(u.value, "\"")
                } : u;
            }), ne(e, c, r).map(function (u) {
                s.push(u.runCleanups), u();
            });
        }, {
            scope: i
        });
    }

    function _i(e, t) {
        e._x_keyExpression = t;
    }

    Ae(function () {
        return "[".concat(E("data"), "]");
    });
    p("data", $(function (e, _ref49, _ref50) {
        var t = _ref49.expression;
        var r = _ref50.cleanup;
        t = t === "" ? "{}" : t;
        var n = {};
        re(n, e);
        var i = {};
        Er(i, n);
        var o = w(e, t, {
            scope: i
        });
        o === void 0 && (o = {}), re(o, e);
        var s = O(o);
        ge(s);
        var a = C(e, s);
        s.init && w(e, s.init), r(function () {
            a(), s.destroy && w(e, s.destroy);
        });
    }));
    p("show", function (e, _ref51, _ref52) {
        var t = _ref51.modifiers,
            r = _ref51.expression;
        var n = _ref52.effect;

        var i = h(e, r),
            o = function o() {
                return m(function () {
                    e.style.display = "none", e._x_isShown = !1;
                });
            },
            s = function s() {
                return m(function () {
                    e.style.length === 1 && e.style.display === "none" ? e.removeAttribute("style") : e.style.removeProperty("display"), e._x_isShown = !0;
                });
            },
            a = function a() {
                return setTimeout(s);
            },
            c = se(function (d) {
                return d ? s() : o();
            }, function (d) {
                typeof e._x_toggleAndCascadeWithTransitions == "function" ? e._x_toggleAndCascadeWithTransitions(e, d, s, o) : d ? a() : o();
            }),
            l,
            u = !0;

        n(function () {
            return i(function (d) {
                !u && d === l || (t.includes("immediate") && (d ? a() : o()), c(d), l = d, u = !1);
            });
        });
    });
    p("for", function (e, _ref53, _ref54) {
        var t = _ref53.expression;
        var r = _ref54.effect,
            n = _ref54.cleanup;
        var i = xi(t),
            o = h(e, i.items),
            s = h(e, e._x_keyExpression || "index");
        e._x_prevKeys = [], e._x_lookup = {}, r(function () {
            return gi(e, i, o, s);
        }), n(function () {
            Object.values(e._x_lookup).forEach(function (a) {
                return a.remove();
            }), delete e._x_prevKeys, delete e._x_lookup;
        });
    });

    function gi(e, t, r, n) {
        var i = function i(s) {
                return _typeof(s) == "object" && !Array.isArray(s);
            },
            o = e;

        r(function (s) {
            yi(s) && s >= 0 && (s = Array.from(Array(s).keys(), function (f) {
                return f + 1;
            })), s === void 0 && (s = []);
            var a = e._x_lookup,
                c = e._x_prevKeys,
                l = [],
                u = [];
            if (i(s)) s = Object.entries(s).map(function (_ref55) {
                var _ref56 = _slicedToArray(_ref55, 2),
                    f = _ref56[0],
                    g = _ref56[1];

                var b = Zr(t, g, f, s);
                n(function (v) {
                    return u.push(v);
                }, {
                    scope: _objectSpread({
                        index: f
                    }, b)
                }), l.push(b);
            }); else for (var f = 0; f < s.length; f++) {
                var g = Zr(t, s[f], f, s);
                n(function (b) {
                    return u.push(b);
                }, {
                    scope: _objectSpread({
                        index: f
                    }, g)
                }), l.push(g);
            }
            var d = [],
                x = [],
                N = [],
                U = [];

            for (var _f = 0; _f < c.length; _f++) {
                var _g = c[_f];
                u.indexOf(_g) === -1 && N.push(_g);
            }

            c = c.filter(function (f) {
                return !N.includes(f);
            });
            var pe = "template";

            for (var _f2 = 0; _f2 < u.length; _f2++) {
                var _g2 = u[_f2],
                    b = c.indexOf(_g2);
                if (b === -1) c.splice(_f2, 0, _g2), d.push([pe, _f2]); else if (b !== _f2) {
                    var v = c.splice(_f2, 1)[0],
                        A = c.splice(b - 1, 1)[0];
                    c.splice(_f2, 0, A), c.splice(b, 0, v), x.push([v, A]);
                } else U.push(_g2);
                pe = _g2;
            }

            for (var _f3 = 0; _f3 < N.length; _f3++) {
                var _g3 = N[_f3];
                a[_g3].remove(), a[_g3] = null, delete a[_g3];
            }

            var _loop3 = function _loop3(_f4) {
                var _x$_f = _slicedToArray(x[_f4], 2),
                    g = _x$_f[0],
                    b = _x$_f[1],
                    v = a[g],
                    A = a[b],
                    W = document.createElement("div");

                m(function () {
                    A.after(W), v.after(A), A._x_currentIfEl && A.after(A._x_currentIfEl), W.before(v), v._x_currentIfEl && v.after(v._x_currentIfEl), W.remove();
                }), tt(A, l[u.indexOf(b)]);
            };

            for (var _f4 = 0; _f4 < x.length; _f4++) {
                _loop3(_f4);
            }

            var _loop4 = function _loop4(_f5) {
                var _d$_f = _slicedToArray(d[_f5], 2),
                    g = _d$_f[0],
                    b = _d$_f[1],
                    v = g === "template" ? o : a[g];

                v._x_currentIfEl && (v = v._x_currentIfEl);
                var A = l[b],
                    W = u[b],
                    me = document.importNode(o.content, !0).firstElementChild;
                C(me, O(A), o), m(function () {
                    v.after(me), S(me);
                }), _typeof(W) == "object" && z("x-for key cannot be an object, it must be a string or an integer", o), a[W] = me;
            };

            for (var _f5 = 0; _f5 < d.length; _f5++) {
                _loop4(_f5);
            }

            for (var _f6 = 0; _f6 < U.length; _f6++) {
                tt(a[U[_f6]], l[u.indexOf(U[_f6])]);
            }

            o._x_prevKeys = u;
        });
    }

    function xi(e) {
        var t = /,([^,\}\]]*)(?:,([^,\}\]]*))?$/,
            r = /^\s*\(|\)\s*$/g,
            n = /([\s\S]*?)\s+(?:in|of)\s+([\s\S]*)/,
            i = e.match(n);
        if (!i) return;
        var o = {};
        o.items = i[2].trim();
        var s = i[1].replace(r, "").trim(),
            a = s.match(t);
        return a ? (o.item = s.replace(t, "").trim(), o.index = a[1].trim(), a[2] && (o.collection = a[2].trim())) : o.item = s, o;
    }

    function Zr(e, t, r, n) {
        var i = {};
        return /^\[.*\]$/.test(e.item) && Array.isArray(t) ? e.item.replace("[", "").replace("]", "").split(",").map(function (s) {
            return s.trim();
        }).forEach(function (s, a) {
            i[s] = t[a];
        }) : /^\{.*\}$/.test(e.item) && !Array.isArray(t) && _typeof(t) == "object" ? e.item.replace("{", "").replace("}", "").split(",").map(function (s) {
            return s.trim();
        }).forEach(function (s) {
            i[s] = t[s];
        }) : i[e.item] = t, e.index && (i[e.index] = r), e.collection && (i[e.collection] = n), i;
    }

    function yi(e) {
        return !Array.isArray(e) && !isNaN(e);
    }

    function Qr() {
    }

    Qr.inline = function (e, _ref57, _ref58) {
        var t = _ref57.expression;
        var r = _ref58.cleanup;
        var n = B(e);
        n._x_refs || (n._x_refs = {}), n._x_refs[t] = e, r(function () {
            return delete n._x_refs[t];
        });
    };

    p("ref", Qr);
    p("if", function (e, _ref59, _ref60) {
        var t = _ref59.expression;
        var r = _ref60.effect,
            n = _ref60.cleanup;

        var i = h(e, t),
            o = function o() {
                if (e._x_currentIfEl) return e._x_currentIfEl;
                var a = e.content.cloneNode(!0).firstElementChild;
                return C(a, {}, e), m(function () {
                    e.after(a), S(a);
                }), e._x_currentIfEl = a, e._x_undoIf = function () {
                    a.remove(), delete e._x_currentIfEl;
                }, a;
            },
            s = function s() {
                !e._x_undoIf || (e._x_undoIf(), delete e._x_undoIf);
            };

        r(function () {
            return i(function (a) {
                a ? o() : s();
            });
        }), n(function () {
            return e._x_undoIf && e._x_undoIf();
        });
    });
    p("id", function (e, _ref61, _ref62) {
        var t = _ref61.expression;
        var r = _ref62.evaluate;
        r(t).forEach(function (i) {
            return Gr(e, i);
        });
    });
    J(be("@", ve(E("on:"))));
    p("on", $(function (e, _ref63, _ref64) {
        var t = _ref63.value,
            r = _ref63.modifiers,
            n = _ref63.expression;
        var i = _ref64.cleanup;
        var o = n ? h(e, n) : function () {
        };
        e.tagName.toLowerCase() === "template" && (e._x_forwardEvents || (e._x_forwardEvents = []), e._x_forwardEvents.includes(t) || e._x_forwardEvents.push(t));
        var s = de(e, t, r, function (a) {
            o(function () {
            }, {
                scope: {
                    $event: a
                },
                params: [a]
            });
        });
        i(function () {
            return s();
        });
    }));
    R.setEvaluator(nt);
    R.setReactivityEngine({
        reactive: De,
        effect: Or,
        release: Cr,
        raw: _
    });
    var Ct = R;
    window.Alpine = Ct;
    queueMicrotask(function () {
        Ct.start();
    });
})();
