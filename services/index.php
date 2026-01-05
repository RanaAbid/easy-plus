 <?php 
include('../includes/header.php');
include('../includes/dbcode.php');
include('../includes/functions.php');

// Load services from database
$services = getServices($link, 'active');
?>
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
                     <li><a href="<?= $app_path ?>">Home</a></li>
                     <li>Services</li>
                 </ul>
             </div>
         </div>
     </div>
 </div>
 <section class="space-top space-extra-bottom">
     <div class="container wow fadeInUp" data-wow-delay="0.2s">
         <div class="row justify-content-center">
             <?php if (!empty($services)): ?>
                 <?php foreach ($services as $index => $service): 
                    // Get short description (around 70 characters, similar to title length)
                    $fullDescription = $service['description'];
                    $shortDescription = '';
                    if ($fullDescription) {
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
                    }
                     
                     // Default background image if not set
                     $bgImage = $service['background_image'] ? '../assets/img/bg/' . htmlspecialchars($service['background_image']) : '../assets/img/bg/sr-box-bg-1.jpg';
                     
                     // Default icon if not set - use existing icons as fallback
                     $iconIndex = ($index % 6) + 1;
                     $iconPath = $service['icon'] ? $app_path . 'assets/img/icon/' . htmlspecialchars($service['icon']) : $app_path . 'assets/img/icon/sr-icon-1-' . $iconIndex . '.png';
                     
                     // Always use slug if available
                     if (!empty($service['slug'])) {
                         $linkUrl = $service['link_url'] ? htmlspecialchars($service['link_url']) : '../services/' . $service['slug'];
                     } else {
                         // Fallback to ID only if slug doesn't exist
                         $linkUrl = $service['link_url'] ? htmlspecialchars($service['link_url']) : '../service-details.php?id=' . $service['id'];
                     }
                 ?>
                 <div class="col-md-6 col-lg-4">
                     <div class="service-style1 layout2">
                         <div class="service-bg" data-bg-src="<?= $bgImage ?>"></div>
                         <div class="service-icon"><img src="<?= $iconPath ?>" alt="<?= htmlspecialchars($service['title']) ?>" loading="lazy"></div>
                        <h3 class="service-title h5"><a href="<?= $linkUrl ?>"><?= htmlspecialchars($service['title']) ?></a></h3>
                        <p class="service-text"><?= htmlspecialchars($shortDescription ?: $fullDescription) ?></p>
                        <a href="<?= $linkUrl ?>" class="vs-btn style3"><?= htmlspecialchars($service['link_text'] ?: 'Read More') ?><i class="far fa-long-arrow-right"></i></a>
                     </div>
                 </div>
                 <?php endforeach; ?>
             <?php else: ?>
                 <!-- Fallback if no services -->
                 <div class="col-12 text-center">
                     <p>No services available at the moment. Please check back later.</p>
                 </div>
             <?php endif; ?>
         </div>
     </div>
 </section>
 <?php include('../includes/footer.php'); ?>
 <script>
    $(document).ready(function() {
        function AddReadMore() {
            // Character limit for truncation (increased for better consistency)
            var charLimit = 150;
            // Text to show when text is collapsed
            var readMoreTxt = " ...";
            // Text to show when text is expanded
            var readLessTxt = " read less";

            // Traverse all selectors with this class and manipulate HTML part to show Read More
            $(".add-read-more").each(function() {
                // Skip if already processed
                if ($(this).find(".first-section").length || $(this).find(".second-section").length)
                    return;

                var $element = $(this);
                var allText = $element.text().trim();
                
                // Only truncate if text is longer than the limit
                if (allText.length > charLimit) {
                    // Find the last space before the character limit to avoid cutting words
                    var truncatedText = allText.substring(0, charLimit);
                    var lastSpaceIndex = truncatedText.lastIndexOf(' ');
                    
                    // If we found a space, use it; otherwise use the character limit
                    var cutPoint = (lastSpaceIndex > charLimit * 0.7) ? lastSpaceIndex : charLimit;
                    
                    var firstPart = allText.substring(0, cutPoint).trim();
                    var secondPart = allText.substring(cutPoint).trim();
                    
                    // Build the HTML with proper structure
                    var htmlContent = firstPart + 
                        "<span class='second-section'>" + secondPart + "</span>" +
                        "<span class='read-more' title='Click to Show More'>" + readMoreTxt + "</span>" +
                        "<span class='read-less' title='Click to Show Less'>" + readLessTxt + "</span>";
                    
                    $element.html(htmlContent);
                    // Ensure it starts in collapsed state
                    $element.addClass('show-less-content');
                }
            });

            // Read More and Read Less Click Event binding
            $(document).on("click", ".read-more,.read-less", function(e) {
                e.preventDefault();
                var $container = $(this).closest(".add-read-more");
                $container.toggleClass("show-less-content show-more-content");
            });
        }

        AddReadMore();
    });
 </script>