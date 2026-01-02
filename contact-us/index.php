<?php include('../includes/header.php'); ?>
<?php include('../includes/dbcode.php'); ?>
<?php
// Fetch services from database
$services = [];
$query = "SELECT title FROM services WHERE status = 'active' ORDER BY sort_order ASC, created_at DESC";
$result = mysqli_query($link, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $services[] = $row['title'];
    }
}

?>
<div class="breadcumb-wrapper" data-bg-src="<?= $app_path ?>assets/img/breadcumb/breadcumb-bg.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Contact Us</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="tab-content" id="nav-contactTabContent">
            <div class="tab-pane fade show active" id="nav-GermanyAddress" role="tabpanel" aria-labelledby="nav-GermanyAddress-tab">
                <div class="row">
                    <div class="col-lg-6 mb-30">
                        <div class="contact-box">
                            <h3 class="contact-box__title h4"><?php echo $offices['dubai']['name']; ?> Address</h3>
                            <p class="contact-box__text"><?php echo $offices['dubai']['description']; ?></p>
                            <div class="contact-box__item">
                                <div class="contact-box__icon"><i class="fal fa-phone-alt"></i></div>
                                <div class="media-body">
                                    <h4 class="contact-box__label">Phone Number & Email</h4>
                                    <p class="contact-box__info"><a href="tel:<?php echo $offices['dubai']['phone']; ?>"><?php echo $offices['dubai']['phone']; ?></a><a href="mailto:<?php echo $offices['dubai']['email']; ?>"><?php echo $offices['dubai']['email']; ?></a></p>
                                </div>
                            </div>
                            <div class="contact-box__item">
                                <div class="contact-box__icon"><i class="far fa-map-marker-alt"></i></div>
                                <div class="media-body">
                                    <h4 class="contact-box__label">Our Office Address</h4>
                                    <p class="contact-box__info"><?php echo $offices['dubai']['address']; ?></p>
                                </div>
                            </div>
                            <div class="contact-box__item">
                                <div class="contact-box__icon"><i class="far fa-clock"></i></div>
                                <div class="media-body">
                                    <h4 class="contact-box__label">Official Work Time</h4>
                                    <p class="contact-box__info"><?php echo $offices['dubai']['working_hours']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-30">
                        <div class="contact-box">
                            <h3 class="contact-box__title h4">Leave a Message</h3>
                            <p class="contact-box__text">We’re Ready To Help You</p>
                            <form class="contact-box__form ajax-contact" action="mail.php" method="POST">
                                <div class="row gx-20">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="name" id="name" placeholder="Your Name"> <i class="fal fa-user"></i>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="email" name="email" id="email" placeholder="Email Address"> <i class="fal fa-envelope"></i>
                                    </div>
                                    <div class="col-12 form-group">
                                        <select name="subject" id="subject">
                                            <option selected="selected" disabled="disabled" hidden>Select Service</option>
                                            <?php foreach ($services as $svc): ?>
                                                <option value="<?= htmlspecialchars($svc) ?>"><?= htmlspecialchars($svc) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-12 form-group">
                                        <textarea name="message" id="message" placeholder="Type Your Message"></textarea>
                                    </div>
                                    <div class="col-12 form-group">
                                        <div class="cf-turnstile" data-sitekey="<?= $turnstile_site_key ?>"></div>
                                    </div>
                                    <div class="col-12">
                                        <button class="vs-btn">Submit Message<i class="far fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messages mb-0 mt-3"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-AustraliaAddress" role="tabpanel" aria-labelledby="nav-AustraliaAddress-tab">
                <div class="row">
                    <div class="col-lg-6 mb-30">
                        <div class="contact-box">
                            <h3 class="contact-box__title h4"><?php echo $offices['australia']['name']; ?> Address</h3>
                            <p class="contact-box__text"><?php echo $offices['australia']['description']; ?></p>
                            <div class="contact-box__item">
                                <div class="contact-box__icon"><i class="fal fa-phone-alt"></i></div>
                                <div class="media-body">
                                    <h4 class="contact-box__label">Phone Number & Email</h4>
                                    <p class="contact-box__info"><a href="tel:<?php echo $offices['australia']['phone']; ?>"><?php echo $offices['australia']['phone']; ?></a><a href="mailto:<?php echo $offices['australia']['email']; ?>"><?php echo $offices['australia']['email']; ?></a></p>
                                </div>
                            </div>
                            <div class="contact-box__item">
                                <div class="contact-box__icon"><i class="far fa-map-marker-alt"></i></div>
                                <div class="media-body">
                                    <h4 class="contact-box__label">Our Office Address</h4>
                                    <p class="contact-box__info"><?php echo $offices['australia']['address']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="contact-box__item">
                                <div class="contact-box__icon"><i class="far fa-clock"></i></div>
                                <div class="media-body">
                                    <h4 class="contact-box__label">Official Work Time</h4>
                                    <p class="contact-box__info"><?php echo $offices['australia']['working_hours']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-30">
                        <div class="contact-box">
                            <h3 class="contact-box__title h4">Leave a Message</h3>
                            <p class="contact-box__text">We’re Ready To Help You</p>
                            <form class="contact-box__form ajax-contact2" action="mail.php" method="POST">
                                <div class="row gx-20">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="name" id="name2" placeholder="Your Name"> <i class="fal fa-user"></i>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="email" name="email" id="email2" placeholder="Email Address"> <i class="fal fa-envelope"></i>
                                    </div>
                                    <div class="col-12 form-group">
                                        <select name="subject" id="subject2">
                                            <option selected="selected" disabled="disabled" hidden>Select subject</option>
                                            <?php foreach ($services as $svc): ?>
                                                <option value="<?= htmlspecialchars($svc) ?>"><?= htmlspecialchars($svc) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-12 form-group">
                                        <textarea name="message" id="message2" placeholder="Type Your Message"></textarea>
                                    </div>
                                    <div class="col-12 form-group">
                                        <div class="cf-turnstile" data-sitekey="<?= $turnstile_site_key ?>"></div>
                                    </div>
                                    <div class="col-12">
                                        <button class="vs-btn">Submit Message<i class="far fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messages mb-0 mt-3"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row">
                    <div class="col-lg-6 mb-30">
                        <div class="contact-box">
                            <h3 class="contact-box__title h4"><?php echo $offices['usa']['name']; ?> Address</h3>
                            <p class="contact-box__text"><?php echo $offices['usa']['description']; ?></p>
                            <div class="contact-box__item">
                                <div class="contact-box__icon"><i class="fal fa-phone-alt"></i></div>
                                <div class="media-body">
                                    <h4 class="contact-box__label">Phone Number & Email</h4>
                                    <p class="contact-box__info"><a href="tel:<?php echo $offices['usa']['phone']; ?>"><?php echo $offices['usa']['phone']; ?></a><a href="mailto:<?php echo $offices['usa']['email']; ?>"><?php echo $offices['usa']['email']; ?></a></p>
                                </div>
                            </div>
                            <div class="contact-box__item">
                                <div class="contact-box__icon"><i class="far fa-map-marker-alt"></i></div>
                                <div class="media-body">
                                    <h4 class="contact-box__label">Our Office Address</h4>
                                    <p class="contact-box__info"><?php echo $offices['usa']['address']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="contact-box__item">
                                <div class="contact-box__icon"><i class="far fa-clock"></i></div>
                                <div class="media-body">
                                    <h4 class="contact-box__label">Official Work Time</h4>
                                    <p class="contact-box__info"><?php echo $offices['usa']['working_hours']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-30">
                        <div class="contact-box">
                            <h3 class="contact-box__title h4">Leave a Message</h3>
                            <p class="contact-box__text">We’re Ready To Help You</p>
                            <form class="contact-box__form ajax-contact3" action="mail.php" method="POST">
                                <div class="row gx-20">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="name" id="name3" placeholder="Your Name"> <i class="fal fa-user"></i>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="email" name="email" id="email3" placeholder="Email Address"> <i class="fal fa-envelope"></i>
                                    </div>
                                    <div class="col-12 form-group">
                                        <select name="subject" id="subject3">
                                            <option selected="selected" disabled="disabled" hidden>Select Service</option>
                                            <?php foreach ($services as $svc): ?>
                                                <option value="<?= htmlspecialchars($svc) ?>"><?= htmlspecialchars($svc) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-12 form-group">
                                        <textarea name="message" id="message3" placeholder="Type Your Message"></textarea>
                                    </div>
                                    <div class="col-12 form-group">
                                        <div class="cf-turnstile" data-sitekey="<?= $turnstile_site_key ?>"></div>
                                    </div>
                                    <div class="col-12">
                                        <button class="vs-btn">Submit Message<i class="far fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messages mb-0 mt-3"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('../includes/footer.php'); ?>