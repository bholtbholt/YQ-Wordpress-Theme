<?php $postmeta = get_post_meta($pid);
      if ($postmeta['roi_calculator'][0]) : ?>
<section id="roi-calculator-section">
	<div class="container">
		<div class="row">
			<div class="col-md-6 roi-calculator-text">
				<h2 class="h1 roi-calculator-title">How much revenue <br class="break-1200">are you leaving behind?</h2>
				<p class="lead">If your web content isn't being optimized from visitor behaviours, then you're losing advertising revenue. <br class="break-992">Use our ROI Calculator to find out how much.</p>
			</div>
			<div class="col-md-6">

				<div id="roi-calculator" name="roi-calculator" rel="roicalc">
					<form id="roicalcform" name="roicalcform" class="form-horizontal clear-fix">

						<div class="form-group">
							<label for="avg_cpm" class="col-sm-5 control-label">Current CPM</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="avg_cpm" name="avg_cpm" value=".80">
							</div>
						</div>

						<div class="form-group">
							<label for="current_pvs" class="col-sm-5 control-label">Current Page Views</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="current_pvs" id="current_pvs" value="20,000,000">
							</div>
						</div>
						<div class="form-group">
							<label for="current_adrevenue" class="col-sm-5 control-label">Current Revenue</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="current_adrevenue" name="current_revenue" value="$160,000.00" disabled>
							</div>
						</div>

						<div class="hidden">
							<input id="pv_increase_percent" type="text" value="20%" name="pv_increase_percent">
							<input id="current_bouncerate" type="text" value="65%" name="current_bouncerate">
							<input id="user_count" type="text" value=" " name="user_count">
							<div id="pv_increase">4,000,000
							</div>
							<div id="new_pvs">24,000,000
							</div>
							<input id="current_vpvs" type="text" value="13,000,000" name="current_vpvs">
							<input id="new_bouncerate" type="text" value="50%" name="new_bouncerate">
							<div id="revenue_increase">3,200
							</div>
							<input id="vpv_increase" type="text" value="3,000,000" name="vpv_increase">
							<div id="bouncerate_bump">2,400
							</div>
							<div id="ROI">23,100
							</div>
							<input id="youneeq_monthlycost" type="text" value="2,500" name="youneeq_monthlycost">
							<div id="below_20m_pvs">6,000
							</div>
							<div id="netrevenue_increase">5,600
							</div>
							<div id="adrevenue_increase3"> 
							</div>
							<input id="new_avg_cpm" type="text" value="1.50" name="new_avg_cpm">
							
							<div id="adrevenue_increase">20,000
							</div>
						</div>

						<button id="roi-calculator-submit" type="submit" class="btn btn-primary full-width">Calculate New Revenue</button>

						<div class="roi-output">
							<p class="lead">
								Net revenue increase: <span id="pv_monthly_revenue_increase">$5,600</span><br/>
								Estimated new revenue: <span id="subtotal">$21,600</span><br/>
							</p>
							<p class="small text-center">Actual results may vary. Our ROI Calculator has been accurate to date.</p>
						</div>

					</form>
				</div>

			</div>
		</div>
	</div>
</section>
<?php endif; ?>