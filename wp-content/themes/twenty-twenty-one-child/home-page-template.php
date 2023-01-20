<?php
/**
 * Template Name: Home Page Template
 */

get_header();
/* Start the Loop */
while ( have_posts() ) :
    the_post();
    get_template_part( 'template-parts/content/content-page' );

    // If comments are open or there is at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) {
        comments_template();
    }
endwhile; // End of the loop.
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<section class="add_restaurants_section">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-7 p-0">
                <div class="card">
                    <div class="card-header">Add new Restaurant</div>
                    <div class="card-body">
                        <form action="/pesto/wp-admin/admin-post.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="add_restaurants">
                            <div class="form-group form_row">
                                <label>Restaurant Name:</label>
                                <input type="text" class="form-control col-md-6" name="restaurant_name"
                                    id="restaurant_name">
                            </div>
                            <div class="form-group form_row">
                                <label>Restaurant Image:</label>
                                <input type="file" class="form-control" name="restaurant_image" id="restaurant_image">
                            </div>
                            <div class="form-group form_row">
                                <label>Please rate the Restaurant on the scale of 1-5 stars!</label>
                                <div class="star-col">
                                    <input class="star star-5" id="star-5" type="radio" name="restaurants_rating"
                                        value="5" />
                                    <label class="star star-5" for="star-5"></label>
                                    <input class="star star-4" id="star-4" type="radio" name="restaurants_rating"
                                        value="4" />
                                    <label class="star star-4" for="star-4"></label>
                                    <input class="star star-3" id="star-3" type="radio" name="restaurants_rating"
                                        value="3" />
                                    <label class="star star-3" for="star-3"></label>
                                    <input class="star star-2" id="star-2" type="radio" name="restaurants_rating"
                                        value="2" />
                                    <label class="star star-2" for="star-2"></label>
                                    <input class="star star-1" id="star-1" type="radio" name="restaurants_rating"
                                        value="1" />
                                    <label class="star star-1" for="star-1"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn--radius btn--green primaryBtnForm" name="submitBtn"
                                    type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5 p-0">
                <img src="wp-content/uploads/2023/01/form-side.jpg" width="100%">
            </div>
        </div>
    </div>
</section>

<section class="footerSection">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-3">
                <img class="footer-logo-img" src="wp-content/uploads/2023/01/logo.png" width="20%">
                <ul class="address-info">
                    <li>
                        PESITO A2Z CUSTOMER SOLUTIONS PVT LTD
                    </li>
                    <li>
                        KARTHIKA BHAVAN
                    </li>
                    <li>
                        THAMALLAKKAL PO HARIPAD
                    </li>
                    <li>
                        ALAPPUZHA 690514
                    </li>
                    <li>
                        KERALA INDIA
                    </li>
                </ul>
            </div>
            <div class="col-md-3 social-col">
                <h4 class="h5 font-w700">We Are Social</h4>
                <ul class="social-icon-list">
                    <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                    <li><i class="fa fa-google-plus" aria-hidden="true"></i></li>
                    <li><i class="fa fa-instagram" aria-hidden="true"></i></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<script>
jQuery(document).ready(function() {
    $('.mobileMockUp').addClass('rotate');
    $(".mobileMockUp").off('click');
    $('#useAppNow').click(function() {
        $('.mobileMockUp').removeClass('rotate');
        $('.mobileMockUp').addClass('mobileMockupAnim');
    });
});

function detailViewBlock(res_id) {
    $.ajax({
        type: 'POST',
        url: "<?php echo admin_url('admin-ajax.php');?>",
        data: {
            'res_id': res_id,
            action: 'show_restaurant_detail',
        },
        dataType: "json",
        success: function(data) {
            jQuery('.mbl-app-section.detailedView').css('display', 'block');
            jQuery('.mbl-app-section.detailedView').html(data);
            jQuery('.mbl-app-section.main').css('display', 'none');
            jQuery('.footer-nav').css('display', 'none');
        }
    });
}

function backtohome() {
    jQuery('.mbl-app-section.detailedView').css('display', 'none');
    jQuery('.mbl-app-section.main').css('display', 'block');
    jQuery('.footer-nav').css('display', 'block');
}
</script>

<?php

get_footer();