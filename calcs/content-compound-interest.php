<form method="post" action="#">
	<table id="compound-interest-calculator" class="calculator">
	    <tbody>
	    <tr class="odd">
	        <td id="CalculatorOptions"><input type="radio" name="calculate_option" value="0" checked="checked"> <strong>Calculate Compounded Amount</strong><br>
	<small>(Hint: Enter the <span style="text-decoration:underline;">opening balance</span> in the "Principal" box below to calculate what the compounded amount will be.)</small>
	</td>
	        <td><input type="radio" name="calculate_option" value="1"> <strong>Calculate Opening Balance</strong><br>
	<small>(Hint: Enter the <span style="text-decoration:underline;">compounded amount</span> in the "Principal" box below to calculate the opening balance you need to obtain your goal.)</small>
	</td>
	    </tr>
	    <tr class="even"><td colspan="2" id="YearOption"><input type="radio" name="year_option" value="0" checked="checked"> Base Calculations on a 360-Day Year</td><td><input type="radio" name="year_option" value="1"> Base Calculations on a 365-Day Year</td></tr>
	    <tr class="odd"><td>Principal:</td><td><input id="Principal" type="text" name="Principal" value="" placeholder="$"></td></tr>
	    <tr class="even"><td>Nominal Interest Rate:</td><td><input class="percent" id="InterestRate" type="text" name="InterestRate" value=""></td></tr>
	    <tr class="odd"><td>Total Number of Days:</td><td><input id="NumOfPeriods" type="text" name="NumberOfPeriods" value=""></td></tr>
	    <tr class="even"><td colspan="2" id="CompoundOption"><input type="radio" name="compound_option" value="0"> Compound on a Daily Basis<br><input type="radio" name="compound_option" value="1"> Compound on a Weekly Basis<br><input type="radio" name="compound_option" value="2"> Compound on a Bi-Weekly Basis<br><input type="radio" name="compound_option" value="3"> Compound on a Semi-Monthly Basis<br><input type="radio" name="compound_option" value="4" checked="checked"> Compound on a Monthly Basis<br><input type="radio" name="compound_option" value="5"> Compound on a Quarterly Basis<br><input type="radio" name="compound_option" value="6"> Compound on a Semi-Annual Basis<br><input type="radio" name="compound_option" value="7"> Compound on an Annual Basis</td></tr>
	</tbody></table>
</form>
<img src="<?php echo bloginfo('template_url'); ?>/images/gray-bar.png" />
<table class="results">
    <tbody>
    	<tr class="even"><td>Effective Rate of Interest</td><td id="EffectiveRate">1.50%</td></tr>
		<tr class="odd"><td>Compounded Rate of Return</td><td id="CompoundRateOfReturn">0.41%</td></tr>
		<tr class="even"><td>Compounded Amount</td><td id="CompoundedAmount">$50,204.37</td></tr>
	</tbody>
</table>