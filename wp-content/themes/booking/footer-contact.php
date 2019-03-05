    <div class="bht-copyright" style="padding-bottom: 0;">
         <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-push-7">
                    <div class="my_footer_menu">
                        <?php
                        wp_nav_menu(array(
                            'menu' => 'footer',
                            'theme_location' => 'footer',
                            'menu_class' => 'list-inline'
                        ));
                        ?>
                    </div>
                </div>
                <div class="col-md-7 col-md-pull-5">
                    <a href="http://www.booking2hotels.com" title="" target="_blank" class="link_copy">
                        <?php get_copyright();?>
                    </a>
                </div>
                 
            </div>
        </div>
    </div>

    <?php
        wp_footer();
        search_init();
    ?>
</body>

</html>