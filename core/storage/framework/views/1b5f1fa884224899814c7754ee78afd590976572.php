<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <?php if(url()->current() == route('front.index')): ?>
        <title><?php echo $__env->yieldContent('hometitle'); ?></title>
    <?php else: ?>
        <title><?php echo e($setting->title); ?> -<?php echo $__env->yieldContent('title'); ?></title>
    <?php endif; ?>

    <!-- SEO Meta Tags-->
    <?php echo $__env->yieldContent('meta'); ?>
    <meta name="author" content="<?php echo e($setting->title); ?>">
    <meta name="distribution" content="web">
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Favicon Icons-->
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/images/' . $setting->favicon)); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(asset('assets/images/' . $setting->favicon)); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('assets/images/' . $setting->favicon)); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('assets/images/' . $setting->favicon)); ?>">
    <link rel="apple-touch-icon" sizes="167x167" href="<?php echo e(asset('assets/images/' . $setting->favicon)); ?>">

    <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="<?php echo e(asset('assets/front/css/plugins.min.css')); ?>">

    <?php echo $__env->yieldContent('styleplugins'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link id="mainStyles" rel="stylesheet" media="screen" href="<?php echo e(asset('assets/front/css/styles.min.css')); ?>">

    <link id="mainStyles" rel="stylesheet" media="screen" href="<?php echo e(asset('assets/front/css/responsive.css')); ?>">
    <!-- Color css -->
    <link
        href="<?php echo e(asset('assets/front/css/color.php?primary_color=') . str_replace('#', '', $setting->primary_color)); ?>"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Modernizr-->
    <script src="<?php echo e(asset('assets/front/js/modernizr.min.js')); ?>"></script>

    <?php if(DB::table('languages')->where('is_default', 1)->first()->rtl == 1): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/front/css/rtl.css')); ?>">
    <?php endif; ?>
    <style>
        <?php echo e($setting->custom_css); ?>

    </style>
    <style>
        /* width */
        ::-webkit-scrollbar {
          width: 15px;
        }
        
        
        /* Handle */
        ::-webkit-scrollbar-thumb {
          background: #2ea349;
          
        }
        
        
        </style>
    
    <?php if($setting->is_google_adsense == '1'): ?>
        <?php echo $setting->google_adsense; ?>

    <?php endif; ?>
    

    
    <?php if($setting->is_google_analytics == '1'): ?>
        <?php echo $setting->google_analytics; ?>

    <?php endif; ?>
    

    
    <?php if($setting->is_facebook_pixel == '1'): ?>
        <?php echo $setting->facebook_pixel; ?>

    <?php endif; ?>
    

</head>
<!-- Body-->

<body class="
<?php if($setting->theme == 'theme2'): ?> body_theme2 <?php endif; ?>
">
    
    <!-- Preloader Start -->
    <?php if($setting->is_loader == 1): ?>
        <div id="preloader">
            <img src="<?php echo e(asset('assets/images/' . $setting->loader)); ?>" alt="<?php echo e(__('Loading...')); ?>">
        </div>
    <?php endif; ?>

    <!-- Preloader endif -->
    

    <!-- Header-->
    <header class="site-header navbar-sticky">

        <!-- Topbar-->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="align-content-center align-items-center d-flex justify-content-between px-4">
                            <!-- Logo-->
                            <div class="site-branding"><a class="site-logo align-self-center"
                                    href="<?php echo e(route('front.index')); ?>"><img
                                        src="<?php echo e(asset('assets/images/' . $setting->logo)); ?>"
                                        alt="<?php echo e($setting->title); ?>"></a></div>

                            <!-- Search / Categories-->
                            <div class="search-box-wrap d-none d-lg-block d-flex">
                                <div class="search-box-inner align-self-center">
                                    <div class="search-box ">
                                        <form class="input-group" id="header_search_form"
                                            action="<?php echo e(route('front.catalog')); ?>" method="get">
                                            <input type="hidden" name="category" value="" id="search__category">
                                            <span class="input-group-btn">
                                                <button type="submit"><i class="icon-search"></i></button>
                                            </span>
                                            <input class="form-control rounded-pill" type="text"
                                                data-target="<?php echo e(route('front.search.suggest')); ?>"
                                                id="__product__search" name="search"
                                                placeholder="<?php echo e(__('Search by product name')); ?>">
                                            <div class="serch-result d-none">
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <span class="d-block d-lg-none close-m-serch"><i class="icon-x"></i></span>
                            </div>


                            <!-- Toolbar-->
                            <div class="toolbar d-flex align-items-center jp-card">

                                <div class="toolbar-item close-m-serch visible-on-mobile d-none"><a href="#">
                                        <div>
                                            <i class="icon-search"></i>
                                        </div>
                                    </a>
                                </div>
                                


                                <div class="toolbar-item w-100 ">
                                    <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                                        <i class="fas fa-comments"></i>
                                        <span style="font-size: 12px">Start a Quote</span>
                                    </a>
                                </div>
                                <!-- Mobile Menu Button -->
                                <div class="mobile-menu-toggle d-lg-none">
                                    <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                        <i class="icon-menu"></i>
                                             <h6 style="font-size: 14px;">MENU</h6>   
                                    </a>
                                </div>

                            </div>

                            <!-- Mobile Menu-->
                            
                             <!-- Utilize Mobile Menu Start -->
    <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <div class="site-logo">
                    <a href="index.htm"><img
                        src="<?php echo e(asset('assets/images/' . $setting->logo)); ?>"
                        alt="<?php echo e($setting->title); ?>" style="width: 80px;"></a>
                </div>
                <button class="ltn__utilize-close">x</button>
            </div>
            <div class="ltn__utilize-menu-search-form">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <button><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="ltn__utilize-menu">
                <ul>
                            <li>
				   <a href="#">Balloon Styles</a>
                        <ul class="sub-menu">
                    <li><a href="#">Browse All Decor</a></li>
					<li><a href="#">Arches</a></li>
                    <li><a href="#">Columns</a></li>
                    <li><a href="#">Centerpieces</a></li>
                    <li><a href="#">Bouquets</a></li>
					<li><a href="#">Backdrops</a></li>
					<li><a href="#">Organic Balloons</a></li>
					<li><a href="#">Outdoor Balloons</a></li>
					<li><a href="#">Parades</a></li>
					<li><a href="#">Balloon Drops</a></li>
					<li><a href="#">Color Chart</a></li>
                                            
								 
								 </ul>
                              </li>
              <li class="menu-icon">
				  <a href="#">Corporate Events</a>

                                        </li>
                          <li class="menu-icon"><a href="#">Schools</a>
                              <ul class="sub-menu">
                              <li><a href="#">College & University</a></li>
                              <li><a href="#">School Dances</a></li>
                              <li><a href="#">School Events</a></li>
                              <li><a href="#">Graduation</a></li>
                                            </ul>
                                        </li>
										
                        <li class="menu-icon"><a href="#">Life Events</a>
                      <ul class="sub-menu">
                        <li><a href="#">Baby</a></li>
                        <li><a href="#">Birthday</a></li>
                        <li><a href="#">Bar/Bat Mitzvah</a></li>
						<li><a href="#">Bridal</a></li>
												
                                            </ul>
                                        </li>
                                        
                               <li><a href="#">Theme Decor</a></li>
										
                              <li><a href="#">Seasonal</a></li>

					<li class="menu-icon"><a href="#">Book Now</a>
                                           
                                        </li>	   
				</ul>
            </div>

        </div>
    </div>
    <!-- Utilize Mobile Menu End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar-->
        
        <div
            class="header-bottom-area ltn__border-top ltn__header-sticky ltn__sticky-bg-white ltn__primary-bg---- menu-color-white---- d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col header-menu-column justify-content-center">
                        <div class="sticky-logo">
                            <div class="site-logo">
                                <a href="index.htm"><img src="images/bbtlogo.svg" alt="Logo"
                                        style="max-height: 75px"></a>
                            </div>
                        </div>
                        <div class="header-menu header-menu-2">
                            <nav>
                                <div class="ltn__main-menu">
                                    <ul>
                                        <li class="menu-icon">
                                            <a href="#">Balloon Styles</a>
                                            <ul class="sub-menu">
                                                <li><a href="#">Browse All Decor</a></li>
                                                <li><a href="#">Arches</a></li>
                                                <li><a href="#">Columns</a></li>
                                                <li><a href="#">Centerpieces</a></li>
                                                <li><a href="#">Bouquets</a></li>
                                                <li><a href="#">Backdrops</a></li>
                                                <li><a href="#">Organic Balloons</a></li>
                                                <li><a href="#">Outdoor Balloons</a></li>
                                                <li><a href="#">Parades</a></li>
                                                <li><a href="#">Balloon Drops</a></li>
                                                <li><a href="#">Color Chart</a></li>


                                            </ul>
                                        </li>
                                        <li class="menu-icon">
                                            <a href="#">Corporate Events</a>

                                        </li>
                                        <li class="menu-icon"><a href="#">Schools</a>
                                            <ul class="sub-menu">
                                                <li><a href="#">College &amp; University</a></li>
                                                <li><a href="#">School Dances</a></li>
                                                <li><a href="#">School Events</a></li>
                                                <li><a href="#">Graduation</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-icon"><a href="#">Life Events</a>
                                            <ul class="sub-menu">
                                                <li><a href="#">Baby</a></li>
                                                <li><a href="#">Birthday</a></li>
                                                <li><a href="#">Bar/Bat Mitzvah</a></li>
                                                <li><a href="#">Bridal</a></li>

                                            </ul>
                                        </li>

                                        <li><a href="#">Theme Decor</a></li>

                                        <li><a href="#">Seasonal</a></li>

                                        <li class="menu-icon"><a href="#">Book Now</a>

                                        </li>


                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </header>

    <!-- Utilize Help Menu Start -->
    <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <span class="ltn__utilize-menu-title">Get a quote!</span>
                <button class="ltn__utilize-close">x</button>
            </div>
            <div class="about-us-info-wrap">
                <iframe name="lc_contact_form" frameborder="0" width="100%" height="600"
                    src="https://169820.17hats.com/ruby/embed/lead/form/krcxngvpgxphdfvbtnrbhrkwhbkkzcnn"></iframe>
                <script type="text/javascript" src="https://169820.17hats.com/vendor/iframeSizer.min.js"></script>
            </div>

        </div>
    </div>
    <!-- Utilize Help Menu End -->

    <!-- Utilize Mobile Menu Start -->
    <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <div class="site-logo">
                    <a href="index.htm"><img src="images/bbtlogo.svg" alt="Balloons by Tommy logo"></a>
                </div>
                <button class="ltn__utilize-close">x</button>
            </div>
            <div class="ltn__utilize-menu-search-form">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <button><i class="icon-magnifier"></i></button>
                </form>
            </div>
            <div class="ltn__utilize-menu">
                <ul>
                    <li>
                        <a href="#">Balloon Styles</a>
                        <ul class="sub-menu">
                            <li><a href="#">Browse All Decor</a></li>
                            <li><a href="#">Arches</a></li>
                            <li><a href="#">Columns</a></li>
                            <li><a href="#">Centerpieces</a></li>
                            <li><a href="#">Bouquets</a></li>
                            <li><a href="#">Backdrops</a></li>
                            <li><a href="#">Organic Balloons</a></li>
                            <li><a href="#">Outdoor Balloons</a></li>
                            <li><a href="#">Parades</a></li>
                            <li><a href="#">Balloon Drops</a></li>
                            <li><a href="#">Color Chart</a></li>


                        </ul>
                    </li>
                    <li class="menu-icon">
                        <a href="#">Corporate Events</a>

                    </li>
                    <li class="menu-icon"><a href="#">Schools</a>
                        <ul class="sub-menu">
                            <li><a href="#">College & University</a></li>
                            <li><a href="#">School Dances</a></li>
                            <li><a href="#">School Events</a></li>
                            <li><a href="#">Graduation</a></li>
                        </ul>
                    </li>

                    <li class="menu-icon"><a href="#">Life Events</a>
                        <ul class="sub-menu">
                            <li><a href="#">Baby</a></li>
                            <li><a href="#">Birthday</a></li>
                            <li><a href="#">Bar/Bat Mitzvah</a></li>
                            <li><a href="#">Bridal</a></li>

                        </ul>
                    </li>

                    <li><a href="#">Theme Decor</a></li>

                    <li><a href="#">Seasonal</a></li>

                    <li class="menu-icon"><a href="#">Book Now</a>

                    </li>
                </ul>
            </div>

        </div>
    </div>
    <!-- Utilize Mobile Menu End -->

    <div class="ltn__utilize-overlay"></div>
    <!-- Page Content-->
    <?php echo $__env->yieldContent('content'); ?>

    <!--    announcement banner section start   -->
    <a class="announcement-banner" href="#announcement-modal"></a>
    <div id="announcement-modal" class="mfp-hide white-popup">
        <?php if($setting->announcement_type == 'newletter'): ?>
            <div class="announcement-with-content">
                <div class="left-area">
                    <img src="<?php echo e(asset('assets/images/' . $setting->announcement)); ?>" alt="">
                </div>
                <div class="right-area">
                    <h3 class=""><?php echo e($setting->announcement_title); ?></h3>
                    <p><?php echo e($setting->announcement_details); ?></p>
                    <form class="subscriber-form" action="<?php echo e(route('front.subscriber.submit')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="input-group">
                            <input class="form-control" type="email" name="email"
                                placeholder="<?php echo e(__('Your e-mail')); ?>">
                            <span class="input-group-addon"><i class="icon-mail"></i></span>
                        </div>
                        <div aria-hidden="true">
                            <input type="hidden" name="b_c7103e2c981361a6639545bd5_1194bb7544" tabindex="-1">
                        </div>

                        <button class="btn btn-primary btn-block mt-2" type="submit">
                            <span><?php echo e(__('Subscribe')); ?></span>
                        </button>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <a href="<?php echo e($setting->announcement_link); ?>">
                <img src="<?php echo e(asset('assets/images/' . $setting->announcement)); ?>" alt="">
            </a>
        <?php endif; ?>


    </div>
    <!--    announcement banner section end   -->

    <!-- Site Footer-->
    

    <footer class="ltn__footer-area">

        <div class="ltn__copyright-area ltn__copyright-2 section-bg-5">
            <div class="container ltn__border-top-2">

                <center>
                    <ul class="social mt-4" style="padding-bottom: 2.5rem">
                        <li><a href="https://instagram.com/balloonsbytommy" target="_blank"
                                alt=" Balloons by Tommy Instagram Page"><i class="fab fa-instagram"></i></a></li>

                        <li><a href="https://www.facebook.com/balloonsbytommy" target="_blank"
                                aria-label="Balloons by Tommy Facebook Page"><i class="fab fa-facebook-f"></i></a></li>

                        

                        <li><a href="https://linkedin.com/company/balloons-by-tommy" target="_blank"
                                aria-label="Balloons by Tommy Linked-In Page"><i class="fab fa-linkedin-in"></i></a></li>

                        <li><a href="https://www.youtube.com/balloonsbytommy" target="_blank"
                                aria-label="Balloons by Tommy YouTube"><i class="fab fa-youtube"></i></a></li>


                    </ul><br>
                </center>
                <div class="ltn__copyright-area ltn__copyright-2 section-bg-5">

                    <div class="container ltn__border-top-2">
                        <div class="row">


                            <div class="footer-copyright-left d-flex align-items-baseline">

                                <div class="ltn__copyright-design clearfix" style="float: left;">
                                    <p>© 2000-<span class="current-year">2024</span> Balloons by Tommy</p>

                                </div>

                                <ul style="float: right; font-weight: 300; list-style: none; display: inline-flex;">

                                    <li style="margin-right: 15px; margin-top: 0rem;">
                                        <a class="text-white" href="https://www.balloonsbytommy.com/">Home</a>
                                    </li>

                                    <li style="margin-right: 15px; margin-top: 0rem;">
                                        <a class="text-white" href="https://www.balloonsbytommy.com/faq.htm">FAQ</a>
                                    </li>

                                    <li style="margin-top: 0rem;">
                                        <a class="text-white" href="https://www.balloonsbytommy.com/contact.htm">Quote</a>
                                    </li>

                                </ul>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Back To Top Button-->
    <a class="scroll-to-top-btn" href="#">
        <i class="icon-chevron-up"></i>
    </a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>

    <!-- Cookie alert dialog  -->
    <?php if($setting->is_cookie == 1): ?>
        <?php echo $__env->make('cookieConsent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- Cookie alert dialog  -->


    <?php
        $mainbs = [];
        $mainbs['is_announcement'] = $setting->is_announcement;
        $mainbs['announcement_delay'] = $setting->announcement_delay;
        $mainbs['overlay'] = $setting->overlay;
        $mainbs = json_encode($mainbs);
    ?>

    <script>
        var mainbs = <?php echo $mainbs; ?>;
        var decimal_separator = '<?php echo $setting->decimal_separator; ?>';
        var thousand_separator = '<?php echo $setting->thousand_separator; ?>';
    </script>

    <script>
        let language = {
            Days: '<?php echo e(__('Days')); ?>',
            Hrs: '<?php echo e(__('Hrs')); ?>',
            Min: '<?php echo e(__('Min')); ?>',
            Sec: '<?php echo e(__('Sec')); ?>',
        }
    </script>



    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script type="text/javascript" src="<?php echo e(asset('assets/front/js/plugins.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/back/js/plugin/bootstrap-notify/bootstrap-notify.min.js')); ?>">
    </script>
    <script type="text/javascript" src="<?php echo e(asset('assets/front/js/scripts.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/front/js/lazy.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/front/js/lazy.plugin.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/front/js/myscript.js')); ?>"></script>
    <?php echo $__env->yieldContent('script'); ?>

    <?php if($setting->is_facebook_messenger == '1'): ?>
        <?php echo $setting->facebook_messenger; ?>

    <?php endif; ?>



    <script type="text/javascript">
        let mainurl = '<?php echo e(route('front.index')); ?>';

        let view_extra_index = 0;
        // Notifications
        function SuccessNotification(title) {
            $.notify({
                title: ` <strong>${title}</strong>`,
                message: '',
                icon: 'fas fa-check-circle'
            }, {
                element: 'body',
                position: null,
                type: "success",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class'
            });
        }

        function DangerNotification(title) {
            $.notify({
                // options
                title: ` <strong>${title}</strong>`,
                message: '',
                icon: 'fas fa-exclamation-triangle'
            }, {
                // settings
                element: 'body',
                position: null,
                type: "danger",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class'
            });
        }
        // Notifications Ends
    </script>

    <?php if(Session::has('error')): ?>
        <script>
            $(document).ready(function() {
                DangerNotification('<?php echo e(Session::get('error')); ?>')
            })
        </script>
    <?php endif; ?>
    <?php if(Session::has('success')): ?>
        <script>
            $(document).ready(function() {
                SuccessNotification('<?php echo e(Session::get('success')); ?>');
            })
        </script>
    <?php endif; ?>

</body>

</html>
<?php /**PATH C:\xampp7\htdocs\balloonsbytommy\core\resources\views/master/front.blade.php ENDPATH**/ ?>