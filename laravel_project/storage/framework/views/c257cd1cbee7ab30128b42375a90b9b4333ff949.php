<style>
    /**
     * Start website global style
     */
    a {
        color: <?php echo e($customization_site_primary_color); ?>;
    }
    .custom-site-logo img { max-height: 200px; }
    .primary-btn {
        background: <?php echo e($customization_site_primary_color); ?>;
        border: 1px solid <?php echo e($customization_site_primary_color); ?>;
    }
    .primary-btn:hover {
        color: <?php echo e($customization_site_primary_color); ?> !important;
    }
    .primary-text {
        color: <?php echo e($customization_site_primary_color); ?>;
    }
    .breadcrumb__option i {
        color: <?php echo e($customization_site_primary_color); ?> !important;
    }
    .breadcrumb-item a {
        color: <?php echo e($customization_site_primary_color); ?>;
    }
    .page-item.active .page-link {
        background-color: <?php echo e($customization_site_primary_color); ?>;
        border-color: <?php echo e($customization_site_primary_color); ?>;
    }
    .page-item .page-link:hover {
        background-color: <?php echo e($customization_site_primary_color); ?>;
        border-color: <?php echo e($customization_site_primary_color); ?>;
    }
    /**
     * End website global style
     */

    /*
     * Start website filter
     */
    .filter__location i {
        color: <?php echo e($customization_site_primary_color); ?>;
    }
    .filter__location input:focus {
        border-color: <?php echo e($customization_site_primary_color); ?>;
    }
    .filter__btns button {
        background: <?php echo e($customization_site_primary_color); ?>;
        border: 1px solid <?php echo e($customization_site_primary_color); ?>;
    }
    .filter__btns button:hover {
        color: <?php echo e($customization_site_primary_color); ?>;
    }
    .filter__tags label input:checked~.checkmark {
        background: <?php echo e($customization_site_primary_color); ?>;
    }
    /*
     * End website filter
     */

    /**
     * Start website nav menu
     */
    .header {
        background-color: <?php echo e($customization_site_header_background_color); ?>;
    }
    .customization-header-font-color {
        color: <?php echo e($customization_site_header_font_color); ?>;
    }
    .customization-header-font-color:hover {
        color: <?php echo e($customization_site_header_font_color); ?>;
    }
    .header__menu ul li a {
        color: <?php echo e($customization_site_header_font_color); ?>;
    }
    .nav-primary-btn:hover {
        color: <?php echo e($customization_site_primary_color); ?> !important;
    }
    .custom-site-logo a span {
        color: <?php echo e($customization_site_primary_color); ?>;
    }
    .header__menu ul li a:after {
        background: <?php echo e($customization_site_primary_color); ?> !important;
    }
    @media  only screen and (min-width: 768px) and (max-width: 991px) {
        .slicknav_nav a:hover {
            color: <?php echo e($customization_site_primary_color); ?> !important;
        }
        .slicknav_nav .slicknav_row:hover {
            color: <?php echo e($customization_site_primary_color); ?> !important;
        }
        .slicknav_btn {
            background: <?php echo e($customization_site_primary_color); ?> !important;
        }
    }
    @media  only screen and (max-width: 767px) {
        .slicknav_nav a:hover {
            color: <?php echo e($customization_site_primary_color); ?> !important;
        }
        .slicknav_nav .slicknav_row:hover {
            color: <?php echo e($customization_site_primary_color); ?> !important;
        }
        .slicknav_btn {
            background: <?php echo e($customization_site_primary_color); ?> !important;
        }
    }
    /**
     * End website nav menu
     */


    /**
    * Start website footer
    */
    .footer {
        background: <?php echo e($customization_site_footer_background_color); ?> !important;
    }
    .footer__copyright {
        background: <?php echo e($customization_site_footer_background_color); ?> !important;
        border-top: 1px solid <?php echo e($customization_site_footer_font_color); ?> !important;
    }
    .footer__about p {
        color: <?php echo e($customization_site_footer_font_color); ?> !important;
    }
    .footer__widget p {
        color: <?php echo e($customization_site_footer_font_color); ?> !important;
    }
    .footer__widget ul li a {
        color: <?php echo e($customization_site_footer_font_color); ?> !important;
    }
    .footer__widget a {
        color: <?php echo e($customization_site_footer_font_color); ?> !important;
    }
    .footer__copyright__links a {
        color: <?php echo e($customization_site_footer_font_color); ?> !important;
    }
    .footer__widget ul li a:hover {
        color: <?php echo e($customization_site_primary_color); ?> !important;
    }
    .footer__widget a:hover {
        color: <?php echo e($customization_site_primary_color); ?> !important;
    }
    .footer__copyright__links a:hover {
        color: <?php echo e($customization_site_primary_color); ?> !important;
    }
    .footer__copyright__text p {
        color: <?php echo e($customization_site_footer_font_color); ?> !important;
    }
    .footer .btn-footer-dropdown {
        color: <?php echo e($customization_site_footer_font_color); ?>;
        border-color: <?php echo e($customization_site_footer_font_color); ?>;
    }

    .footer__about__logo img { max-height: 150px; }
    /*.footer__about__logo{border: border-dark;}*/
    /**
    * End website footer
    */

    /**
    * Start website search bar
    */
    .hero__search__form form button {
        background: <?php echo e($customization_site_primary_color); ?> !important;
    }
    /**
    * End website search bar
    */


    /**
     * Start website index page
     */
    @media  only screen and (max-width: 991px) {
        .custom-all-categories-div .custom-icon {
            color: <?php echo e($customization_site_primary_color); ?>;
        }
    }
    .listing__item__pic__tag {
        background: <?php echo e($customization_site_primary_color); ?> !important;
    }
    .listing__item__text__inside ul li a:hover {
        color: <?php echo e($customization_site_primary_color); ?>;
    }
    .listing__item__text__inside h5:hover {
        color: <?php echo e($customization_site_primary_color); ?>;
    }
    .listing__item__text__info__left span:hover {
        color: <?php echo e($customization_site_primary_color); ?> !important;
    }
    .testimonial .section-title i {
        color: <?php echo e($customization_site_primary_color); ?>;
    }
    .testimonial__slider.owl-carousel .owl-nav button {
        background: <?php echo e($customization_site_primary_color); ?>;
    }
    .testimonial__slider.owl-carousel .owl-nav button:hover {
        color: <?php echo e($customization_site_primary_color); ?>;
    }
    .testimonial__item span {
        color: <?php echo e($customization_site_primary_color); ?> !important;
    }
    .blog__item__text h5 a:hover {
        color: <?php echo e($customization_site_primary_color); ?> !important;
    }
    .blog__item__text .blog__item__tags li {
        color: <?php echo e($customization_site_primary_color); ?> !important;
    }
    /**
     * End website index page
     */

    /**
     * Start website contact page
     */
    .faq .accordion-item:hover {
        color: <?php echo e($customization_site_primary_color); ?> !important;
    }
    /**
     * End website contact page
     */


    /**
     * Start website blog index page
     */
    .blog__item__text h3 a:hover {
        color: <?php echo e($customization_site_primary_color); ?> !important;
    }
    .blog__sidebar .blog__sidebar__recent .blog__sidebar__recent__item__text h6:hover {
        color: <?php echo e($customization_site_primary_color); ?>;
    }
    .blog__sidebar__recent__item__text span {
        color: <?php echo e($customization_site_primary_color); ?> !important;
    }
    .blog__sidebar__categories ul li a:hover {
        color: <?php echo e($customization_site_primary_color); ?>;
    }
    .blog__sidebar__tags a:hover {
        background: <?php echo e($customization_site_primary_color); ?>;
    }
    /**
     * End website blog index page
     */

    /**
     * Start website blog detail page
     */
    .blog__hero__text .label {
        background: <?php echo e($customization_site_primary_color); ?>;
    }
    .blog__details__tags a:hover {
        background: <?php echo e($customization_site_primary_color); ?>;
    }
    /**
     * End website blog detail page
     */

    /**
     * Start listing box
     */
    .listing__item_featured_box {
        border: 1px solid <?php echo e($customization_site_primary_color); ?>;
    }
    /**
     * End listing box
     */
</style>

<?php /**PATH /var/www/seekscodirectory/laravel_project/theme_views/frontend_views/lduruo10_dh_frontend_city_path/partials/customization-css.blade.php ENDPATH**/ ?>