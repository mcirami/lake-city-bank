(function($) {
	var tableVisible = false;
	var A,B,C,D,E,EO,ZO;
	
	function updateTable() {
		$('#AmortizationTable').html('');
		A = parseFloat($('input[name=LoanAmount]').val().replace(/,/g, ''));
		B = parseFloat($('input[name=InterestRate]').val());
		C = parseInt($('input[name=NumberOfYears]').val());
		D = parseInt($('input[name=NumberOfPeriods]').val());
		E = $('input[name=compound_option]:checked').val();
		if(!A||!B||!C||!D) {
			$('#PaymentAmount').html('-');
			$('#TotalInterest').html('-');
			return false;
		};
		getPaymentAmount();
		updateAmortizationTable();
	};
	
	function updateAmortizationTable() {
		var html = new Array('<table>');
		html.push("<tr><th>Payment</th><th>Principal</th><th>Interest</th><th>Loan Balance</th></tr>");
		html.push("<tr><td style='text-indent: -9999em;'>-</td><td style='text-indent: -9999em;'>-</td><td>",roundingPad((B*100.00)/100),"%</td><td>",currencyPad(A),"</td></tr>");
			
		var KK = JJ = H = 0;
		for (var I = 1; I <= EO; I++) {
			H = I;
			KK = B / 1200 * A;
			JJ = ZO - KK;
			A = A - JJ;
				
			if (A <= 100) A = 0;
			if (KK <= 0) A = 0;
				
			html.push("<tr><td>",H,"</td><td>",currencyPad(JJ),"</td><td>",currencyPad(KK),"</td><td>",currencyPad(A),"</td></tr>");
		};
		html.push("</table>");
		$('#AmortizationTable').html(html.join(''));
	};
	
	function getPaymentAmount() {
		if (E == 0) { CO=52; };	
		if (E == 1) { CO=24; };
		if (E == 2) { CO=12; };
		if (E == 3) { CO=4; };
		if (E == 4) { CO=1; };
		var V = 0;
		V = A;
		var VO = 1200 * (Math.pow((1 + (B / 100)), .083333333333) - 1);
		var XO = Math.pow((1 + (VO / (CO * 100))), CO);
		var YO = XO - 1;
		var NO = Math.pow((1 + (YO / D)), C * D);
		ZO = (A * (YO / D)) / (1 - (1 / NO));
		EO = C * D;
		var FO = EO * ZO;
		var GO = FO - A;
		$('#PaymentAmount').html(currencyPad(ZO));
		$('#TotalInterest').html(currencyPad(GO));
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
		updateTable();
		$('#ShowAmortization').click(toggleTable);
		$('#standard-loan-calculator').submit(function() { return false; });
		$('#standard-loan-calculator input').keyup(updateTable);	
		$("#standard-loan-calculator input[type='radio']").click(updateTable);
	});	  
})(jQuery);