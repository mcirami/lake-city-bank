<form id="retirement-calculator" method="post" action="#">
<table>
<tbody>
            <tr class="even"><td>Current Salary </td><td><input name="Salary" value="" tabindex="1" placeholder="$"></td></tr>
            <tr class="odd"><td>401(k) Contribution Percentage</td><td><input class="percent" name="Contribution" value="" tabindex="2"></td></tr>
            <tr class="even"><td>Match Percentage </td><td class="percent"><input name="Matching" value="" tabindex="3"></td></tr>
            <tr class="odd"><td>Pre-retirement Interest Rate</td><td><input class="percent" name="PreRate" value="" tabindex="4"></td></tr>
            <tr class="even"><td>Post-retirement Interest Rate </td><td><input class="percent" name="PostRate" value="" tabindex="5"></td></tr>
            <tr class="odd"><td>Inflation Rate</td><td><input class="percent" name="InflationRate" value="" tabindex="6"></td></tr>
            <tr class="even"><td>Salary Increase Rate</td><td><input class="percent" name="SalaryRate" value="" tabindex="7"></td></tr>
            <tr class="odd"><td>Current 401(k) value</td><td><input name="CurrentValue" value="" tabindex="8" placeholder="$"></td></tr>
            <tr class="even"><td>Current Age</td><td><input name="CurrentAge" value="" tabindex="9"></td></tr>
            <tr class="odd"><td>Expected Retirement Age</td><td><input name="RetirementAge" value="" tabindex="10"></td></tr>
            <tr class="even"><td>Desired Retirement Income</td><td><input name="DesiredIncome" value="" tabindex="11" placeholder="$"></td></tr>
        </tbody>
</table>
</form>
<img src="<?php echo bloginfo('template_url'); ?>/images/gray-bar.png" />
<table class="results">
    <tbody>
    <tr class="even"><td>401 Contribution</td><td id="Yearly">$0.00</td></tr>
    <tr class="odd"><td>Matching Contribution</td><td id="MatchContrib">$0.00</td></tr>
    <tr class="even"><td>401(k) Account value at Retirement</td><td id="AccountValue">$0.00</td></tr>
    <tr class="odd"><td id="RetirementValues" colspan="2">One Year Value: $0.00<br>Two Year Value: $0.00<br>Three Year Value: $0.00<br>Four Year Value: $0.00<br>Five Year Value: $0.00<br>Ten Year Value: $0.00<br>Fifteen Year Value: $0.00<br>Twenty Year Value: $0.00<br>Thirty Year Value: $0.00<br>Forty Year Value: $0.00<br></td></tr>
</tbody></table>