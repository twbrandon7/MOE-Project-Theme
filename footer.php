    <!-- Footer -->
    <br/>
    <footer class="page-footer center" style="background-color:rgb(89, 73, 63);">
        <div class="container">
            <div class="row">
                <div class="col l3 s12 white-text">
                    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footer-left-widget') ) : else : ?>
                    <?php endif; ?>
                </div>
                <div class="col l3 s12">
                    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footer-center-widget') ) : else : ?>
                    <?php endif; ?>
                </div>
                <div class="col l3 s12">
                    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footer-right-widget') ) : else : ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
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
    });
</script>
</body>
</html>
