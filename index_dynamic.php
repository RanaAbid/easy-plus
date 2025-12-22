<?php 
include('includes/header.php');
include('includes/dbcode.php');
include('includes/functions.php');

// Load all data
$sliders = getSliders($link);
$features = getFeatures($link);
$services = getServices($link);
$about = getAboutSection($link);
$processItems = getProcessItems($link);
$skills = getSkills($link);
$faqSection = getFAQSection($link);
$faqItems = getFAQItems($link);
$cta = getCTASection($link);
?>

<section class="vs-hero-wrapper position-relative">
    <div class="vs-hero-carousel" data-height="850" data-container="1900" data-slidertype="responsive">
        <?php if (!empty($sliders)): ?>
            <?php foreach ($sliders as $index => $slider): ?>
            <div class="ls-slide" data-ls="duration:12000; transition2d:5; kenburnszoom:<?= $index % 2 == 0 ? 'in' : 'out' ?>; kenburnsscale:1.1;">
                <?php if ($slider['image_desktop']): ?>
                <img width="1920" height="850" src="<?= $app_path ?>assets/img/hero/<?= htmlspecialchars($slider['image_desktop']) ?>" 
                     class="ls-bg" alt="<?= htmlspecialchars($slider['alt_text'] ?: $slider['heading']) ?>" 
                     loading="<?= $index === 0 ? 'eager' : 'lazy' ?>" 
                     decoding="async" 
                     <?= $index === 0 ? 'fetchpriority="high"' : '' ?>>
                <?php endif; ?>
                
                <!-- Desktop View -->
                <?php if ($slider['tagline']): ?>
                <p style="top:240px; left:340px;" class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer hero-layer-base hero-text-badge" 
                   data-ls="offsetxin:300; durationin:1500; delayin:400; easingin:easeOutQuint; offsetxout:300; durationout:1500; easingout:easeOutQuint;">
                   <?= htmlspecialchars($slider['tagline']) ?>
                </p>
                <?php endif; ?>
                
                <h1 style="top:305px; left:345px; font-weight:700; font-size:60px;" 
                    class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer hero-layer-base hero-title" 
                    data-ls="offsetxin:-200; durationin:1500; delayin:200; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint;">
                    <?= htmlspecialchars($slider['heading']) ?>
                </h1>
                
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
                
                <h1 style="top:280px; left:80px; font-weight:700; font-size:80px; color:#ffffff; font-family:Exo;" 
                    class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer" 
                    data-ls="offsetxin:-200; durationin:1500; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint; position:relative;">
                    <?= htmlspecialchars($slider['heading']) ?>
                </h1>
                
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
                <h1 style="top:120px; left:50%; text-align:center; font-weight:700; font-size:130px; color:#ffffff; font-family:Exo; width:10000px;" 
                    class="ls-l ls-hide-desktop ls-hide-tablet ls-text-layer" 
                    data-ls="offsetxin:-200; durationin:1500; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint; position:relative;">
                    <?= htmlspecialchars($slider['heading']) ?>
                </h1>
                
                <div style="top:520px; left:50%; text-align:center; font-size:24px; width:1000px;" 
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

