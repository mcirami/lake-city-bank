<form id="loan-qualifier-calculator" class="calculator" method="post" action="#">
<table>
    <tbody><tr class="even"><th>Monthly Income</th></tr>
    <tr class="odd">
        <td>Salary/Wages</td><td><input type="text" name="income" tabindex="1" placeholder="$"> </td>
    </tr>
    <tr>
        <td>Other</td><td><input type="text" name="other" tabindex="2" placeholder="$"></td>
    </tr>
    <tr class="even"><th >Monthly Housing Expenses</th></tr>
    <tr class="odd">
        <td>Property Taxes</td><td><input type="text" name="taxes" tabindex="3" placeholder="$"></td>
    </tr>
    <tr>
        <td>Insurance</td><td><input type="text" name="insurance" tabindex="4" placeholder="$"></td>
    </tr>
    <tr class="even"><th >Other Monthly Expenses</th></tr>
    <tr class="odd">
        <td>Auto Payment</td><td><input type="text" name="auto" tabindex="5" placeholder="$"></td>
    </tr>
    <tr>
        <td>Credit/Debts</td><td><input type="text" name="cards" tabindex="6" placeholder="$"></td>
    </tr>
    <tr class="even"><th >Loan Terms &amp; Interest Rates</th></tr>
    <tr class="odd">
        <td>Loan Term</td><td><input type="text" name="term" tabindex="7" placeholder="Yrs."></td>
    </tr>
    <tr>
        <td>Interest Rate</td><td><input class="percent" type="text" name="rate" tabindex="8"></td>
    </tr>
</tbody></table>
</form>
<img src="<?php echo bloginfo('template_url'); ?>/images/gray-bar.png" />
<table class="results">
    <tbody>
    <tr class="odd"><td>Your Max. Monthly Payment (P+I) is</td><td id="maxMonthly">-</td></tr>
    <tr class="even"><td>You May Qualify for a Max Loan of</td><td id="QualifyAmount">-</td></tr>
</tbody></table>