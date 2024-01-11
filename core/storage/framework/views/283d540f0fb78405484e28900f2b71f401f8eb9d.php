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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
       $(document).on('keyup', '#__product__search', function () {
            let search = $(this).val();
            let category = '';
            category = $('#search__category').val();
            if (search) {
                let url = $(this).attr('data-target');
                $.get(url + '?search=' + search + '&category=' + category, function (response) {
                    $('.serch-result').removeClass('d-none');
                    $('.serch-result').html(response);
                })
            } else {
                $('.serch-result').addClass('d-none');
            }

        })
</script><?php /**PATH /Applications/MAMP/htdocs/decor/core/resources/views/front/embeded_search_bar.blade.php ENDPATH**/ ?>