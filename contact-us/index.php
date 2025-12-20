<?php include('../includes/header.php'); ?>
<?php
// Build services list by parsing services/index.php headings, fallback to defaults
$services = [];
$services_html = @file_get_contents(__DIR__ . '/../services/index.php');
if ($services_html !== false) {
    if (preg_match_all('/<h3[^>]*class=["\']service-title[^"\']*["\'][^>]*>\s*<a[^>]*>(.*?)<\/a>\s*<\/h3>/si', $services_html, $m)) {
        $services = array_map('trim', $m[1]);
    }
}
if (empty($services)) {
    $services = [
        'Web Development',
        'UI Design',
        'CMS Development',
        'Theme Development',
        'Wordpress Development'
    ];
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
                            <h3 class="contact-box__title h4">Dubai Office Address</h3>
                            <p class="contact-box__text">Completely recaptiualize 24/7 communities via standards compliant metrics whereas web-enabled content</p>
                            <div class="contact-box__item">
                                <div class="contact-box__icon"><i class="fal fa-phone-alt"></i></div>
                                <div class="media-body">
                                    <h4 class="contact-box__label">Phone Number & Email</h4>
                                    <p class="contact-box__info"><a href="tel:+971525444984">+971525444984</a><a href="mailto:easyplus984@gmail.com">easyplus984@gmail.com</a></p>
                                </div>
                            </div>
                            <div class="contact-box__item">
                                <div class="contact-box__icon"><i class="far fa-map-marker-alt"></i></div>
                                <div class="media-body">
                                    <h4 class="contact-box__label">Our Office Address</h4>
                                    <p class="contact-box__info">Office 17, 26B Street Al Mamoura Ras Al Khaimah United Arab Emirates</p>
                                </div>
                            </div>
                            <div class="contact-box__item">
                                <div class="contact-box__icon"><i class="far fa-clock"></i></div>
                                <div class="media-body">
                                    <h4 class="contact-box__label">Official Work Time</h4>
                                    <p class="contact-box__info">7:00am - 6:00pm ( Mon - Fri ) Sat, Sun & Holiday Closed
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-30">
                        <div class="contact-box">
                            <h3 class="contact-box__title h4">Leave a Message</h3>
                            <p class="contact-box__text">We’re Ready To Help You</p>
                            <form class="contact-box__form ajax-contact" action="https://html.vecurosoft.com/techbiz/demo/mail.php" method="POST">
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
                            <h3 class="contact-box__title h4">Australia Office Address</h3>
                            <p class="contact-box__text">Completely recaptiualize 24/7 communities via standards compliant metrics whereas web-enabled content</p>
                            <div class="contact-box__item">
                                <div class="contact-box__icon"><i class="fal fa-phone-alt"></i></div>
                                <div class="media-body">
                                    <h4 class="contact-box__label">Phone Number & Email</h4>
                                    <p class="contact-box__info"><a href="tel:+310259121563">+(310) 2591 21563</a><a href="mailto:info@example.com">info@example.com</a></p>
                                </div>
                            </div>
                            <div class="contact-box__item">
                                <div class="contact-box__icon"><i class="far fa-map-marker-alt"></i></div>
                                <div class="media-body">
                                    <h4 class="contact-box__label">Our Office Address</h4>
                                    <p class="contact-box__info">258 Dancing Street, Miland Line, HUYI 21563, Canberra
                                    </p>
                                </div>
                            </div>
                            <div class="contact-box__item">
                                <div class="contact-box__icon"><i class="far fa-clock"></i></div>
                                <div class="media-body">
                                    <h4 class="contact-box__label">Official Work Time</h4>
                                    <p class="contact-box__info">7:00am - 6:00pm ( Mon - Fri ) Sat, Sun & Holiday Closed
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-30">
                        <div class="contact-box">
                            <h3 class="contact-box__title h4">Leave a Message</h3>
                            <p class="contact-box__text">We’re Ready To Help You</p>
                            <form class="contact-box__form ajax-contact2" action="https://html.vecurosoft.com/techbiz/demo/mail.php" method="POST">
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
                            <h3 class="contact-box__title h4">United State Office Address</h3>
                            <p class="contact-box__text">Completely recaptiualize 24/7 communities via standards compliant metrics whereas web-enabled content</p>
                            <div class="contact-box__item">
                                <div class="contact-box__icon"><i class="fal fa-phone-alt"></i></div>
                                <div class="media-body">
                                    <h4 class="contact-box__label">Phone Number & Email</h4>
                                    <p class="contact-box__info"><a href="tel:+310259121563">+(310) 2591 21563</a><a href="mailto:info@example.com">info@example.com</a></p>
                                </div>
                            </div>
                            <div class="contact-box__item">
                                <div class="contact-box__icon"><i class="far fa-map-marker-alt"></i></div>
                                <div class="media-body">
                                    <h4 class="contact-box__label">Our Office Address</h4>
                                    <p class="contact-box__info">258 Dancing Street, Miland Line, HUYI 21563, NewYork
                                    </p>
                                </div>
                            </div>
                            <div class="contact-box__item">
                                <div class="contact-box__icon"><i class="far fa-clock"></i></div>
                                <div class="media-body">
                                    <h4 class="contact-box__label">Official Work Time</h4>
                                    <p class="contact-box__info">7:00am - 6:00pm ( Mon - Fri ) Sat, Sun & Holiday Closed
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-30">
                        <div class="contact-box">
                            <h3 class="contact-box__title h4">Leave a Message</h3>
                            <p class="contact-box__text">We’re Ready To Help You</p>
                            <form class="contact-box__form ajax-contact3" action="https://html.vecurosoft.com/techbiz/demo/mail.php" method="POST">
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