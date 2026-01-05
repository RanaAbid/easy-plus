<?php 
include('../includes/header.php');
include('../includes/dbcode.php');
include('../includes/functions.php');

// Load about section and process items from database
$about = getAboutSection($link);
$processItems = getProcessItems($link);
$teamMembers = getTeamMembers($link, 'active');
$clients = getClients($link, 'active');

// Check if we need auto-play carousel (more than 3 team members)
$teamCount = count($teamMembers);
$teamAutoPlay = $teamCount > 3 ? 'true' : 'false';
?>
<style>
/* Team Images Equal Height */
.team-style2 .team-img {
    height: 350px;
    overflow: hidden;
}

.team-style2 .team-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

@media (max-width: 1199px) {
    .team-style2 .team-img {
        height: 320px;
    }
}

@media (max-width: 991px) {
    .team-style2 .team-img {
        height: 300px;
    }
}

@media (max-width: 767px) {
    .team-style2 .team-img {
        height: 280px;
    }
}
</style>
<div class="breadcumb-wrapper" data-bg-src="<?= $app_path ?>assets/img/breadcumb/breadcumb-bg.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">About Us</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="<?= $app_path ?>">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php if ($about): ?>
<section class="position-relative space-bottom mt-3">
    <span class="about-shape1 d-none d-xl-block">TechBiz</span>
    <div class="container z-index-common">
        <div class="row gx-60">
            <div class="col-lg-6 col-xl-5 mb-50 mb-lg-0 wow fadeInUp" data-wow-delay="0.2s">
                <div class="img-box1">
                    <div class="img-1">
                        <?php if ($about['image_1']): ?>
                        <img src="<?= $app_path ?>assets/img/about/<?= htmlspecialchars($about['image_1']) ?>" alt="about image" loading="lazy" decoding="async">
                        <?php else: ?>
                        <img src="<?= $app_path ?>assets/img/about/ab-1-1.jpg" alt="about image" loading="lazy" decoding="async">
                        <?php endif; ?>
                    </div>
                    <div class="img-2">
                        <?php if ($about['image_2']): ?>
                        <img src="<?= $app_path ?>assets/img/about/<?= htmlspecialchars($about['image_2']) ?>" alt="about image" loading="lazy" decoding="async">
                        <?php else: ?>
                        <img src="<?= $app_path ?>assets/img/about/ab-1-2.jpg" alt="about image" loading="lazy" decoding="async">
                        <?php endif; ?>
                        <?php if ($about['video_url']): ?>
                        <a class="play-btn style2 position-center popup-video" href="<?= htmlspecialchars($about['video_url']) ?>">
                            <i class="fas fa-play"></i>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-7 align-self-center wow fadeInUp" data-wow-delay="0.3s">
                <?php if ($about['subtitle']): ?>
                <span class="sec-subtitle"><i class="fas fa-bring-forward"></i><?= htmlspecialchars($about['subtitle']) ?></span>
                <?php endif; ?>
                <h2 class="sec-title h1"><?= htmlspecialchars($about['title']) ?></h2>
                <?php if ($about['description']): ?>
                <p class="mb-4 mt-1 pb-3 add-read-more show-less-content"><?= htmlspecialchars(trim($about['description'])) ?></p>
                <?php endif; ?>
                <div class="call-media">
                    <div class="call-media__icon"><img src="<?= $app_path ?>assets/img/icon/tel-1-1.png" alt="icon" loading="lazy"></div>
                    <div class="media-body">
                        <span class="call-media__label">24 HOURS SERVICE AVAILABLE</span>
                        <?php 
                        // Get phone number from config file or database
                        $phoneNumber = $about['call_number'] ?: $footer_contact['phone'];
                        $phoneNumberClean = str_replace([' ', '(', ')', '-'], '', $phoneNumber);
                        ?>
                        <p class="call-media__info">Call Us: <a href="tel:<?= htmlspecialchars($phoneNumberClean) ?>"><?= htmlspecialchars($phoneNumber) ?></a></p>
                    </div>
                </div>
                <a href="<?= htmlspecialchars($about['button_url'] ?: ($app_path . 'about-us/')) ?>" class="vs-btn">
                    <?= htmlspecialchars($about['button_text'] ?: 'About Us') ?><i class="far fa-long-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<?php else: ?>
