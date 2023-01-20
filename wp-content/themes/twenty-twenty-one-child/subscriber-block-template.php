<?php
/**
 * Template Name: Subscriber Page Template
 */
get_header();
?>
<style>
.site-main>* {
    margin: 0px !important;
}

.subscribe-section {
    vertical-align: middle;
    display: flex;
    flex-direction: column;
}

#bgChangeBasedonTime {
    height: 100vh;
    -webkit-transition: background-color 700ms linear;
    -moz-transition: background-color 700ms linear;
    -ms-transition: background-color 700ms linear;
    -o-transition: background-color 700ms linear;
    transition: background-color 700ms linear;
    background-color: rgba(253, 208, 7, 1);
    justify-content: center;
}

#bgChangeBasedonTime.scrolled {
    background-color: transparent
}

input {
    border: 1px solid #ccc !important;
    outline: none;
}

input:focus {
    outline: none;
    border-style: none !important;
}
</style>
<section class="full-height section-scroll subscribe-section" id="bgChangeBasedonTime">
    <div class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-7">
                    <div class="card w-100" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Subscribe to our newsletter</h5>
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <button type="submit" class="btn btn-primary primaryBtn">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
var currentTimenow = new Date();
var hours = currentTimenow.getHours();
elementToChangeColor = document.getElementById("bgChangeBasedonTime");
elementToChangeColor.bgColor = "#CC9900";

if (hours > 17 && hours < 22) {
    elementToChangeColor.style.backgroundColor = "aliceblue"
} else if (hours > 21 || hours < 5) {
    elementToChangeColor.style.backgroundColor = "#C70043";
} else if (hours > 8 && hours < 18) {
    elementToChangeColor.style.backgroundColor = "#616D7E";
} else if (hours > 6 && hours < 9) {
    elementToChangeColor.style.backgroundColor = "antiquewhite";
} else if (hours > 4 && hours < 7) {
    elementToChangeColor.style.backgroundColor = "steelblue";
} else {
    elementToChangeColor.style.backgroundColor = "white";
}
</script>