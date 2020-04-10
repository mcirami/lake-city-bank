<form action="#" method="post">
	<table id="standard-loan-calculator" class="calculator">
	    <tbody>
	    	<tr class="odd">
	            <td>Loan Amount:</td>
	            <td><input name="LoanAmount" value="" placeholder="$40,000"></td>
	        </tr>
	
	        <tr class="even">
	            <td>Interest Rate:</td>
	            <td><input class="percent" name="InterestRate" value="" placeholder="0.0"></td>
	        </tr>
	
	        <tr class="odd">
	            <td>Number of Years</td>
	            <td><input name="NumberOfYears" value="" placeholder="10"></td>
	        </tr>
	
	        <tr class="even">
	            <td>Number of Periods Per Year</td>
	            <td><input name="NumberOfPeriods" value="" placeholder="12"></td>
	        </tr>
	
	        <tr class="odd">
	            <td colspan="2" class="radios"><input type="radio" name="compound_option" value="0"> Compound on a Weekly Basis<br>
	            <input type="radio" name="compound_option" value="1"> Compound on a Bi-Monthly Basis<br>
	            <input type="radio" name="compound_option" value="2" checked="checked"> Compound on a Monthly Basis<br>
	            <input type="radio" name="compound_option" value="3"> Compound on a Quarterly Basis<br>
	            <input type="radio" name="compound_option" value="4"> Compound on an Annual Basis</td>
	        </tr>
	    </tbody>
	</table>
</form>

<img src="<?php echo bloginfo('template_url'); ?>/images/gray-bar.png" />

<table class="results">
    <tbody>
        <tr class="odd">
            <td>Payment Amount</td>
            <td id="PaymentAmount"></td>
        </tr>

        <tr class="even">
            <td>Total Interest Paid on Loan</td>
            <td id="TotalInterest"></td>
        </tr>

        <tr class="odd">
            <th colspan="2"><input class="gradient" id="ShowAmortization" type="submit" value="Show Amortization Schedule"></th>
        </tr>
    </tbody>
</table>

<div id="AmortizationTable" style="display: none;"></div>