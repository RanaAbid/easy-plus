   <?php include('includes/header.php'); ?>
   <style>
       /* Equal height cards */
       .feature-style1 {
           height: 100%;
           display: flex;
           flex-direction: column;
       }

       /* Text with animation */
       .feature-text {
           display: inline;
           transition: all 0.3s ease;
       }

       .feature-text.fade-slide {
           opacity: 0;
           transform: translateY(-5px);
       }

       .feature-text.fade-slide.show {
           opacity: 1;
           transform: translateY(0);
       }

       /* Icon inline after ... */
       .toggle-wrap {
           display: inline-flex;
           align-items: center;
           margin-left: 6px;
           cursor: pointer;
           vertical-align: middle;
       }

       /* Circle icon */
       .toggle-circle {
           width: 18px;
           height: 18px;
           border-radius: 50%;
           border: 2px solid #7A5FF5;
           /* Purple */
           color: #7A5FF5;
           display: flex;
           align-items: center;
           justify-content: center;
           transition: 0.3s;
           font-size: 12px;
       }

       /* Hover effect */
       .toggle-circle:hover {
           background: #7A5FF5;
           color: #fff;
       }

       /* Rotate animation */
       .toggle-circle.rotate {
           transform: rotate(180deg);
       }
   </style>
   <section class="vs-hero-wrapper position-relative">
       <div class="vs-hero-carousel" data-height="850" data-container="1900" data-slidertype="responsive">
           <div class="ls-slide" data-ls="duration:12000; transition2d:5; kenburnszoom:in; kenburnsscale:1.1;"><img width="1920" height="850" src="<?= $app_path ?>assets/img/hero/hero-1-1.jpg" class="ls-bg" alt="hero-bg">
               <div style="font-size:36px; color:#000; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; border-style:solid; border-color:#000; background-position:0% 0%; background-repeat:no-repeat; width:300px; height:1558px; background-color:rgba(14, 84, 245, 0.5); top:-473px; left:51px;" class="ls-l ls-text-layer d-hd-none" data-ls="offsetxin:-800; offsetyin:-800; durationin:1700; delayin:1200; easingin:easeOutQuint; rotatein:43.46; offsetxout:1200; offsetyout:1200; durationout:8000; startatout:slidechangeonly + 3000; easingout:easeOutQuint; scaleyout:5; rotation:43.46;"></div>
               <div style="font-size:36px; color:#000; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; border-style:solid; border-color:#000; background-position:0% 0%; background-repeat:no-repeat; width:589px; height:1819.7px; top:-485px; left:406px; background:linear-gradient(172deg, rgba(5, 26, 79, 0.35) 21%, rgba(0, 0, 0, 0) 54%);" class="ls-l ls-text-layer d-hd-none" data-ls="offsetxin:-800; offsetyin:-800; durationin:1500; delayin:1300; easingin:easeOutQuint; rotatein:43.46; offsetxout:1200; offsetyout:1200; durationout:8000; startatout:slidechangeonly + 3000; easingout:easeOutQuint; scaleyout:5; bgcolorout:transparent; colorout:transparent; rotation:43.46;"></div>
               <p style="font-size:18px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:600; letter-spacing:0px; border-style:solid; background-position:0% 0%; background-repeat:no-repeat; font-family:Exo; color:#ffffff; border-width:2px 2px 2px 2px; border-color:#ffffff; border-radius:5px 5px 5px 5px; padding-top:9px; padding-right:23.5px; padding-left:23.5px; top:240px; left:340px; padding-bottom:9px;" class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer" data-ls="offsetxin:300; durationin:1500; delayin:400; easingin:easeOutQuint; offsetxout:300; durationout:1500; easingout:easeOutQuint;">ACCOUNTING & BOOKKEEPING</p>
               <h1 style="top:305px; left:345px; font-weight:700; background-size:inherit; background-position:inherit; font-size:60px; font-family:Exo; color:#ffffff; text-transform:none; border-style:solid; border-color:#000; background-color:transparent; background-repeat:no-repeat; cursor:auto;" class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer" data-ls="offsetxin:-200; durationin:1500; delayin:200; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint;">ACCOUNTING &amp; SOLUTIONS 2025</h1>
               <div style="top:405px; left:350px; background-size:inherit; background-position:inherit; font-size:16px; line-height:28px; font-family:Fira Sans; width:695px; color:#ffffff; white-space:normal;" class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer" data-ls="offsetyin:50; durationin:1500; delayin:600; easingin:easeOutQuint; offsetyout:50; durationout:1500; easingout:easeOutQuint; position:relative;">We provide organised accounting, bookkeeping, financial reporting, cash flow monitoring, bank reconciliation, and audit-ready solutions for better business decisions.</div>
               <div style="top:495px; left:350px; background-size:inherit; background-position:inherit; font-size:24px;" class="ls-l ls-hide-tablet ls-hide-phone ls-html-layer" data-ls="offsetyin:50; durationin:1500; delayin:900; easingin:easeOutQuint; offsetyout:50; durationout:1500; easingout:easeOutQuint; position:relative;">
                   <div class="ls-btn-group"><a href="<?= $app_path ?>" class="vs-btn ls-hero-btn">ABOUT US<i class="far fa-arrow-right"></i></a> <a href="blog.html" class="vs-btn style2 ls-hero-btn">READ MORE<i class="far fa-arrow-right"></i></a></div>
               </div>
               <p style="font-size:32px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:600; letter-spacing:0px; border-style:solid; background-position:0% 0%; background-repeat:no-repeat; font-family:Exo; color:#ffffff; border-width:2px 2px 2px 2px; border-color:#ffffff; border-radius:5px 5px 5px 5px; padding-top:18px; padding-right:44px; padding-left:44px; top:160px; left:90px; padding-bottom:18px;" class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer" data-ls="offsetxin:300; durationin:1500; delayin:400; easingin:easeOutQuint; offsetxout:300; durationout:1500; easingout:easeOutQuint;">WE HAVE TOP IT EXPERT</p>
               <h1 style="top:280px; left:80px; font-weight:700; background-size:inherit; background-position:inherit; font-size:80px; color:#ffffff; font-family:Exo;" class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer" data-ls="offsetxin:-200; durationin:1500; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint; position:relative;">BEST IT SERVICE &amp;</h1>
               <h1 style="top:380px; left:80px; font-weight:700; background-size:inherit; background-position:inherit; font-size:80px; font-family:Exo; color:#ffffff; text-transform:none; border-style:solid; border-color:#000; background-color:transparent; background-repeat:no-repeat; cursor:auto;" class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer" data-ls="offsetxin:-200; durationin:1500; delayin:200; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint;">SOLUTION 2022</h1>
               <div style="top:540px; left:80px; background-size:inherit; background-position:inherit; font-size:24px;" class="ls-l ls-hide-desktop ls-hide-phone ls-html-layer" data-ls="offsetyin:50; durationin:1500; delayin:900; easingin:easeOutQuint; offsetyout:50; durationout:1500; easingout:easeOutQuint; position:relative;">
                   <div class="ls-btn-group"><a href="<?= $app_path ?>" class="vs-btn ls-hero-btn">ABOUT US<i class="far fa-arrow-right"></i></a> <a href="blog.html" class="vs-btn style2 ls-hero-btn">READ MORE<i class="far fa-arrow-right"></i></a></div>
               </div>
               <h1 style="top:120px; left:50%; text-align:center; font-weight:700; background-size:inherit; background-position:inherit; font-size:130px; color:#ffffff; font-family:Exo; width:10000px;" class="ls-l ls-hide-desktop ls-hide-tablet ls-text-layer" data-ls="offsetxin:-200; durationin:1500; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint; position:relative;">BEST IT SERVICE &amp;</h1>
               <h1 style="top:280px; left:50%; text-align:center; font-weight:700; background-size:inherit; background-position:inherit; font-size:130px; font-family:Exo; color:#ffffff; width:10000px; text-transform:none; border-style:solid; border-color:#000; background-color:transparent; background-repeat:no-repeat; cursor:auto;" class="ls-l ls-hide-desktop ls-hide-tablet ls-text-layer" data-ls="offsetxin:-200; durationin:1500; delayin:200; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint;">SOLUTION 2022</h1>
               <div style="top:520px; left:50%; text-align:center; background-size:inherit; background-position:inherit; font-size:24px; width:1000px;" class="ls-l ls-hide-desktop ls-hide-tablet ls-html-layer" data-ls="offsetyin:50; durationin:1500; delayin:900; easingin:easeOutQuint; offsetyout:50; durationout:1500; easingout:easeOutQuint; position:relative;">
                   <div class="ls-btn-group"><a href="<?= $app_path ?>" class="vs-btn ls-hero-btn">ABOUT US<i class="far fa-arrow-right"></i></a> <a href="blog.html" class="vs-btn style2 ls-hero-btn">READ MORE<i class="far fa-arrow-right"></i></a></div>
               </div><a class="ls-l ls-hide-tablet ls-hide-phone" href="#next" target="_self" data-ls="static:forever;">
                   <div style="font-size:36px; color:#000; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; border-style:solid; border-color:#000; background-position:0% 0%; background-repeat:no-repeat; left:1685px; top:50%;" class="ls-html-layer"><span class="icon-btn style2"><i class="far fa-arrow-right"></i></span></div>
               </a><a class="ls-l ls-hide-tablet ls-hide-phone" href="#prev" target="_self" data-ls="static:forever;">
                   <div style="font-size:36px; color:#000; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; border-style:solid; border-color:#000; background-position:0% 0%; background-repeat:no-repeat; left:150px; top:50%;" class="ls-html-layer"><span class="icon-btn style2"><i class="far fa-arrow-left"></i></span></div>
               </a>
           </div>
           <div class="ls-slide" data-ls="duration:12000; transition2d:5; kenburnszoom:out; kenburnsscale:1.1;"><img width="1920" height="850" src="<?= $app_path ?>assets/img/hero/hero-1-2.jpg" class="ls-bg" alt="hero-bg">
               <div style="font-size:36px; color:#000; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; border-style:solid; border-color:#000; background-position:0% 0%; background-repeat:no-repeat; width:300px; height:1558px; background-color:rgba(14, 84, 245, 0.5); top:-473px; left:51px;" class="ls-l ls-text-layer d-hd-none" data-ls="offsetxin:-800; offsetyin:-800; durationin:1700; delayin:1200; easingin:easeOutQuint; rotatein:43.46; offsetxout:1200; offsetyout:1200; durationout:8000; startatout:slidechangeonly + 3000; easingout:easeOutQuint; scaleyout:5; rotation:43.46;"></div>
               <div style="font-size:36px; color:#000; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; border-style:solid; border-color:#000; background-position:0% 0%; background-repeat:no-repeat; width:589px; height:1819.7px; top:-485px; left:406px; background:linear-gradient(172deg, rgba(5, 26, 79, 0.35) 21%, rgba(0, 0, 0, 0) 54%);" class="ls-l ls-text-layer d-hd-none" data-ls="offsetxin:-800; offsetyin:-800; durationin:1500; delayin:1300; easingin:easeOutQuint; rotatein:43.46; offsetxout:1200; offsetyout:1200; durationout:8000; startatout:slidechangeonly + 3000; easingout:easeOutQuint; scaleyout:5; bgcolorout:transparent; colorout:transparent; rotation:43.46;"></div>
               <p style="font-size:18px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:600; letter-spacing:0px; border-style:solid; background-position:0% 0%; background-repeat:no-repeat; font-family:Exo; color:#ffffff; border-width:2px 2px 2px 2px; border-color:#ffffff; border-radius:5px 5px 5px 5px; padding-top:9px; padding-right:23.5px; padding-left:23.5px; top:240px; left:558px; padding-bottom:9px;" class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer" data-ls="offsetxin:300; durationin:1500; delayin:400; easingin:easeOutQuint; offsetxout:300; durationout:1500; easingout:easeOutQuint;">PROVIDE FREE CONSULTATION</p>
               <h1 style="top:225px; left:345px; font-weight:700; background-size:inherit; background-position:inherit; font-size:60px; color:#ffffff; font-family:Exo;" class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer" data-ls="offsetxin:-200; durationin:1500; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint; position:relative;">TOP IT</h1>
               <h1 style="top:305px; left:345px; font-weight:700; background-size:inherit; background-position:inherit; font-size:60px; font-family:Exo; color:#ffffff; text-transform:none; border-style:solid; border-color:#000; background-color:transparent; background-repeat:no-repeat; cursor:auto;" class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer" data-ls="offsetxin:-200; durationin:1500; delayin:200; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint;">SUPPORT &amp; MANAGEMNT</h1>
               <div style="top:405px; left:350px; background-size:inherit; background-position:inherit; font-size:16px; line-height:28px; font-family:Fira Sans; width:695px; color:#ffffff; white-space:normal;" class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer" data-ls="offsetyin:50; durationin:1500; delayin:600; easingin:easeOutQuint; offsetyout:50; durationout:1500; easingout:easeOutQuint; position:relative;">Professionally repurpose intuitive total linkage after timely mindshare. Credibly coordinate reliable collaboration and idea-sharing after turnkey catalysts for change.</div>
               <div style="top:495px; left:350px; background-size:inherit; background-position:inherit; font-size:24px;" class="ls-l ls-hide-tablet ls-hide-phone ls-html-layer" data-ls="offsetyin:50; durationin:1500; delayin:900; easingin:easeOutQuint; offsetyout:50; durationout:1500; easingout:easeOutQuint; position:relative;">
                   <div class="ls-btn-group"><a href="<?= $app_path ?>" class="vs-btn ls-hero-btn">ABOUT US<i class="far fa-arrow-right"></i></a> <a href="blog.html" class="vs-btn style2 ls-hero-btn">READ MORE<i class="far fa-arrow-right"></i></a></div>
               </div>
               <p style="font-size:32px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:600; letter-spacing:0px; border-style:solid; background-position:0% 0%; background-repeat:no-repeat; font-family:Exo; color:#ffffff; border-width:2px 2px 2px 2px; border-color:#ffffff; border-radius:5px 5px 5px 5px; padding-top:18px; padding-right:44px; padding-left:44px; top:160px; left:90px; padding-bottom:18px;" class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer" data-ls="offsetxin:300; durationin:1500; delayin:400; easingin:easeOutQuint; offsetxout:300; durationout:1500; easingout:easeOutQuint;">PROVIDE FREE CONSULTATION</p>
               <h1 style="top:280px; left:80px; font-weight:700; background-size:inherit; background-position:inherit; font-size:80px; color:#ffffff; font-family:Exo;" class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer" data-ls="offsetxin:-200; durationin:1500; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint; position:relative;">TOP IT SUPPORT</h1>
               <h1 style="top:380px; left:80px; font-weight:700; background-size:inherit; background-position:inherit; font-size:80px; font-family:Exo; color:#ffffff; text-transform:none; border-style:solid; border-color:#000; background-color:transparent; background-repeat:no-repeat; cursor:auto;" class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer" data-ls="offsetxin:-200; durationin:1500; delayin:200; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint;">&amp; MANAGEMNT</h1>
               <div style="top:540px; left:80px; background-size:inherit; background-position:inherit; font-size:24px;" class="ls-l ls-hide-desktop ls-hide-phone ls-html-layer" data-ls="offsetyin:50; durationin:1500; delayin:900; easingin:easeOutQuint; offsetyout:50; durationout:1500; easingout:easeOutQuint; position:relative;">
                   <div class="ls-btn-group"><a href="<?= $app_path ?>" class="vs-btn ls-hero-btn">ABOUT US<i class="far fa-arrow-right"></i></a> <a href="blog.html" class="vs-btn style2 ls-hero-btn">READ MORE<i class="far fa-arrow-right"></i></a></div>
               </div>
               <h1 style="top:120px; left:50%; text-align:center; font-weight:700; background-size:inherit; background-position:inherit; font-size:130px; color:#ffffff; font-family:Exo; width:10000px;" class="ls-l ls-hide-desktop ls-hide-tablet ls-text-layer" data-ls="offsetxin:-200; durationin:1500; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint; position:relative;">TOP IT SUPPORT</h1>
               <h1 style="top:280px; left:50%; text-align:center; font-weight:700; background-size:inherit; background-position:inherit; font-size:130px; font-family:Exo; color:#ffffff; width:10000px; text-transform:none; border-style:solid; border-color:#000; background-color:transparent; background-repeat:no-repeat; cursor:auto;" class="ls-l ls-hide-desktop ls-hide-tablet ls-text-layer" data-ls="offsetxin:-200; durationin:1500; delayin:200; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint;">&amp; MANAGEMNT</h1>
               <div style="top:520px; left:50%; text-align:center; background-size:inherit; background-position:inherit; font-size:24px; width:1000px;" class="ls-l ls-hide-desktop ls-hide-tablet ls-html-layer" data-ls="offsetyin:50; durationin:1500; delayin:900; easingin:easeOutQuint; offsetyout:50; durationout:1500; easingout:easeOutQuint; position:relative;">
                   <div class="ls-btn-group"><a href="<?= $app_path ?>" class="vs-btn ls-hero-btn">ABOUT US<i class="far fa-arrow-right"></i></a> <a href="blog.html" class="vs-btn style2 ls-hero-btn">READ MORE<i class="far fa-arrow-right"></i></a></div>
               </div>
           </div>
           <div class="ls-slide" data-ls="duration:12000; transition2d:5; kenburnszoom:in; kenburnsscale:1.1;"><img width="1920" height="850" src="<?= $app_path ?>assets/img/hero/hero-1-3.jpg" class="ls-bg" alt="hero-bg">
               <div style="font-size:36px; color:#000; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; border-style:solid; border-color:#000; background-position:0% 0%; background-repeat:no-repeat; width:300px; height:1558px; background-color:rgba(14, 84, 245, 0.5); top:-473px; left:51px;" class="ls-l ls-text-layer d-hd-none" data-ls="offsetxin:-800; offsetyin:-800; durationin:1700; delayin:1200; easingin:easeOutQuint; rotatein:43.46; offsetxout:1200; offsetyout:1200; durationout:8000; startatout:slidechangeonly + 3000; easingout:easeOutQuint; scaleyout:5; rotation:43.46;"></div>
               <div style="font-size:36px; color:#000; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; border-style:solid; border-color:#000; background-position:0% 0%; background-repeat:no-repeat; width:589px; height:1819.7px; top:-485px; left:406px; background:linear-gradient(172deg, rgba(5, 26, 79, 0.35) 21%, rgba(0, 0, 0, 0) 54%);" class="ls-l ls-text-layer d-hd-none" data-ls="offsetxin:-800; offsetyin:-800; durationin:1500; delayin:1300; easingin:easeOutQuint; rotatein:43.46; offsetxout:1200; offsetyout:1200; durationout:8000; startatout:slidechangeonly + 3000; easingout:easeOutQuint; scaleyout:5; bgcolorout:transparent; colorout:transparent; rotation:43.46;"></div>
               <p style="font-size:18px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:600; letter-spacing:0px; border-style:solid; background-position:0% 0%; background-repeat:no-repeat; font-family:Exo; color:#ffffff; border-width:2px 2px 2px 2px; border-color:#ffffff; border-radius:5px 5px 5px 5px; padding-top:9px; padding-right:23.5px; padding-left:23.5px; top:240px; left:635px; padding-bottom:9px;" class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer" data-ls="offsetxin:300; durationin:1500; delayin:400; easingin:easeOutQuint; offsetxout:300; durationout:1500; easingout:easeOutQuint;">HIGHLY QUALIFIYED ENGINERS</p>
               <h1 style="top:225px; left:345px; font-weight:700; background-size:inherit; background-position:inherit; font-size:60px; color:#ffffff; font-family:Exo;" class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer" data-ls="offsetxin:-200; durationin:1500; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint; position:relative;">TEAM OF</h1>
               <h1 style="top:305px; left:345px; font-weight:700; background-size:inherit; background-position:inherit; font-size:60px; font-family:Exo; color:#ffffff; text-transform:none; border-style:solid; border-color:#000; background-color:transparent; background-repeat:no-repeat; cursor:auto;" class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer" data-ls="offsetxin:-200; durationin:1500; delayin:200; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint;">LEGENDS &amp; PRO ENGINERS</h1>
               <div style="top:405px; left:350px; background-size:inherit; background-position:inherit; font-size:16px; line-height:28px; font-family:Fira Sans; width:695px; color:#ffffff; white-space:normal;" class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer" data-ls="offsetyin:50; durationin:1500; delayin:600; easingin:easeOutQuint; offsetyout:50; durationout:1500; easingout:easeOutQuint; position:relative;">Professionally repurpose intuitive total linkage after timely mindshare. Credibly coordinate reliable collaboration and idea-sharing after turnkey catalysts for change.</div>
               <div style="top:495px; left:350px; background-size:inherit; background-position:inherit; font-size:24px;" class="ls-l ls-hide-tablet ls-hide-phone ls-html-layer" data-ls="offsetyin:50; durationin:1500; delayin:900; easingin:easeOutQuint; offsetyout:50; durationout:1500; easingout:easeOutQuint; position:relative;">
                   <div class="ls-btn-group"><a href="<?= $app_path ?>" class="vs-btn ls-hero-btn">ABOUT US<i class="far fa-arrow-right"></i></a> <a href="blog.html" class="vs-btn style2 ls-hero-btn">READ MORE<i class="far fa-arrow-right"></i></a></div>
               </div>
               <p style="font-size:32px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:600; letter-spacing:0px; border-style:solid; background-position:0% 0%; background-repeat:no-repeat; font-family:Exo; color:#ffffff; border-width:2px 2px 2px 2px; border-color:#ffffff; border-radius:5px 5px 5px 5px; padding-top:18px; padding-right:44px; padding-left:44px; top:160px; left:90px; padding-bottom:18px;" class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer" data-ls="offsetxin:300; durationin:1500; delayin:400; easingin:easeOutQuint; offsetxout:300; durationout:1500; easingout:easeOutQuint;">HIGHLY QUALIFIYED ENGINERS</p>
               <h1 style="top:280px; left:80px; font-weight:700; background-size:inherit; background-position:inherit; font-size:80px; color:#ffffff; font-family:Exo;" class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer" data-ls="offsetxin:-200; durationin:1500; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint; position:relative;">TEAM OF LEGENDS &amp;</h1>
               <h1 style="top:380px; left:80px; font-weight:700; background-size:inherit; background-position:inherit; font-size:80px; font-family:Exo; color:#ffffff; text-transform:none; border-style:solid; border-color:#000; background-color:transparent; background-repeat:no-repeat; cursor:auto;" class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer" data-ls="offsetxin:-200; durationin:1500; delayin:200; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint;">PRO ENGINERS</h1>
               <div style="top:540px; left:80px; background-size:inherit; background-position:inherit; font-size:24px;" class="ls-l ls-hide-desktop ls-hide-phone ls-html-layer" data-ls="offsetyin:50; durationin:1500; delayin:900; easingin:easeOutQuint; offsetyout:50; durationout:1500; easingout:easeOutQuint; position:relative;">
                   <div class="ls-btn-group"><a href="<?= $app_path ?>" class="vs-btn ls-hero-btn">ABOUT US<i class="far fa-arrow-right"></i></a> <a href="blog.html" class="vs-btn style2 ls-hero-btn">READ MORE<i class="far fa-arrow-right"></i></a></div>
               </div>
               <h1 style="top:120px; left:50%; text-align:center; font-weight:700; background-size:inherit; background-position:inherit; font-size:130px; color:#ffffff; font-family:Exo; width:10000px;" class="ls-l ls-hide-desktop ls-hide-tablet ls-text-layer" data-ls="offsetxin:-200; durationin:1500; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint; position:relative;">TEAM OF LEGENDS &amp;</h1>
               <h1 style="top:280px; left:50%; text-align:center; font-weight:700; background-size:inherit; background-position:inherit; font-size:130px; font-family:Exo; color:#ffffff; width:10000px; text-transform:none; border-style:solid; border-color:#000; background-color:transparent; background-repeat:no-repeat; cursor:auto;" class="ls-l ls-hide-desktop ls-hide-tablet ls-text-layer" data-ls="offsetxin:-200; durationin:1500; delayin:200; easingin:easeOutQuint; offsetxout:-100; durationout:1500; easingout:easeOutQuint;">PRO ENGINERS</h1>
               <div style="top:520px; left:50%; text-align:center; background-size:inherit; background-position:inherit; font-size:24px; width:1000px;" class="ls-l ls-hide-desktop ls-hide-tablet ls-html-layer" data-ls="offsetyin:50; durationin:1500; delayin:900; easingin:easeOutQuint; offsetyout:50; durationout:1500; easingout:easeOutQuint; position:relative;">
                   <div class="ls-btn-group"><a href="<?= $app_path ?>" class="vs-btn ls-hero-btn">ABOUT US<i class="far fa-arrow-right"></i></a> <a href="blog.html" class="vs-btn style2 ls-hero-btn">READ MORE<i class="far fa-arrow-right"></i></a></div>
               </div>
           </div>
       </div>
   </section>
   <div data-bg-src="<?= $app_path ?>assets/img/bg/ab-bg-1-1.jpg">
       <section class="feature-wrap1 space-top space-extra-bottom">
           <div class="container wow fadeInUp" data-wow-delay="0.2s">
               <div class="row vs-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2">
                   <div class="col-xl-4">
                       <div class="feature-style1">
                           <div class="feature-icon"><img src="<?= $app_path ?>assets/img/icon/fe-1-1.png" alt="Features"></div>
                           <h3 class="feature-title h5"><a class="text-inherit" href="#">ACCOUNTING & BOOKKEEPING</a></h3>
                           <p class="feature-text">Organised accounting services that keep your books accurate, audit-ready and updated. We help you track finances, manage cash flow and make confident business decisions.</p><a href="#" class="vs-btn style3">Read More<i class="far fa-long-arrow-right"></i></a>
                       </div>
                   </div>
                   <div class="col-xl-4">
                       <div class="feature-style1">
                           <div class="feature-icon"><img src="<?= $app_path ?>assets/img/icon/fe-1-2.png" alt="Features"></div>
                           <h3 class="feature-title h5"><a class="text-inherit" href="#">VAT & CORPORATE TAX</a></h3>
                           <p class="feature-text">Complete VAT and Corporate Tax services including registration, filing, compliance review and audit preparation ensuring accurate submissions, reduced penalties and full alignment with UAE regulations.</p><a href="#" class="vs-btn style3">Read More<i class="far fa-long-arrow-right"></i></a>
                       </div>
                   </div>
                   <div class="col-xl-4">
                       <div class="feature-style1">
                           <div class="feature-icon"><img src="<?= $app_path ?>assets/img/icon/fe-1-3.png" alt="Features"></div>
                           <h3 class="feature-title h5"><a class="text-inherit" href="#">BUSINESS SETUP & LICENSING</a></h3>
                           <p class="feature-text">Fast and hassle-free business setup services, including licensing, renewals and government approvals ensuring your company stays compliant and legally active with RAK DED.</p><a href="#" class="vs-btn style3">Read More<i class="far fa-long-arrow-right"></i></a>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <section class="position-relative space-bottom"><span class="about-shape1 d-none d-xl-block">EasyPlus</span>
           <div class="container z-index-common">
               <div class="row gx-60">
                   <div class="col-lg-6 col-xl-5 mb-50 mb-lg-0 wow fadeInUp" data-wow-delay="0.2s">
                       <div class="img-box1">
                           <div class="img-1"><img src="<?= $app_path ?>assets/img/about/ab-1-1.jpg" alt="About image"></div>
                           <div class="img-2"><img src="<?= $app_path ?>assets/img/about/ab-1-2.jpg" alt="About image"> <a class="play-btn style2 position-center popup-video" href="../../../www.youtube.com/watch7eaa.html?v=_sI_Ps7JSEk"><i class=""><i class="fas fa-play"></i></i></a></div>
                       </div>
                   </div>
                   <div class="col-lg-6 col-xl-7 align-self-center wow fadeInUp" data-wow-delay="0.3s">
                       <span class="sec-subtitle">
                           <i class="fas fa-bring-forward"></i> Smart Accounting. Accurate Tax. Complete Business Support.
                       </span>

                       <h2 class="sec-title h1">
                           Stay Compliant, Organised & Financially Confident
                       </h2>

                       <p class="mb-4 mt-1 pb-3">
                           We help entrepreneurs, startups and established companies stay compliant and financially organised with reliable accounting, tax filing and government documentation support. Our work is designed for business owners who want peace of mind, timely submissions and a clear understanding of their financial position.
                       </p>

                       <div class="call-media">
                           <div class="call-media__icon">
                               <img src="<?= $app_path ?>assets/img/icon/tel-1-1.png" alt="icon">
                           </div>
                           <div class="media-body">
                               <span class="call-media__label">24 HOURS SERVICE AVAILABLE</span>
                               <p class="call-media__info">
                                   Call Us: <a href="tel:+97175011955">+97175011955</a>
                               </p>
                           </div>
                       </div>

                       <a href="<?= $app_path ?>" class="vs-btn">About Us <i class="far fa-long-arrow-right"></i></a>
                   </div>

               </div>
           </div>
       </section>
   </div>
   <section class="space-top space-extra-bottom" data-bg-src="<?= $app_path ?>assets/img/bg/sr-bg-1-1.png">
       <div class="container">
           <div class="row justify-content-center text-center">
               <div class="col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.2s">
                   <div class="title-area"><span class="sec-subtitle">Our Latest Services</span>
                       <h2 class="sec-title h1">What Kind of Services We are Offering</h2>
                   </div>
               </div>
           </div>
           <div class="row wow fadeInUp" data-wow-delay="0.2s">
               <div class="col-md-6 col-lg-4">
                   <div class="service-style1">
                       <div class="service-bg" data-bg-src="<?= $app_path ?>assets/img/bg/sr-box-bg-1.jpg"></div>
                       <div class="service-icon"><img src="<?= $app_path ?>assets/img/icon/sr-icon-1-1.png" alt="Features"></div>
                       <h3 class="service-title h5"><a href="service-details.html">Cloud Services</a></h3>
                       <p class="service-text">Deliver plug commerce with dynamic is expertise. leading edge products with business models</p><a href="service-details.html" class="vs-btn style3">Read More<i class="far fa-long-arrow-right"></i></a>
                   </div>
               </div>
               <div class="col-md-6 col-lg-4">
                   <div class="service-style1">
                       <div class="service-bg" data-bg-src="<?= $app_path ?>assets/img/bg/sr-box-bg-1.jpg"></div>
                       <div class="service-icon"><img src="<?= $app_path ?>assets/img/icon/sr-icon-1-2.png" alt="Features"></div>
                       <h3 class="service-title h5"><a href="service-details.html">Web Development</a></h3>
                       <p class="service-text">Deliver plug commerce with dynamic is expertise. leading edge products with business models</p><a href="service-details.html" class="vs-btn style3">Read More<i class="far fa-long-arrow-right"></i></a>
                   </div>
               </div>
               <div class="col-md-6 col-lg-4">
                   <div class="service-style1">
                       <div class="service-bg" data-bg-src="<?= $app_path ?>assets/img/bg/sr-box-bg-1.jpg"></div>
                       <div class="service-icon"><img src="<?= $app_path ?>assets/img/icon/sr-icon-1-3.png" alt="Features"></div>
                       <h3 class="service-title h5"><a href="service-details.html">IT Management</a></h3>
                       <p class="service-text">Deliver plug commerce with dynamic is expertise. leading edge products with business models</p><a href="service-details.html" class="vs-btn style3">Read More<i class="far fa-long-arrow-right"></i></a>
                   </div>
               </div>
               <div class="col-md-6 col-lg-4">
                   <div class="service-style1">
                       <div class="service-bg" data-bg-src="<?= $app_path ?>assets/img/bg/sr-box-bg-1.jpg"></div>
                       <div class="service-icon"><img src="<?= $app_path ?>assets/img/icon/sr-icon-1-4.png" alt="Features"></div>
                       <h3 class="service-title h5"><a href="service-details.html">Software Services</a></h3>
                       <p class="service-text">Deliver plug commerce with dynamic is expertise. leading edge products with business models</p><a href="service-details.html" class="vs-btn style3">Read More<i class="far fa-long-arrow-right"></i></a>
                   </div>
               </div>
               <div class="col-md-6 col-lg-4">
                   <div class="service-style1">
                       <div class="service-bg" data-bg-src="<?= $app_path ?>assets/img/bg/sr-box-bg-1.jpg"></div>
                       <div class="service-icon"><img src="<?= $app_path ?>assets/img/icon/sr-icon-1-5.png" alt="Features"></div>
                       <h3 class="service-title h5"><a href="service-details.html">Machine Learning</a></h3>
                       <p class="service-text">Deliver plug commerce with dynamic is expertise. leading edge products with business models</p><a href="service-details.html" class="vs-btn style3">Read More<i class="far fa-long-arrow-right"></i></a>
                   </div>
               </div>
               <div class="col-md-6 col-lg-4">
                   <div class="service-style1">
                       <div class="service-bg" data-bg-src="<?= $app_path ?>assets/img/bg/sr-box-bg-1.jpg"></div>
                       <div class="service-icon"><img src="<?= $app_path ?>assets/img/icon/sr-icon-1-6.png" alt="Features"></div>
                       <h3 class="service-title h5"><a href="service-details.html">Business Analycis</a></h3>
                       <p class="service-text">Deliver plug commerce with dynamic is expertise. leading edge products with business models</p><a href="service-details.html" class="vs-btn style3">Read More<i class="far fa-long-arrow-right"></i></a>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <section class="faq-wrap1">
       <div class="faq-shape1" data-bg-src="<?= $app_path ?>assets/img/bg/faq-bg-1-1.jpg"></div>
       <div class="faq-shape2" data-bg-src="<?= $app_path ?>assets/img/bg/faq-bg-1-2.jpg"></div>
       <div class="container">
           <div class="row gx-60">
               <div class="col-lg-6 pb-20 pb-lg-0 wow fadeInUp" data-wow-delay="0.2s">
                   <div class="img-box2">
                       <div class="img-1"><img src="<?= $app_path ?>assets/img/faq/faq-1-1.jpg" alt="FAQ image"></div>
                       <div class="img-2"><img src="<?= $app_path ?>assets/img/faq/faq-1-2.jpg" alt="FAQ image"><a class="play-btn style3 position-center" href="../../../www.youtube.com/watch7eaa.html?v=_sI_Ps7JSEk"><i class=""><i class="fas fa-play"></i></i></a></div>
                   </div>
               </div>
               <div class="col-lg-6 align-self-center">
                   <span class="sec-subtitle text-white">
                       <i class="fas fa-bring-forward"></i> Quality. Accuracy. Results.
                   </span>

                   <h2 class="sec-title text-white mb-4 pb-2 h1">
                       Professional & Reliable Support
                   </h2>

                   <div class="">
                       <p>
                           We combine practical experience with a structured workflow to deliver consistent, professional service.
                           With us, clients receive straightforward guidance, transparent processes and fast turnaround for all
                           their accounting, tax and business support needs. Our approach ensures every task is handled with precision and accountability. We prioritise clear communication so you always know the status of your work. With reliable support at every step, your business stays organised, compliant and confidently on track.
                       </p>
                   </div>
               </div>

           </div>
       </div>
   </section>
   <section class="space-top space-extra-bottom">
       <div class="container">
           <div class="row flex-row-reverse">
               <div class="col-lg-5 col-xxl-auto mb-30 pb-20 pb-lg-0 wow fadeInUp" data-wow-delay="0.2s">
                   <img src="<?= $app_path ?>assets/img/skill/skill-1-1.jpg" alt="Skill image">
               </div>

               <div class="col-lg-7 col-xxl-6 me-xl-auto">
                   <span class="sec-subtitle">
                       <i class="fas fa-bring-forward"></i> Everything You Need Under One Platform
                   </span>

                   <h2 class="sec-title h1">
                       Accounting, Tax & Business Services
                   </h2>

                   <p class="mb-4 pb-1">
                       We offer a complete range of services including bookkeeping, VAT, corporate tax, business formation,
                       visa processing, PRO services, labour and municipality documentation, and government typing.
                       This makes it easier for you to manage compliance while focusing on growth.
                   </p>

                   <div class="progress-box">
                       <h3 class="progress-box__title">Bookkeeping & Accounting</h3>
                       <span class="progress-box__number">90%</span>
                       <div class="progress-box__progress">
                           <div class="progress-box__bar" role="progressbar" style="width: 90%" aria-valuenow="90"></div>
                       </div>
                   </div>

                   <div class="progress-box">
                       <h3 class="progress-box__title">Tax & VAT Compliance</h3>
                       <span class="progress-box__number">85%</span>
                       <div class="progress-box__progress">
                           <div class="progress-box__bar" role="progressbar" style="width: 85%" aria-valuenow="85"></div>
                       </div>
                   </div>

                   <div class="progress-box">
                       <h3 class="progress-box__title">Business Formation & PRO Services</h3>
                       <span class="progress-box__number">95%</span>
                       <div class="progress-box__progress">
                           <div class="progress-box__bar" role="progressbar" style="width: 95%" aria-valuenow="95"></div>
                       </div>
                   </div>
               </div>
           </div>

       </div>
   </section>
   <section class="z-index-common space" data-bg-src="<?= $app_path ?>assets/img/bg/cta-bg-1-1.jpg">
       <div class="container">
           <div class="row text-center text-lg-start align-items-center justify-content-between">
               <div class="col-lg-auto"><span class="sec-subtitle text-white">We are here to answer your questions 24/7</span>
                   <h2 class="h1 sec-title cta-title1">Need A Consultation?</h2>
               </div>
               <div class="col-lg-auto"><a href="contact.html" class="vs-btn">Get A Quote<i class="far fa-arrow-right"></i></a></div>
           </div>
       </div>
   </section>
   <section class="space-top space-extra-bottom" data-bg-src="<?= $app_path ?>assets/img/bg/process-bg-1-1.jpg" id="processv1">
       <div class="container wow fadeInUp" data-wow-delay="0.2s">
           <div class="row justify-content-center text-center">
               <div class="col-xl-6">
                   <div class="title-area"><span class="sec-subtitle">Great Team Members</span>
                       <h2 class="sec-title h1">We Have Expert Team</h2>
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-sm-6 col-lg-3 process-style1">
                   <div class="process-arrow"><img src="<?= $app_path ?>assets/img/icon/process-arrow-1-1.png" alt="arrow"></div>
                   <div class="process-icon"><img src="<?= $app_path ?>assets/img/icon/process-1-4.png" alt="icon">
                       <span class="process-number">01</span>
                   </div>
                   <h3 class="process-title h5">Professional & Reliable</h3>
                   <p class="process-text">We maintain organised records and clear documentation to keep your business running smoothly.</p>
               </div>

               <div class="col-sm-6 col-lg-3 process-style1">
                   <div class="process-arrow"><img src="<?= $app_path ?>assets/img/icon/process-arrow-1-1.png" alt="arrow"></div>
                   <div class="process-icon"><img src="<?= $app_path ?>assets/img/icon/process-1-1.png" alt="icon">
                       <span class="process-number">02</span>
                   </div>
                   <h3 class="process-title h5">Clean Documentation</h3>
                   <p class="process-text">Every document is structured, accurate and easy to track for complete transparency.</p>
               </div>

               <div class="col-sm-6 col-lg-3 process-style1">
                   <div class="process-arrow"><img src="<?= $app_path ?>assets/img/icon/process-arrow-1-1.png" alt="arrow"></div>
                   <div class="process-icon"><img src="<?= $app_path ?>assets/img/icon/process-1-2.png" alt="icon">
                       <span class="process-number">03</span>
                   </div>
                   <h3 class="process-title h5">Organised Processes</h3>
                   <p class="process-text">We simplify your workflow with efficient systems designed for better control and clarity.</p>
               </div>

               <div class="col-sm-6 col-lg-3 process-style1">
                   <div class="process-arrow"><img src="<?= $app_path ?>assets/img/icon/process-arrow-1-1.png" alt="arrow"></div>
                   <div class="process-icon"><img src="<?= $app_path ?>assets/img/icon/process-1-3.png" alt="icon">
                       <span class="process-number">04</span>
                   </div>
                   <h3 class="process-title h5">Simple & Manageable</h3>
                   <p class="process-text">Our streamlined approach makes complex tasks easy, efficient and fully manageable.</p>
               </div>
           </div>

       </div>
   </section>
   <?php include('includes/footer.php'); ?>
   <script>
       $(document).ready(function() {

           // SVG Icons (purple via CSS)
           var plusSVG = '<svg width="10" height="10" viewBox="0 0 24 24"><path d="M12 5v14m7-7H5" stroke="currentColor" stroke-width="3" stroke-linecap="round"/></svg>';
           var minusSVG = '<svg width="10" height="10" viewBox="0 0 24 24"><path d="M5 12h14" stroke="currentColor" stroke-width="3" stroke-linecap="round"/></svg>';

           $('.feature-text').each(function() {

               var full = $(this).text().trim();
               var words = full.split(" ");

               if (words.length > 7) {

                   var short = words.slice(0, 7).join(" ") + "...";

                   $(this).data("full", full);
                   $(this).data("short", short);

                   $(this).text(short);

                   // INLINE — directly next to the text
                   $(this).after(
                       '<span class="toggle-wrap">' +
                       '<span class="toggle-circle" data-state="collapsed">' + plusSVG + '</span>' +
                       '</span>'
                   );
               }
           });

           // Expand/Collapse + rotate animation
           $(document).on("click", ".toggle-circle", function() {

               var icon = $(this);
               var text = icon.closest('.toggle-wrap').prev('.feature-text');

               icon.addClass("rotate"); // rotate animation

               setTimeout(function() {
                   icon.removeClass("rotate");
               }, 300);

               text.addClass("fade-slide");

               setTimeout(function() {

                   if (icon.data("state") === "collapsed") {

                       text.text(text.data("full"));
                       icon.html(minusSVG);
                       icon.data("state", "expanded");

                   } else {

                       text.text(text.data("short"));
                       icon.html(plusSVG);
                       icon.data("state", "collapsed");
                   }

                   text.addClass("show");

                   setTimeout(function() {
                       text.removeClass("fade-slide show");
                   }, 200);

               }, 200);
           });

           /* AUTO EQUAL HEIGHT CARDS */
           function equalHeights() {
               var maxH = 0;

               $('.feature-style1').each(function() {
                   $(this).css('height', 'auto');
                   var h = $(this).outerHeight();
                   if (h > maxH) maxH = h;
               });

               $('.feature-style1').css('height', maxH);
           }

           equalHeights();

           $(window).on('resize', function() {
               equalHeights();
           });

       });
   </script>