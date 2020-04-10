(function($) {
	function round(number,X) {
		// rounds number to X decimal places, defaults to 2
		X = (!X ? 2 : X);
		return Math.round(number*Math.pow(10,X))/Math.pow(10,X);
	};


	function updateTable() {
		var form = document.getElementById('retirement-calculator');
		
		var yearly = form.Salary.value*form.Contribution.value/100.0;
		$('#Yearly').html(currencyPad(yearly));
		
		var m = parseFloat(yearly,10)/12.0;
		m = m + (form.Salary.value * form.Matching.value / 100.0 / 12.0);
		var matchingContrib = form.Salary.value * form.Matching.value/100.0;
		$('#MatchContrib').html(currencyPad(matchingContrib));
		
		var tot = parseFloat(form.CurrentValue.value, 10);
		var i = 0;
		var r = parseFloat(form.PreRate.value, 10) / 100.0 / 12.0;
		var t = (parseFloat(form.RetirementAge.value, 10) - parseFloat(form.CurrentAge.value, 10)) * 12;
		var ir = parseFloat(form.InflationRate.value, 10) / 100.0 / 12.0;
		
		for (i=1; i<=t; i=i+1){
			tot = round(tot*Math.exp(r) + m);
			if (i % 12 == 0) m = m + (m * form.SalaryRate.value / 100.0);
		};
		
		$('#AccountValue').html(currencyPad(tot));
		
		var RetirementNeeds = parseFloat(form.DesiredIncome.value, 10);
		
		for (i=1; i<=t; i=i+1){ RetirementNeeds = RetirementNeeds*Math.exp(ir);	};
		var r = parseInt(form.PostRate.value, 10) / 100.0 / 12.0;
		var html = new Array();
		
		for (i=1; i<=12; i=i+1){
			tot = tot*Math.exp(r);
			RetirementNeeds = RetirementNeeds*Math.exp(ir);
			tot = round(tot - RetirementNeeds / 12.0);
		}
		html.push('One Year Value: ',currencyPad(tot),"<br />");
		
		for (i=1; i<=12; i=i+1){
			tot = tot*Math.exp(r);
			RetirementNeeds = RetirementNeeds*Math.exp(ir);
			tot = round(tot - RetirementNeeds / 12.0);
		}
		html.push('Two Year Value: ',currencyPad(tot),"<br />");
		
		for (i=1; i<=12; i=i+1){
			tot = tot*Math.exp(r);
			RetirementNeeds = RetirementNeeds*Math.exp(ir);
			tot = round(tot - RetirementNeeds / 12.0);
		}
		html.push('Three Year Value: ',currencyPad(tot),"<br />");
		
		for (i=1; i<=12; i=i+1){
			tot = tot*Math.exp(r);
			RetirementNeeds = RetirementNeeds*Math.exp(ir);
			tot = round(tot - RetirementNeeds / 12.0);
		}
		html.push('Four Year Value: ',currencyPad(tot),"<br />");
		
		for (i=1; i<=12; i=i+1){
			tot = tot*Math.exp(r);
			RetirementNeeds = RetirementNeeds*Math.exp(ir);
			tot = round(tot - RetirementNeeds / 12.0);
		}
		html.push('Five Year Value: ',currencyPad(tot),"<br />");
		
		for (i=1; i<=12*5; i=i+1){
			tot = tot*Math.exp(r);
			RetirementNeeds = RetirementNeeds*Math.exp(ir);
			tot = round(tot - RetirementNeeds / 12.0);
		}
		html.push('Ten Year Value: ',currencyPad(tot),"<br />");
		
		for (i=1; i<=12*5; i=i+1){
			tot = tot*Math.exp(r);
			RetirementNeeds = RetirementNeeds*Math.exp(ir);
			tot = round(tot - RetirementNeeds / 12.0);
		}
		html.push('Fifteen Year Value: ',currencyPad(tot),"<br />");
		
		for (i=1; i<=12*5; i=i+1){
			tot = tot*Math.exp(r);
			RetirementNeeds = RetirementNeeds*Math.exp(ir);
			tot = round(tot - RetirementNeeds / 12.0);
		}
		html.push('Twenty Year Value: ',currencyPad(tot),"<br />");
	
		for (i=1; i<=12*10; i=i+1){
			tot = tot*Math.exp(r);
			RetirementNeeds = RetirementNeeds*Math.exp(ir);
			tot = round(tot - RetirementNeeds / 12.0);
		}
		html.push('Thirty Year Value: ',currencyPad(tot),"<br />");
		
		for (i=1; i<=12*10; i=i+1){
			tot = tot*Math.exp(r);
			RetirementNeeds = RetirementNeeds*Math.exp(ir);
			tot = round(tot - RetirementNeeds / 12.0);
		}
		html.push('Forty Year Value: ',currencyPad(tot),"<br />");
	
		$('#RetirementValues').css('textAlign','center').html(html.join(''));
	};
	
	$(document).ready(function() {
		$('#retirement-calculator').submit(function() { return false; });	
		$('#retirement-calculator input').keyup(updateTable);
		updateTable();
	});
	
})(jQuery);