<!-- Fallback content if no about section in database -->
<section data-bg-src="<?= $app_path ?>assets/img/bg/about-bg-5-1.jpg">
    <div class="container container-style1">
        <div class="row flex-row-reverse align-items-center gx-70">
            <div class="col-lg-6 col-xl"><img src="<?= $app_path ?>assets/img/about/ab-7-1.jpg" alt="about image"></div>
            <div class="col-lg-6 col-xl-auto wow fadeInUp" data-wow-delay="0.2s">
                <div class="about-box2"><span class="sec-subtitle"><i class="fas fa-bring-forward"></i>A Professional Team Focused on Your Compliance</span>
                    <h2 class="sec-title3 h1">Easy Plus Accounting & Records Management</h2>
                    <p>Easy Plus Accounting & Records Management is a licensed service provider offering accounting, bookkeeping, taxation and government documentation support. We assist clients from various industries including restaurants, construction, trading, services and new startups.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if (!empty($processItems)): ?>
<section class="space-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-30 wow fadeInUp" data-wow-delay="0.2s">
                <span class="sec-subtitle"><i class="fas fa-bring-forward"></i>Our Working Method</span>
                <h2 class="sec-title3 h1 mb-3 pb-3">Our Working Method</h2>
            </div>
            <div class="col-lg-6 mb-30 pt-10 pt-lg-0 text-center text-md-start">
                <?php 
                $half = ceil(count($processItems) / 2);
                foreach (array_slice($processItems, 0, $half) as $item): 
                ?>
                <div class="media-order">
                    <div class="media-order__number"><?= htmlspecialchars($item['number'] ?: '0' . ($item['sort_order'] + 1)) ?></div>
                    <div class="media-body">
                        <h3 class="media-order__title h6"><?= htmlspecialchars($item['title']) ?></h3>
                        <?php if ($item['description']): ?>
                        <p class="media-order__text"><?= htmlspecialchars($item['description']) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-6 mb-30 pt-10 pt-lg-0 text-center text-md-start">
                <?php foreach (array_slice($processItems, $half) as $item): ?>
                <div class="media-order">
                    <div class="media-order__number"><?= htmlspecialchars($item['number'] ?: '0' . ($item['sort_order'] + 1)) ?></div>
                    <div class="media-body">
                        <h3 class="media-order__title h6"><?= htmlspecialchars($item['title']) ?></h3>
                        <?php if ($item['description']): ?>
                        <p class="media-order__text"><?= htmlspecialchars($item['description']) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<section class="position-relative space">
    <div class="container wow fadeInUp" data-wow-delay="0.2s">
        <div class="tab-content" id="nav-tabserviceContent">
            <div class="tab-pane fade show active" id="nav-digitalmarketing" role="tabpanel" aria-labelledby="nav-digitalmarketing-tab">
                <div class="row gx-60 gy-30">
                    <div class="col-lg-6">
                        <div class="img-box7"><img src="<?= $app_path ?>assets/img/about/ab-6-1.jpg" alt="About" class="w-100">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-box1">
                            <h2 class="about-title h3">Our Commitment</h2>
                            <p class="about-text">
                                We believe in accuracy, consistency and clear communication. We understand how difficult it can be to manage paperwork, financial records and regular filings, so we simplify it through organised processes.<br><br>

                                Your Trusted UAE Partner:<br>
                                Businesses rely on us because we focus on delivering dependable results and practical solutions that help them stay compliant with UAE regulations.
                            </p>
                            <div class="list-style2">
                                <ul>
                                    <li><i class="fas fa-check-circle"></i>Accurate Accounting</li>
                                    <li><i class="fas fa-check-circle"></i>Timely Filings</li>
                                    <li><i class="fas fa-check-circle"></i>Clear Communication</li>
                                    <li><i class="fas fa-check-circle"></i>Reliable Support</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-webdevelopment" role="tabpanel" aria-labelledby="nav-webdevelopment-tab">
                <div class="row gx-60 gy-30">
                    <div class="col-xl-6">
                        <div class="img-box7"><img src="<?= $app_path ?>assets/img/about/ab-6-2.jpg" alt="About" class="w-100">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-box1">
                            <h2 class="about-title h3">Web Development</h2><span class="about-subtitle">156 Jobs
                                Done</span>
                            <p class="about-text">Energistically brand efficient paradigms vis resource maximizing process improvements. Dramatically repurpose stand-alone bandwidth after centric strategic theme areas. Intrinsicly build synergistic...</p>
                            <div class="list-style2">
                                <ul>
                                    <li><i class="fas fa-check-circle"></i>Fast Growing Sells</li>
                                    <li><i class="fas fa-check-circle"></i>24/7 Quality Services</li>
                                    <li><i class="fas fa-check-circle"></i>Skilled Team Members</li>
                                    <li><i class="fas fa-check-circle"></i>Best Quality Services</li>
                                </ul>
                            </div><a href="service-details.html" class="vs-btn">Learn More<i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-machinelearning" role="tabpanel" aria-labelledby="nav-machinelearning-tab">
                <div class="row gx-60 gy-30">
                    <div class="col-xl-6">
                        <div class="img-box7"><img src="<?= $app_path ?>assets/img/about/ab-6-3.jpg" alt="About" class="w-100">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-box1">
                            <h2 class="about-title h3">Machine Learning</h2><span class="about-subtitle">592 Jobs
                                Done</span>
                            <p class="about-text">Energistically brand efficient paradigms vis resource maximizing process improvements. Dramatically repurpose stand-alone bandwidth after centric strategic theme areas. Intrinsicly build synergistic...</p>
                            <div class="list-style2">
                                <ul>
                                    <li><i class="fas fa-check-circle"></i>Fast Growing Sells</li>
                                    <li><i class="fas fa-check-circle"></i>24/7 Quality Services</li>
                                    <li><i class="fas fa-check-circle"></i>Skilled Team Members</li>
                                    <li><i class="fas fa-check-circle"></i>Best Quality Services</li>
                                </ul>
                            </div><a href="service-details.html" class="vs-btn">Learn More<i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-softwareservices" role="tabpanel" aria-labelledby="nav-softwareservices-tab">
                <div class="row gx-60 gy-30">
                    <div class="col-xl-6">
                        <div class="img-box7"><img src="<?= $app_path ?>assets/img/about/ab-6-4.jpg" alt="About" class="w-100">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-box1">
                            <h2 class="about-title h3">Software Services</h2><span class="about-subtitle">1259 Jobs
                                Done</span>
                            <p class="about-text">Energistically brand efficient paradigms vis resource maximizing process improvements. Dramatically repurpose stand-alone bandwidth after centric strategic theme areas. Intrinsicly build synergistic...</p>
                            <div class="list-style2">
                                <ul>
                                    <li><i class="fas fa-check-circle"></i>Fast Growing Sells</li>
                                    <li><i class="fas fa-check-circle"></i>24/7 Quality Services</li>
                                    <li><i class="fas fa-check-circle"></i>Skilled Team Members</li>
                                    <li><i class="fas fa-check-circle"></i>Best Quality Services</li>
                                </ul>
                            </div><a href="service-details.html" class="vs-btn">Learn More<i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="z-index-common space" data-bg-src="<?= $app_path ?>assets/img/bg/cta-bg-1-2.jpg">
    <div class="container">
        <div class="row text-center text-lg-start align-items-center justify-content-between">
            <div class="col-lg-auto"><span class="sec-subtitle text-white">We are here to answer your questions
                    24/7</span>
                <h2 class="h1 sec-title cta-title1">Need A Consultation?</h2>
            </div>
            <div class="col-lg-auto"><a href="<?= $app_path ?>contact-us/" class="vs-btn">Get A Quote<i
                        class="far fa-arrow-right"></i></a></div>
        </div>
    </div>
