function modEstimateAmount (startAmount) {
    if(startAmount > 250000)
    {
        $("#slider").slider("option", "max", startAmount);
    }
    $("#slider").slider("value",startAmount);
    equip = calcPayments(startAmount, 'equipment');
    $("#eq-amount").val(format_currency(startAmount).replace("$",""));
    $('.eq-loan-details').show();
    $(".slideout-details td.amount-to-finance").text(format_currency(startAmount));
    $('div.payment-amount span.payment').text(equip.get(60)[0] + "/month");
    $(".slideout-details td span.month-rate").text(equip.get(60)[0]);
};
$(function () {
    // SECTION 179 PAGE
    //Calculator popup
    $('.popup-btn').click(function (e) {
        e.preventDefault();
        $('body').addClass('mobile-fixed');
        $('.popup-overlay').show();
    });

    // POPUP CLOSE BUTTON
    $('.close-popup').click(function (e) {
        e.preventDefault();
        $('.popup-overlay').hide();
        $('body').removeClass('mobile-fixed');
    });

    // RESET SCROLL POSTION IN POPUP WINDOW ON CLICK OF CLOSE BUTTON
    $('.close-popup').click(function() {
        $('.popup-overlay').scrollTop(0);
    });



    $('.section179-calculator .cost-amount').keyup(function (e) {
        var costFormatted = format_currency($(this).val());
        $(this).val(costFormatted)
        modEstimateAmount(parseFloat(costFormatted.replace(/\$|,/g, '')));
    });

    $('.section179-calculator .calculate-btn').click(function (e) {
        e.preventDefault();
        var cost = $('.section179-calculator .cost-amount').val();
        var costOfEquipment = parseFloat(cost.replace(/\$|,/g, ''));
        modEstimateAmount(costOfEquipment);
        var firstYearWriteOff = 0,
            bonusDep = 0,
            normalFirstYearDep = 0,
            totalFirstYearDep = 0,
            taxSavingsOnEquip = 0,
            loweredCostOfEquip = 0;

            /*
            Updated Oct 2018
            First Year Writeoff
                Full price of equipment, but capped at 1mil
                If price is greater than 2.5mil, the deduction is 3.5mil - cost of equip
                If equip price is greater than 3.5mil, the deduction is 0

            Bonus Amount
                Price - deduction
                If price is greater than 1mil, then it's price - deduction


            */

        if (costOfEquipment <= 2500000) {
            if (costOfEquipment > 1000000) {
                firstYearWriteOff = 1000000;
            } else {
                firstYearWriteOff = costOfEquipment;
            }
            
        }
        if (costOfEquipment > 2500000) {
            firstYearWriteOff = (3500000 - costOfEquipment);
            if (costOfEquipment > 3500000) {
                firstYearWriteOff = 0;
            }
        }
        
        bonusDep = (costOfEquipment - firstYearWriteOff);
        normalFirstYearDep = (costOfEquipment - firstYearWriteOff - bonusDep) * 0.20;
        totalFirstYearDep = (firstYearWriteOff + bonusDep + normalFirstYearDep);
        taxSavingsOnEquip = totalFirstYearDep * 0.35;
        loweredCostOfEquip = (costOfEquipment - taxSavingsOnEquip);

        $("#row1").val(format_currency(firstYearWriteOff));
        $("#row2").val(format_currency(bonusDep));
        $("#row3").val(format_currency(normalFirstYearDep));
        $("#row4").val(format_currency(totalFirstYearDep));
        $("#row5").val(format_currency(taxSavingsOnEquip));
        $("#row6").val(format_currency(loweredCostOfEquip));

        return false;
    })
    var startAmount = $('.section179-calculator .cost-amount').val().replace(/\$|,/g, '');
    var equip;



    var process_slider_el = function (event, ui) {
        equip = calcPayments(ui.value, 'equipment');
        $(".slideout-details td.amount-to-finance").text(format_currency(ui.value));
        $("#eq-amount").val(format_currency(ui.value).replace(/\$/g, ''));
        $('div.payment-amount span.payment').text(equip.get(60)[0] + "/month");
        $(".slideout-details td span.month-rate").text(equip.get(60)[0]);
    };
    $('#slider').slider({
        value: startAmount,
        min: 5000,
        max: 250000,
        step: 1000,

        slide: process_slider_el,
        change: process_slider_el
    });
    $("#eq-amount").change(function () {
        $("#slider").slider("value", $("#eq-amount").val().replace(/,/g, ''));
    });

    $("#eq-amount").val(format_currency($("#slider").slider("value")).replace(/,/g, ''));
    $('.eq-calculator input[type="submit"]').click(function (e) {
        e.preventDefault();

        $("#eq-amount").val($("#eq-amount").val().replace(/,/g, ''));
        $('.eq-calculator').attr('action', "https://apply.tritoncptl.com/go/tritoncapital/" + $("#eq-amount").val());

        $('.eq-calculator').submit();

    });
    $('.slideout-details .info-text').hide();
    $('.slideout-details .more-info-icon').click(function (e) {
        e.preventDefault();
        $('.slideout-details .info-text').slideToggle();
    });
    modEstimateAmount(startAmount);
});