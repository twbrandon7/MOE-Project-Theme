    <!-- Footer -->
    <br/>
    <footer class="page-footer" style="background-color:rgb(89, 73, 63);">
        <div class="container">
            <div class="row footer_content">
                <div class="col s4">
                    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footer-left-widget') ) : else : ?>
                    <?php endif; ?>
                </div>
                <div class="col s4">
                    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footer-center-widget') ) : else : ?>
                    <?php endif; ?>
                </div>
                <div class="col s4">
                    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footer-right-widget') ) : else : ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="footer-copyright center">
            <div class="container">
                <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footer-copyright') ) : else :?>
                <?php endif; ?>
            </div>
        </div>
  </footer>

<?php wp_footer(); ?>
<script>
    $(document).ready(function(){
        // var elem = document.querySelector('.dropdown-trigger');
        // var instance = M.Dropdown.init(elem, {
        //     "hover": true,
        //     "constrainWidth": false
        // });

        // Or with jQuery

        $('.dropdown-trigger').dropdown({
            "hover": true,
            "constrainWidth": false,
        });

        $(document).ready(function(){
            $('.slider').slider();
        });

        $(document).ready(function(){
            $('.index_slider').find('.slider').slider({
                indicators:false,
                interval:3000
            });
        });
    });
</script>
</body>
</html>
