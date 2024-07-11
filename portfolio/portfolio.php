<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
include "db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>My Portfolio</title>
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
			integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="mediaqueries.css" />
	</head>
	<body>
		<nav id="desktop-nav">
			<div class="logo">Aditya Sharma</div>
			<div>
				<ul class="nav-links">
					<li><a href="#about">About</a></li>
					<li><a href="#experience">Experience</a></li>
					<li><a href="#projects">Projects</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</div>
		</nav>
		<nav id="hamburger-nav">
			<div class="logo">Aditya Sharma</div>
			<div class="hamburger-menu">
				<div class="hamburger-icon" onclick="toggleMenu()">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div class="menu-links">
					<li><a href="#about" onclick="toggleMenu()">About</a></li>
					<li><a href="#experience" onclick="toggleMenu()">Experience</a></li>
					<li><a href="#projects" onclick="toggleMenu()">Projects</a></li>
					<li><a href="#contact" onclick="toggleMenu()">Contact</a></li>
				</div>
			</div>
		</nav>
		<section id="profile">
			<div class="section__pic-container">
				<img
					src="./assets/img2.jpeg"
					alt="John Doe profile picture"
					style="border-radius: 4rem"
				/>
			</div>
			<div class="section__text">
				<p class="section__text__p1">Hello, I'm</p>
				<h1 class="title">Aditya Sharma</h1>
				<p class="section__text__p2">Full Stack Developer</p>
				<div class="btn-container">
					<button
						class="btn1 btn-color-2"
						onclick="window.open('./assets/AdityaSharma_Resume.pdf')"
					>
						Download CV
					</button>
					<button class="btn1 btn-color-1" onclick="location.href='#contact'">
						Contact Info
					</button>
				</div>
				<div id="socials-container">
					<img
						src="./assets/linkedin.png"
						alt="My LinkedIn profile"
						class="icon"
						onclick="location.href='https://www.linkedin.com/in/aditya-sharma-672089252'"
					/>
					<img
						src="./assets/github.png"
						alt="My Github profile"
						class="icon"
						onclick="location.href='https://github.com/AdityaSharma0210'"
					/>
				</div>
			</div>
		</section>
		<section id="about">
			<p class="section__text__p1">Get To Know More</p>
			<h1 class="title">About Me</h1>
			<div class="section-container">
				<div class="section__pic-container2">
					<img
						src="./assets/img1.jpeg"
						alt="Profile picture"
						class="about-pic"
					/>
				</div>
				<div class="about-details-container">
					<div class="about-containers">
						<div class="details-container">
							<img
								src="./assets/experience.png"
								alt="Experience icon"
								class="icon"
							/>
							<h3>Experience</h3>
							<p>1.5+ years <br />Full Stack Development</p>
						</div>
						<div class="details-container">
							<img
								src="./assets/education.png"
								alt="Education icon"
								class="icon"
							/>
							<h3>Education</h3>
							<p>B.tech in Computer Science & Engineering<br /></p>
						</div>
					</div>
					<div class="text-container">
						<p style="text-align: justify">
							I am an enthusiastic Full Stack Developer with experience in
							building and maintaining web applications. On the front end, I
							work with HTML, CSS, JavaScript, and frameworks like React and to
							create responsive and engaging interfaces. On the back end, I use
							Node.js, Express, PHP, MySQL and MongoDB to ensure smooth
							server-side operations and efficient data handling.
						</p>
						<p style="text-align: justify">
							While I have a solid foundation, I am always learning and
							expanding my skills. I enjoy working with cross-functional teams
							and tackling new challenges that help me grow as a developer. I am
							passionate about technology and love participating in coding
							projects, hackathons, and staying updated with the latest industry
							trends.
						</p>
					</div>
				</div>
			</div>
			<img
				src="./assets/arrow.png"
				alt="Arrow icon"
				class="icon arrow"
				onclick="location.href='./#experience'"
			/>
		</section>
		<section id="experience">
			<p class="section__text__p1">Explore My</p>
			<h1 class="title">Experience</h1>
			<div class="experience-details-container">
				<div class="about-containers">
					<div class="details-container">
						<h2 class="experience-sub-title">Frontend Development</h2>
						<div class="article-container">
							<article>
								<img
									src="./assets/checkmark.png"
									alt="Experience icon"
									class="icon"
								/>
								<div>
									<h3>HTML</h3>
									<p>Experienced</p>
								</div>
							</article>
							<article>
								<img
									src="./assets/checkmark.png"
									alt="Experience icon"
									class="icon"
								/>
								<div>
									<h3>CSS</h3>
									<p>Intermediate</p>
								</div>
							</article>
							<article>
								<img
									src="./assets/checkmark.png"
									alt="Experience icon"
									class="icon"
								/>
								<div>
									<h3>JavaScript</h3>
									<p>Intermediate</p>
								</div>
							</article>
							<article>
								<img
									src="./assets/checkmark.png"
									alt="Experience icon"
									class="icon"
								/>
								<div>
									<h3>Bootstrap</h3>
									<p>Intermediate</p>
								</div>
							</article>
							<article>
								<img
									src="./assets/checkmark.png"
									alt="Experience icon"
									class="icon"
								/>
								<div>
									<h3>React JS</h3>
									<p>Basic</p>
								</div>
							</article>
							<article></article>
						</div>
					</div>
					<div class="details-container">
						<h2 class="experience-sub-title">Backend Development</h2>
						<div class="article-container">
							<article>
								<img
									src="./assets/checkmark.png"
									alt="Experience icon"
									class="icon"
								/>
								<div>
									<h3>PHP</h3>
									<p>Intermediate</p>
								</div>
							</article>
							<article>
								<img
									src="./assets/checkmark.png"
									alt="Experience icon"
									class="icon"
								/>
								<div>
									<h3>Node JS</h3>
									<p>Basic</p>
								</div>
							</article>
							<article>
								<img
									src="./assets/checkmark.png"
									alt="Experience icon"
									class="icon"
								/>
								<div>
									<h3>Express JS</h3>
									<p>Basic</p>
								</div>
							</article>
							<article>
								<img
									src="./assets/checkmark.png"
									alt="Experience icon"
									class="icon"
								/>
								<div>
									<h3>MySQL</h3>
									<p>Intermediate</p>
								</div>
							</article>
							<article>
								<img
									src="./assets/checkmark.png"
									alt="Experience icon"
									class="icon"
								/>
								<div>
									<h3>MongoDB</h3>
									<p>Basic</p>
								</div>
							</article>
							<article></article>
						</div>
					</div>
				</div>
			</div>
			<img
				src="./assets/arrow.png"
				alt="Arrow icon"
				class="icon arrow"
				onclick="location.href='./#projects'"
			/>
		</section>
		<section id="projects">
			<p class="section__text__p1">Browse My Recent</p>
			<h1 class="title">Projects</h1>
			<div class="experience-details-container">
				<div class="about-containers">
					<div class="details-container color-container">
						<div class="article-container">
							<img
								src="./assets/p1.jpg"
								alt="Project 1"
								class="project-img"
							/>
						</div>
						<h2 class="experience-sub-title project-title">NewsDaily</h2>
						<div class="btn-container">
							<button
								class="btn1 btn-color-2 project-btn"
								onclick="location.href='https://github.com/AdityaSharma0210/NewsDaily'"
							>
								Github
							</button>
							
						</div>
					</div>
					<div class="details-container color-container">
						<div class="article-container">
							<img
								src="./assets/p2.png"
								alt="Project 2"
								class="project-img"
							/>
						</div>
						<h2 class="experience-sub-title project-title">Text-Utils</h2>
						<div class="btn-container">
							<button
								class="btn1 btn-color-2 project-btn"
								onclick="location.href='https://github.com/AdityaSharma0210/TextUtils'"
							>
								Github
							</button>
							
						</div>
					</div>
					<div class="details-container color-container">
						<div class="article-container">
							<img
								src="./assets/p3.png"
								alt="Project 3"
								class="project-img"
							/>
						</div>
						<h2 class="experience-sub-title project-title">Crime Reporting Web Portal</h2>
						<div class="btn-container">
							<button
								class="btn1 btn-color-2 project-btn"
								onclick="location.href='https://github.com/AdityaSharma0210/CrimeWebPortal'"
							>
								Github
							</button>
							
						</div>
					</div>
				</div>
			</div>
			<img
				src="./assets/arrow.png"
				alt="Arrow icon"
				class="icon arrow"
				onclick="location.href='./#contact'"
			/>
		</section>
		<section id="contact">
			<p class="section__text__p1">Get in Touch</p>
			<h1 class="title">Contact Me</h1>
			<div class="contact-info-upper-container">
				<div class="contact-info-container">
					<img
						src="./assets/email.png"
						alt="Email icon"
						class="icon contact-icon email-icon"
					/>
					<p>
						<a href="mailto:adityasharma219301360@gmail.com">Gmail</a>
					</p>
				</div>
				<div class="contact-info-container">
					<img
						src="./assets/linkedin.png"
						alt="LinkedIn icon"
						class="icon contact-icon"
					/>
					<p>
						<a href="https://www.linkedin.com/in/aditya-sharma-672089252"
							>LinkedIn</a
						>
					</p>
				</div>
				<div class="contact-info-container">
					<img
						src="./assets/checkmark.png"
						alt="checkmark icon"
						class="icon email-icon"
					/>
					<p>
						<a href="#" data-bs-toggle="modal" data-bs-target="#md1"
							>Contact Form</a
						>
					</p>
				</div>
			</div>
			<div class="contact-info-container">
					<?php
						if($_REQUEST["msg"]==1)
						{
							?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Details submitted successfully!</strong>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
							<?php
						}
					?>
				</div>
		</section>
		<footer>
			<nav>
				<div class="nav-links-container">
					<ul class="nav-links">
						<li><a href="#about">About</a></li>
						<li><a href="#experience">Experience</a></li>
						<li><a href="#projects">Projects</a></li>
						<li><a href="#contact">Contact</a></li>
					</ul>
				</div>
			</nav>
			<p>Copyright &#169; 2024 Aditya Sharma. All Rights Reserved.</p>
		</footer>

		<div class="modal" tabindex="-1" id="md1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
                    <form action="process.php" method="post">
					<div class="modal-header">
						<h5 class="modal-title">Contact Form</h5>
						<button
							style="margin-left: 360px"
							type="button"
							class="btn-close"
							data-bs-dismiss="modal"
							aria-label="Close"
						></button>
					</div>
					<div class="modal-body">
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label"
								>Full Name</label
							>
							<input
								type="text"
								class="form-control"
								id="exampleFormControlInput1"
								placeholder="Name"
                                name="full_name" value="<?php echo $_SESSION["full_name"];?>" required
							/>
						</div>
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label"
								>Email Id</label
							>
							<input
								type="email"
								class="form-control"
								id="exampleFormControlInput1"
								placeholder="email"
                                name="email_id" value="<?php echo $_SESSION["email_id"];?>" required
							/>
						</div>
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">
								Mobile Number
							</label>
							<input
								class="form-control"
								id="exampleFormControlInput1"
								placeholder="Mobile Number"
                                name="mobile_number" value="<?php echo $_SESSION["mobile_number"];?>" required
							/>
						</div>
						<div class="mb-3">
							<label for="exampleFormControlTextarea1" class="form-label"
								>Message</label
							>
							<textarea
								class="form-control"
								id="exampleFormControlTextarea1"
								rows="3"
                                name="message" required
								placeholder="Message"
							><?php echo $_SESSION["message"];?></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-outline-secondary">
							Submit
						</button>
					</div>
                    </form>
				</div>
			</div>
		</div>

		<script src="script.js"></script>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
			crossorigin="anonymous"
		></script>
	</body>
</html>
