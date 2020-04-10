function Gv(v) {
	v=parseInt(v)
	//
	if (v==1)  return " ";// Homepage link or direct link to another page
	if (v==2)  return " ";// Link back to calculator input page
	if (v==3)  return "Back to Information Page";// Description of link in Gv(1) above
	if (v==4)  return "";// Description of link in Gv(2) above
	if (v==5)  return "";//background jpg
	if (v==6)  return "#FFFFFF";//bcolor
	if (v==7)  return "#000000";//tcolor
	if (v==8)  return "#008000";//lcolor
	if (v==9)  return "#0000FF";//vcolor
	if (v==10) return "#808080";//acolor
	if (v==11) return ".0000134";//ins - daily rate 360 day year
	if (v==12) return ".0000667";//taxes - daily rate 360 day year
	if (v==13) return "350.00";//closing cost at 0 points
	if (v==14) return "";//empty - not used
	if (v==15) return "#FF0000";//results data color
	if (v==16) return "MACNAV";//Skip amort. progress message? MACNAV, NOMAC, NAV or ALL.
	if (v==17) return "#0000FF";//closing cost data color
	if (v==18) return "Your loan has been estimated!!!";//result page desc
	if (v==19) return "Y";//Enable = Y Disable = N - Allow mortgage bi-weekly calculation?
	if (v==20) return "N";//Enable = Y Disable = N - Place calculator in left/right frame?
	if (v==21) return "";//Place <br /> here to put detail balance on next line
	if (v==22) return "N";//Place N here if you do not want homepage link on results page - Y if you do
	if (v==23) return "Y";//Enable = Y Disable = N - Different output methods according to browser
	if (v==24) return "1";//Default browser output method if above is disabled - 1 = Netscape 0 = Non-Netscape
}
//
// End user editing here.
//
function cLoan(obj) {
	$('#results').html('');
	MacNav = "N"
	if (navigator.appName == "Netscape") {
		if (Gv(16) == "NAV") MacNav = "Y"
		if (navigator.appVersion.indexOf("Mac") != -1) {
			MacNav = "Y"
			if (Gv(16) == "NOMAC") MacNav = "N"
		}
	}
	if (Gv(16) == "ALL") MacNav = "Y"
	
	var cm=0 
	var yest=0
	var calcint="NO"
	if ((Gv(19) != "Y") && (obj.pd.options[7].selected)) {alert("Please chose another PAYMENT PERIOD.");return}
	var xgts=Gv(20)
	var xbrx=Gv(21)
	var mmdatx  =eval(-1)
	var dddatx  =eval(-1)
	var yydatx  =eval(-1)
	var pdsevenx=eval(0)
	var dlxout=""
	var dboutx =Gv(24)
	if (Gv(23) == "Y") {
		dboutx="0"
		if (navigator.appName == "Netscape") dboutx="1"
	}

	a=new xcheckvar(Gv(18))
	xcint=new xcheckvar(obj.interest.value)
	xcprin=new xcheckvar(obj.principal.value)
	xcp=new xcheckvar(obj.payment.value)
	xcdp=new xcheckvar(obj.dp.value)
	xcst=new xcheckvar(obj.st.value)
	var sintout=xcint.value
	var sstout=xcst.value 
	xins=new xcheckvar(Gv(11))
	xtaxes=new xcheckvar(Gv(12))
	xccost=new xcheckvar(Gv(13))
	if (cN(xins) || cN(xtaxes) || cN(xccost)) {alert("Gv11 - Gv12 - or Gv13 not a valid number.");return}
	if (xcp.value=="") xcp.value="0"
	if (xcdp.value=="") xcdp.value="0"
	if (xcst.value=="") xcst.value="0"
	
	
	if (xcp.value != "0") {
		if (!cN(xcp)) {
			if (xcint.value == "") {
				if (obj.pl.options[16].selected && obj.pd.options[6].selected) {alert("To calculate INTEREST RATE with the PAYMENT PERIOD set to OTHER - Please set TERM/LENGTH OF LOAN to OTHER.");return}
				if (obj.pl.options[16].selected) {alert("You must enter an INTEREST RATE or you must set TERM/LENGTH OF LOAN to something other than CALCULATE TERM.");return}
				calcint="YES"
				xcint.value="9.99"
			}
		}
	}
	
	
	if (obj.pd.options[6].selected) {
		if (!obj.pl.options[15].selected && !obj.pl.options[16].selected) {
			alert("To use the OTHER option in PAYMENT PERIOD you must also set TERM/LENGTH OF LOAN to OTHER or enter a PAYMENT AMOUNT and set TERM/LENGTH OF LOAN to CALCULATE TERM.")
			return
		}
	} 
	
	if (obj.pd.options[0].selected) var xpd="360"
	if (obj.pd.options[1].selected) var xpd="90" 
	if (obj.pd.options[2].selected) var xpd="30"
	if (obj.pd.options[3].selected) var xpd="15"
	if (obj.pd.options[4].selected) var xpd="14"  
	if (obj.pd.options[5].selected) var xpd="7"
	if (obj.pd.options[6].selected) var xpd=prompt('Please input Payment Period in Days: ', "")
	if (obj.pd.options[7].selected) {var xpd="14";pdsevenx="1"}
	if (xpd==null) return
	if (obj.pl.options[0].selected)  var xpl="1" 
	if (obj.pl.options[1].selected)  var xpl="2"
	if (obj.pl.options[2].selected)  var xpl="3"
	if (obj.pl.options[3].selected)  var xpl="4"
	if (obj.pl.options[4].selected)  var xpl="5" 
	if (obj.pl.options[5].selected)  var xpl="5.5"
	if (obj.pl.options[6].selected)  var xpl="6"
	if (obj.pl.options[7].selected)  var xpl="7"
	if (obj.pl.options[8].selected)  var xpl="8" 
	if (obj.pl.options[9].selected)  var xpl="9" 
	if (obj.pl.options[10].selected) var xpl="10"
	if (obj.pl.options[11].selected) var xpl="15"
	if (obj.pl.options[12].selected) var xpl="20" 
	if (obj.pl.options[13].selected) var xpl="25"
	if (obj.pl.options[14].selected) var xpl="30"
	if (obj.pl.options[15].selected) var xpl=prompt('Please input Number Of Payments: ', "")
	if (obj.pl.options[16].selected) var xpl="0"
	if (xpl==null) return
	var xpddesc=""
	var xpldesc  =""
	
	
	for (var ii=0;ii <= 7;++ii){
		if (obj.pd.options[ii].selected) xpddesc=obj.pd.options[ii].text
	}
	
	for (ii=0;ii <= 16;++ii){
		if (obj.pl.options[ii].selected) xpldesc=obj.pl.options[ii].text
	}
	
	var cccolorx=Gv(17)
	var oclx=Gv(15) 
	var bgx='<body>'
	var hlx='<html><head><title>'+Gv(18)+'</title></head>' 
	//var elx='<h4>[<a href='+Gv(2)+'>'+Gv(4)+'</a>]</h4>'  ORIGINAL LINE
	var elx=''
	if (Gv(22)=="Y") elx='<h4>[<a href='+Gv(1)+'>'+Gv(3)+'</a>][<a href='+Gv(2)+'>'+Gv(4)+'</a>]</h4>'
	var xda="1"
	var xml="0"
	var isadat="0"
	if (obj.da.checked) xda="0"
	if (obj.ml.checked) xml="1"
	if (xcp.value != "0") xml="0"
	var firsttim=0
	var xperd=0
	xcpl=new xcheckvar(xpl)
	xcpd=new xcheckvar(xpd)
	var msecPday=eval(24 * 60 * 60 * 1000)
	var xmpc="Press CALCULATE again to enter a new number."
	if (cN(xcprin)) {alert("PURCHASE PRICE is not a valid number.") ; return }
	if (cN(xcdp)) {alert("DOWN PAYMENT is not a valid number.") ; return }
	if (cN(xcst)) {alert("SALES TAX is not a valid number.") ; return }
	if (cN(xcpl)) {alert("The number you input - "+xpl+" - for NUMBER OF PAYMENTS is not a valid number. "+xmpc+" ") ; return }
	if (cN(xcpd)) {alert("The number you input - "+xpd+" - for PAYMENT PERIOD IN DAYS is not a valid number. "+xmpc+" ") ; return }
	if (cN(xcp)) { alert("PAYMENT AMOUNT is not a valid number.") ; return }
	if (cN(xcint)) {alert("INTEREST RATE is not a valid number.") ; return } 
	if (cI(obj.mm)) { alert("First Payment Date - MONTH - is not a valid number.") ; return }
	if (cI(obj.dd)) { alert("First Payment Date - DAY - is not a valid number.") ; return }
	if (cI(obj.yy)) { alert("First Payment Date - YEAR - is not a valid number.") ; return }
	xcprin.value=eval(xcprin.value)
	xcint.value=eval(xcint.value)
	xpl=eval(xpl)
	xpd=eval(xpd)
	xcp.value=eval(xcp.value)
	xcdp.value=eval(xcdp.value)
	xcst.value=eval(xcst.value)
	if (obj.pd.options[0].selected) xperd=Math.round(eval(xpl * 1)) 
	if (obj.pd.options[1].selected) xperd=Math.round(eval(xpl * 4)) 
	if ((obj.pd.options[2].selected) || (obj.pd.options[7].selected)) xperd=Math.round(eval(xpl * 12)) 
	if (obj.pd.options[3].selected) xperd=Math.round(eval(xpl * 24)) 
	if (obj.pd.options[4].selected) xperd=Math.round(eval(xpl * 26)) 
	if (obj.pd.options[5].selected) xperd=Math.round(eval(xpl * 52))
	if (obj.pl.options[15].selected)xperd=Math.round(eval(xpl))
	if (obj.mm.value != "") {
		mmdatx=eval(obj.mm.value)
		isadat="1"
	}
	
	if (obj.dd.value != "") dddatx=eval(obj.dd.value)
	if (obj.yy.value != "") yydatx=eval(obj.yy.value)
	if (eval(xcst.value) < 0 || eval(xcst.value) > 33) {alert("SALES TAX Out-Of-Range 0 to 33!");return}
	if (eval(xcdp.value) > eval(xcprin.value)) {alert("DOWN PAYMENT cannot be greater than PURCHASE PRICE!");return}
	if (eval(xcprin.value) < 0 || eval(xcprin.value) > 999999999) { alert("PURCHASE PRICE Out-Of-Range 0 to 999999999!") ; return }
	if (eval(xcint.value)==0) { alert("INTEREST RATE can not be 0!") ; return }
	if (eval(xcint.value) <= 0 || eval(xcint.value) > 100) { alert("INTEREST RATE Out-Of-Range Greater Than 0 to 100!") ; return }
	if (eval(xpd) < 0 || eval(xpd) > 1000) { alert("PAYMENT PERIOD in Days Out-Of-Range 0 to 1000! (You entered "+xpd+"). "+xmpc+" "); return }
	if (eval(xcp.value) < 0 || eval(xcp.value) > 999999999) { alert("PAYMENT AMOUNT Out-Of-Range 0 to 999999999!") ; return }
	if (eval(xperd) < 0 || eval(xperd) > 2000) { alert("TERM/LENGTH OF LOAN Out-Of-Range 0 to 2000! (You entered "+xperd+"). "+xmpc+" ") ; return } 
	if (eval(xperd)==0 && eval(xcp.value)==0) {alert("You must enter a PAYMENT AMOUNT if you choose - CALCULATE TERM - in TERM/LENGTH OF LOAN") ; return }
	if (calcint != "YES") {
		if (eval(xperd) != 0 && eval(xcp.value) != 0) {alert("Set TERM/LENGTH OF LOAN to CALCULATE TERM or set the PAYMENT AMOUNT to 0!") ; return }
	}
	if ((isadat != "0") && ((eval(dddatx) == eval(-1)) || (eval(yydatx) == eval(-1)))) {alert("The DAY and/or YEAR field of First Payment Date must be filled in if you wish to enter a First Payment Date!");return}
	if ((isadat == "0") && ((eval(dddatx) != eval(-1)) || (eval(yydatx) != eval(-1)))) {alert("The MONTH field of First Payment Date must be filled in if you wish to enter a First Payment Date!");return}
	if (isadat != "0") {
		if ((eval(mmdatx) > 12) || (eval(mmdatx)==0))  {alert("First Payment Date - MONTH - is out of range 1 - 12"); return}
		if ((eval(dddatx) > 31) || (eval(dddatx)==0))  {alert("First Payment Date - DAY - is out of range 1 - 31"); return}
		if (((eval(yydatx) < 1970) || eval(yydatx) > 9999) && (eval(yydatx) != eval(-1))) {alert("First Payment Date - YEAR - is out of range 1970-9999"); return}
		if ((eval(mmdatx)==2) && (eval(dddatx) > 28)) {alert("February only has 28 days (and sorry I do not count leap year)!"); return}
		if ((eval(mmdatx)==4) && (eval(dddatx) > 30)) {alert("April only has 30 days!"); return}
		if ((eval(mmdatx)==6) && (eval(dddatx) > 30)) {alert("June only has 30 days!"); return}
		if ((eval(mmdatx)==9) && (eval(dddatx) > 30)) {alert("September only has 30 days!"); return}
		if ((eval(mmdatx)==11) && (eval(dddatx) > 30)) {alert("November only has 30 days!"); return}
	}


	var svins=xins.value
	var svtax=xtaxes.value 
	xins.value=eval(xins.value * xcprin.value * xpd)
	xins.value=fR(xins.value)
	xtaxes.value=eval(xtaxes.value * xcprin.value * xpd)
	xtaxes.value=fR(xtaxes.value)
	var xinsout=xins.value;var xtaxesout=xtaxes.value
	var tandi=fR(eval(xinsout) + eval(xtaxesout))
	var pout=fR(xcprin.value)
	xcprin.value=((eval(pout) * (xcst.value * .01)) + eval(pout))
	var subtot=fR(xcprin.value)
	xcprin.value=(eval(subtot) - eval(fR(xcdp.value)))
	var pot=fR(xcprin.value)
	xcprin.value=eval(pot)
	var tax=fR(eval(subtot - pout))
	var xcost0=fR(Gv(13))
	var xcost1=fR((eval(pot) * .01) + eval(Gv(13)))
	var xcost2=fR((eval(pot) * .02) + eval(Gv(13)))
	if (obj.pd.options[7].selected) xpd=eval(30)
	if (eval(360 % xpd) != 0) cm=365
	if (eval(364 % xpd) == 0) cm=364
	if (eval(360 % xpd) == 0) cm=360
	if (parseInt(xpd) == 1)   cm=365
	var x=0;var mpay=0;var i=0;var iii=0;var savi=xperd;var nop=0
	var iiii=400;//High
	var iiiix=0;//Low
	
	if (xperd == 0) {
		if (!confirm("I am preparing to calculate the TERM. Please be patient...Press CANCEL to discontinue.")) return
		iiii=4000
		for (iii=0;iii < 40;++iii) {
			i=eval((iiii + iiiix) / 2)
			savi=i
			nop=eval((xcint.value / 100.0))
			nop=eval((nop / (cm / xpd)))
			x=1 
			
			for (ii=0; ii < i; ++ii) {
				x=eval(x * (1 + nop))
				mpay=eval((xcprin.value * x * nop) / (x - 1))
			}
			
			if (fR(mpay) == fR(xcp.value)) {
				xperd=Math.ceil(savi) 
				iii=999
				calcint="TERM"
			}
			
			if (mpay > eval(xcp.value)) iiiix=savi
			if (mpay < eval(xcp.value)) iiii=savi
		}
		savi=xperd
	}
	
	
	if (calcint == "YES") {
		if (!confirm("I am preparing to calculate the INTEREST RATE.Please be patient...Press CANCEL to discontinue.")) return
		xcint.value=0
		for (iii=0;iii < 100;++iii) {
			i=eval((iiii + iiiix) / 2)
			savi=i
			nop=eval((i / 100.0))
			nop=eval((nop / (cm / xpd)))
			x=1 
			for (ii=0; ii < xperd; ++ii) {
				x=eval(x * (1 + nop))
				mpay=eval((xcprin.value * x * nop) / (x - 1))
			}
			if (Math.round(eval(mpay * 100000)) == Math.round(eval(xcp.value * 100000))) {
				xcint.value=parseFloat(fRt(savi))
				iii=999
			}
			if (mpay < eval(xcp.value)) iiiix=savi
			if (mpay > eval(xcp.value)) iiii=savi
		}
	
		if (xcint.value == 0) {alert("ERROR - You have left the INTEREST RATE blank and I could not calculate the interest rate for you. The PAYMENT AMOUNT may be too low or too high compared to the PRINCIPAL and the TERM resulting in 0 or negative interest or too high an interest rate.");return}
		nop=eval((parseFloat(fR(xcint.value)) / 100.0))
		nop=eval((nop / (360 / xpd)))
		x=1 
		for (ii=0; ii < xperd; ++ii) {
			x=eval(x * (1 + nop))
			savi=eval((xcprin.value * x * nop) / (x - 1))
		}
		if (parseFloat(fR(mpay)) == parseFloat(fR(savi))) xcint.value=parseFloat(fR(xcint.value))
		savi=xperd
	}
	
	
	i=xcint.value
	i=eval((i / 100.0))
	i=eval((i / (cm / xpd)))
	var intrateperiod=i
	x=1
	mpay=eval(xcp.value)
	for (ii=0; ii < xperd; ++ii) {
		x=eval(x * (1 + i))
		mpay=eval((xcprin.value * x * i) / (x - 1))
	}
	cm=0
	if (obj.pd.options[7].selected) mpay=eval(mpay/2)
	mpay=parseFloat(fR(mpay))
	var mpayout=fR(mpay)
	var mpayout2=fR(eval(mpayout) + eval(xinsout) + eval(xtaxesout))
	var mpo=mpayout
	if (xml=="1") mpo=mpayout2
	nop=0 
	var pmct=0
	if (obj.pd.options[7].selected) {
		xperd=eval(0)
		xpd=eval(14)
		intrateperiod=eval((xcint.value/100/25.714285))
	}
	if (xperd==0) pmct=2001 
	var prepaddi=0
	var ilife=0
	var iperd=0
	var paddi=Math.round(eval(xcprin.value) * 100)
	for (ii=0; ii < eval(pmct); ++ii) {
		iperd=Math.round(((paddi * .01) * intrateperiod) * 100)
		ilife  =eval(ilife + iperd)
		paddi  =eval(paddi + iperd) 
		prepaddi=paddi
		paddi=paddi - Math.round(eval(mpay) * 100) 
		nop=eval(nop + 1)
		if (paddi <= 1.49) ii=99999
	}
	if (eval(ii)==2001) {alert("Hmmm - something is wrong here...I counted 2000+ payments! The Payment Amount may be too low for the Principal Amount and/or Interest. Please check your input and try again.");return}
	if ((eval(nop) > 400) && (!confirm("Wow! The input you have used to calculate this loan has resulted in "+nop+" payments! I can continue to calculate this loan for you - but be aware it may take a few minutes for the results to finish. Press OK to continue or CANCEL to end this loan calculation."))) return
	if ((eval(xperd) > 400) && (!confirm("Wow! You have requested "+xperd+" payments be made in calculating this loan! I can calculate this for you - but be aware it may take a few minutes for the results to finish. Press OK to continue or CANCEL to end this loan calculation."))) return
	if (((eval(prepaddi * .01)) > eval(xcp.value)) && (eval(xcp.value) != 0)) prepaddi=Math.round(mpay * 100)
	pmct=xperd
	if (xperd==0) pmct=nop
	if ((obj.pd.options[7].selected) && (xml=="1")) {prepaddi=Math.round(eval(fR(prepaddi + eval(xinsout * 100) + eval(xtaxesout * 100))));var lpobw=fR(eval(prepaddi * .01))} 
	prepaddi=eval(prepaddi * .01) 
	ilife   =eval(ilife * .01)
	if (xperd != 0) ilife=eval((mpay * xperd) - xcprin.value)
	var dpox=fR(xcdp.value)
	var finalpayout=fR(prepaddi)
	var pox=fR(xcp.value)
	var iox=fR(ilife)
	dlxout += ''+hlx+'' 
	dlxout += ''+bgx+'' 
	/*dlxout += '<h4>Loan Estimate</h4>' 
	dlxout += '<p>You input the following numbers to calculate your loan estimate:</p>' 
	dlxout += '<table><tr><td>Purchase Price</td><td>$'+cAd(pout)+'</td></tr>' 
	dlxout += '<tr><td>Sales Tax</td><td>'+sstout+'%</td></tr>' 
	dlxout += '<tr><td>Down Payment</td><td>$'+cAd(dpox)+'</td></tr>' 
	dlxout += '<tr><td>Annual Interest Rate</td><td>'+sintout+'%</td></tr>' 
	dlxout += '<tr><td>Payment Period</td><td>'+xpddesc+' ('+xpd+' days)</td></tr>' 
	if (calcint == "TERM") savi=parseInt(0)
	dlxout += '<tr><td>Life of Loan</td><td>'+xpldesc+' ('+savi+' payments)</td></tr>' 
	//dlxout += '<tr><td>Payment Amount </td><td>$'+cAd(pox)+'</td></tr>' 
	if (isadat != "0") dlxout += '<tr><td>First Payment Date</td><td>'+mmdatx+'/'+dddatx+'/'+yydatx+'</td></tr>' */
	//dlxout += '</table><hr /><h4>Results</h4>' 
	//dlxout += '<p>All numbers rounded to the penny. Results For ESTIMATION only.</p>' 
	if (pdsevenx == "1") {
		dlxout += '<p>Mortgage Bi-Weekly Payment Period calculates a monthly (every 30 days/12 payments a year) payment. It then divides' 
		dlxout += ' the monthly payment by 2 and it applies this payment amount bi-weekly (every 14 days/average of 26 payments a year).'  
		dlxout += ' This results in an average of two (2) extra payments a year which should pay off the loan faster and with less interest.' 
		dlxout += ' If you entered a payment amount, the calculator assumes this is a monthly payment amount - divides it by 2 - and it applies it bi-weekly.' 
		dlxout += ' </p><p>Note #1: Conventional mortgage bi-weekly loans may apply these extra payments one time a year and this will result in a slightly different' 
		dlxout += ' amortization schedule thfan is provided by this calculator. </p><p>Note #2: To correctly estimate how mortgage bi-weekly payments can pay off a'
		dlxout += ' conventional mortgage loan faster and with less interest, the TERM (LENGTH OF LOAN) on the input page must be set to the length of a conventional'
		dlxout += ' mortgage loan (usually 15 or 30 years). This does not apply if you enter a payment amount.</p>' 
	}
	dlxout += '<table class="results">';
	dlxout += '<tr><th colspan="2">Results</th></tr>' 
	dlxout += '<tr><td>Purchase Price </td><td>$'+cAd(pout)+'</td></tr>' 
	dlxout += '<tr><td>Sales Tax</td><td>$'+cAd(tax)+'</td></tr>' 
	dlxout += '<tr><td>Subtotal</td><td>$'+cAd(subtot)+'</td></tr>' 
	dlxout += '<tr><td>Down Payment</td><td>$'+cAd(dpox)+'</td></tr>' 
	dlxout += '<tr><td>Principal/Amount Financed</td><td>$'+cAd(pot)+'</td></tr>' 
	if (xml=="1") {
		dlxout += '<tr><td>Principal and Interest Payment (every ' + xpd + ' days)</td><td>$'+cAd(mpayout)+'</td></tr>' 
		dlxout += '<tr><td>Estimated property tax per payment</td><td>$'+cAd(xtaxesout)+'</td></tr>' 
		dlxout += '<tr><td>Estimated insurance per payment</td><td>$'+cAd(xinsout)+'</td></tr>' 
		dlxout += '<tr><td>Loan Payment (every ' + xpd + ' days)</td><td>$' + cAd(mpayout2) + '</td></tr>' 
		dlxout += '<tr><td>J) Estimated closing cost at 0 points</td><td>$'+cAd(xcost0)+'</td></tr>' 
		dlxout += '<tr><td>K) Estimated closing cost at 1 point</td><td>$'+cAd(xcost1)+'</td></tr>' 
		dlxout += '<tr><td>L) Estimated closing cost at 2 points</td><td>$'+cAd(xcost2)+'</td></tr>' 
	} 
	if (xml=="0") {
		dlxout += '<tr><td>F) Loan Payment [every ' + xpd + ' days] </td><td>$' + cAd(mpayout) + '</td></tr>' 
	}
	if (calcint == "YES") {
		xcint.value=eval(Math.round(eval(xcint.value * 1000)) * .001) 
		dlxout += '<tr><td>G) Estimated Interest Rate On This Loan</td><td>' + fRt(xcint.value) + '%</td></tr>'
	}
	if ((xperd==0) || (calcint == "TERM")) {
		if ((calcint == "TERM") && (xperd != 0)) nop=xperd
		if (eval(360 % xpd) != 0) yest=eval((xpd * nop)/365)
		if (eval(364 % xpd) == 0) yest=eval((xpd * nop)/364)
		if (eval(360 % xpd) == 0) yest=eval((xpd * nop)/360)
		if (parseInt(xpd) == 1) yest=365
		dlxout += '<tr><td>X.1) Number of Payments [every ' + xpd + ' days] </td><td>' + nop + '</td></tr>'
		dlxout += '<tr><td>X.2) Number of Years in the TERM [approx.] </td><td>' + cAd(fR(yest)) + '</td></tr>'
	} 
	if (xperd==0) dlxout += '<tr><td>Y) Final Payment Amount (last payment)</td><td> $' + cAd(finalpayout) + '</td></tr>' 
	dlxout += '<tr><td>Z) Interest Paid Over Life Of Loan </td><td>$' + cAd(iox) + '</td></tr>' 
	dlxout += '</table>' 
	/*if (xda=="0") {
		dlxout += '<h4>Detailed Loan Analysis</h4>' 
		dlxout += '<p>All numbers rounded to the penny. Results for ESTIMATION only.</p>'
	}*/
	var pdat ="X";nop=0;var applied=0;prepaddi=0;iperd=0;var lastpaddi=eval(0)
	var secondpay=eval(0);var xcnum=eval(0);iiii=0;iiiix=0;iii=0
	var dx="";var mx="";var yx="";var dx2="0";var xout=""
	var paddioutd="";var prepaddioutd="";var lastpaddioutd="";var appliedoutd=""
	var iperdoutd="";var liod=""
	paddi=Math.round(eval(pot) * 100)
	if (isadat != "0") {
		startdat=new Date(yydatx,mmdatx-1,dddatx)
		if ((mmdatx==2) && (dddatx==28)) {dddatx==++dddatx;dddatx=++dddatx}
	}
	
	
	if (xda=="1") pmct=0;
	if (dboutx == "1") {
		$(dlxout).appendTo('#results');
		dlxout=""
	} 

	dlxout += '<table id="AmortizationTable"><thead>';
	dlxout += '<tr><th>Date</th><th>Payment</th>';
	if (xml=="1") dlxout += '<th>Taxes/Ins.</th>'
	dlxout += '<th>Interest</th><th>Applied</th><th>Balance</th></tr>'; 
	dlxout += '</thead><tbody></tbody></table>';
	if(xda == '0') $(dlxout).appendTo('#results');
	dlxout = '';

	for (iiii=0; iiii < eval(pmct); ++iiii) {
		lastpaddi=paddi 
		iperd=Math.round(eval(((paddi * .01) * intrateperiod) * 100))
		paddi=eval(paddi + iperd) 
		prepaddi=paddi
		paddi=eval(paddi - Math.round(eval(mpayout) * 100)) 
		applied=eval(lastpaddi - paddi)        
		nop=eval(nop + 1)

		for (iii=0;iii < 6; ++iii) {
			if (iii==0) xcnum=paddi   
			if (iii==1) xcnum=prepaddi 
			if (iii==2) xcnum=lastpaddi 
			if (iii==3) xcnum=applied 
			if (iii==4) xcnum=iperd 
			if (iii==5) xcnum=eval(Math.round(eval(mpayout) * 100) - lastpaddi)
			if ((iii==5) && (eval(xperd)==0)) xcnum=eval(prepaddi - lastpaddi)
			xout=fR(eval(xcnum * .01))
			if (iii==0) paddioutd=xout 
			if (iii==1) prepaddioutd=xout 
			if (iii==2) lastpaddioutd=xout 
			if (iii==3) appliedoutd=xout 
			if (iii==4) iperdoutd=xout
			if (iii==5) liod=xout
		}
		
		if (isadat != "0") {
			dx=dddatx
			mx=mmdatx
			yx=yydatx
			dx=eval(dx)
			mx=eval(mx)
			yx=eval(yx)
		}
		
		if (isadat != "0"){
			if ((eval(xpd)==15) && (eval(firsttim)==0)){
				secondpay=eval(dx + 15)
				if (eval(dx)==31) secondpay=45
				if ((eval(dx)==28) && (eval(mx)==2)) secondpay=45
				secondpay=eval(secondpay)
				if (eval(secondpay) > 30) {secondpay=eval(secondpay - 30);cm=1}
				firsttim=1
			} 
			
			if ((eval(xpd)==15) && (eval(firsttim)==2)) {
				dx=secondpay
				if (cm==1) mmdatx=++mmdatx
				if (eval(mmdatx) > 12) {mmdatx=1;yydatx=++yydatx;yx=++yx } 
				mx=mmdatx
				if ((eval(mmdatx)==2) && (eval(dx) > 28)) dx=28
				if ((eval(dx) > 30) && (eval(mmdatx) != 2)) dx=30
				dx2=dx
				if (eval(dx) < 10) dx2="0"+dx 
				if (eval(mx) < 10) mx="0"+mx  
				if (eval(cm)==0) {
					mmdatx=++mmdatx 
					if (eval(mmdatx) > 12) {mmdatx=1;yydatx=++yydatx } 
				} 
				firsttim=0
			}
			
			
			if (eval(xpd)==30 || ((eval(xpd)==15) && (eval(firsttim)==1)) || eval(xpd)==90 || eval(xpd)==360) {
				if ((eval(mmdatx)==2) && (eval(dx) > 28)) dx=28
				if ((eval(dx) > 30) && (eval(mmdatx) != 2)) dx=30
				dx2=dx
				if (eval(dx) < 10) dx2="0"+dx 
				if (eval(mx) < 10) mx="0"+mx 
				if (eval(xpd)==30) {
					mmdatx=++mmdatx
					if (eval(mmdatx) > 12) {mmdatx=1;yydatx=++yydatx }
				}
				if (eval(xpd)==90) {
					mmdatx=++mmdatx
					mmdatx=++mmdatx
					mmdatx=++mmdatx
					if (eval(mmdatx) > 12) {mmdatx=eval(mmdatx - 12);yydatx=++yydatx }
				}
				if (eval(xpd)==360) yydatx=++yydatx 
			}
			
			
			if (eval(xpd)!=30 && eval(xpd)!=15 && eval(xpd)!=90 && eval(xpd)!=360) {
				mx=startdat.getMonth()
				dx=startdat.getDate()
				yx=startdat.getYear()
				mx=eval(mx+1)
				if ((eval(yx) >= 100) && (eval(yx) < 2000)) yx=eval((2000 + (yx - 100)))
				if (eval(yx) < 100) yx=eval(yx + 1900)
				dx2=dx     
				if (eval(dx) < 10) dx2="0"+dx 
				if (eval(mx) < 10) mx="0"+mx
				startdat.setTime(startdat.getTime() + (msecPday * xpd))
			}    
		
		
			firsttim=++firsttim 
			if (mx=="01") pdat='Jan '+dx2+'/'+yx
			if (mx=="02") pdat='Feb '+dx2+'/'+yx
			if (mx=="03") pdat='Mar '+dx2+'/'+yx
			if (mx=="04") pdat='Apr '+dx2+'/'+yx
			if (mx=="05") pdat='May '+dx2+'/'+yx
			if (mx=="06") pdat='Jun '+dx2+'/'+yx
			if (mx=="07") pdat='Jul '+dx2+'/'+yx
			if (mx=="08") pdat='Aug '+dx2+'/'+yx
			if (mx=="09") pdat='Sep '+dx2+'/'+yx
			if (mx=="10") pdat='Oct '+dx2+'/'+yx
			if (mx=="11") pdat='Nov '+dx2+'/'+yx
			if (mx=="12") pdat='Dec '+dx2+'/'+yx
		}

		if (eval(iiii) <= (pmct-2)) {
			dlxout += '<tr><td>('+ nop +') ' 
			if (pdat != "X") dlxout += pdat 
			dlxout += '</td>'  
			dlxout += '<td>$' + cAd(mpo) + '</td>' 
			if (xml=="1") dlxout += '<td>$' + cAd(tandi) + '</td>'  
			dlxout += '<td>$'+ cAd(iperdoutd) +'</td>' 
			dlxout += '<td>$'+ cAd(appliedoutd) +'</td>' 
			dlxout += ''+xbrx+'<td>$'+ cAd(paddioutd) +'</td></tr>' 
		} else {
			if (eval(xperd) != 0) prepaddioutd=mpo
			if ((pdsevenx == "1") && (xml=="1")) prepaddioutd=lpobw
			if (eval(liod) < 0) {
				liod="Negative"
			} else {
				liod=cAd(liod)
			}
			dlxout += '<tr><td>('+ nop +') '
			if (pdat != "X") dlxout += '  On '+pdat
			dlxout += '</td>'  
			dlxout += '<td>$' + cAd(prepaddioutd) + '</td>' 
			if (xml=="1") dlxout += '<td>$' + cAd(tandi) + '</td>' 
			dlxout += '<td>$'+ liod +'</td>' 
			dlxout += '<td>$'+ cAd(lastpaddioutd) +'</td>' 
			dlxout += ''+xbrx+'<td>$0.00</td></tr>' 
		}
		if (dboutx == "1") {
			$(dlxout).appendTo('#AmortizationTable tbody');
			dlxout=""
		} 
	}
	$('.text').stop().css({ height:'auto' });
	/*if (dboutx == "0") {
		if ((xda=="0") && (eval(nop) >= 200) && (MacNav == "N")) {
			MacNav = "DONE"
		}
		$(dlxout).appendTo('#results');
	} 
	$(dlxout+elx).appendTo('#results'); */
};



