<?php 
include('includes/header.php');
include('includes/dbcode.php');
include('includes/functions.php');

// Load all data
$sliders = getSliders($link);
$features = getFeatures($link);
$services = getServices($link, 'active', 6);
$about = getAboutSection($link);
$processItems = getProcessItems($link);
$skills = getSkills($link);
$faqSection = getFAQSection($link);
$faqItems = getFAQItems($link);
$cta = getCTASection($link);
$teamMembers = getTeamMembers($link, 'active');
$clients = getClients($link, 'active');
?>

<style>
/* Enhanced Visual Design Improvements */

/* Service Cards Enhanced Styling */
.service-style1 {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border-radius: 12px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.service-style1:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(14, 89, 242, 0.15) !important;
}

.service-style1 .service-icon {
    transition: all 0.4s ease;
}

.service-style1:hover .service-icon {
    transform: scale(1.1) rotate(5deg);
}

.service-style1 .service-title a {
    transition: color 0.3s ease;
}

.service-style1:hover .service-title a {
    color: var(--theme-color, #0e59f2);
}

/* Feature Cards Enhancement */
.feature-style1 {
    transition: all 0.3s ease;
    border-radius: 10px;
    padding: 25px;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.feature-style1:hover {
    transform: translateY(-5px);
    background: linear-gradient(135deg, rgba(14, 89, 242, 0.03) 0%, rgba(14, 89, 242, 0.08) 100%);
}

.feature-style1 .feature-text {
    flex: 1;
    margin-bottom: 20px;
}

.feature-style1 .feature-icon img {
    transition: transform 0.4s ease;
}

.feature-style1:hover .feature-icon img {
    transform: scale(1.15) rotateY(10deg);
}

/* Process Items Enhancement */
.process-style1 {
    transition: all 0.3s ease;
}

.process-style1:hover {
    transform: translateY(-5px);
}

.process-style1:hover .process-icon {
    transform: scale(1.1);
    filter: drop-shadow(0 10px 20px rgba(14, 89, 242, 0.2));
}

.process-icon {
    transition: all 0.4s ease;
}

/* Enhanced Read More/Less Styling */
.add-read-more .read-more,
.add-read-more .read-less {
    font-weight: 600;
    margin-left: 5px;
    color: var(--theme-color, #0e59f2);
    cursor: pointer;
    text-decoration: underline;
    transition: color 0.3s ease;
    display: inline-block;
}

.add-read-more .read-more:hover,
.add-read-more .read-less:hover {
    color: #0a47c0;
    text-decoration: none;
}

/* Button Enhancements */
.vs-btn {
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.vs-btn::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
}

.vs-btn:hover::before {
    width: 300px;
    height: 300px;
}

.vs-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(14, 89, 242, 0.3);
}

/* Progress Bar Enhancement */
.progress-box__bar {
    position: relative;
    overflow: hidden;
}

.progress-box__bar::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    animation: shimmer 2s infinite;
}

@keyframes shimmer {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateX(100%);
    }
}

/* Section Spacing Enhancement */
section {
    position: relative;
}

.space-top {
    padding-top: 100px;
}

.space-extra-bottom {
    padding-bottom: 120px;
}

/* Image Hover Effects */
.img-box1 img,
.img-box2 img {
    transition: transform 0.5s ease;
}

.img-box1:hover img,
.img-box2:hover img {
    transform: scale(1.05);
}

/* Text Enhancements */
.sec-title {
    position: relative;
    display: inline-block;
}

.sec-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 4px;
    background: linear-gradient(90deg, var(--theme-color, #0e59f2), #4a90e2);
    border-radius: 2px;
}

.sec-subtitle {
    display: inline-block;
    padding: 8px 20px;
    border-radius: 30px;
    background: linear-gradient(135deg, rgba(14, 89, 242, 0.1) 0%, rgba(14, 89, 242, 0.05) 100%);
    transition: all 0.3s ease;
}

.sec-subtitle:hover {
    background: linear-gradient(135deg, rgba(14, 89, 242, 0.15) 0%, rgba(14, 89, 242, 0.1) 100%);
}

/* FAQ Section Enhancement */
.faq-wrap1 {
    background: linear-gradient(135deg, rgba(14, 89, 242, 0.05) 0%, rgba(14, 89, 242, 0.02) 100%);
    border-radius: 20px;
    overflow: hidden;
}

/* CTA Section Enhancement */
section[data-bg-src*="cta"] {
    position: relative;
    overflow: hidden;
}

section[data-bg-src*="cta"]::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(14, 89, 242, 0.85) 0%, rgba(74, 144, 226, 0.85) 100%);
    z-index: 0;
}