<div data-bg-src="assets/img/bg/ab-bg-1-1.jpg">
    <section class="feature-wrap1 space-top space-extra-bottom">
        <div class="container wow fadeInUp" data-wow-delay="0.2s">
            <div class="row vs-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2">
                <?php if (!empty($features)): ?>
                    <?php foreach ($features as $feature): ?>
                    <div class="col-xl-4">
                        <div class="feature-style1">
                            <?php if ($feature['icon']): ?>
                            <div class="feature-icon">
                                <img src="<?= $app_path ?>assets/img/icon/<?= htmlspecialchars($feature['icon']) ?>" 
                                     alt="<?= htmlspecialchars($feature['title']) ?>" 
                                     loading="lazy" decoding="async">
                            </div>
                            <?php endif; ?>
                            <h3 class="feature-title h5">
                                <a class="text-inherit" href="<?= htmlspecialchars($feature['link_url'] ?: '#') ?>">
                                    <?= htmlspecialchars($feature['title']) ?>
                                </a>
                            </h3>
                            <?php if ($feature['description']): ?>
                            <p class="feature-text"><?= htmlspecialchars($feature['description']) ?></p>
                            <?php endif; ?>
                            <?php if ($feature['link_url']): ?>
                            <a href="<?= htmlspecialchars($feature['link_url']) ?>" class="vs-btn style3">
                                <?= htmlspecialchars($feature['link_text'] ?: 'Read More') ?><i class="far fa-long-arrow-right"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
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
                        <?php if ($about['image_1']): ?>
                        <div class="img-1">
                            <img src="<?= $app_path ?>assets/img/about/<?= htmlspecialchars($about['image_1']) ?>" 
                                 alt="About" loading="lazy" decoding="async">
                        </div>
                        <?php endif; ?>
                        <?php if ($about['image_2']): ?>
                        <div class="img-2">
                            <img src="<?= $app_path ?>assets/img/about/<?= htmlspecialchars($about['image_2']) ?>" 
                                 alt="About" loading="lazy" decoding="async">
                            <?php if ($about['video_url']): ?>
                            <a class="play-btn style2 position-center popup-video" href="<?= htmlspecialchars($about['video_url']) ?>">
                                <i class="fas fa-play"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-7 align-self-center wow fadeInUp" data-wow-delay="0.3s">
                    <?php if ($about['subtitle']): ?>
                    <span class="sec-subtitle"><i class="fas fa-bring-forward"></i><?= htmlspecialchars($about['subtitle']) ?></span>
                    <?php endif; ?>
                    <h2 class="sec-title h1"><?= htmlspecialchars($about['title']) ?></h2>
                    <?php if ($about['description']): ?>
                    <p class="mb-4 mt-1 pb-3"><?= htmlspecialchars($about['description']) ?></p>
                    <?php endif; ?>
                    <?php if ($about['call_number']): ?>
                    <div class="call-media">
                        <div class="call-media__icon"><img src="<?= $app_path ?>assets/img/icon/tel-1-1.png" alt="icon" loading="lazy"></div>
                        <div class="media-body">
                            <span class="call-media__label">24 HOURS SERVICE AVAILABLE</span>
                            <p class="call-media__info">Call Us: <a href="tel:<?= htmlspecialchars($about['call_number']) ?>"><?= htmlspecialchars($about['call_number']) ?></a></p>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if ($about['button_url']): ?>
                    <a href="<?= htmlspecialchars($about['button_url']) ?>" class="vs-btn">
                        <?= htmlspecialchars($about['button_text'] ?: 'About Us') ?><i class="far fa-long-arrow-right"></i>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
</div>

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
                <?php foreach ($services as $service): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="service-style1">
                        <?php if ($service['background_image']): ?>
                        <div class="service-bg" data-bg-src="<?= $app_path ?>assets/img/bg/<?= htmlspecialchars($service['background_image']) ?>"></div>
                        <?php endif; ?>
                        <?php if ($service['icon']): ?>
                        <div class="service-icon">
                            <img src="<?= $app_path ?>assets/img/icon/<?= htmlspecialchars($service['icon']) ?>" 
                                 alt="<?= htmlspecialchars($service['title']) ?>" 
                                 loading="lazy" decoding="async">
                        </div>
                        <?php endif; ?>
                        <h3 class="service-title h5">
                            <a href="<?= htmlspecialchars($service['link_url'] ?: '#') ?>"><?= htmlspecialchars($service['title']) ?></a>
                        </h3>
                        <?php if ($service['description']): ?>
                        <p class="service-text"><?= htmlspecialchars($service['description']) ?></p>
                        <?php endif; ?>
                        <?php if ($service['link_url']): ?>
                        <a href="<?= htmlspecialchars($service['link_url']) ?>" class="vs-btn style3">
                            <?= htmlspecialchars($service['link_text'] ?: 'Read More') ?><i class="far fa-long-arrow-right"></i>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
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

<?php if ($cta): ?>
<section class="z-index-common space" data-bg-src="<?= $app_path ?>assets/img/bg/cta-bg-1-1.jpg">
    <div class="container">
        <div class="row text-center text-lg-start align-items-center justify-content-between">
            <div class="col-lg-auto">
                <?php if ($cta['subtitle']): ?>
                <span class="sec-subtitle text-white"><?= htmlspecialchars($cta['subtitle']) ?></span>
                <?php endif; ?>
                <h2 class="h1 sec-title cta-title1"><?= htmlspecialchars($cta['title']) ?></h2>
            </div>
            <?php if ($cta['button_url']): ?>
            <div class="col-lg-auto">
                <a href="<?= htmlspecialchars($cta['button_url']) ?>" class="vs-btn">
                    <?= htmlspecialchars($cta['button_text'] ?: 'Get A Quote') ?><i class="far fa-arrow-right"></i>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

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
            <?php foreach ($processItems as $index => $item): ?>
            <div class="col-sm-6 col-lg-3 process-style1">
                <?php if ($index < count($processItems) - 1): ?>
                <div class="process-arrow">
                    <img src="<?= $app_path ?>assets/img/icon/process-arrow-1-1.png" alt="arrow" loading="lazy">
                </div>
                <?php endif; ?>
                <div class="process-icon">
                    <?php if ($item['icon']): ?>
                    <img src="<?= $app_path ?>assets/img/icon/<?= htmlspecialchars($item['icon']) ?>" alt="icon" loading="lazy">
                    <?php endif; ?>
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

<?php include('includes/footer.php'); ?>

