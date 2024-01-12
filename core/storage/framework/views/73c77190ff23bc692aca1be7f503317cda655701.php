

<?php $__env->startSection('title'); ?>
 <?php echo e($item->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
<meta name="keywords" content="<?php echo e($item->meta_keywords); ?>">
<meta name="description" content="<?php echo e($item->meta_description); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="ltn__breadcrumb-inner text-center">
                  <h1 class="ltn__page-title"><?php echo e($item->name); ?></h1>
                  <div class="ltn__breadcrumb-list">
                      <ul>
                          <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a></li>
                          <li><?php echo e(__('Product')); ?></li>
                          <li><?php echo e($item->name); ?></li>
                      </ul>                        
      </div>
              </div>
          </div>
      </div>
  </div>
</div>
  <!-- Page Content-->
<div class="container padding-bottom-1x mb-1">
    <div class="row">
      <!-- Poduct Gallery-->
      <div class="col-xxl-5 col-lg-6 col-md-6">
        <div class="product-gallery">
            <?php if($item->video): ?>
            <div class="gallery-wrapper">
                <div class="gallery-item video-btn text-center">
                    <a href="<?php echo e($item->video); ?>" title="Watch video"></a>
                </div>
            </div>
          <?php endif; ?>
          <?php if($item->is_stock()): ?>
          <span class="product-badge
          <?php if($item->is_type == 'feature'): ?>
          bg-warning
          <?php elseif($item->is_type == 'new'): ?>
          bg-success
          <?php elseif($item->is_type == 'top'): ?>
          bg-info
          <?php elseif($item->is_type == 'best'): ?>
          bg-dark
          <?php elseif($item->is_type == 'flash_deal'): ?>
            bg-success
          <?php endif; ?>
          "><?php echo e($item->is_type != 'undefine' ?  ucfirst(str_replace('_',' ',$item->is_type)) : ''); ?></span>

          <?php else: ?>
          <span class="product-badge bg-secondary border-default text-body
          "><?php echo e(__('out of stock')); ?></span>
          <?php endif; ?>

          <?php if($item->previous_price && $item->previous_price !=0): ?>
          <div class="product-badge bg-goldenrod  ppp-t"> -<?php echo e(PriceHelper::DiscountPercentage($item)); ?></div>
          <?php endif; ?>

          <div class="product-thumbnails insize">
            <div class="product-details-slider owl-carousel" >
            <div class="item"><img src="<?php echo e(asset('assets/images/'.$item->photo)); ?>" alt="zoom"  /></div>
            <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item"><img src="<?php echo e(asset('assets/images/'.$gallery->photo)); ?>" alt="zoom"  /></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
        </div>
      </div>

        <?php
        function renderStarRating($rating,$maxRating=5) {

            $fullStar = "<i class = 'far fa-star filled'></i>";
            $halfStar = "<i class = 'far fa-star-half filled'></i>";
            $emptyStar = "<i class = 'far fa-star'></i>";
            $rating = $rating <= $maxRating?$rating:$maxRating;

            $fullStarCount = (int)$rating;
            $halfStarCount = ceil($rating)-$fullStarCount;
            $emptyStarCount = $maxRating -$fullStarCount-$halfStarCount;

            $html = str_repeat($fullStar,$fullStarCount);
            $html .= str_repeat($halfStar,$halfStarCount);
            $html .= str_repeat($emptyStar,$emptyStarCount);
            $html = $html;
            return $html;
        }
        ?>
        <!-- Product Info-->
        <div class="col-xxl-7 col-lg-6 col-md-6">
            <div class="details-page-top-right-content d-flex align-items-center">
                <div class="div w-100">
                    <input type="hidden" id="item_id" value="<?php echo e($item->id); ?>">
                    <input type="hidden" id="demo_price" value="<?php echo e(PriceHelper::setConvertPrice($item->discount_price)); ?>">
                    <input type="hidden" value="<?php echo e(PriceHelper::setCurrencySign()); ?>" id="set_currency">
                    <input type="hidden" value="<?php echo e(PriceHelper::setCurrencyValue()); ?>" id="set_currency_val">
                    <input type="hidden" value="<?php echo e($setting->currency_direction); ?>" id="currency_direction">
                    <h4 class="mb-2 p-title-main"><?php echo e($item->name); ?></h4>
                    


                    <?php if($item->is_type == 'flash_deal'): ?>
                    <?php if(date('d-m-y') != \Carbon\Carbon::parse($item->date)->format('d-m-y')): ?>
                    <div class="countdown countdown-alt mb-3" data-date-time="<?php echo e($item->date); ?>">
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>

                    <span class="h3 d-block price-area">
                    <?php if($item->previous_price != 0): ?>
                        <small class="d-inline-block"><del><?php echo e(PriceHelper::setPreviousPrice($item->previous_price)); ?></del></small>
                    <?php endif; ?>
                    <span id="main_price" class="main-price"><?php echo e(PriceHelper::grandCurrencyPrice($item)); ?></span>
                    </span>

                    <p class="text-muted"><?php echo e($item->sort_details); ?> <a href="#details" class="scroll-to"><?php echo e(__('Read more')); ?></a></p>

                    <div class="row margin-top-1x">
                        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($attribute->options->count() != 0): ?>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label for="<?php echo e($attribute->name); ?>"><?php echo e($attribute->name); ?></label>
                                <select class="form-control attribute_option" id="<?php echo e($attribute->name); ?>">
                                    <?php $__currentLoopData = $attribute->options->where('stock','!=','0'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($option->name); ?>" data-type="<?php echo e($attribute->id); ?>" data-href="<?php echo e($option->id); ?>" data-target="<?php echo e(PriceHelper::setConvertPrice($option->price)); ?>"><?php echo e($option->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="row align-items-end pb-4">
                        <div class="col-sm-12">
                          <a href="<?php echo e(route('front.quote.request')); ?>" target="_blank" class="btn btn-primary m-0"><span><i class="icon-bag"></i><?php echo e(__('Start a quote!')); ?></span></a>

                            
                            

                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
        <div class=" padding-top-3x mb-3" id="details">
            <div class="col-lg-12">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true"><?php echo e(__('Descriptions')); ?></a>
                </li>
                
            </ul>
            <div class="tab-content card">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab"">
                <?php echo $item->details; ?>

                </div>
                <div class="tab-pane fade show" id="specification" role="tabpanel" aria-labelledby="specification-tab">
                <div class="comparison-table">
                    <table class="table table-bordered">
                        <thead class="bg-secondary">
                        </thead>
                        <tbody>
                        <tr class="bg-secondary">
                            <th class="text-uppercase"><?php echo e(__('Specifications')); ?></th>
                            <td><span class="text-medium"><?php echo e(__('Descriptions')); ?></span></td>
                        </tr>
                        <?php if($sec_name): ?>
                        <?php $__currentLoopData = array_combine($sec_name,$sec_details); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sname => $sdetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th><?php echo e($sname); ?></th>
                            <td><?php echo e($sdetail); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <tr class="text-center">
                            <td colspan="2"><?php echo e(__('No Specifications')); ?></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


  <!-- Reviews-->
  

  <?php if(count($related_items)>0): ?>
  <div class="relatedproduct-section container padding-bottom-3x mb-1 s-pt-30">
    <!-- Related Products Carousel-->
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2 class="h3"><?php echo e(__('You May Also Like')); ?></h2>
            </div>
        </div>
    </div>
    <!-- Carousel-->
    <div class="row">
        <div class="col-lg-12">
            <div class="relatedproductslider owl-carousel" >
                <?php $__currentLoopData = $related_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="slider-item">
                        <div class="product-card">

                            <?php if($related->is_stock()): ?>
                                <?php if($related->is_type == 'new'): ?>
                                <?php else: ?>
                                    <div class="product-badge
                                    <?php if($related->is_type == 'feature'): ?>
                                    bg-warning

                                    <?php elseif($related->is_type == 'top'): ?>
                                    bg-info
                                    <?php elseif($related->is_type == 'best'): ?>
                                    bg-dark
                                    <?php elseif($related->is_type == 'flash_deal'): ?>
                                    bg-success
                                    <?php endif; ?>
                                    "><?php echo e($related->is_type != 'undefine' ?  ucfirst(str_replace('_',' ',$related->is_type)) : ''); ?></div>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <div class="product-badge bg-secondary border-default text-body
                                    "><?php echo e(__('out of stock')); ?></div>
                            <?php endif; ?>
                                    <?php if($related->previous_price && $related->previous_price !=0): ?>
                                    <div class="product-badge product-badge2 bg-info"> -<?php echo e(PriceHelper::DiscountPercentage($related)); ?></div>
                            <?php endif; ?>

                            <?php if($related->previous_price && $related->previous_price !=0): ?>
                            <div class="product-badge product-badge2 bg-info"> -<?php echo e(PriceHelper::DiscountPercentage($related)); ?></div>
                            <?php endif; ?>
                            <div class="product-thumb">
                                <img class="lazy" data-src="<?php echo e(asset('assets/images/'.$related->thumbnail)); ?>" alt="Product">
                                <div class="product-button-group">
                                    <a class="product-button wishlist_store" href="<?php echo e(route('user.wishlist.store',$related->id)); ?>" title="<?php echo e(__('Wishlist')); ?>"><i class="icon-heart"></i></a>
                                    <a class="product-button product_compare" href="javascript:;" data-target="<?php echo e(route('fornt.compare.product',$related->id)); ?>" title="<?php echo e(__('Compare')); ?>"><i class="icon-repeat"></i></a>
                                    <?php echo $__env->make('includes.item_footer',['sitem' => $related], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            <div class="product-card-body">
                              <div class="product-category"><a href="<?php echo e(route('front.catalog').'?category='.$related->category->slug); ?>"><?php echo e($related->category->name); ?></a></div>
                              <h3 class="product-title"><a href="<?php echo e(route('front.product',$related->slug)); ?>">
                                <?php echo e(strlen(strip_tags($related->name)) > 35 ? substr(strip_tags($related->name), 0, 35) : strip_tags($related->name)); ?>

                            </a></h3>
                              <h4 class="product-price">
                                <?php if($related->previous_price !=0): ?>
                                    <del><?php echo e(PriceHelper::setPreviousPrice($related->previous_price)); ?></del>
                                <?php endif; ?>
                                <?php echo e(PriceHelper::grandCurrencyPrice($related)); ?> </h4>
                            </div>

                          </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
        </div>
    </div>
  </div>
  <?php endif; ?>




<?php if(auth()->guard()->check()): ?>
<form class="modal fade ratingForm" action="<?php echo e(route('front.review.submit')); ?>" method="post" id="leaveReview" tabindex="-1">
  <?php echo csrf_field(); ?>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo e(__('Leave a Review')); ?></h4>
        <button class="close modal_close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <?php
            $user = Auth::user();
        ?>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="review-name"><?php echo e(__('Your Name')); ?></label>
              <input class="form-control" type="text" id="review-name" value="<?php echo e($user->first_name); ?>" required>
            </div>
          </div>
          <input type="hidden" name="item_id" value="<?php echo e($item->id); ?>">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="review-email"><?php echo e(__('Your Email')); ?></label>
              <input class="form-control" type="email" id="review-email" value="<?php echo e($user->email); ?>" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="review-subject"><?php echo e(__('Subject')); ?></label>
              <input class="form-control" type="text" name="subject" id="review-subject" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="review-rating"><?php echo e(__('Rating')); ?></label>
              <select name="rating" class="form-control" id="review-rating">
                <option value="5">5 <?php echo e(__('Stars')); ?></option>
                <option value="4">4 <?php echo e(__('Stars')); ?></option>
                <option value="3">3 <?php echo e(__('Stars')); ?></option>
                <option value="2">2 <?php echo e(__('Stars')); ?></option>
                <option value="1">1 <?php echo e(__('Star')); ?></option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="review-message"><?php echo e(__('Review')); ?></label>
          <textarea class="form-control" name="review" id="review-message" rows="8" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit"><span><?php echo e(__('Submit Review')); ?></span></button>
      </div>
    </div>
  </div>
</form>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\balloonsbytommy\core\resources\views/front/catalog/product.blade.php ENDPATH**/ ?>