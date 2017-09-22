
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>
        <link href="/web/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/web/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/web/css/main.css" rel="stylesheet" type="text/css" media="all" />
        <script src="/web/js/jquery.min.js"></script> 
        <!-- start gallery_sale -->
        <script type="text/javascript" src="/web/js/jquery.easing.min.js"></script>	
        <script type="text/javascript" src="/web/js/jquery.mixitup.min.js"></script>
        <script type="text/javascript">
            $(function () {

                var filterList = {
                    init: function () {

                        // MixItUp plugin
                        // http://mixitup.io
                        $('#portfoliolist').mixitup({
                            targetSelector: '.portfolio',
                            filterSelector: '.filter',
                            effects: ['fade'],
                            easing: 'snap',
                            // call the hover effect
                            onMixEnd: filterList.hoverEffect()
                        });

                    },
                    hoverEffect: function () {

                        // Simple parallax effect
                        $('#portfoliolist .portfolio').hover(
                                function () {
                                    $(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
                                    $(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');
                                },
                                function () {
                                    $(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
                                    $(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');
                                }
                        );

                    }

                };

                // Run the show!
                filterList.init();


            });
        </script>
        <!-- start top_js_button -->
        <script type="text/javascript" src="/web/js/move-top.js"></script>
        <script type="text/javascript" src="/web/js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
                });
            });
        </script>
    </head>
    <body>



        <!-- start main -->
        <div class="main_bg">
            <div class="wrap">	
                <div class="main">
                    <!-- start gallery_sale  -->
                    <div class="gallery1">
                        <div class="container">
                            <ul id="filters" class="clearfix">
                                <div class="<?php if (empty($categoryId)){ echo 'h_menu';}else{ echo 'h_category';} ?>">
                                    <ul>
                                        <li><span class="<?php if (empty($categoryId)){ echo 'active';}else{ echo '';} ?>"><a href="/catalog">Всі</a></span></li> |
                                    </ul>
                                </div>
                                <?php foreach ($category as $categoryItem): ?>
                                    <div class="<?php if ($categoryId == $categoryItem['id']){ echo 'h_menu';}else{ echo 'h_category';} ?>">
                                        <ul>
                                            <!-- <li class="active"><a href="">Home</a></li> | -->
                                            <li><span class="<?php if ($categoryId == $categoryItem['id']) echo 'active'; ?>"><a href="/catalog/<?php echo $categoryItem['id']; ?>">
                                                        <?php echo $categoryItem['name']; ?>
                                                    </a></span>
                                            </li> |

                                        </ul>
                                    </div>
                                <?php endforeach; ?>
                            </ul>
                            <div id="portfoliolist"> 
                                <?php foreach ($product as $productItem) : ?>
                                    <div class="portfolio logo1" data-cat="card">
                                        <div class="portfolio-wrapper">				
                                            <a  href="/details/<?php echo $productItem['id']; ?>">
                                                <img src="/web/images/product/<?php echo $productItem['image']; ?>"  alt="Image" />
                                            </a>
                                            <div class="label">
                                                <div class="label-text">
                                                    <a class="text-title"><?php echo $productItem['name']; ?></a>
                                                    <span class="text-category">indulge</span>
                                                </div>
                                                <div class="label-bg"></div>
                                            </div>
                                        </div>
                                    </div>				
                                <?php endforeach; ?>
                                
                                

                            </div>
                            
                        </div><!-- container -->
                        <script type="text/javascript" src="/web/js/fliplightbox.min.js"></script>
                        <script type="text/javascript">$('body').flipLightBox()</script>
                        <div class="clear"> </div>
                    </div>
                    <!---End-gallery----->
                </div>
            </div>
        </div>		
    

