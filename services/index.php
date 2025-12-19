 <?php include('../includes/header.php'); ?>
<style>
    .add-read-more.show-less-content .second-section,
    .add-read-more.show-less-content .read-less {
        display: none;
    }

    .add-read-more.show-more-content .read-more {
        display: none;
    }

    .add-read-more .read-more,
    .add-read-more .read-less {
        font-weight: bold;
        margin-left: 2px;
        color: #4d02d9;;
        cursor: pointer;
    }

    .add-read-more {
        max-width: 600px;
        width: 100%;
        margin: 0 auto;
    }

    /* Equal height service cards - only affects layout, preserves original design */
    .space-top .row {
        display: flex;
        flex-wrap: wrap;
    }

    .space-top .row > [class*="col-"] {
        display: flex;
        flex-direction: column;
    }

    .space-top .service-style1.layout2 {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .space-top .service-style1.layout2 .service-text {
        flex: 1;
    }

    /* Enhanced theme-aware hover effect - works with existing hover system */
    .service-style1.layout2:hover {
        border-color: var(--theme-color);
    }

    /* .service-style1.layout2:hover .vs-btn {
        color: var(--theme-color);
    } */

    /* Dark mode support for accessibility */
    @media (prefers-color-scheme: dark) {
        .service-style1.layout2:hover {
            box-shadow: 0px 16px 47px rgba(107, 26, 255, 0.3);
        }
    }

    /* Reduced motion support for accessibility */
    @media (prefers-reduced-motion: reduce) {
        .service-style1.layout2,
        .service-style1.layout2 * {
            transition: none !important;
        }
    }

    /* High contrast mode support */
    @media (prefers-contrast: high) {
        .service-style1.layout2 {
            border-width: 2px;
        }

        .service-style1.layout2:hover {
            border-width: 3px;
            outline: 2px solid var(--white-color, #ffffff);
            outline-offset: 2px;
        }
    }
</style>
 <div class="breadcumb-wrapper" data-bg-src="../assets/img/breadcumb/breadcumb-bg.jpg">
     <div class="container z-index-common">
         <div class="breadcumb-content">
             <h1 class="breadcumb-title">Services</h1>
             <div class="breadcumb-menu-wrap">
                 <ul class="breadcumb-menu">
                     <li><a href="index.html">Home</a></li>
                     <li>Services</li>
                 </ul>
             </div>
         </div>
     </div>
 </div>
 <section class="space-top space-extra-bottom">
     <div class="container wow fadeInUp" data-wow-delay="0.2s">
         <div class="row justify-content-center">
             <div class="col-md-6 col-lg-4">
                 <div class="service-style1 layout2">
                     <div class="service-bg" data-bg-src="../assets/img/bg/sr-box-bg-1.jpg"></div>
                     <div class="service-icon"><img src="<?= $app_path ?>assets/img/icon/sr-icon-1-1.png" alt="Features"></div>
                     <h3 class="service-title h5"><a href="service-details.html">ACCOUNTING & BOOKKEEPING</a></h3>
                     <p class="service-text add-read-more show-less-content">Organised accounting services that keep your books accurate, audit-ready and updated. We help you track finances, manage cash flow and make confident business decisions.</p><a href="service-details.html" class="vs-btn style3">Read More<i
                             class="far fa-long-arrow-right"></i></a>
                 </div>
             </div>
             <div class="col-md-6 col-lg-4">
                 <div class="service-style1 layout2">
                     <div class="service-bg" data-bg-src="../assets/img/bg/sr-box-bg-1.jpg"></div>
                     <div class="service-icon"><img src="<?= $app_path ?>assets/img/icon/sr-icon-1-2.png" alt="Features"></div>
                     <h3 class="service-title h5"><a href="service-details.html">VAT & CORPORATE TAX</a></h3>
                     <p class="service-text add-read-more show-less-content">Complete VAT and Corporate Tax services including registration, filing, compliance review and audit preparation ensuring accurate submissions, reduced penalties and full alignment with UAE regulations.</p><a href="service-details.html" class="vs-btn style3">Read More<i
                             class="far fa-long-arrow-right"></i></a>
                 </div>
             </div>
             <div class="col-md-6 col-lg-4">
                 <div class="service-style1 layout2">
                     <div class="service-bg" data-bg-src="../assets/img/bg/sr-box-bg-1.jpg"></div>
                     <div class="service-icon"><img src="<?= $app_path ?>assets/img/icon/sr-icon-1-3.png" alt="Features"></div>
                     <h3 class="service-title h5"><a href="service-details.html">BUSINESS SETUP & LICENSING</a></h3>
                     <p class="service-text add-read-more show-less-content">Fast and hassle-free business setup services, including licensing, renewals and government approvals ensuring your company stays compliant and legally active with RAK DED.</p><a href="service-details.html" class="vs-btn style3">Read More<i
                             class="far fa-long-arrow-right"></i></a>
                 </div>
             </div>
             <div class="col-md-6 col-lg-4">
                 <div class="service-style1 layout2">
                     <div class="service-bg" data-bg-src="../assets/img/bg/sr-box-bg-1.jpg"></div>
                     <div class="service-icon"><img src="<?= $app_path ?>assets/img/icon/sr-icon-1-4.png" alt="Features"></div>
                     <h3 class="service-title h5"><a href="service-details.html">VISA & IMMIGRATION</a></h3>
                     <p class="service-text add-read-more show-less-content">Complete visa and residency support, including applications, renewals, status changes, Emirates ID, medical tests, and immigration assistance ensuring accurate documents and timely processing.</p><a href="service-details.html" class="vs-btn style3">Read More<i
                             class="far fa-long-arrow-right"></i></a>
                 </div>
             </div>
             <div class="col-md-6 col-lg-4">
                 <div class="service-style1 layout2">
                     <div class="service-bg" data-bg-src="../assets/img/bg/sr-box-bg-1.jpg"></div>
                     <div class="service-icon"><img src="<?= $app_path ?>assets/img/icon/sr-icon-1-5.png" alt="Features"></div>
                     <h3 class="service-title h5"><a href="service-details.html">TYPING & DOCUMENT </a></h3>
                     <p class="service-text add-read-more show-less-content">Accurate typing and preparation of government and business documents, including visa forms, labour applications, NOCs, agreements, attestation support, translations, and printing services.</p><a href="service-details.html" class="vs-btn style3">Read More<i
                             class="far fa-long-arrow-right"></i></a>
                 </div>
             </div>
             <div class="col-md-6 col-lg-4">
                 <div class="service-style1 layout2">
                     <div class="service-bg" data-bg-src="../assets/img/bg/sr-box-bg-1.jpg"></div>
                     <div class="service-icon"><img src="<?= $app_path ?>assets/img/icon/sr-icon-1-6.png" alt="Features"></div>
                     <h3 class="service-title h5"><a href="service-details.html">MUNICIPALITY & LABOUR</a></h3>
                     <p class="service-text add-read-more show-less-content">Comprehensive support for labour approvals, work permits, establishment setup, and municipality documentation, ensuring compliance and smooth processing of all local requirements.</p><a href="service-details.html" class="vs-btn style3">Read More<i
                             class="far fa-long-arrow-right"></i></a>
                 </div>
             </div>
             <div class="col-md-6 col-lg-4">
                 <div class="service-style1 layout2">
                     <div class="service-bg" data-bg-src="../assets/img/bg/sr-box-bg-1.jpg"></div>
                     <div class="service-icon"><img src="<?= $app_path ?>assets/img/icon/sr-icon-1-6.png" alt="Features"></div>
                     <h3 class="service-title h5"><a href="service-details.html">PRO & GOVERNMENT</a></h3>
                     <p class="service-text add-read-more show-less-content">Fast and reliable government liaison support, handling document clearances, approvals, NOCs, coordination with authorities, payments, and appointment scheduling to ensure smooth and timely processing.</p><a href="service-details.html" class="vs-btn style3">Read More<i
                             class="far fa-long-arrow-right"></i></a>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <?php include('../includes/footer.php'); ?>
 <script>
     $(document).ready(function() {
         function AddReadMore() {
             //This limit you can set after how much characters you want to show Read More.
             var carLmt = 100;
             // Text to show when text is collapsed
             var readMoreTxt = " ...";
             // Text to show when text is expanded
             var readLessTxt = " read less";


             //Traverse all selectors with this class and manupulate HTML part to show Read More
             $(".add-read-more").each(function() {
                 if ($(this).find(".first-section").length)
                     return;

                 var allstr = $(this).text();
                 if (allstr.length > carLmt) {
                     var firstSet = allstr.substring(0, carLmt);
                     var secdHalf = allstr.substring(carLmt, allstr.length);
                     var strtoadd = firstSet + "<span class='second-section'>" + secdHalf + "</span><span class='read-more'  title='Click to Show More'>" + readMoreTxt + "</span><span class='read-less' title='Click to Show Less'>" + readLessTxt + "</span>";
                     $(this).html(strtoadd);
                 }
             });

             //Read More and Read Less Click Event binding
             $(document).on("click", ".read-more,.read-less", function() {
                 $(this).closest(".add-read-more").toggleClass("show-less-content show-more-content");
             });
         }

         AddReadMore();
     });
 </script>