section[data-bg-src*="cta"] > .container {
    position: relative;
    z-index: 1;
}

/* Smooth Scroll Enhancement */
html {
    scroll-behavior: smooth;
}

/* Loading Animation for Images */
img {
    opacity: 0;
    animation: fadeIn 0.5s ease-in forwards;
}

@keyframes fadeIn {
    to {
        opacity: 1;
    }
}

/* Service Row Equal Height */
section[data-bg-src*="sr-bg"] .row {
    display: flex;
    flex-wrap: wrap;
}

section[data-bg-src*="sr-bg"] .row > [class*="col-"] {
    display: flex;
    flex-direction: column;
}

/* Enhanced Card Shadows */
.service-style1,
.feature-style1,
.contact-box {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.service-style1:hover,
.feature-style1:hover {
    box-shadow: 0 12px 30px rgba(14, 89, 242, 0.15);
}

/* Comprehensive Responsive Enhancements */
@media (max-width: 1199px) {
    .hero-title {
        font-size: 50px !important;
    }
    
    .sec-title.h1 {
        font-size: 36px;
    }
    
    .service-style1 {
        margin-bottom: 30px;
    }
}

@media (max-width: 991px) {
    .space-top {
        padding-top: 70px;
    }
    
    .space-extra-bottom {
        padding-bottom: 90px;
    }
    
    .hero-title {
        font-size: 42px !important;
    }
    
    .sec-title.h1 {
        font-size: 32px;
    }
    
    .feature-style1 {
        margin-bottom: 30px;
    }
    
    .service-style1 {
        padding: 30px 20px;
    }
    
    .about-box1::before,
    .about-box2::before {
        display: none;
    }
    
    .gx-60 {
        --bs-gutter-x: 2rem;
    }
}

@media (max-width: 767px) {
    .space-top {
        padding-top: 60px;
    }
    
    .space-extra-bottom {
        padding-bottom: 80px;
    }
    
    .hero-title {
        font-size: 32px !important;
        line-height: 1.3 !important;
    }
    
    .sec-title.h1 {
        font-size: 28px;
        line-height: 1.4;
    }
    
    .sec-subtitle {
        font-size: 14px;
        padding: 6px 15px;
    }
    
    .service-style1 {
        padding: 25px 20px;
        margin-bottom: 25px;
    }
    
    .service-style1:hover {
        transform: translateY(-4px);
    }
    
    .feature-style1 {
        padding: 20px;
        margin-bottom: 25px;
    }
    
    .feature-text,
    .service-text {
        font-size: 14px;
        line-height: 1.6;
    }
    
    .vs-btn {
        padding: 12px 24px;
        font-size: 14px;
    }
    
    .process-style1 {
        margin-bottom: 30px;
    }
    
    .progress-box {
        padding: 15px;
    }
    
    .img-box1,
    .img-box2 {
        margin-bottom: 30px;
    }
    
    .call-media {
        flex-direction: column;
        text-align: center;
    }
    
    .call-media__icon {
        margin: 0 auto 15px;
    }
    
    .add-read-more {
        max-width: 100%;
    }
    
    .hero-desc {
        width: 90% !important;
        font-size: 14px;
    }
    
    .hero-btns {
        left: 50% !important;
        transform: translateX(-50%);
        width: 90%;
    }
    
    .ls-btn-group {
        flex-direction: column;
        gap: 15px;
    }
    
    .ls-btn-group .vs-btn {
        width: 100%;
        text-align: center;
    }
}

@media (max-width: 575px) {
    .space-top {
        padding-top: 50px;
    }
    
    .space-extra-bottom {
        padding-bottom: 60px;
    }
    
    .hero-title {
        font-size: 24px !important;
        line-height: 1.3 !important;
    }
    
    .sec-title.h1 {
        font-size: 24px;
        line-height: 1.4;
    }
    
    .sec-subtitle {
        font-size: 12px;
        padding: 5px 12px;
    }
    
    .service-style1 {
        padding: 20px 15px;
    }
    
    .feature-style1 {
        padding: 15px;
    }
    
    .feature-icon img,
    .service-icon img {
        max-width: 60px;
        height: auto;
    }
    
    .vs-btn {
        padding: 10px 20px;
        font-size: 13px;
    }
    
    .title-area {
        margin-bottom: 30px;
    }
    
    .gx-60 {
        --bs-gutter-x: 1rem;
    }
    
    /* CTA Section Mobile */
    section[data-bg-src*="cta"] .row {
        text-align: center;
    }
    
    section[data-bg-src*="cta"] .col-lg-auto {
        margin-bottom: 20px;
    }
    
    section[data-bg-src*="cta"] .col-lg-auto:last-child {
        margin-bottom: 0;
    }
    
    .cta-title1 {
        font-size: 28px;
        margin-bottom: 20px;
    }
}

/* Enhanced About Section */
.about-box1,
.about-box2 {
    position: relative;
}

.about-box1::before,
.about-box2::before {
    content: '';
    position: absolute;
    left: -20px;
    top: 0;
    bottom: 0;
    width: 4px;
    background: linear-gradient(180deg, var(--theme-color, #0e59f2), #4a90e2);
    border-radius: 2px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.about-box1:hover::before,
.about-box2:hover::before {
    opacity: 1;
}

/* Enhanced Skills Section */
.progress-box {
    padding: 20px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.8);
    transition: all 0.3s ease;
    margin-bottom: 20px;
}

.progress-box:hover {
    background: rgba(255, 255, 255, 1);
    box-shadow: 0 8px 20px rgba(14, 89, 242, 0.1);
    transform: translateX(5px);
}

/* Enhanced Hero Text */
.hero-title {
    text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5), 0 0 30px rgba(0, 0, 0, 0.3);
}

.hero-text-badge {
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.2) !important;
    border: 2px solid rgba(255, 255, 255, 0.3) !important;
    transition: all 0.3s ease;
}

.hero-text-badge:hover {
    background: rgba(255, 255, 255, 0.3) !important;
    transform: scale(1.05);
}

/* Enhanced Contact/CTA Buttons */
.cta-title1 {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}

/* Smooth Animations */
* {
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Enhanced List Styling */
.list-style2 ul li {
    transition: all 0.3s ease;
    padding-left: 5px;
}

.list-style2 ul li:hover {
    padding-left: 15px;
    color: var(--theme-color, #0e59f2);
}

.list-style2 ul li i {
    transition: transform 0.3s ease;
}

.list-style2 ul li:hover i {
    transform: scale(1.2) rotate(5deg);
}
</style>

<section class="vs-hero-wrapper position-relative">
    <div class="vs-hero-carousel" data-height="850" data-container="1900" data-slidertype="responsive">
        <?php if (!empty($sliders)): ?>
            <?php foreach ($sliders as $index => $slider): ?>
            <div class="ls-slide" data-ls="duration:12000; transition2d:5; kenburnszoom:<?= $index % 2 == 0 ? 'in' : 'out' ?>; kenburnsscale:1.1;">
                <?php 
                $sliderImage = $slider['image_desktop'] ?: 'hero-' . (($index % 5) + 1) . '-1.jpg';
                ?>
                <img width="1920" height="850" src="<?= $app_path ?>assets/img/hero/<?= htmlspecialchars($sliderImage) ?>" 
                     class="ls-bg" alt="<?= htmlspecialchars($slider['alt_text'] ?: $slider['heading']) ?>" 
                     loading="<?= $index === 0 ? 'eager' : 'lazy' ?>" 
                     decoding="async" 
                     <?= $index === 0 ? 'fetchpriority="high"' : '' ?>>
                
                <!-- Desktop View -->
                <?php if ($slider['tagline']): ?>
                <p style="top:240px; left:340px;" class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer hero-layer-base hero-text-badge" 
                   data-ls="offsetxin:300; durationin:1500; delayin:400; easingin:easeOutQuint; offsetxout:300; durationout:1500; easingout:easeOutQuint;">
                   <?= htmlspecialchars($slider['tagline']) ?>
                </p>
                <?php endif; ?>
                
                <?php if (!empty($slider['heading'])): ?>
                <h1 style="top:305px; left:345px; font-weight:700; font-size:48px; color:#ffffff; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); max-width:800px; line-height:1.2;" 
                    class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer hero-layer-base hero-title" 
                    data-ls="offsetxin:-200; durationin:1500; delayin:200; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint;">
                    <?= htmlspecialchars(str_replace(["\r\n", "\r", "\n"], ' ', trim($slider['heading']))) ?>
                </h1>
                <?php endif; ?>
                
                <?php if ($slider['description']): ?>
                <div style="top:405px; left:350px; width:695px;" 
                     class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer hero-layer-base hero-desc" 
                     data-ls="offsetyin:50; durationin:1500; delayin:600; easingin:easeOutQuint; offsetyout:50; durationout:1500; easingout:easeOutQuint; position:relative;">
                    <?= htmlspecialchars($slider['description']) ?>
                </div>
                <?php endif; ?>
                
                <div style="top:495px; left:350px;" 
                     class="ls-l ls-hide-tablet ls-hide-phone ls-html-layer hero-layer-base hero-btns" 
                     data-ls="offsetyin:50; durationin:1500; delayin:900; easingin:easeOutQuint; offsetyout:50; durationout:1500; easingout:easeOutQuint; position:relative;">
                    <div class="ls-btn-group">
                        <?php if ($slider['btn_title'] && $slider['btn_url']): ?>
                        <a href="<?= htmlspecialchars($slider['btn_url']) ?>" class="vs-btn ls-hero-btn">
                            <?= htmlspecialchars($slider['btn_title']) ?><i class="far fa-arrow-right"></i>
                        </a>
                        <?php endif; ?>
                        <?php if ($slider['btn_title_2'] && $slider['btn_url_2']): ?>
                        <a href="<?= htmlspecialchars($slider['btn_url_2']) ?>" class="vs-btn style2 ls-hero-btn">
                            <?= htmlspecialchars($slider['btn_title_2']) ?><i class="far fa-arrow-right"></i>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Tablet View -->
                <?php if ($slider['tagline']): ?>
                <p style="top:160px; left:90px;" class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer hero-layer-base hero-badge-lg" 
                   data-ls="offsetxin:300; durationin:1500; delayin:400; easingin:easeOutQuint; offsetxout:300; durationout:1500; easingout:easeOutQuint;">
                   <?= htmlspecialchars($slider['tagline']) ?>
                </p>
                <?php endif; ?>
                
                <?php if (!empty($slider['heading'])): ?>
                <h1 style="top:280px; left:80px; font-weight:700; font-size:56px; color:#ffffff; font-family:Exo; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); max-width:90%; line-height:1.2;" 
                    class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer" 
                    data-ls="offsetxin:-200; durationin:1500; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint; position:relative;">
                    <?= htmlspecialchars(str_replace(["\r\n", "\r", "\n"], ' ', trim($slider['heading']))) ?>
                </h1>
                <?php endif; ?>
                
                <div style="top:540px; left:80px; font-size:24px;" 
                     class="ls-l ls-hide-desktop ls-hide-phone ls-html-layer" 
                     data-ls="offsetyin:50; durationin:1500; delayin:900; easingin:easeOutQuint; offsetyout:50; durationout:1500; easingout:easeOutQuint; position:relative;">
                    <div class="ls-btn-group">
                        <?php if ($slider['btn_title'] && $slider['btn_url']): ?>
                        <a href="<?= htmlspecialchars($slider['btn_url']) ?>" class="vs-btn ls-hero-btn">
                            <?= htmlspecialchars($slider['btn_title']) ?><i class="far fa-arrow-right"></i>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Mobile View -->
                <?php if (!empty($slider['heading'])): ?>
                <h1 style="top:120px; left:50%; transform:translateX(-50%); text-align:center; font-weight:700; font-size:42px; color:#ffffff; font-family:Exo; max-width:90%; width:auto; line-height:1.3; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);" 
                    class="ls-l ls-hide-desktop ls-hide-tablet ls-text-layer" 
                    data-ls="offsetxin:-200; durationin:1500; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint; position:relative;">
                    <?= htmlspecialchars(str_replace(["\r\n", "\r", "\n"], ' ', trim($slider['heading']))) ?>
                </h1>
                <?php endif; ?>
                
                <div style="top:520px; left:50%; transform:translateX(-50%); text-align:center; font-size:20px; max-width:90%; width:auto;" 
                    class="ls-l ls-hide-desktop ls-hide-tablet ls-html-layer" 
                    data-ls="offsetyin:50; durationin:1500; delayin:900; easingin:easeOutQuint; offsetyout:50; durationout:1500; easingout:easeOutQuint; position:relative;">
                    <div class="ls-btn-group">
                        <?php if ($slider['btn_title'] && $slider['btn_url']): ?>
                        <a href="<?= htmlspecialchars($slider['btn_url']) ?>" class="vs-btn ls-hero-btn">
                            <?= htmlspecialchars($slider['btn_title']) ?><i class="far fa-arrow-right"></i>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Fallback if no sliders -->
            <div class="ls-slide">
                <img width="1920" height="850" src="<?= $app_path ?>assets/img/hero/hero-1-1.jpg" class="ls-bg" alt="hero-bg" loading="eager" decoding="async" fetchpriority="high">
            </div>
        <?php endif; ?>
    </div>
</section>

<div data-bg-src="<?= $app_path ?>assets/img/bg/ab-bg-1-1.jpg">
    <section class="feature-wrap1 space-top space-extra-bottom">
        <div class="container wow fadeInUp" data-wow-delay="0.2s">
            <div class="row vs-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2">
                <?php if (!empty($features)): ?>
                    <?php $featureIndex = 0; foreach ($features as $feature): ?>
                    <div class="col-xl-4">
                        <div class="feature-style1">
                            <?php 
                            $featureIconIndex = ($featureIndex % 3) + 1;
                            $featureIcon = $feature['icon'] ?: 'fe-1-' . $featureIconIndex . '.png';
                            ?>
                            <div class="feature-icon">
                                <img src="<?= $app_path ?>assets/img/icon/<?= htmlspecialchars($featureIcon) ?>" 
                                     alt="<?= htmlspecialchars($feature['title']) ?>" 
                                     loading="lazy" decoding="async">
                            </div>
                            <h3 class="feature-title h5">
                                <a class="text-inherit" href="<?= htmlspecialchars($feature['link_url'] ?: '#') ?>">
                                    <?= htmlspecialchars($feature['title']) ?>
                                </a>
                            </h3>
                            <?php if ($feature['description']): ?>
                            <p class="feature-text add-read-more show-less-content"><?= htmlspecialchars(trim($feature['description'])) ?></p>
                            <?php endif; ?>
                            <?php if ($feature['link_url']): ?>
                            <a href="<?= htmlspecialchars($feature['link_url']) ?>" class="vs-btn style3">
                                <?= htmlspecialchars($feature['link_text'] ?: 'Read More') ?><i class="far fa-long-arrow-right"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php $featureIndex++; endforeach; ?>
                <?php else: ?>
                    <!-- Fallback features -->
                    <div class="col-xl-4">
                        <div class="feature-style1">
                            <div class="feature-icon"><img src="<?= $app_path ?>assets/img/icon/fe-1-1.png" alt="Features" loading="lazy"></div>
                            <h3 class="feature-title h5"><a class="text-inherit" href="#">Development Services</a></h3>
                            <p class="feature-text">Completely implement via highly efficient process improvements.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    
    <?php if ($about): ?>
    <section class="position-relative space-bottom">
        <span class="about-shape1 d-none d-xl-block">TechBiz</span>
        <div class="container z-index-common">
            <div class="row gx-60">
                <div class="col-lg-6 col-xl-5 mb-50 mb-lg-0 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="img-box1">
                        <div class="img-1">
                            <img src="<?= $app_path ?>assets/img/about/<?= htmlspecialchars($about['image_1'] ?: 'ab-1-1.jpg') ?>" 
                                 alt="About" loading="lazy" decoding="async">
                        </div>
                        <div class="img-2">
                            <img src="<?= $app_path ?>assets/img/about/<?= htmlspecialchars($about['image_2'] ?: 'ab-1-2.jpg') ?>" 
                                 alt="About" loading="lazy" decoding="async">
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
    <?php endif; ?>
</div>

<style>
    /* Read More/Less Functionality */
    .add-read-more.show-less-content .second-section,
    .add-read-more.show-less-content .read-less {
        display: none;
    }

    .add-read-more.show-more-content .read-more {
        display: none;
    }

    .add-read-more.show-more-content .second-section {
        display: inline;
    }

    .add-read-more .read-more,
    .add-read-more .read-less {
        font-weight: 600;
        margin-left: 5px;
        color: var(--theme-color, #0e59f2);
        cursor: pointer;
        text-decoration: underline;
        transition: color 0.3s ease;
        display: inline-block;
        user-select: none;
    }

    .add-read-more .read-more:hover,
    .add-read-more .read-less:hover {
        color: #0a47c0;
        text-decoration: none;
    }
    
    .add-read-more .read-more:active,
    .add-read-more .read-less:active {
        transform: scale(0.98);
    }

    .add-read-more {
        max-width: 600px;
        width: 100%;
        margin: 0 auto;
    }
    
    /* Feature and About Read More Styling */
    .feature-text.add-read-more,
    .about-box2 .add-read-more,
    .mb-4.add-read-more {
        max-width: 100%;
        display: block;
    }
    
    /* Improved Text Readability */
    .feature-text,
    .service-text,
    .about-box2 p,
    .mb-4 {
        line-height: 1.7;
    }
    
    .feature-text {
        color: #555;
    }
    
    /* Slick Track Equal Height */
    .slick-track {
        display: flex !important;
        align-items: stretch !important;
    }
    
    .slick-slide {
        height: auto !important;
        display: flex !important;
    }
    
    .slick-slide > div {
        height: 100%;
        display: flex;
        width: 100%;
    }
    
    /* Equal Height for Carousel Items */
    .vs-carousel .slick-track .col-xl-4,
    .vs-carousel .slick-track .col-md-6,
    .vs-carousel .slick-track .col-lg-4 {
        display: flex;
        height: 100%;
    }
    
    /* Better Content Spacing */
    .feature-style1 {
        padding: 25px;
        height: 100%;
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .feature-style1 .feature-text {
        flex: 1;
        margin-bottom: 20px;
    }
    
    .service-style1 {
        min-height: 320px;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    
    .service-style1 .service-text {
        flex: 1;
        margin-bottom: 20px;
    }
    
    /* Add space after first 3 service items on large screens */
    @media (min-width: 992px) {
        section[data-bg-src*="sr-bg"] .row .col-md-6.col-lg-4:nth-child(n+4) {
            margin-top: 40px !important;
        }
    }
    
    /* Add space after first 2 service items on medium screens */
    @media (min-width: 768px) and (max-width: 991px) {
        section[data-bg-src*="sr-bg"] .row .col-md-6.col-lg-4:nth-child(n+3) {
            margin-top: 30px !important;
        }
    }
</style>

<section class="space-top space-extra-bottom" data-bg-src="<?= $app_path ?>assets/img/bg/sr-bg-1-1.png">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="title-area">
                    <span class="sec-subtitle">Our Latest Services</span>
                    <h2 class="sec-title h1">What Kind of Services We are Offering</h2>
                </div>
            </div>
        </div>
        <div class="row wow fadeInUp" data-wow-delay="0.2s">
            <?php if (!empty($services)): ?>
                <?php $serviceIndex = 0; foreach ($services as $service): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="service-style1">
                        <?php 
                        $bgImage = $service['background_image'] ?: 'sr-box-bg-1.jpg';
                        ?>
                        <div class="service-bg" data-bg-src="<?= $app_path ?>assets/img/bg/<?= htmlspecialchars($bgImage) ?>"></div>
                        <?php 
                        $iconIndex = ($serviceIndex % 6) + 1;
                        $serviceIcon = $service['icon'] ?: 'sr-icon-1-' . $iconIndex . '.png';
                        ?>
                        <div class="service-icon">
                            <img src="<?= $app_path ?>assets/img/icon/<?= htmlspecialchars($serviceIcon) ?>" 
                                 alt="<?= htmlspecialchars($service['title']) ?>" 
                                 loading="lazy" decoding="async">
                        </div>
                        <h3 class="service-title h5">
                            <a href="<?= htmlspecialchars($service['link_url'] ?: '#') ?>"><?= htmlspecialchars($service['title']) ?></a>
                        </h3>
                        <?php if ($service['description']): 
                            // Get short description (around 70 characters, similar to title length)
                            $fullDescription = trim($service['description']);
                            $shortDescription = '';
                            if (strlen($fullDescription) > 70) {
                                // Get first sentence if it's reasonable, otherwise truncate at 70 chars
                                $sentences = preg_split('/(?<=[.!?])\s+/', $fullDescription, 2);
                                if (!empty($sentences[0]) && strlen($sentences[0]) <= 100) {
                                    $shortDescription = $sentences[0];
                                } else {
                                    // Truncate at 70 chars, find last space to avoid cutting words
                                    $truncated = substr($fullDescription, 0, 70);
                                    $lastSpace = strrpos($truncated, ' ');
                                    $shortDescription = substr($fullDescription, 0, $lastSpace ?: 70) . '...';
                                }
                            } else {
                                $shortDescription = $fullDescription;
                            }
                        ?>
                        <p class="service-text"><?= htmlspecialchars($shortDescription) ?></p>
                        <?php endif; ?>
                        <?php 
                        // Generate service detail URL - always use slug if available
                        if (!empty($service['slug'])) {
                            $serviceDetailUrl = $service['link_url'] ?: ($app_path . 'services/' . $service['slug']);
                        } else {
                            // Fallback to ID only if slug doesn't exist (shouldn't happen after migration)
                            $serviceDetailUrl = $service['link_url'] ?: ($app_path . 'service-details.php?id=' . $service['id']);
                        }
                        ?>
                        <a href="<?= htmlspecialchars($serviceDetailUrl) ?>" class="vs-btn style3">
                            <?= htmlspecialchars($service['link_text'] ?: 'Read More') ?><i class="far fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <?php $serviceIndex++; endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if ($faqSection || !empty($faqItems)): ?>
<section class="faq-wrap1">
    <div class="faq-shape1" data-bg-src="<?= $app_path ?>assets/img/bg/faq-bg-1-1.jpg"></div>
    <div class="faq-shape2" data-bg-src="<?= $app_path ?>assets/img/bg/faq-bg-1-2.jpg"></div>
    <div class="container">
        <div class="row gx-60">
            <?php if ($faqSection): ?>
            <div class="col-lg-6 pb-20 pb-lg-0 wow fadeInUp" data-wow-delay="0.2s">
                <div class="img-box2">
                    <?php if ($faqSection['image_1']): ?>
                    <div class="img-1">
                        <img src="<?= $app_path ?>assets/img/faq/<?= htmlspecialchars($faqSection['image_1']) ?>" 
                             alt="FAQ" loading="lazy" decoding="async">
                    </div>
                    <?php endif; ?>
                    <?php if ($faqSection['image_2']): ?>
                    <div class="img-2">
                        <img src="<?= $app_path ?>assets/img/faq/<?= htmlspecialchars($faqSection['image_2']) ?>" 
                             alt="FAQ" loading="lazy" decoding="async">
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <?php if ($faqSection['subtitle']): ?>
                <span class="sec-subtitle text-white">
                    <i class="fas fa-bring-forward"></i> <?= htmlspecialchars($faqSection['subtitle']) ?>
                </span>
                <?php endif; ?>
                <h2 class="sec-title text-white mb-4 pb-2 h1"><?= htmlspecialchars($faqSection['title']) ?></h2>
                <?php if ($faqSection['description']): ?>
                <div>
                    <p><?= htmlspecialchars($faqSection['description']) ?></p>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (!empty($skills)): ?>
<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-5 col-xxl-auto mb-30 pb-20 pb-lg-0 wow fadeInUp" data-wow-delay="0.2s">
                <?php 
                $skillsImage = getSetting($link, 'skills_section_image');
                if ($skillsImage): 
                ?>
                <img src="<?= $app_path ?>assets/img/skill/<?= htmlspecialchars($skillsImage) ?>" 
                     alt="Skills" loading="lazy" decoding="async">
                <?php else: ?>
                <img src="<?= $app_path ?>assets/img/skill/skill-1-1.jpg" alt="Skills" loading="lazy" decoding="async">
                <?php endif; ?>
            </div>
            <div class="col-lg-7 col-xxl-6 me-xl-auto">
                <span class="sec-subtitle">
                    <i class="fas fa-bring-forward"></i> <?= htmlspecialchars(getSetting($link, 'skills_section_subtitle', 'Everything You Need Under One Platform')) ?>
                </span>
                <h2 class="sec-title h1"><?= htmlspecialchars(getSetting($link, 'skills_section_title', 'Accounting, Tax & Business Services')) ?></h2>
                <p class="mb-4 pb-1"><?= htmlspecialchars(getSetting($link, 'skills_section_description', '')) ?></p>
                
                <?php foreach ($skills as $skill): ?>
                <div class="progress-box">
                    <h3 class="progress-box__title"><?= htmlspecialchars($skill['title']) ?></h3>
                    <span class="progress-box__number"><?= $skill['percentage'] ?>%</span>
                    <div class="progress-box__progress">
                        <div class="progress-box__bar" role="progressbar" style="width: <?= $skill['percentage'] ?>%" aria-valuenow="<?= $skill['percentage'] ?>"></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="z-index-common space" data-bg-src="<?= $app_path ?>assets/img/bg/cta-bg-1-1.jpg">
    <div class="container">
        <div class="row text-center text-lg-start align-items-center justify-content-between">
            <div class="col-lg-auto">
                <span class="sec-subtitle text-white">We are here to answer your questions 24/7</span>
                <h2 class="h1 sec-title cta-title1">Need A Consultation?</h2>
            </div>
            <div class="col-lg-auto">
                <a href="<?= $app_path ?>contact-us/" class="vs-btn">Get A Quote<i class="far fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($processItems)): ?>
<section class="space-top space-extra-bottom" data-bg-src="<?= $app_path ?>assets/img/bg/process-bg-1-1.jpg" id="processv1">
    <div class="container wow fadeInUp" data-wow-delay="0.2s">
        <div class="row justify-content-center text-center">
            <div class="col-xl-6">
                <div class="title-area">
                    <span class="sec-subtitle"><?= htmlspecialchars(getSetting($link, 'process_section_subtitle', 'Great Team Members')) ?></span>
                    <h2 class="sec-title h1"><?= htmlspecialchars(getSetting($link, 'process_section_title', 'We Have Expert Team')) ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php 
            // Icon mapping from backup file based on position
            $iconMap = ['process-1-4.png', 'process-1-1.png', 'process-1-2.png', 'process-1-3.png'];
            foreach ($processItems as $index => $item): 
                // Use database icon if available, otherwise use fallback from iconMap
                $icon = $item['icon'] ?: ($iconMap[$index] ?? 'process-1-' . (($index % 4) + 1) . '.png');
            ?>
            <div class="col-sm-6 col-lg-3 process-style1">
                <?php if ($index < count($processItems) - 1): ?>
                <div class="process-arrow">
                    <img src="<?= $app_path ?>assets/img/icon/process-arrow-1-1.png" alt="arrow" loading="lazy">
                </div>
                <?php endif; ?>
                <div class="process-icon">
                    <img src="<?= $app_path ?>assets/img/icon/<?= htmlspecialchars($icon) ?>" alt="icon" loading="lazy">
                    <?php if ($item['number']): ?>
                    <span class="process-number"><?= htmlspecialchars($item['number']) ?></span>
                    <?php endif; ?>
                </div>
                <h3 class="process-title h5"><?= htmlspecialchars($item['title']) ?></h3>
                <?php if ($item['description']): ?>
                <p class="process-text"><?= htmlspecialchars($item['description']) ?></p>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (!empty($teamMembers)): ?>
<section class="space-top space-extra-bottom d-none">
    <div class="container wow fadeInUp" data-wow-delay="0.2s">
        <div class="row justify-content-center text-center">
            <div class="col-xl-6">
                <div class="title-area">
                    <span class="sec-subtitle">Great Team Members</span>
                    <h2 class="sec-title h1">We Have Expert Team</h2>
                </div>
            </div>
        </div>
        <div class="row vs-carousel" data-slide-show="3" data-md-slide-show="2">
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
<section class="space d-none" data-bg-src="<?= $app_path ?>assets/img/bg/brand-bg-2-2.jpg">
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

<script>
    $(document).ready(function() {
        function AddReadMore() {
            // Character limit for truncation
            var charLimit = 120;
            // Text to show when text is collapsed
            var readMoreTxt = " ... read more";
            // Text to show when text is expanded
            var readLessTxt = " read less";

            // Traverse all selectors with this class and manipulate HTML part to show Read More
            $(".add-read-more").each(function() {
                var $element = $(this);
                
                // Skip if already processed (has the spans)
                if ($element.find(".second-section").length > 0 || $element.find(".read-more").length > 0) {
                    return;
                }

                // Get the original text content (strip HTML tags for length calculation)
                var originalText = $element.text().trim();
                
                // Only truncate if text is longer than the limit
                if (originalText.length > charLimit) {
                    // Find the last space before the character limit to avoid cutting words
                    var truncatedText = originalText.substring(0, charLimit);
                    var lastSpaceIndex = truncatedText.lastIndexOf(' ');
                    
                    // If we found a space, use it; otherwise use the character limit
                    var cutPoint = (lastSpaceIndex > charLimit * 0.7) ? lastSpaceIndex : charLimit;
                    
                    var firstPart = originalText.substring(0, cutPoint).trim();
                    var secondPart = originalText.substring(cutPoint).trim();
                    
                    // Build the HTML with proper structure
                    var htmlContent = firstPart + 
                        "<span class='second-section'>" + secondPart + "</span>" +
                        "<span class='read-more' title='Click to Show More'>" + readMoreTxt + "</span>" +
                        "<span class='read-less' title='Click to Show Less'>" + readLessTxt + "</span>";
                    
                    $element.html(htmlContent);
                    // Ensure it starts in collapsed state
                    $element.addClass('show-less-content').removeClass('show-more-content');
                }
            });
        }

        // Read More and Read Less Click Event binding (using event delegation)
        $(document).on("click", ".read-more, .read-less", function(e) {
            e.preventDefault();
            e.stopPropagation();
            var $container = $(this).closest(".add-read-more");
            if ($container.length) {
                if ($container.hasClass('show-less-content')) {
                    $container.removeClass('show-less-content').addClass('show-more-content');
                } else {
                    $container.removeClass('show-more-content').addClass('show-less-content');
                }
            }
        });

        // Initialize on page load
        AddReadMore();
        
        // Re-initialize after DOM is fully ready
        setTimeout(function() {
            AddReadMore();
        }, 300);
        
        // Also initialize after any dynamic content loads
        $(window).on('load', function() {
            setTimeout(function() {
                AddReadMore();
            }, 100);
        });
    });
</script>

<?php include('includes/footer.php'); ?>
