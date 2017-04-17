<section class="directory-segment" role="filters">
	<div class="directory-filter">
		<h5>Genre</h5>
		<select role="genre">
			<option value="">All</option>
			<option value="action">Action</option>
			<option value="arcade">Arcade</option>
			<option value="budget">Budget</option>
			<option value="cyoa">Choose Your Own Adventure</option>
			<option value="other">Other</option>
			<option value="puzzle">Puzzle</option>
			<option value="quiz">Quiz</option>
			<option value="simulation">Simulation</option>
			<option value="strategy">Strategy</option>
			<option value="vr">Virtual Reality</option>
		</select>
	</div>
	<div class="directory-filter">
		<h5>Status</h5>
		<select role="status">
			<option value="">All</option>
			<option value="live">Live</option>
			<option value="buy">Purchasable</option>
			<option value="dead">Dead</option>
		</select>
	</div>
	<!--<div class="directory-filter">
		<h5>Media</h5>
		<select role="news">
			<option value="">All</option>
			<option value="true">Yes</option>
			<option value="false">No</option>
		</select>
	</div>-->
	<div class="directory-filter">
		<h5>Year</h5>
		<?php print centalpha_populate_directory_filter_years(); ?>
	</div>
</section>