<form id="car-loan-calculator" class="calculator" action="#" method="post">
<table>
    <tbody>
    <tr class="odd">
        <td>Cost of Vehicle:</td>
        <td><input id="CostOfVehicle" name="CostOfVehicle" value="" placeholder="$"></td>
    </tr>
    <tr class="even">
        <td>Down Payment:</td>
        <td><input id="DownPayment" name="DownPayment" value="" placeholder="$"></td>
    </tr>
    <tr class="odd">
	<td>Vehicle Trade-In Value (if any):</td>
	<td><input id="TradeInvalue" name="TradeInvalue" value="" placeholder="$"></td>
    </tr>
    <tr class="even">
        <td>Interest Rate:</td>
        <td><input class="percent" id="InterestRate" name="InterestRate" value="" placeholder=""></td>
    </tr>
    <tr class="odd">
    	<td>Number of Months:</td>
        <td><input id="NumberOfMonths" name="NumberOfMonths" value=""></td>
    </tr>
    <tr class="even">
    	<td>Additional Principal Per Month:</td>
        <td><input id="AdditionalPrincipal" name="AdditionalPrincipal" value="" placeholder="$"></td>
    </tr>
</tbody></table>
<img src="<?php echo bloginfo('template_url'); ?>/images/gray-bar.png" />
<table class="results">
    <tbody>
    <tr class="even"><td>Loan Amount</td><td id="LoanAmount">-</td></tr>
    <tr class="odd"><td>Monthly Payment</td><td id="MonthlyPayment">-</td></tr>
    <tr class="even"><td>Total Interest Paid on Loan</td><td id="TotalInterest">-</td></tr>
    <tr class="odd"><th colspan="2"><input id="ShowAmortization" class="gradient" type="submit" style="margin:0 auto;" value="Show Amortization Schedule"></th></tr>
</tbody></table>
</form>
<div id="AmortizationTable" style="display: none;"></div>