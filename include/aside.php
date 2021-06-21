<aside>
			<section>
				<header>
					<h1>دسته بندی</h1>
				</header>
				<ul class="items users">
					<li>
						<i class="icofont-rounded-left"></i>
						<span>لورم الیپسوم</span>
						<span class="count">15</span>
					</li>
					<li>
						<i class="icofont-rounded-left"></i>
						<span>لورم الیپسوم</span>
						<span class="count">15</span>
					</li>
					<li>
						<i class="icofont-rounded-left"></i>
						<span>لورم الیپسوم</span>
						<span class="count">15</span>
					</li>
				</ul>
			</section>
			<section>
				<header>
					<h1>برترین کاربران</h1>
				</header>
				<ul class="items users">
					<?php
						$query = "SELECT `username`, `user`.`image`, COUNT(`post`.`id`) AS 'count_post' FROM `user` LEFT JOIN `post` ON `user`.`id` = `post`.`user_id` ORDER BY count_post DESC LIMIT 5";

						$select = mysqli_query($con, $query);

						$pop_users = mysqli_fetch_all($select, MYSQLI_ASSOC);

						foreach ($pop_users as $item) {
							echo '
								<li>
									<img src="'.url_user_image($item['image']).'" alt="'.$item['username'].'">
									<span>'.$item['username'].'</span>
									<span class="count">'.$item['count_post'].'</span>
								</li>	
							';
						}
					?>
				</ul>
			</section>
			<section>
				<header>
					<h1>محبوب ترین ها</h1>
				</header>
				<ul class="items posts">
					<?php
						$query = "SELECT `id`, `title`, `image` FROM `post` ORDER BY `view` DESC LIMIT 5";

						$select = mysqli_query($con, $query);

						$pop_posts = mysqli_fetch_all($select, MYSQLI_ASSOC);

						foreach ($pop_posts as $item) {
							echo '
								<li>
									<img src="'.url_post_image($item['image']).'" alt="'.$item['title'].'">
									<h1>'.$item['title'].'</h1>
								</li>	
							';
						}
					?>
									
				</ul>
			</section>
		</aside>