(function($) {
	function updateTable() {
		var complete = true;
		$('#savings-calculator input').not("input[name=moAdd]").each(function(i,input) {
			if(!input.value) complete = false;
	   	});
		if(complete) {
			calcForm(document.getElementById('savings-calculator'));
		} else {
			$('#FutureValue,#InterestEarned').html('-');
		};
	};
	
	function calcForm(form)  {
		var i = form.interest.value;
		//if (i > 1.0) {i = form.interest.value / 100} else {i = form.interest.value};
		i = form.interest.value / 100;
		i /= 12;
		var ma = (form.moAdd.value ? eval(form.moAdd.value) : 0);
		var prin = eval(form.principal.value);
		var pmts = eval(form.payments.value * 12);
		var count = 0;
		while(count < pmts) {
			newprin = prin + ma;
			prin = (newprin * i) + eval(prin + ma);
			count = count + 1;
		};
		$('#FutureValue').html(currencyPad(prin));
		var totinv = eval(count * ma) + eval(form.principal.value);
		$('#InterestEarned').html(currencyPad(eval(prin - totinv)));
	};
	
	$(document).ready(function() {
		$('#savings-calculator').submit(function() { return false; });	  
		$('#savings-calculator input').keyup(updateTable);
	});
})(jQuery);