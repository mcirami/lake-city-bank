(function($) {
	var A,B,C,CO,Z;
	
	function updateTable() {
		CO = $("input[name=calculate_option]:checked").val();
		A = parseFloat($('#Principal').val());
		B = parseFloat($('#InterestRate').val());
		C = parseInt($('#NumOfPeriods').val());
		if(!A || !B || !C) {
			$('#EffectiveRate').html('-');
			$('#CompoundRateOfReturn').html('-');
			$('#CompoundedAmount').html('-');
			return false;
		};
		getCompoundedInterest();
		getCompoundedAmount();
	};
	
	function getCompoundedInterest() {
		var H = 0;
		var G = $("input[name=year_option]:checked").val();
		var E = $("input[name=compound_option]:checked").val();
		if (G == 0) {
			if (E == 0) {
				F = 360;
				H = 1;
			}	
			if (E == 1) {
				F = 51.43;
				H = 7;
			}
			if (E == 2) {
				F = 25.71;
				H = 14;
			}
			if (E == 3) {
				F = 24;
				H = 15;
			}
			if (E == 4) {
				F = 12;
				H = 30;
			}
			if (E == 5) {
				F = 4;
				H = 90;
			}
			if (E == 6) {
				F = 2;
				H = 180;
			}
			if (E == 7) {
				F = 1;
				H = 360;
			}
		}
		if (G == 1) {
			if (E == 0) {
				F = 365;
				H = 1;
			}	
			if (E == 1) {
				F = 52;
				H = 7.0193;
			}
			if (E == 2) {
				F = 26;
				H = 14.03846;
			}
			if (E == 3) {
				F = 24;
				H = 15.20833;
			}
			if (E == 4) {
				F = 12;
				H = 30.41667;
			}
			if (E == 5) {
				F = 4;
				H = 91.25;
			}
			if (E == 6) {
				F = 2;
				H = 182.5;
			}
			if (E == 7) {
				F = 1;
				H = 365;
			}
		}
		var EIR = 0;
		var CEIR = 0;
		Z = 0;
		EIR = Math.pow((1+(B/(F*100))),F)-1;
		CEIR = Math.pow((1+(B/(F*100))) ,((C/(F*H))*F))-1;
		
		if (CO == 0) {
			if (G == 0) { Z = A * Math.pow((1 + EIR) , (C / 360)); };
			if (G == 1) { Z = A * Math.pow((1 + EIR) , (C / 365)); };
		};
		if (CO == 1) {
			if (G == 0) { Z = A / Math.pow((1 + EIR) , (C / 360)); };	
			if (G == 1) { Z = A / Math.pow((1 + EIR) , (C / 365)); };
		};
		$('#EffectiveRate').html(roundingPad(EIR * 100.00)+"%");
		$('#CompoundRateOfReturn').html(roundingPad(CEIR * 100.00)+"%");
	};
	
	function getCompoundedAmount() {
		var p = $('#CompoundedAmount').prev();
		if(CO==0) $(p).html('Compounded Amount'); else $(p).html('Starting Principal');
		$('#CompoundedAmount').html(currencyPad(Z));
	};
		  
	$(document).ready(function() {
		$('#compound-interest-calculator').submit(function(){ return false; });	
		$("#compound-interest-calculator input[type='text']").keyup(updateTable);
		$("#compound-interest-calculator input[type='radio']").click(updateTable);
		updateTable();
	});
})(jQuery);