function cN(cnum) {
	var n=0
	var notnum=0 
	var decimalx=0
	if (cnum.value.length==0) return true 
	var xck=""
	for (var x=0 ; x <= (cnum.value.length - 1); ++x) {
		n=0
		xck=cnum.value.substring(x,x+1)
		if (xck >= "0" && xck <= "9") n=1
		if (cnum.value.substring(x,x+1)==".") { decimalx=decimalx + 1; n=1}  
		if (n==0) notnum=1 
	}
	if (decimalx > 1) notnum=1 
	if (notnum==1) return true
	if (notnum==0) return false
}



function cI(cnum) {
	var n=0
	var notnum=0 
	var decimalx=0
	if (cnum.value.length==0) return false 
	var xck=""
	for (var x=0 ; x <= (cnum.value.length - 1); ++x) {
		n=0
		xck=cnum.value.substring(x,x+1)
		if (xck >= "0" && xck <= "9") n=1
		if (n==0) notnum=1 
	}
	if (notnum==1) return true
	if (notnum==0) return false
}



function fR(cnum) {
	cnum=parseFloat(cnum)
	var x =0
	var x1=0
	var x2=0
	var x3=0
	var xout=""
	if (eval(cnum)==0) return "0.00"
	if (eval(cnum)< 0) return cnum
	x=Math.round(cnum * 100)
	if ((eval(x) < 10) && (eval(x) > 0)) {
		xout="0.0" + x
		return xout
	}
	if ((eval(x) < 100) && (eval(x) > 0)) {
		xout="0." + x
		return xout
	}
	x1=Math.floor(eval(x * .01))
	x2=Math.round(eval(x1) * 100)
	x3=eval(x - x2)
	if (eval(x3) < 100) xout=x1 + "." + x3
	if (eval(x3) < 10)  xout=x1 + ".0" + x3
	if (eval(x3) == 0)  xout=x1 + ".00"
	return xout
}



