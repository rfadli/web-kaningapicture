</header>
<div id="Content">
		<div class="content_wrapper clearfix">
			<!-- .sections_group -->
			<div class="sections_group">
				<div id="post-519" class="post-519 post type-post status-publish format-standard has-post-thumbnail hentry category-motion tag-css3 tag-framework tag-wordpress">
					<div class="section section-post-header">
						<div class="section_wrapper clearfix">
							
							<div class="column one post-photo-wrapper">
								<?php
						    	$curl = new Curl();
								if(isset($data['_id']))
								{
									$q = array(
										'id' => trim($data['_id']),
										'height' => 570,
										'width' => 1200,
										
									);
									$curl->get('http://admin.cms.deboxs.com:8055/api/getimagecontent', $q);
									$rest = $curl->response;
									$json = json_decode($rest, TRUE);
									
									$url = '';
									if($json['status'] == "OK")
									{
										$url = $json['url'];
									}
									
									echo '<div class="post-photo">';
									echo '<img src="'.$url.'" class="scale-with-grid wp-post-image" alt="1">';
									echo '</div>';
								}
						    	?>
							</div>
						</div>
					</div>
					<div class="post-wrapper-content">
						<div class="section section-post-meta">
							<div class="section_wrapper clearfix">
								<div class="column one post-meta">
									<div class="author">
										By <a href="#">Admin</a>
									</div>
									<div class="date">
									<?php
									echo date("F d, Y",$data['time_created'])
									?>
									</div>
									<hr class="hr_narrow hr_left">
								</div>
							</div>
						</div>
						<?php
						echo '<div class="section the_content">';
						echo '<div class="section_wrapper">';
						echo '<div class="the_content_wrapper">';
						echo '<h5>'.$data['title'].'</h5>';
						echo $data['content'];
						echo '</div>';
						echo '</div>';
						echo '</div>';
						?>
						<div class="section section-post-footer">
							<div class="section_wrapper clearfix">
								<div class="column one post-pager">
								</div>
							</div>
						</div>
						<div class="section section-post-about">
							<div class="section_wrapper clearfix">
								<div class="column one author-box">
									<div class="author-box-wrapper">
										<div class="avatar-wrapper">
											<img alt="Max Themes" src="/public/upload/gravatar.png"  class="avatar avatar-64 photo" height="64" width="64">
										</div>
										<div class="desc-wrapper">
											<h6><a href="#">Latest Post</a></h6>
											<div class="desc">
												We are an experienced team creating great, unique and easy to set up templates for WordPress. We are also creating websites and web applications. In our work we use the latest technologies, and our heads are always full of ideas. Our domain is creativity, experience and openness to new horizons.
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="section section-post-related">
						<div class="section_wrapper clearfix">
							<div class="section-related-adjustment">
								<?php
								foreach ($recent as $key) 
								{
									$curl = new Curl();
									if(isset($key['_id']))
									{
										$q = array(
											'id' => trim($key['_id']),
											'height' => 400,
											'width' => 600,
											
										);
										$curl->get('http://admin.cms.deboxs.com:8055/api/getimagecontent', $q);
										$rest = $curl->response;
										$json = json_decode($rest, TRUE);
										
										$url = '';
										if($json['status'] == "OK")
										{
											$url = $json['url'];
										}
									}	
									
									echo '<div class="column one-third post-related post-10284 post type-post status-publish format-video has-post-thumbnail hentry category-jquery category-motion post_format-post-format-video">';
									echo '<a class="photo_mask" href="/contentdetil/index?id='.$key['_id'].'">';
									echo '<div class="mask">';
									echo '</div>';
									echo '<span class="button_image more"><i class="icon-link"></i></span><img src="'.$url.'" class="scale-with-grid wp-post-image" alt="6"></a>';
									echo '<div class="desc">';
									echo '<span class="date"><i class="fa fa-clock-o"></i> '.date("F d, Y",$key['time_created']).'</span>';
									echo '<h6><a href="/contentdetil/index?id='.$key['_id'].'">'.$key['title'].'</h6>';
									echo '</div>';
									echo '</div>';
								}
								?>
								<br /><br /><br /><br /><br />
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<!-- .four-columns - sidebar -->
		</div>
	</div>