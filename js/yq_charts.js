jQuery(document).ready(function($) {
	//array of charts that have loaded
	var activeCharts = [];

	function yqBarChart(elem) {
	    var barChartData = {
	      labels : ["ADVERTISING REVENUE","CLICK-THROUGH RATE"],
	      datasets : [
	        {
	          fillColor : "rgba(0,140,157,1)",
	          strokeColor : "rgba(0,140,157,1)",
	          data : [100,100],
	        },
	        {
	          fillColor : "rgba(220,220,220,1)",
	          strokeColor : "rgba(220,220,220,1)",
	          data : [90,80],
	        },
	      ]
	    }

		//get the chart's dimensions right
	    var chartCanvas=document.getElementById(elem);
		chartCanvas.width=$('#'+elem).parent().width();
		chartCanvas.height=$('#'+elem).parent().height()-5;
		if ($('#'+elem).parent().parent().height()<(1.2*$('#'+elem).parent().height())) {
			$('#'+elem).parent().height($('#'+elem).parent().parent().height()) ;
	}

		//check if the chart has been loaded before
		//if so, don't animate. Because that would be annoying
	    var firstTime;
		   if(checkAndAdd(elem)!=false){
		   	firstTime=false;
		   }
		   else {
		   	firstTime=true;
		   }

		//load/reload the chart
	 	var myLine = new Chart(chartCanvas.getContext("2d")).Bar(barChartData,{align:'h', scaleShowLabels:false,barValueSpacing:10,animation:firstTime});
	 	}

	function yqPieChart(elem){
		var pieData = [
			{
			 value: 7, color:"#CCC"
			},
			{
			 value : 93,	color:"#008c9d"
			}	
		];

		//get the chart's dimensions right
	    var chartCanvas=document.getElementById(elem);
		chartCanvas.width=$('#'+elem).parent().width();
		chartCanvas.height=$('#'+elem).parent().height()-5;
		if ($('#'+elem).parent().parent().height()<(1.2*$('#'+elem).parent().height())) {
			$('#'+elem).parent().height($('#'+elem).parent().parent().height()) ;
	}
		//check if the chart has been loaded before
		//if so, don't animate. Because that would be annoying
	   var firstTime;
	   if(checkAndAdd(elem)!=false){
	   	firstTime=false;
	   }
	   else {
	   	firstTime=true;
	   }

		//var chartCanvas=document.getElementById(elem);
		//chartCanvas.width=$('#'+elem).parent().width();
		chartCanvas.height=$('#'+elem).parent().height()-5;

		//load/reload the chart
		var myPie = new Chart(chartCanvas.getContext("2d")).Pie(pieData,{animation:firstTime});
	}

	var graphInitDelay = 300;
		
	var functs = {
	    'barchart': yqBarChart,
	    'piechart': yqPieChart,
	    'roicalc': roiCalc
	};

	function roiCalc() {
	}

    $(window).resize(function() {
    	clearTimeout(this.id);
    	//check which charts have loaded and need to be resized
    	var found = activeCharts.some(function (el) {
    		//send them to be reloaded - identified by id
	     	 this.id = setTimeout(yqLoadChart(el.chartId, 1000));
	    });	
	});

	$("canvas").on("inview",function(){	
		var $this = $(this);
		$this.removeClass("hidden").off("inview");
		yqLoadChart($(this).attr('id'));
	});

	function yqLoadChart(elem){
		funct = $('#'+elem).attr('rel');
		setTimeout(functs[funct](elem),graphInitDelay);
	}

	function checkAndAdd(chart) {
	    var id = activeCharts.length + 1;
	    var found = activeCharts.some(function (el) {
	      return el.chartId === chart;
	    });
	    if (!found) {
	        activeCharts.push({ id: id, chartId: chart });
	        return false;
	    }
	}

});