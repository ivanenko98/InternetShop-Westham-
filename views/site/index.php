

<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/js/jquery.min.js"></script>

<!-- start slider -->       
    <link href="/css/slider.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="/js/modernizr.custom.28468.js"></script>
    <script type="text/javascript" src="/js/jquery.cslider.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#da-slider').cslider();
        });
    </script>
        <!-- Owl Carousel Assets -->
        <link href="/css/owl.carousel.css" rel="stylesheet">
             <!-- Owl Carousel Assets -->
            <!-- Prettify -->
            <script src="/js/owl.carousel.js"></script>
                <script>
            $(document).ready(function() {
        
              $("#owl-demo").owlCarousel({
                items : 4,
                lazyLoad : true,
                autoPlay : true,
                navigation : true,
                navigationText : ["",""],
                rewindNav : false,
                scrollPerPage : false,
                pagination : false,
                paginationNumbers: false,
              });
        
            });
            </script>
           <!-- //Owl Carousel Assets -->
        <!-- start top_js_button -->
        <script type="text/javascript" src="/js/move-top.js"></script>
        <script type="text/javascript" src="/js/easing.js"></script>
           <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $(".scroll").click(function(event){     
                        event.preventDefault();
                        $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
                    });
                });
            </script>
</head>
</body>





<!-- start slider -->
            <div id="da-slider" class="da-slider">
                <div class="da-slide">
                    <h2>Раді вітати вас у WESTHAM</h2>
                    <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.</p>
                    <a href="/catalog" class="da-link">Купити зараз</a>
                    <div class="da-img"><img src="/images/slider1.png" alt="image01" /></div>
                </div>
                <div class="da-slide">
                    <h2>Easy management</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    <a href="/catalog" class="da-link">Купити зараз</a>
                    <div class="da-img"><img src="/images/slider2.png" alt="image01" /></div>
                </div>
                <div class="da-slide">
                    <h2>Revolution</h2>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    <a href="/catalog" class="da-link">Купити зараз</a>
                    <div class="da-img"><img src="/images/slider3.png" alt="image01" /></div>
                </div>
                <div class="da-slide">
                    <h2>Quality Control</h2>
                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                    <a href="/catalog" class="da-link">Купити зараз</a>
                    <div class="da-img"><img src="/images/slider4.png" alt="image01" /></div>
                </div>
                <nav class="da-arrows">
                    <span class="da-arrows-prev"></span>
                    <span class="da-arrows-next"></span>
                </nav>
            </div>
        </div>
<!----start-cursual---->
<div class="wrap">
<!----start-img-cursual---->
    <div id="owl-demo" class="owl-carousel">
        
        <?php foreach ($category as $categoryItem) : ?>
        <div class="item" onclick="location.href='/catalog/<?php echo $categoryItem['id']; ?>';">
            <div class="cau_left">
                <img class="lazyOwl" data-src="/images/category/<?php echo $categoryItem['image']; ?>" alt="Lazy Owl Image">
            </div>
            <div class="cau_left">
                <h4><a href="/catalog/<?php echo $categoryItem['id']; ?>"><?php echo $categoryItem['name']; ?></a></h4>
                <a href="/catalog/<?php echo $categoryItem['id']; ?>" class="btn">Купити</a>
            </div>
        </div>  
        <?php endforeach; ?>
        

    </div>

    <!----//End-img-cursual---->
</div>
<!-- start main1 -->
<div class="main_bg1">
<div class="wrap">  
    <div class="main1">
        <h2>Популярні товари</h2>
    </div>
</div>
</div>
<!-- start main -->
<div class="main_bg">
<div class="wrap">  
    <div class="main" id="main">
        <!-- start grids_of_3 -->
        <div class="grids_of_3">
            <?php  foreach ($product as $productItem) : ?>
            <div class="grid1_of_3">
                <a href="/details/<?php echo $productItem['id']; ?>">
                    <img src="/images/product/<?php echo $productItem['image']; ?>" alt=""/>
                    <h3><?php echo $productItem['name']; ?></h3>
                    <div class="price">
                        <h4><?php echo $productItem['price']; ?> грн<span>Детальніше</span></h4>
                    </div>
                    <span class="b_btm"></span>
                </a>
            </div>
        
            <?php endforeach; ?>
            </div>
            <div class="clear"></div>
        
        <!-- end grids_of_3 -->
    </div>
</div>
</div>

