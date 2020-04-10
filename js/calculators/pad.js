// **************************************************************

// Currency function.

function currencyPad(P, width) {

	P = "" + eval(P)
	Q = parseInt(P)
	strQ = "" + Math.abs(Q)

	if (Math.abs(Q)>=1000) {
		lenQ = strQ.length
		S = parseInt("" + (Q/1000))
		T = strQ.substring(lenQ - 3, lenQ)
		strQ = Math.abs(S)+","+T
	}

	if (Math.abs(Q)>=1000000) {
		lenQ = strQ.length
		S = parseInt("" + (Q/1000000))
		T = strQ.substring(lenQ - 7, lenQ)
		strQ = Math.abs(S)+","+T
	}

	if (Math.abs(Q)>=1000000000) {
		lenQ = strQ.length
		S = parseInt("" + (Q/1000000000))
		T = strQ.substring(lenQ - 12, lenQ)
		strQ = Math.abs(S)+","+T
	}
	
	nDollars = parseInt(P);
	rCents = (P - nDollars) * 100.00;
			
		if (rCents > 99.5) {
			dCents = Math.round(rCents);
		} else {
			dCents = rCents;
		}
		
	nCents = Math.abs(parseInt(dCents));

	if (nCents == 0) {
		if (Q < 0) {
			X = "($" + strQ + ".00" + ")";
		} else { 
		X = "$" + strQ + ".00";
		}
	}

	if (nCents > 0 && nCents < 10) {
		if (Q < 0) {
			X = "($" + strQ + ".0" + nCents + ")";
		} else {
		X = "$" + strQ + ".0" + nCents;
		}
	}

	if (nCents >= 10 && nCents < 100) {
		if (Q < 0) {
			X = "($" + strQ + "." + nCents + ")";
		} else {
		X = "$" + strQ + "." + nCents;
		}
	}
	
	if (nCents == 100) {
		if (Q < 0) {
			X = "($" + strQ + "." + (nCents - 1) + ")";
		} else {
		X = "$" + strQ + "." + (nCents - 1);
		}
	}
	
	return X
}

// **************************************************************

// Rounding function for percentages.

function roundingPad(P, width) {

	P = "" + eval(P)
	Q = parseInt(P)
	strQ = "" + Math.abs(Q)

	if (Math.abs(Q)>=1000) {
		lenQ = strQ.length
		S = parseInt("" + (Q/1000))
		T = strQ.substring(lenQ - 3, lenQ)
		strQ = Math.abs(S)+","+T
	}

	if (Math.abs(Q)>=1000000) {
		lenQ = strQ.length
		S = parseInt("" + (Q/1000000))
		T = strQ.substring(lenQ - 7, lenQ)
		strQ = Math.abs(S)+","+T
	}

	if (Math.abs(Q)>=1000000000) {
		lenQ = strQ.length
		S = parseInt("" + (Q/1000000000))
		T = strQ.substring(lenQ - 12, lenQ)
		strQ = Math.abs(S)+","+T
	}

	nWholeNumber = parseInt(P);
	rNumber = (P - nWholeNumber) * 100.00;
			
		if (rNumber < 99.5) {
			dNumber = Math.round(rNumber);
		} else {
			dNumber = rNumber;
		}
	nNumber = Math.abs(parseInt(dNumber));

	if (nNumber == 0) {
		if (Q < 0) {
			X = "(" + strQ + ".00" + ")";
		} else { 
		X = "" + strQ + ".00";
		}
	}

	if (nNumber > 0 && nNumber < 10) {
		if (Q < 0) {
			X = "(" + strQ + ".0" + nNumber + ")";
		} else {
		X = "" + strQ + ".0" + nNumber;
		}
	}

	if (nNumber >= 10 && nNumber < 100) {
		if (Q < 0) {
			X = "(" + strQ + "." + nNumber + ")";
		} else {
		X = "" + strQ + "." + nNumber;
		}
	}
	
	if (nNumber == 100) {
		if (Q < 0) {
			X = "(" + strQ + "." + (nNumber - 1) + ")";
		} else {
		X = "" + strQ + "." + (nNumber - 1);
		}
	}
	
	return X
}

// **************************************************************

// Integer pad for whole number fields.

function integerPad(P, width) {

	P = "" + eval(P)
	Q = parseInt(P)
	strQ = "" + Math.abs(Q)

	if (Math.abs(Q)>=1000) {
		lenQ = strQ.length
		S = parseInt("" + (Q/1000))
		T = strQ.substring(lenQ - 3, lenQ)
		strQ = Math.abs(S)+","+T
	}

	if (Math.abs(Q)>=1000000) {
		lenQ = strQ.length
		S = parseInt("" + (Q/1000000))
		T = strQ.substring(lenQ - 7, lenQ)
		strQ = Math.abs(S)+","+T
	}

	if (Math.abs(Q)>=1000000000) {
		lenQ = strQ.length
		S = parseInt("" + (Q/1000000000))
		T = strQ.substring(lenQ - 12, lenQ)
		strQ = Math.abs(S)+","+T
	}

	nWholeNumber = parseInt(P);
	rNumber = (P - nWholeNumber) * 100.00;
			
		if (rNumber < 99.5) {
			dNumber = Math.round(rNumber);
		} else {
			dNumber = rNumber;
		}
	nNumber = Math.abs(parseInt(dNumber));

	if (Q < 0) {
			X = "(" + strQ + ")";
		} else { 
		X = "" + strQ;
		}

	return X
}

// **************************************************************