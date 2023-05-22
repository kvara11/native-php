<?php
    $this->loadModule ('Header');
?>

<main class="main section-179" role="main">

    <section class="section179-banner countdown-section">
        <div class="wrapper center">
            <h1><?= $page['Content']['countdown-headline'] ?></h1>
            <div class="countdown" id="countdown">

            </div>
            <script>
                $(function () {
                    $('#countdown').countdown('<?= $page['Content']['countdown-start-date'] ?>', function (event) {
                        var $this = $(this).html(event.strftime(''
                                + '<div><span>%D</span> Days</div> '
                                + '<div><span>%H</span> Hours</div> '
                                + '<div><span>%M</span> Minutes</div> '
                                + '<div><span>%S</span> Seconds</div>'));
                    });
                });

            </script>
        </div>
    </section>

    <section class="section179-body">
        <div class="wrapper clear">
            
            <div class="col50">
                <div class="calculator179-block">
                    <h2><?= $page['Content']['calculator-headline'] ?></h2>
                    <form class="clear form-standard section179-calculator">
                        <div class="clear calculate-inputs">
                            <label>Cost of Equipment</label>
                            <input type="text" class="cost-amount" />
                            <a href="javascript:void(0)" class="button calculate-btn">Calculate</a>
                        </div>
                        <div class="clear calc-row">
                            <div class="calc-label">
                                <h4>Section 179 First Year Write-Off:</h4>
                            </div>
                            <div class="calc-value">
                                <input type="text" id="row1" value="0"/>
                            </div>
                        </div>
                        <div class="clear calc-row">
                            <div class="calc-label">
                                <h4>50% Bonus Depreciation:</h4>
                                <span>(On any remaining amount above $1,000,000)</span>
                            </div>
                            <div class="calc-value">
                                <input type="text" id="row2" value="0"/>
                            </div>
                        </div>
                        <div class="clear calc-row">
                            <div class="calc-label">
                                <h4>Normal First Year Depreciation:</h4>
                                <!-- <span>(Depreciation calculated at 5 years = 20%)</span> -->
                            </div>
                            <div class="calc-value">
                                <input type="text" id="row3" value="0"/>
                            </div>
                        </div>
                        <div class="clear calc-row">
                            <div class="calc-label">
                                <h4>Total First Year Deduction:</h4>
                                <span>(Add Section 179 Deduction, Bonus Depreciation and First Year Depreciation)</span>
                            </div>
                            <div class="calc-value">
                                <input type="text" id="row4" value="0"/>
                            </div>
                        </div>
                        <div class="clear calc-row">
                            <div class="calc-label">
                                <h4>Tax Savings on Equipment Purchase:</h4>
                                <span>(Assuming a 35% tax bracket)</span>
                            </div>
                            <div class="calc-value">
                                <input type="text" id="row5" value="0"/>
                            </div>
                        </div>
                        <div class="clear calc-row savings">
                            <div class="calc-label">
                                <h4>Lowered Cost of Equipment after Tax Savings:</h4>
                            </div>
                            <div class="calc-value">
                                <input type="text" id="row6" value="0"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col50">
                <div class="left-side-top">
                    <h2><?= $page['Content']['left-side-headline'] ?></h2>
                    <?= $page['Content']['left-side-info'] ?>
                </div>
                <div class="left-side-bottom">
                        <h3>Need financing for your next equipment purchase?</h3>
                        <a href="#" class="button popup-btn">Get a Quote Online</a>
                    
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </section>

    <section class="eq-loan-cta">
        <div class="wrapper center">
            <div class="disclaimer">
                <p>Credit & equipment restrictions apply. This program does not assume your company will qualify to take
                    advantage of the IRS Section #179 depreciation schedule which allows rapid first year depreciation
                    of certain assets acquired. The amount of previous depreciation your company may have used may
                    affect your ability to utilize the elections. Please consult your tax adviser or accountant for
                    additional information. Equipment must be purchased and placed in service by 12/31/2019. </p>
                <?= $page['Content']['left-side-footer'] ?>
            </div>

        </div>
    </section>


    <div class="popup-overlay">
        <div class="calculator-wrapper" id="calculator">
            <div class="clear wrapper">
                <div class="col50 calculator-block">
                    <h2 class="calculator-title">Run payments</h2>
                    <form class="clear form-standard center calculator-form eq-calculator">
                        <div>
                            <label>How much do you want to borrow?</label>
                            <div id="slider"></div>
                            <div class="clear min-max">
                                <span class="left">5k</span><span class="right">250k+</span>
                            </div>
                            <input type="text" name="loan_amount" id="eq-amount" class="dollar-amount"/>
                        </div>
                        <div class="clear estimated-payment-box">
                            <div class="payment-amount">
                                <span class="small">Estimated payment:</span>
                                <span class="payment">$600/month</span>
                                <span class="small">for 60 months</span>
                            </div>
                        </div>
                        <div>
                            <input type="submit" value="Let's get started" class="button"/>
                        </div>
                    </form>
                </div>
                <div class="col50 slideout-details eq-loan-details">
                    <h3>Estimate overview</h3>
                    <p>Note: This is not a financing approval. A financing decision and the loan amount, term and rate
                        will be based on our review of your business and credit, and subject to our underwriting
                        requirements.</p>
                    <table>
                        <tbody>
                        <tr>
                            <td>Amount to finance:</td>
                            <td class="amount-to-finance">$25,000</td>
                        </tr>
                        <tr>
                            <td>Intended use</td>
                            <td>Buy equipment</td>
                        </tr>
                        <tr>
                            <td>Financing type</td>
                            <td>Equipment financing</td>
                        </tr>
                        <tr>
                            <td>Term</td>
                            <td>60 months</td>
                        </tr>
                        <tr>
                            <td>End of term option</td>
                            <td>$0, EFA <span class="info-box"><a href="javascript:void(0);"
                                                                  class="more-info-icon">i</a><span class="info-text">Nothing ($0) due at end of term.</span></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Sample credit</td>
                            <td>A+</td>
                        </tr>
                        <tr>
                            <td>Sample time in business</td>
                            <td>2+ years</td>
                        </tr>
                        <tr>
                            <td>Estimated payment</td>
                            <td><span class="month-rate">$600</span>/month</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="#" class="close-popup">[X] close window</a>
        </div><!-- end calculator-wrapper -->
    </div><!-- end popup-overlay -->


</main>

<?php $this->loadModule ('Footer'); ?>
