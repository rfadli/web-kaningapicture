</header>
<div id="Content">
		<div class="content_wrapper clearfix">
			<!-- .sections_group -->
			<div class="sections">
				
				<div class="section pad0" >
					<div class="section_wrapper clearfix">
						<div class="items_group clearfix">
							
							<div class="column one column_tabs">
								<div class="jq-tabs tabs_wrapper tabs_vertical tabs_big_icon">
									<ul>
										<li><a href="#-10"><img width="50" height="50" src="/public/media/History.png"><br />HISTORY</a></li>
										<li><a href="#-11"><img width="50" height="50" src="/public/media/Words_from_CEO.png"><br />WORDS FROM OUR CEO</i></a></li>
										<li><a href="#-12"><img width="50" height="50" src="/public/media/Value.png"><br />VISION, MISSION AND VALUES</a></li>
									</ul>
									<div id="-10">
										<?php
										foreach ($mhistory as $key) 
										{
											echo '<h3 style="color:#CD171E">'.$key['title'].'</h3>';
											echo $key['content'];
										}
										?>
									</div>
									<div id="-11">
										<?php
										foreach ($mwordsceo as $key) 
										{
											echo '<h3 style="color:#CD171E">'.$key['title'].'</h3>';
											echo $key['content'];
										}
										?>
									</div>
									<div id="-12">
										
										<?php
										foreach ($mvision as $key) 
										{
											//echo '<h5 style="color:#CD171E">'.$key['title'].'</h5>';
											echo $key['content'];
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="section the_content">
					<div class="section_wrapper">
						<div class="the_content_wrapper">
						</div>
					</div>
				</div>
			</div>
			<!-- .four-columns - sidebar -->
		</div>
	</div>
	<br /><br /><br /><br />