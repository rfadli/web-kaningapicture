</header>
<div id="Content">
		<div class="content_wrapper clearfix">
			<!-- .sections_group -->
			<div class="sections_group">
				<div class="section">
					<div class="section_wrapper clearfix">
						<div class="column one column_blog">
							<div class="blog_wrapper isotope_wrapper modern">
								<div class="posts_group">

									<!-- blog Item -->
									<?php
									$curl = new Curl();
									
									foreach ($mcontent as $key) 
									{
										$q = array(
											'id' => trim($key['_id']),
											'height' => 521,
											'width' => 1065
										);
										
										$curl->get('http://admin.cms.deboxs.com:8055/api/getimagecontent', $q);
										$rest = $curl->response;
										
										$json = json_decode($rest, TRUE);
										
										$url = '';
										if($json['status'] == "OK")
										{
											$url = $json['url'];
										}
										
										echo '<div class="post-item isotope-item clearfix post-519 post type-post status-publish format-standard has-post-thumbnail hentry category-motion tag-css3 tag-framework tag-wordpress">';
										echo '<div class="post-meta-modern">';
										echo '<div class="date">';
										echo '<span class="day">'.date("d",$key['time_created']).'</span><span class="month">'.date("M",$key['time_created']).'</span><span class="year">2014</span>';
										echo '</div>';
										echo '<div class="button-comments">';
										echo '<a href="#"><span class="icons-wrapper"><i class="icon-comment-empty-fa"></i><i class="icon-comment-fa"></i></span><span class="label">4</span></a>';
										echo '</div>';
											
										echo '</div>';
										echo '<div class="post-photo-wrapper">';
										echo '<div class="post-photo">';
										echo '<img src="'.$url.'" class="scale-with-grid wp-post-image" alt="1"/>';
										echo '</div>';
										echo '</div>';
										echo '<div class="post-desc-wrapper">';
										echo '<div class="post-desc">';
										echo '<div class="post-title">';
										echo '<h4><a href="#">'.$key['title'].'</a></h4>';
										echo '</div>';
										echo '<div class="post-meta">';
										echo '<div class="author">';
										echo 'By <a href="#">Admin</a>';
										echo '</div>';
										echo '<div class="category">';
										//echo 'In <a href="#" rel="category tag">Motion</a>';
										echo '</div>';
										echo '<div class="date">';
										echo 'February 18, 2014';
										echo '</div>';
										echo '<hr class="hr_narrow hr_left"/>';
										echo '</div>';
										echo '<div class="post-excerpt">';
										echo $key['content'];
										echo '</div>';
										echo '<div class="post-footer">';
										echo '<a href="/contentdetil/index?id='.$key['_id'].'"" class="post-more">Read more</a>';
										echo '<div class="button-comments">';
										echo '<a href="#"><span class="icons-wrapper"><i class="icon-comment-empty-fa"></i><i class="icon-comment-fa"></i></span><span class="label">4</span></a>';
										echo '</div>';
													
										echo '</div>';
										echo '</div>';
										echo '</div>';
										echo '</div>';
									}
									?>
									
								</div>
								<?php echo $pagination;?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>