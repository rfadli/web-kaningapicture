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
										<center><h5 style="color:#CD171E">CAREER</h5></center>
										<li><a href="#-4"><img width="50" height="50" src="/public/media/Why_work_with_us.png"><br/> Why work with us?</a></li>
										<li><a href="#-5"><img width="50" height="50" src="/public/media/Job_Vacancy.png"><br/> Job Vacancy</a></li>
									</ul>
									<div id="-4">
										<?php
										foreach ($mwhywork as $key) 
										{
											echo $key['content'];
										}
										?>
									</div>
									<div id="-5">
										<div class="column one column_accordion">
											<div class="accordion">
												<h4 style="color:#CD171E" class="title">Job Vacancy</h4>
												<div class="mfn-acc accordion_wrapper">
													<?php
													$curl = new Curl();
													
													foreach ($mjobs as $key) 
													{
														$q = array(
															'id' => trim($key['_id']),
															'height' => 120,
															'width' => 120
														);
														
														$curl->get('http://admin.cms.deboxs.com:8055/api/getimagecontent', $q);
														$rest = $curl->response;
														
														$json = json_decode($rest, TRUE);
														
														$url = '';
														if($json['status'] == "OK")
														{
															$url = $json['url'];
														}
														
														if(isset($key['content']))
														{
															echo '<div class="question">';
															echo '<h5><span class="icon"><i class="icon-right-open"></i></span>'.$key['title'].'</h5>';
															echo '<div class="answer">';
															if(isset($url))
															{
																echo '<img src="'.$url.'" alt="">';
															}
															else
															{
																echo '<img src="/public/upload/pic_about_cake_small.png" alt="">';
															}
															
															echo $key['content'];
															echo '</div>';
															echo '</div>';
														}
														else
														{
															echo '<div class="question">';
															echo '<h5><span class="icon"><i class="icon-right-open"></i></span>'.$key['title'].'</h5>';
															echo '<div class="answer">';
															echo 'Sorry, there are currently no open positions';
															echo '</div>';
															echo '</div>';
														}
														
														
														
													}
													?>
												</div>
											</div>
										</div>
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