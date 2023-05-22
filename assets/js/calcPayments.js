function calcPayments(a, t, r) {
    var e, l = parseFloat(a.toString().replace(/[^0-9\.]/g, "")), n = t || "equipment",
        o = r || ("working-capital" == n ? "bridge" : null), i = [], u = [];
    if ("equipment" == n) {
        var c = [8, 12];
        e = [], i = [24, 36, 48, 60];
        for (var s in i) {
            var n = i[s],
                f = [Calculator.monthlyPayments(l, 0, c[0] / 100, n), Calculator.monthlyPayments(l, 0, c[1] / 100, n)];
            e.push([f[0]._full_lease_calc || 0, f[1]._full_lease_calc || 0])
        }
    } else if ("working-capital" == n) if ("term" == o) {
        e = [[5.49, 23.29], [7.99, 25.79], [8.99, 26.79], [9.79, 27.79], [10.49, 21.29]], i = [12, 24, 36, 48, 60];
        for (var s in e) {
            var _ = [Calculator.monthlyPayments(l, 0, e[s][0] / 100, i[s]), Calculator.monthlyPayments(l, 0, e[s][1] / 100, i[s])];
            e[s][0] = _[0]._full_lease_calc, e[s][1] = _[1]._full_lease_calc, u.push({
                type: n,
                subtype: o,
                term: i[s],
                amount: l,
                interest_rates: e[s],
                calculations: _
            })
        }
    } else if ("bridge" == o) {
        e = [[1.09, 1.2], [1.13, 1.3], [1.16, 1.34], [1.21, 1.4], [1.27, 1.44]], i = [6, 9, 12, 18, 24];
        for (var s in e) e[s][0] = l * e[s][0] / (21 * i[s]), e[s][1] = l * e[s][1] / (21 * i[s])
    }
    for (var c = 0; c < e.length; c++) if (Array.isArray(e[c])) for (var p in e[c]) e[c][p] = (Math.round(100 * e[c][p]) / 100).toString(); else e[c] = (Math.round(100 * e[c]) / 100).toString();
    var y = {
        get: function (a) {
            var t = "number" != typeof a ? isNaN(parseInt(a)) ? !1 : parseInt(a) : a;
            return t ? "undefined" != typeof this[t.toString()] ? this[t.toString()] : !1 : null
        }, terms: i, _debug_info: u
    };
    for (s in i) if (Array.isArray(e[s])) {
        y[i[s]] = [];
        for (p in e[s]) y[i[s]][p] = accounting.formatMoney(e[s][p])
    } else y[i[s]] = accounting.formatMoney(e[s]);
    return y
}

var Calculator = {
    monthlyPayments: function (a, t, r, e) {
        var l = a + a * t, n = r, o = e || 0, i = n / 12;
        return {
            _full_calc: l / ((1 - 1 / Math.pow(1 + i, o)) / i),
            _full_lease_calc: (l - 0 / Math.pow(1 + i, o)) / ((1 - 1 / Math.pow(1 + i, o)) / i),
            _full_lease_adv: (l - 0 / Math.pow(1 + i, o)) / ((1 - 1 / Math.pow(1 + i, o - 2)) / i + 2),
            _perc: (1 - 1 / Math.pow(1 + i, o)) / i,
            _true_discount: l / ((1 - 1 / Math.pow(1 + i, o - 2)) / i),
            _apr_12: i
        }
    }
};
