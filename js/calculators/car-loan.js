(function($) {
	var tableVisible = false;
	function updateTable() {
		$('#AmortizationTable').html('');
		var TradeInVal = $('#TradeInvalue').val().replace(',','');
		var DownPayment = $('#DownPayment').val().replace(',','');
		var AdditionalPrincipal = $('#AdditionalPrincipal').val().replace(',','');
		if(!TradeInVal) TradeInVal = 0;
		if(!DownPayment) DownPayment = 0;
		if(!AdditionalPrincipal) AdditionalPrincipal = 0;
		
		var A = parseFloat($('#CostOfVehicle').val().replace(',',''))-parseFloat(DownPayment)-parseFloat(TradeInVal);
		var B = parseFloat($('#InterestRate').val());
		var C = parseInt($('#NumberOfMonths').val());
		var D = parseFloat(AdditionalPrincipal);
		if(!D) D=0;
		if(isNaN(A) || !$('#CostOfVehicle').val() || !$('#InterestRate').val() || !$('#NumberOfMonths').val()) { 
			$('#LoanAmount').html('-');
			$('#MonthlyPayment').html('-');
			$('#TotalInterest').html('-');
			return false;
		};
		$('#LoanAmount').html(currencyPad(A));
		
	
		var V = 0;
		V = A;
		var N = Math.pow(1 + B / 1200, C);
		var Z = (V * (B / 1200)) / (1 - (1 / N));
		var ZD = ((V * (B / 1200)) / (1 - (1 / N))) + D;
		var AA = currencyPad(A);
		var DD = currencyPad(D);
		var K = 0;
		var U = 0;
		var J = 0;
		var G = 0;
		for (I = 1; I <= C; I++) {
			K = (B / 1200) * V;
			U = U + K;
			J = Z - K;
			V = V - (J + D);
				if ( V <= (J + D)) {
					if (I > C - 1) {
						G = C;
					} else {
						G = I + 1;
					}
					break;
				}
			var ZZ = currencyPad(ZD);
			var UU = currencyPad(U);
			}
		$('#MonthlyPayment').html((ZZ?ZZ:''));
		$('#TotalInterest').html((UU?UU:''));
		if(!ZZ) return false;
		
		var html = new Array('<table>');
		html.push('<tr><th>Payment</th><th>Principal</th><th>Interest</th><th>Loan Balance</th></tr>');
		html.push('<tr><td style="text-indent: -9999em;">-</td><td style="text-indent: -9999em;">-</td><td>',roundingPad((B*100.00)/100),'%</td><td>',AA,'</td></tr>');

		var KK = 0;
		var JJ = 0;
		var H = 0;
					
		for (var I = 1; I <= G; I++) {
			H = I;
			KK = B / 1200 * A;
			JJ = Z - KK + D;
			A = A - JJ;
			if (A <= 100) { A = 0 }
			if (KK <= 0) { A = 0 }
						
			var PPP = currencyPad(JJ);
			var III = currencyPad(KK);
			var AAA = currencyPad(A);
				
			html.push('<tr><td>',H,'</td><td>',PPP,'</td><td>',III,'</td><td>',AAA,'</td></tr>');
		}
		html.push('</table>');
		$('#AmortizationTable').html(html.join(''));
	};
	
	function toggleTable() {
		if(tableVisible) {
			tableVisible = false;
			$('#ShowAmortization').val('Show Amortization Schedule');
		} else {
			tableVisible = true;
			$('#ShowAmortization').val('Hide Amortization Schedule');
		}
		$('#AmortizationTable').slideToggle();
		$('.text').stop().css({ height:'auto' });
	};
		  
	$(document).ready(function() {
		$('#AmortizationTable').hide();
		$('#ShowAmortization').click(toggleTable);
		$('#car-loan-calculator').submit(function() { return false; });
		$('#car-loan-calculator input').keyup(updateTable);					   
	});
})(jQuery);