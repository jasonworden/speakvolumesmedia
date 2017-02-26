<?php
/*
Template Name: About Us
*/
get_header();
the_post();
?>





<div id="about-page" class="container about-container main-container">
	<div class="container-inner">

		<main id="about-us" class="col-xs-12 col-md-6">

			<div id="site-description" class="">
				<h2>about us</h2>
				<?php the_content() ?>
			</div>

		</main>
		
		<div id="meet-us" class="col-xs-12 col-md-6">

			<div class="col-xs-12">
				<h2 class="">meet us</h2>
			</div>

			<div class="person col-xs-12 col-sm-6">
				<?php //svStaffPic('dylan-chase') ?>
				<div class="details">
					<h4 class="position">Chief Editor</h4>
					<h3 class="name">Dylan Chase</h3>
					<!-- <a class="outbound-link" href="<?php echo site_url('author/dylan-chase'); ?>">View posts</a> -->
				</div>
			</div>

			<div class="person col-xs-12 col-sm-6">
				<?php //svStaffPic('jonny-lipshin') ?>
				<div class="details">
					<h4 class="position">Managing Editor</h4>
					<h3 class="outside name">Jonny Lipshin</h3>
					<!-- <a class="outbound-link" href="<?php echo site_url('author/jonny-lipshin'); ?>">View posts</a> -->
				</div>
			</div>

			<div class="person col-xs-12 col-sm-6">
				<?php //svStaffPic('jason-worden') ?>
				<div class="details">
					<h4 class="position">Technical Lead</h4>
					<h3 class="name">Jason Worden</h3>
					<a class="outbound-link" href="http://jasonworden.com/resume/" target="_blank">View website</a>
				</div>
			</div>

			<div class="person col-xs-12 col-sm-6">
				<?php //svStaffPic('mariah-tiffany') ?>
				<div class="details">
					<h4 class="position">Photo Editor</h4>
					<h3 class="name">Mariah Tiffany</h3>
					<a class="outbound-link" href="http://mariahtiffany.com" target="_blank">View website</a>
					<!-- <a class="outbound-link" href="<?php echo site_url('author/mariah-tiffany'); ?>">View posts</a> -->
				</div>
			</div>

			<div class="person col-xs-12 col-sm-6">
				<?php //svStaffPic('diana-mora') ?>
				<div class="details">
					<h4 class="position">Graphic Design Lead</h4>
					<h3 class="outside name">Diana Mora</h3>
					<a class="outbound-link" href="http://diana-mora.com/" target="_blank">View website</a>
				</div>
			</div>

			<div class="person col-xs-12 col-sm-6">
				<?php //svStaffPic('jonathan-cloughesy') ?>
				<div class="details">
					<h4 class="position">Writer</h4>
					<h3 class="outside name">Jonathan Cloughesy</h3>
					<!-- <a class="outbound-link" href="<?php echo site_url('author/jonathan-cloughesy'); ?>">View posts</a> -->
				</div>
			</div>

			<div class="person col-xs-12 col-sm-6">
				<?php //svStaffPic('jonathan-cloughesy') ?>
				<div class="details">
					<h4 class="position">Mixes Editor</h4>
					<h3 class="outside name">Joseph Mann</h3>
					<!-- <a class="outbound-link" href="<?php echo site_url('author/joseph-mann'); ?>">View posts</a> -->
				</div>
			</div>

			<div class="person col-xs-12 col-sm-6">
				<?php //svStaffPic('diana-mora') ?>
				<div class="details">
					<h4 class="position">Contributor</h4>
					<h3 class="outside name">Léna Garcia</h3>
					<!-- <a class="outbound-link" href="<?php echo site_url('author/lena-garcia'); ?>">View posts</a> -->
				</div>
			</div>

			<!-- <div class="clearfix"></div>
			<div class="col-box">
				<h5 class="shaded">Contributors</h5>
			</div> -->
		</div>

	</div>

	<div class="container-inner">

		<div id="contact-us">
			
			<div class="col-xs-12">
				<h2>contact us</h2>
			</div>

			<div class="col-xs-12 col-md-4 info-box-wrapper">
				<div class="info-box">
					<h5>Advertising</h5>
					<p>
						Advertising on the site is handled by our own in-house team.
						For advertising, sponsorship and business development, please contact Jonny Lipshin at:
						<?php echo '<a target="_blank" href="'.antispambot("mailto:jonny@speakvolumesmedia.com").'">'.'jonny@speakvolumesmedia.com'.'</a>'; ?>
					</p>
					<p>
						We have advertising available on our website, in our magazine SVQ, and in our events.
					</p>
				</div>
			</div>

			<div class="col-xs-12 col-md-4 info-box-wrapper">
				<div class="info-box">
					<h5 id="submissions-header">Submissions</h5>
					<p>
						If you're an artist looking to have your music featured on SVM, send an email to:
						<?php echo '<a target="_blank" href="'.antispambot("mailto:submissions@speakvolumesmedia.com").'">'.'submissions@speakvolumesmedia.com'.'</a>'; ?>
					</p>
				</div>
			</div>

			<div class="col-xs-12 col-md-4 info-box-wrapper">
				<div class="info-box">
					<h5 id="inquiries-header">Inquiries</h5>
					<p>
						For all DJ-based inquiries, please email:
						<?php echo '<a target="_blank" href="'.antispambot("mailto:dylan@speakvolumesmedia.com").'">'.'Dylan Chase'.'</a>'; ?>
					</p>
					<p>
						For all media partnerships and panel/radio appearances, please email:
						<?php echo '<a target="_blank" href="'.antispambot("mailto:jonny@speakvolumesmedia.com").'">'.'Jonny Lipshin'.'</a>'; ?>
					</p>
					<p>
						For all general questions and inquires, send an email to:
						<?php echo '<a target="_blank" href="'.antispambot("mailto:contact@speakvolumesmedia.com").'">'.'contact@speakvolumesmedia.com'.'</a>'; ?>
					</p>
				</div>
			</div>

		</div>

	</div>


	<div class="container-inner hidden">

		<div id="join-us">
			
			<div class="col-xs-12">
				<h2>join us</h2>
			</div>

			<div class="col-xs-12 col-md-6 clearfix">

				<h5>Writers</h5>

				<div class="info-box col-xs-12 col-md-6 col-md-offset-3">
					<p>
						If you're applying to write for Speak Volumes, please send links to your work. 
						For Pitches/Guest Columns, please send a summary of your idea to Jonny Lipshin at
						<?php echo '<a href="'.antispambot("mailto:jonny@speakvolumesmedia.com").'">'.'jonny@speakvolumesmedia.com'.'</a>'; ?>
						and we'll get back to you as soon as possible.
					</p>
					<p>
						Moreover, please keep in mind the goals of this site --
						to offer original, relevant ideas about the experience of music and its impact on cultures and individuals.
						The goal of this imprint is not merely to cover stories, but to move people with new art and new perspectives. Basically: surprise us.
					</p>
				</div>

			</div>

			<div class="col-xs-12 col-md-6">
				<h5>Internships</h5>
				<p>
					Speak Volumes is always seeking new collaborators and members as we expand our content and effective reach.
					We are currently seeking interns in the following departments.
				</p>
				<p>
					Applicants should direct all email inquiries to
					<?php echo '<a target="_blank" href="'.antispambot("mailto:joinus@speakvolumesmedia.com").'">'.'joinus@speakvolumesmedia.com'.'</a>'; ?>
					with a resume and cover letter detailing interest in the position.
				</p>
				<div class="clearfix"></div>
			</div>

			<div class="col-xs-12 col-md-6 text-center col-box">
				<h5 class="shaded">Film Editing</h5>
				<div class="info-box">
					<p>
						Speak Volumes is expanding into the world of video content,
						and we're currently seeking a Film Editing Intern to handle
						the editing process of short (5-10 minute) video interviews. 
					</p>
					<h4 class="position">Roles</h4>
					<p>
						Film Editing and post-production.
					</p>
					<h4 class="position">Requirements</h4>
					<p>
						Must have relevant film editing experience and fluency in software such as Final Cut Pro, Pinnacle Studio, Adobe Premiere Pro or similar platform.
						<br>
						Additional experience in effects softwares such as After Effects is a plus.
						<br>
						Samples of work sent with resume.
					</p>
					<h4 class="position">Duration</h4>
					<p>12 months.</p>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 text-center col-box">
				<h5 class="shaded">Event Management</h5>
				<div class="info-box">
					<p>
						In support of Speak Volumes's ongoing presence in the event community of Santa Barbara,
						the Event Management Intern will work in close collaboration with our event staff,
						gaining hands-on experience in the world of talent buying, production, and event promotion. 
					</p>
					<h4 class="position">Roles</h4>
					<p>
						Researching potential music talent and venue locations.
						Working with creative team to plan stage and thematic production.
						Taking initiative in leadership of promotional street team and event staff.
					</p>
					<h4 class="position">Requirements</h4>
					<p>
						General knowledge of new music and interest in live music.
					</p>
					<h4 class="position">Duration</h4>
					<p>6 months.</p>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 text-center col-box">
				<h5 class="shaded">Social Media</h5>
				<div class="info-box">
					<p>
						The Social Media Intern will be responsible for the development of Speak Volumes on social media and work to engage and expand our online following.
					</p>
					<h4 class="position">Roles</h4>
					<p>
						Maintenance of Speak Volumes social media platforms.
					</p>
					<h4 class="position">Requirements</h4>
					<p>
						A brief resume and cover letter stating interest in the position and all relevant experience with social media and/or music journalism.
					</p>
					<h4 class="position">Duration</h4>
					<p>6 months.</p>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 text-center col-box">
				<h5 class="shaded">Photography</h5>
				<div class="info-box">
					<p>
						The Photography Intern will work in close collaboration with the Photography Editor in establishing a unique visual culture around Speak Volumes.
					</p>
					<h4 class="position">Roles</h4>
					<p>
						Capturing photos at concerts and events.<br>
						Editing photos for posting on speakvolumesmedia.com.<br>
						Assistance with artist portraits and sessions.
					</p>
					<h4 class="position">Requirements</h4>
					<p>
						Must own a professional or prosumer level camera.
						<br>
						Must be comfortable with editorial feedback and constructive criticism.
						<br>
						Samples of work sent with resume.
					</p>
					<h4 class="position">Duration</h4>
					<p>3 months.</p>
				</div>
			</div>



		</div>

	</div>


