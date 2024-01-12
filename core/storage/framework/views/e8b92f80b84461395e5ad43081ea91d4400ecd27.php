

<?php $__env->startSection('title'); ?>
    <?php echo e(__('Quote Request')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner text-center">
                        <h1 class="ltn__page-title">Request Sent</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Quote Request</li>
                                <li>Request Sent</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pt-20 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 align-self-center">
                    <div class="about-us-info-wrap">
                        <h2 class="mb-20 font-weight-6">Success!</h2>
                        <p>Woohoo, your quote request has successfully been sent to our team!<br>
                            The sales team is in the office Monday through Friday from 9:30am-5:30pm and will get back to
                            you as soon as possible via the email address you provided. (Why we work via email)</p>

                        <h4 class="font-weight-6">Please, check your spam folder!</h4>
                        <p>You should now have an email from us confirming your inquiry was sent successfully, please do not
                            respond to it. If it's not in your inbox, please check in your spam folder. If there is no email
                            in your spam folder your email address may have been entered incorrectly when you filled out the
                            form. If this is the case, please, complete the form again.</p>

                        <h4 class="font-weight-6">So, am I booked now?</h4>
                        <p>No, your order is not considered booked until your invoice has been paid. Completing this form
                            only begins the process and does not guarantee your event date. For other questions you may
                            have, head over to our FAQ page!</p>

                        <h4 class="font-weight-6">Looking for some ideas?</h4>
                        <p>Head over to our photo gallery to see some of our favorite event decor setups! Remember, we are
                            able to customize your decor to match your theme by changing the balloon colors in most designs.
                            If you find an image you like the design of, make a note of the image number and letter in the
                            bottom right corner of each photo and let our sales team know. Don't see a design that matches
                            your vision? Let us know, we would love to work with you to bring your vision to life!</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->

    <!-- INSPIRED AREA START  -->
    <div class="ltn__blog-area">
        <div class="container">
            <div class="section-title-area">


                <div class="row">


                    <div class="col-lg-12">

                    </div>
                </div>
                <div class="row  ltn__blog-slider-one-active slick-arrow-1">
                    <!-- Item -->
                    <div class="col-lg-12">
                        <div class="ltn__blog-item">
                            <div class="ltn__blog-img">
                                <a href="blog-details.html"><img src="<?php echo e(asset('assets/images/checkthisout-video.webp')); ?>" alt="#"></a>
                            </div>
                            <div class="ltn__blog-brief">

                                <h3 class="ltn__blog-title blog-title-line"><a href="blog-details.html">Photo Gallery</a>
                                </h3>
                                <p>Take a look through some of our previous installations for inspiration!</p>
                            </div>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="col-lg-12">
                        <div class="ltn__blog-item">
                            <div class="ltn__blog-img">
                                <a href="blog-details.html"><img src="<?php echo e(asset('assets/images/checkthisout-photo.webp')); ?>" alt="#"></a>
                            </div>
                            <div class="ltn__blog-brief">

                                <h3 class="ltn__blog-title blog-title-line"><a href="blog-details.html">Video Gallery</a>
                                </h3>
                                <p>Our video gallery is a fun look at some of our installations, interviews, and more!</p>
                            </div>
                        </div>
                    </div>



                </div>

                <!-- Instagram -->
                <div class="testimonial-info" align="center" style="margin-bottom: 25px; padding-left: 15px;">
                    <h3>the latest from our Instagram<span>
                            <a href="https://www.instagram.com/balloonsbytommy/"
                                style="color: #23a349">@balloonsbytommy</a></span></h3>
                    <div style="display: flex; align-content: center; scale: 90%;" <!-- LightWidget WIDGET -->
                        <script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe
                            src="https://cdn.lightwidget.com/widgets/3252085e93b658b1a83e0e86e869a25e.html" scrolling="no"
                            allowtransparency="true" class="lightwidget-widget"
                            style="width:100%;border:0;overflow:hidden;">
                        </iframe>
                    </div>
                </div>
                <!-- Instagram End -->


            </div>
        </div>
        <!-- INSPIRED AREA END -->
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\balloonsbytommy\core\resources\views/front/quote/quote_request_send.blade.php ENDPATH**/ ?>