</section>
<?php if (!empty($teamMembers)): ?>
<section class="space-top space-extra-bottom">
    <div class="container wow fadeInUp" data-wow-delay="0.2s">
        <div class="row justify-content-center text-center">
            <div class="col-xl-6">
                <div class="title-area">
                    <span class="sec-subtitle">Great Team Members</span>
                    <h2 class="sec-title3 h1">We Have Expert Team</h2>
                </div>
            </div>
        </div>
        <div class="row vs-carousel team-carousel" data-slide-show="3" data-md-slide-show="2" <?= $teamAutoPlay == 'true' ? 'data-autoplay="true" data-autoplay-speed="3000"' : '' ?>>
            <?php foreach ($teamMembers as $member): ?>
                <div class="col-xl-4">
                    <div class="team-style2">
                        <div class="team-img">
                            <div class="team-shape1"></div>
                            <div class="team-shape2"></div>
                            <a href="#">
                                <img src="<?= $app_path ?>assets/img/easyplus/team/<?= htmlspecialchars($member['image'] ?: 'member1.jpg') ?>" 
                                     alt="<?= htmlspecialchars($member['name']) ?>" 
                                     loading="lazy" decoding="async">
                            </a>
                            <div class="team-social">
                                <?php if ($member['facebook_url']): ?>
                                <a href="<?= htmlspecialchars($member['facebook_url']) ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <?php endif; ?>
                                <?php if ($member['instagram_url']): ?>
                                <a href="<?= htmlspecialchars($member['instagram_url']) ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                <?php endif; ?>
                                <?php if ($member['linkedin_url']): ?>
                                <a href="<?= htmlspecialchars($member['linkedin_url']) ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                                <?php endif; ?>
                                <?php if ($member['twitter_url']): ?>
                                <a href="<?= htmlspecialchars($member['twitter_url']) ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3 class="team-title h5"><a class="text-inherit" href="#"><?= htmlspecialchars($member['name']) ?></a></h3>
                            <p class="team-degi"><?= htmlspecialchars($member['position']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (!empty($clients)): ?>
<section class="space" data-bg-src="<?= $app_path ?>assets/img/bg/brand-bg-2-2.jpg">
    <div class="container">
        <div class="sec-line-wrap">
            <div class="sec-line"></div>
            <h2 class="sec-title2">Our Trusted Clients</h2>
            <div class="sec-line"></div>
        </div>
        <div class="row vs-carousel text-center" data-slide-show="5" data-md-slide-show="3" data-sm-slide-show="2" data-xs-slide-show="2">
            <?php foreach ($clients as $client): ?>
            <div class="col-auto">
                <?php if ($client['website_url']): ?>
                <a href="<?= htmlspecialchars($client['website_url']) ?>" target="_blank">
                    <img src="<?= $app_path ?>assets/img/brand/<?= htmlspecialchars($client['logo']) ?>" 
                         alt="<?= htmlspecialchars($client['name']) ?>" 
                         loading="lazy" decoding="async">
                </a>
                <?php else: ?>
                <img src="<?= $app_path ?>assets/img/brand/<?= htmlspecialchars($client['logo']) ?>" 
                     alt="<?= htmlspecialchars($client['name']) ?>" 
                     loading="lazy" decoding="async">
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<section class="space-top space-extra-bottom">
    <div class="container wow fadeInUp" data-wow-delay="0.2s">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-12 text-center text-lg-start">
                <div class="title-area"><span class="sec-subtitle"><i class="fas fa-bring-forward"></i>Our Best
                        Review’s</span>
                    <h2 class="sec-title3 h1">Inspiring Tech Needs for Business</h2>
                </div>
            </div>
        </div>
        <div class="row testi-style2-slide vs-carousel" data-slide-show="2" data-md-slide-show="2">
            <div class="col-xl-6">
                <div class="testi-style2">
                    <div class="testi-body">
                        <div class="author-img"><img src="<?= $app_path ?>assets/img/testimonial/auth-4-1.jpg" alt="Testimonial">
                        </div>
                        <div class="media-body">
                            <p class="testi-text">“From business license renewal to visa processing, everything was managed efficiently. Having all services under one platform saved us a lot of time.”</p>
                        </div>
                    </div>
                    <h3 class="testi-name">Ahmed Rahim</h3>
                    <div class="testi-degi">Trading Company</div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="testi-style2">
                    <div class="testi-body">
                        <div class="author-img"><img src="<?= $app_path ?>assets/img/testimonial/auth-4-2.jpg" alt="Testimonial">
                        </div>
                        <div class="media-body">
                            <p class="testi-text">“From business license renewal to visa processing, everything was managed efficiently. Having all services under one platform saved us a lot of time.”</p>
                        </div>
                    </div>
                    <h3 class="testi-name">Sara</h3>
                    <div class="testi-degi">Consulting Firm</div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="testi-style2">
                    <div class="testi-body">
                        <div class="author-img"><img src="<?= $app_path ?>assets/img/testimonial/auth-4-3.jpg" alt="Testimonial">
                        </div>
                        <div class="media-body">
                            <p class="testi-text">“From business license renewal to visa processing, everything was managed efficiently. Having all services under one platform saved us a lot of time.”</p>
                        </div>
                    </div>
                    <h3 class="testi-name">Fatima</h3>
                    <div class="testi-degi">Construction Company</div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if (!empty($teamMembers) && $teamCount > 3): ?>
<script>
$(document).ready(function() {
    // Enable autoplay for team carousel if there are more than 3 members
    setTimeout(function() {
        var $teamCarousel = $('.team-carousel');
        if ($teamCarousel.length) {
            // Wait for slick to be initialized, then enable autoplay
            var checkSlick = setInterval(function() {
                if ($teamCarousel.hasClass('slick-initialized')) {
                    clearInterval(checkSlick);
                    $teamCarousel.slick('slickSetOption', 'autoplay', true, false);
                    $teamCarousel.slick('slickSetOption', 'autoplaySpeed', 3000, false);
                }
            }, 100);
            // Clear interval after 5 seconds to avoid infinite checking
            setTimeout(function() { clearInterval(checkSlick); }, 5000);
        }
    }, 500);
});
</script>
<?php endif; ?>

<?php include('../includes/footer.php'); ?>