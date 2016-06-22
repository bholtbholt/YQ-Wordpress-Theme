// Author: Josh Lambert 
jQuery(document).ready(function($) {
  var pv_increase_percent;
	var current_bouncerate;
	var user_count;
	
	var avg_cpm;	
	var current_pvs;
	
	var pv_increase;
	var new_pvs;
	
	var current_vpvs;
	
	var current_adrevenue;
	
	var new_bouncerate;
	var vpv_increase;
	
	var revenue_increase;
	var bouncerate_bump;
	
	var subtotal;
	var pv_monthly_revenue_increase;
	
	var new_avg_cpm;
	var adrevenue_increase;
	var netrevenue_increase;
	
	var youneeq_monthlycost;
	var roi;
	
	function grabCalcFormSubmit(){
		$("#roicalcform").submit(function (e){
				e.preventDefault();
			setGlobals();
			outputData();
			});
	}

	function addCalcToDom() {
		$("#pv_monthly_revenue_increase").parent().parent().hide();
		grabCalcFormSubmit();
	}

	function setGlobals() {
		setAvgCpm();
		setPvs();
		setPvIncreasePercent();
		setCurrentVpvs();
		setCurrentBouncerate();
		setNewBouncerate();
	}
	function outputData() {
		outputPvIncrease();
		outputCurrentVpvs();
		outputUsercount();
		outputVpvIncrease();
		outputCurrentAdrevenue();
		outputRevenueIncrease();
		outputBouncerateBump();
		outputSubtotal();
		outputPvMonthlyRevenueIncrease();
		outputAdrevenueIncrease();
		outputNetrevenueIncrease();
		outputRoi();
		unHideRevenue();
	}
	
	function setAvgCpm() {
		avg_cpm =  parseFloat($("#avg_cpm").val().replace(/[^\d\.\-\ ]/g, ''));
	}
	function setPvs() {
		current_pvs =  parseFloat($("#current_pvs").val().replace(/[^\d\.\-\ ]/g, ''));
	}
	function setPvIncreasePercent() {
		pv_increase_percent =  parseFloat($("#pv_increase_percent").val().replace(/[^\d\.\-\ ]/g, ''));
	}
	function setCurrentBouncerate() {
		current_bouncerate = parseFloat($("#current_bouncerate").val().replace(/[^\d\.\-\ ]/g, ''));
	}
	function setCurrentVpvs() {
		current_vpvs = parseFloat($("#current_vpvs").val().replace(/[^\d\.\-\ ]/g, ''));
	}
	function setNewBouncerate() {
		new_bouncerate = parseFloat($("#new_bouncerate").val().replace(/[^\d\.\-\ ]/g, ''))*0.01;
	}
	function setNewAvgCpm() {
		new_avg_cpm = parseFloat($("#new_avg_cpm").val().replace(/[^\d\.\-\ ]/g, ''));
	}
	function setYouneeqMonthlycost() {
		youneeq_monthlycost = parseFloat($("#youneeq_monthlycost").val().replace(/[^\d\.\-\ ]/g, ''));
	}
	
	function calculateCurrentVpvs() {
		current_vpvs = current_bouncerate*current_pvs*0.01;
		return current_vpvs;
	}
	function calculatePvIncrease() {
		pv_increase = current_pvs*pv_increase_percent*0.01;
		new_pvs = current_pvs+pv_increase;
		return new_pvs;
		}
	function calculateVpvIncrease() {
		setCurrentVpvs();
		vpv_increase = (current_vpvs-(current_pvs*new_bouncerate));
		return vpv_increase;
	}		
	function outputUsercount() {
		user_count = Math.round(current_pvs/7.74);
		$("#user_count").val(numberWithCommas(user_count));
	}
	function outputCurrentVpvs() {
		$("#current_vpvs").val(numberWithCommas(calculateCurrentVpvs()));
	}
	function outputVpvIncrease() {
		$("#vpv_inrease").val(numberWithCommas(calculateVpvIncrease()));
	}
	function outputPvIncrease()	{
		calculatePvIncrease();
		$("#pv_increase").html(numberWithCommas(pv_increase));
		$("#new_pvs").html(numberWithCommas(new_pvs));
	}
	function outputVpvIncrease() {
		$("#vpv_increase").val(numberWithCommas(calculateVpvIncrease()));	
	}
	function outputCurrentAdrevenue() {
		current_adrevenue = (current_pvs/100)*avg_cpm;
	
		$("#current_adrevenue").val('$'+numberWithCommas(current_adrevenue));	
	}	
	function outputRevenueIncrease() {
		revenue_increase = (pv_increase/1000)*avg_cpm;
		$("#revenue_increase").html(numberWithCommas(revenue_increase));	
	}	
	function outputBouncerateBump() {
		bouncerate_bump = (vpv_increase/1000)*avg_cpm;
		$("#bouncerate_bump").html(numberWithCommas(bouncerate_bump));	
	}	
	function outputSubtotal() {
		subtotal = current_adrevenue+revenue_increase+bouncerate_bump;
		$("#subtotal").html('$'+numberWithCommas(subtotal));	
	}	
	function outputPvMonthlyRevenueIncrease() {
		pv_monthly_revenue_increase = subtotal-current_adrevenue;
		$("#pv_monthly_revenue_increase").html('$'+numberWithCommas(pv_monthly_revenue_increase));	
	}	
	function outputAdrevenueIncrease() {
		setNewAvgCpm();
		adrevenue_increase = (new_pvs*(new_avg_cpm/1000))-current_adrevenue;
		$("#adrevenue_increase").html('$'+numberWithCommas(adrevenue_increase));	
	}	
	function outputNetrevenueIncrease() {
		netrevenue_increase = adrevenue_increase+pv_monthly_revenue_increase;
		$("#netrevenue_increase").html('$'+numberWithCommas(netrevenue_increase));	
	}	
	function outputRoi() {
		setYouneeqMonthlycost();
		roi = netrevenue_increase - youneeq_monthlycost;
		$("#ROI").html('$'+numberWithCommas(roi));	
	}	
	function numberWithCommas(x) {
		x = parseFloat(x).toFixed(2);
		//.toFixed(2)
		var parts = x.toString().split(".");
		parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		return parts.join(".");
	}
	function unHideRevenue(){
		$("#pv_monthly_revenue_increase").parent().parent().slideDown();
	}
	$("#roi-calculator").on("inview",function(){	
		var $this = $(this);
		$this.removeClass("hidden").off("inview");
			addCalcToDom();
	});
});