function cAd(cnum) {
	var x =parseFloat(cnum)
	var x1=cnum
	if (x < 1000) return x1
	if (x < 10000) {
		x1=x1.substring(0,1)+','+x1.substring(1,7)
		return x1
	}
	if (x < 100000) {
		x1=x1.substring(0,2)+','+x1.substring(2,8)
		return x1
	}
	if (x < 1000000) {
		x1=x1.substring(0,3)+','+x1.substring(3,9)
		return x1
	}
	if (x < 10000000) {
		x1=x1.substring(0,1)+','+x1.substring(1,4)+','+x1.substring(4,10)
		return x1
	}
	if (x < 100000000) {
		x1=x1.substring(0,2)+','+x1.substring(2,5)+','+x1.substring(5,11)
		return x1
	}
	if (x < 1000000000) {
		x1=x1.substring(0,3)+','+x1.substring(3,6)+','+x1.substring(6,12)
		return x1
	}
	return x1
}



function fRt(cnum) {
	cnum=parseFloat(cnum)
	var x1=fR(eval(cnum * 10))
	var x2=parseInt(x1.indexOf(".",0))
	var xout=""
	xout=x1.substring(0,x2-1) + "." + x1.substring(x2-1,x2) + x1.substring(x2+1,x1.length)
	return xout
}



function xcheckvar(v){this.value=v;return}

(function($) {
	$(document).ready(function() {
		$('#mortgage-calculator').submit(function(e) { e.preventDefault(); cLoan(this); });						   
	});
})(jQuery);