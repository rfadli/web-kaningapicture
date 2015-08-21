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
										<center><h5 style="color:#CD171E">MEDIA</h5></center>
										<li><a href="#-4"><img width="50" height="50" src="/public/media/News.png"></a></li>
										<li><a href="#-5"><img width="50" height="50" src="/public/media/Blog.png"></a></li>
										<li><a href="#-6"><img width="50" height="50" src="/public/media/Press_Release.png"></a></li>
										<li><a href="#-7"><img width="50" height="50" src="/public/media/Press_Kit.png"></a></li>
									</ul>
									<div id="-4">
										<?php
										foreach ($mnews as $key) 
										{
											echo '<b><h5 style="color:#CD171E">';
											echo $key['title'];
											echo '</h5></b>';
											echo $key['content'];
										}
										
										?>
										<div class="post-footer">
										<?php
										echo '<a href="/contentcategory/index?id='.NEWS .'" class="post-more">Read more</a>';
										?>	
												<div class="button-comments">
														<a href="#"><span class="icons-wrapper"><i class="icon-comment-empty-fa"></i></span></a>
												</div>
													
										</div>
										
									</div>
									<div id="-5">
										<?php
										foreach ($mblog as $key ) 
										{
											echo '<b><h5 style="color:#CD171E">';
											echo $key['title'];
											echo '</h5></b>';
											echo $key['content'];
										}
										
										?>
										<div class="post-footer">
										<?php
										echo '<a href="/contentcategory/index?id='.BLOG.'" class="post-more">Read more</a>';
										?>
												<div class="button-comments">
													<a href="#"><span class="icons-wrapper"><i class="icon-comment-empty-fa"></i></span></a>
												</div>
										</div>
									
									</div>
									<div id="-6">
										<?php
										echo '<h5 style="color:#CD171E">';
										echo $mpress_release['title'];
										echo '</h5>';
										echo $mpress_release['content'];
										?>
									</div>
									<div id="-7">
										<?php
										echo '<h5 style="color:#CD171E">';
										echo $mpress_kit['title'];
										echo '</h5>';
										echo $mpress_kit['content'];
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
			
		</div>
	</div>
	<br /><br /><br /><br /><br />
	<br /><br /><br /><br /><br />