</div>



<section id="join-us" class="hidden">
	<?php svSectionTitle('Join Us'); ?>
	<div class="container main">
		<div class="container-inner more">
			<div class="row text-center">

				<div class="col-box">
					<h5 class="shaded article-rectangle">Writers</h5>
				</div>

				<div class="col-box col-xs-12">
					<div class="info-box col-xs-12 col-md-6 col-md-offset-3">
						<p>
							If you're applying to write for Speak Volumes, please send links to your work. 
							For Pitches/Guest Columns, please send a summary of your idea to Jonny Lipshin at
							<?php echo '<a href="'.antispambot("mailto:jonny@speakvolumesmedia.com").'">'.'jonny@speakvolumesmedia.com'.'</a>'; ?>
							and we'll get back to you as soon as possible.
						</p>
						<p>
							Moreover, please keep in mind the goals of this site --
							to offer original, relevant ideas about the experience of music and its impact on cultures and individuals.
							The goal of this imprint is not merely to cover stories, but to move people with new art and new perspectives. Basically: surprise us.
						</p>
						<div class="clearfix"></div>
					</div>
				</div>

				<div class="clearfix">
					
				</div>
				<div class="col-box">
					<h5 class="shaded">Internships</h5>
				</div>
				<div class="col-box col-xs-12">
					<div class="info-box col-xs-12 col-md-6 col-md-offset-3">
						<p>
							Speak Volumes is always seeking new collaborators and members as we expand our content and effective reach.
							We are currently seeking interns in the following departments.
						</p>
						<p>
							Applicants should direct all email inquiries to
							<?php echo '<a target="_blank" href="'.antispambot("mailto:joinus@speakvolumesmedia.com").'">'.'joinus@speakvolumesmedia.com'.'</a>'; ?>
							with a resume and cover letter detailing interest in the position.
						</p>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 text-center col-box">
					<h5 class="shaded">Film Editing</h5>
					<div class="info-box">
						<p>
							Speak Volumes is expanding into the world of video content,
							and we're currently seeking a Film Editing Intern to handle
							the editing process of short (5-10 minute) video interviews. 
						</p>
						<h4 class="position">Roles</h4>
						<p>
							Film Editing and post-production.
						</p>
						<h4 class="position">Requirements</h4>
						<p>
							Must have relevant film editing experience and fluency in software such as Final Cut Pro, Pinnacle Studio, Adobe Premiere Pro or similar platform.
							<br>
							Additional experience in effects softwares such as After Effects is a plus.
							<br>
							Samples of work sent with resume.
						</p>
						<h4 class="position">Duration</h4>
						<p>12 months.</p>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 text-center col-box">
					<h5 class="shaded">Event Management</h5>
					<div class="info-box">
						<p>
							In support of Speak Volumes's ongoing presence in the event community of Santa Barbara,
							the Event Management Intern will work in close collaboration with our event staff,
							gaining hands-on experience in the world of talent buying, production, and event promotion. 
						</p>
						<h4 class="position">Roles</h4>
						<p>
							Researching potential music talent and venue locations.
							Working with creative team to plan stage and thematic production.
							Taking initiative in leadership of promotional street team and event staff.
						</p>
						<h4 class="position">Requirements</h4>
						<p>
							General knowledge of new music and interest in live music.
						</p>
						<h4 class="position">Duration</h4>
						<p>6 months.</p>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 text-center col-box">
					<h5 class="shaded">Social Media</h5>
					<div class="info-box">
						<p>
							The Social Media Intern will be responsible for the development of Speak Volumes on social media and work to engage and expand our online following.
						</p>
						<h4 class="position">Roles</h4>
						<p>
							Maintenance of Speak Volumes social media platforms.
						</p>
						<h4 class="position">Requirements</h4>
						<p>
							A brief resume and cover letter stating interest in the position and all relevant experience with social media and/or music journalism.
						</p>
						<h4 class="position">Duration</h4>
						<p>6 months.</p>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 text-center col-box">
					<h5 class="shaded">Photography</h5>
					<div class="info-box">
						<p>
							The Photography Intern will work in close collaboration with the Photography Editor in establishing a unique visual culture around Speak Volumes.
						</p>
						<h4 class="position">Roles</h4>
						<p>
							Capturing photos at concerts and events.<br>
							Editing photos for posting on speakvolumesmedia.com.<br>
							Assistance with artist portraits and sessions.
						</p>
						<h4 class="position">Requirements</h4>
						<p>
							Must own a professional or prosumer level camera.
							<br>
							Must be comfortable with editorial feedback and constructive criticism.
							<br>
							Samples of work sent with resume.
						</p>
						<h4 class="position">Duration</h4>
						<p>3 months.</p>
					</div>
				</div>

				<div class="clearfix"></div>
				
				
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>