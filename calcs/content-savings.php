<form id="savings-calculator" class="calculator" action="#" method="post">
<table>
        <tbody>
        <tr class="odd">
            <td>Initial Investment</td><td><input type="text" name="principal" tabindex="1" placeholder="$"></td>
        </tr>
        <tr>
            <td>Monthly Addition</td><td><input type="text" name="moAdd" tabindex="2" placeholder="$"></td>
        </tr>
        <tr class="even">
            <td>Interest Rate</td><td><input class="percent" type="text" name="interest" tabindex="3"></td>
        </tr>
        <tr>
            <td>Number of Years</td><td><input type="text" name="payments" tabindex="4"></td>
        </tr>
    </tbody></table>
</form>
<img src="<?php echo bloginfo('template_url'); ?>/images/gray-bar.png" />
<table class="results">
    <tbody>
    <tr class="even"><td>Future Value</td><td id="FutureValue">-</td></tr>
    <tr class="odd"><td>Interest Earned</td><td id="InterestEarned">-</td></tr>
</tbody></table>