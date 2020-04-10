(function($) {
	function housingRatio(income, other, taxes, insurance) {
		if(!other) other = 0;
		
		housing = eval(income * .28) + eval(other * .28) - taxes - insurance;
		return housing;
	};
	function debtRatio(income, other, taxes, insurance, auto, cards) {
		debt = eval(income * .36) + eval(other * .36) - taxes - insurance - auto - cards;
		return debt;
	};    

	function updateTable() {
		var allFilled = true;
		$('#loan-qualifier-calculator input').not("input[name=other]").each(function(i,input) {
			if(!input.value) allFilled = false;													
		});
		if(!allFilled) return;
		
		var Z;
		var form = document.getElementById('loan-qualifier-calculator');
		housingRatioResult = Math.round(housingRatio(form.income.value, form.other.value, form.taxes.value, form.insurance.value));
		debtRatioResult = Math.round(debtRatio(form.income.value, form.other.value, form.taxes.value, form.insurance.value, form.auto.value, form.cards.value));
		if (housingRatioResult>debtRatioResult) {
			Z=debtRatioResult;
			$('#maxMonthly').html(currencyPad(debtRatioResult));
		} else {
			Z=housingRatioResult;
			$('#maxMonthly').html(currencyPad(housingRatioResult));
		};
		var a = parseFloat(form.rate.value);
		var b = parseFloat(form.term.value);
		var c = Z;
		var d = parseFloat(a / 1200); 
		var e = parseFloat(b * 12);
		var f = parseFloat(1 + d);
		var g = parseFloat(Math.pow(f, e));
		var h = parseFloat(1 / g);
		var i = parseFloat(1 - h);
		var j = parseFloat(i / d);
		var k = parseFloat(c * j);
		$('#QualifyAmount').html(currencyPad(k));
	};
	
	$(document).ready(function() {
		$('#loan-qualifier-calculator').submit(function() { return false; });
		$('#loan-qualifier-calculator input').keyup(updateTable);
	});
})(jQuery);