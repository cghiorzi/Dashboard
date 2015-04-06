<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/dashboard.css">
  	<script src="includes/jquery-1.11.2.min.js"></script>
	<link rel="stylesheet" href="includes/jquery-ui.css">
  	<script src="includes/jquery-ui.js"></script>
	<script src="includes/dashboard.js"></script>
	<title>Big Data Dashboard</title>
</head>
<body onLoad='updateHeadline();updateCampaigns()'>
<?php
	$port=getenv('VCAP_APP_PORT');
	print "<div id='portNumber'>Port : $port</div>\n";
?>
	<div id='dashboard'>
		<div  id='headline'><div id="headline_label"></div></div>
		 <div class='small_widget'>
			<span class='small_widget_header'>Insights</span>
			<img class='small_widget_image' src='images/insight.png'/>
			<div class='widget_list' id="insights">
				<h3>Customer XYZ has increased spending 350%, which has placed them at the top of the "most valued customer" list.</h3>
				<div class="detail">
					<h4>Customer XYZ</h4>
					<table border=1>
						<tr><th>Quarter</th><th>Spend</th></tr>
						<tr><td>Q3 2014</td><td>$340.00</td></tr>
						<tr><td>Q4 2014</td><td>$1,190.00</td></tr>
					</table>
					<div class="reasons">
						<ul>
							<li>Customer XYZ's Influence Quotient has increased by 19 points.</li>
						</ul>
					</div>
					<table border=1>
						<tr><th>Customer</th><th>Influence Quotient</th></tr>
						<tr><td>Customer XYZ</td><td>179</td></tr>
						<tr><td>Customer QRS</td><td>111</td></tr>
						<tr><td>Customer ABC</td><td>66</td></tr>
					</table> 
				</div>
				<h3>Customer ABC does not seem to be spending as much as they did, down 48% from the average of the last 4 quarters.</h3>
				<div class="detail">
					<h4>Customer ABC</h4>
					<table border=1>
					<tr><th>Quarter</th><th>Spend</th></tr>
					<tr><td>Q4 2013</td><td>$780.00</td></tr>
					<tr><td>Q1 2014</td><td>$620.00</td></tr>
					<tr><td>Q2 2014</td><td>$670.00</td></tr>
					<tr><td>Q3 2014</td><td>$650.00</td></tr>
					<tr><td>Q4 2014</td><td>$351.00</td></tr>
					</table> 
					<div class="graph"><img src="images/graph1.png"/></div>
				</div>
				<h3>The average increase in spend this quarter for all customers is 25%, which is 3 times higher than the normal increase at this time of year.</h3>
				<div class="detail">
				<h4>Customer Average Spend</h4>
				<table border=1>
					<tr><th>Quarter</th><th>Spend</th></tr>
					<tr><td>Average Q3</td><td>$147.00</td></tr>
					<tr><td>Average Q4</td><td>$159.25</td></tr>
					<tr><td>Q3 2014</td><td>$150.00</td></tr>
					<tr><td>Q4 2014</td><td>$187.00</td></tr>
				</table>
				<div class="graph"><img src="images/graph2.png"/></div>
				</div>
			</div>
		</div>
		 <div class='small_widget'>
			  <span class='small_widget_header'>Recommendations</span>
			  <img class='small_widget_image' src='images/recommend.png'/> 
				<div class='widget_list' id="recommendations">
					<h3 id="recommendation1">Target Customer XYZ is predicted to be a strong influencer. Contact Customer XYZ's Facebook circle and offer 10% discounted rates.</h3>
					<div class="detail" id="recommendation1-detail">
					<h4>Customer XYZ</h4>
					<table border=1>
						<tr><th>Quarter</th><th>Spend</th></tr>
						<tr><td>Q3 2014</td><td>$340.00</td></tr>
						<tr><td>Q4 2014</td><td>$1,190.00</td></tr>
					</table>
					<div class="reasons">
						<ul>
							<li>Customer XYZ has 5 Facebook friends that are also customers.</li>
							<li>10% discount is predicted to have 87% efficacy rate due to Customer XYZ's influence.</li>
						</ul>
					</div>
					<div class="action_buttons">
						<button name="Accept"  class="acceptButton" onClick="acceptAction('recommendation1')" id="accept1">Accept</button>
						<button name="Reject"  class="rejectButton" onClick="rejectAction('recommendation1')" id="reject1">Reject</button>
						<button name="History"  class="historyButton" onClick="historyAction('recommendation1')" >History</button>
					</div>
					<div class="historyDetail" id='history1' title="Event History">
					<table class="historyTable" id="historyTable1" border=1>
						<tr>
							<th>Date</th>
							<th>Recommendation</th>
							<th>Prediction</th>
							<th>Result</th>
						</tr>
						<tr>
							<td>10/15/2014</td>
							<td>10% Discount Offer</td>
							<td>89% efficacy</td>
							<td>Customer value increased $2700.00.</td>			
						</tr>
						<tr>
							<td>10/26/2014</td>
							<td>10% Discount Offer</td>
							<td>65% efficacy</td>
							<td>Customer value increased $250.00.</td>
						</tr>
						<tr>
							<td>11/03/2014</td>
							<td>10% Discount Offer</td>
							<td>81% efficacy</td>
							<td>Customer value increased $1100.00.</td>
						</tr>
						<tr>
							<td>12/17/2014</td>
							<td>10% Discount Offer</td>
							<td>85% efficacy</td>
							<td>Customer value increased $2500.00.</td>
						</tr>
					</table>
					</div>
					</div>
					<h3 id="recommendation2">Customer ABC is predicted to be considering leaving. Contact Customer ABC and offer free upgrade to Enhanced Package.</h3>
					<div class="detail" id="recommendation2-detail">
					<h4>Customer ABC</h4>
						<table border=1>
							<tr><th>Quarter</th><th>Spend</th></tr>
							<tr><td>Q3 2014</td><td>$650.00</td></tr>
							<tr><td>Q4 2014</td><td>$351.00</td></tr>
						</table>
						<div class="reasons">
							<ul>
								<li>Customer ABC has "pinned" 3 competitive products on Pintrest in the last month.</li>
								<li>Enhanced Package Offer rate is predicted to increase customer satisfaction ranking by 35%.</li>
							</ul>
						</div>
						<div class="action_buttons">
							<button name="Accept" class="acceptButton" onClick="acceptAction('recommendation2')" id="accept2">Accept</button>
							<button name="Reject" class="rejectButton" onClick="rejectAction('recommendation2')" id="reject2">Reject</button>
							<button name="History"  class="historyButton" onClick="historyAction('recommendation2')">History</button>	
						</div>
						<div class="historyDetail" id='history2' title="Event History">
						<table class="historyTable" id="historyTable2" border=1>
							<tr>
								<th>Date</th>
								<th>Recommendation</th>
								<th>Prediction</th>
								<th>Result</th>
							</tr>
							<tr>
								<td>10/15/2014</td>
								<td>Enhanced Offer to Customer</td>
								<td>89% efficacy</td>
								<td>Customer value increased $2700.00.</td>			
							</tr>
							<tr>
								<td>10/26/2014</td>
								<td>Enhanced Offer to Customer</td>
								<td>65% efficacy</td>
								<td>Customer value increased $250.00.</td>
							</tr>
							<tr>
								<td>11/03/2014</td>
								<td>Enhanced Offer to Customer</td>
								<td>81% efficacy</td>
								<td>Customer value increased $1100.00.</td>
							</tr>
							<tr>
								<td>12/17/2014</td>
								<td>Enhanced Offer to Customer</td>
								<td>85% efficacy</td>
								<td>Customer value increased $2500.00.</td>
							</tr>
						</table>
						</div>
					</div>
					<h3 id="recommendation3">Target Customer ABC is predicted to be considering leaving. Contact Customer ABC's Facebook circle and offer free upgrade to Enhanced Package.</h3>
					<div class="detail" id="recommendation3-detail">
					<h4>Customer ABC</h4>
						<table border=1>
							<tr><th>Quarter</th><th>Spend</th></tr>
							<tr><td>Q3 2014</td><td>$650.00</td></tr>
							<tr><td>Q4 2014</td><td>$351.00</td></tr>
						</table>
						<div class="reasons">
							<ul>
								<li>Customer ABC has "pinned" 3 competitive products on Pintrest in the last month.</li>
								<li>Enhanced Package Offer has 50% predicted chance to increase customer satisfaction ranking by 35%.</li>
							</ul>
						</div>
						<div class="action_buttons">
							<button name="Accept"  class="acceptButton" onClick="acceptAction('recommendation3')" id="accept3">Accept</button>
							<button name="Reject"  class="rejectButton" onClick="rejectAction('recommendation3')" id="reject3">Reject</button>
							<button name="History"  class="historyButton" onClick="historyAction('recommendation3')">History</button>	
						</div>
						<div class="historyDetail" id='history3' title="Event History">
						<table class="historyTable" id="historyTable3" border=1>
							<tr>
								<th>Date</th>
								<th>Recommendation</th>
								<th>Prediction</th>
								<th>Result</th>
							</tr>
							<tr>
								<td>10/15/2014</td>
								<td>Enhanced Offer to Related Customer</td>
								<td>65% efficacy</td>
								<td>No change.</td>			
							</tr>
							<tr>
								<td>10/26/2014</td>
								<td>Enhanced Offer to Related Customer</td>
								<td>58% efficacy</td>
								<td>Customer value increased $20.00.</td>
							</tr>
							<tr>
								<td>11/03/2014</td>
								<td>Enhanced Offer to Related Customer</td>
								<td>51% efficacy</td>
								<td>Customer value increased $11.00</td>
							</tr>
							<tr>
								<td>12/17/2014</td>
								<td>Enhanced Offer to Related Customer</td>
								<td>50% efficacy</td>
								<td>No Change.</td>
							</tr>

						</table>
						</div>
					</div>
				</div>
		 </div>
		<div class='large_widget'>
			<span class='large_widget_header'>Return on Marketing Campaigns to Date</span>
			<div class="campaign_bar" id='campaign_bar1'><div class="campaign_bar_label" id="campaign_bar1_label"></div></div> 
			<div class="campaign_bar" id='campaign_bar2'><div class="campaign_bar_label" id="campaign_bar2_label"></div></div> 
			<div class="campaign_bar" id='campaign_bar3'><div class="campaign_bar_label" id="campaign_bar3_label"></div></div>
			
		</div>
	</div>
</body>
</html>
