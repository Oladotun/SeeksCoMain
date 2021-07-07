<style>
    /**
     * Start website global style
     */
    a {
        color: {{ $customization_site_primary_color }};
    }
    .primary-btn {
        background: {{ $customization_site_primary_color }};
        border: 1px solid {{ $customization_site_primary_color }};
    }
    .primary-btn:hover {
        color: {{ $customization_site_primary_color }} !important;
    }
    .primary-text {
        color: {{ $customization_site_primary_color }};
    }
    .breadcrumb__option i {
        color: {{ $customization_site_primary_color }} !important;
    }
    .breadcrumb-item a {
        color: {{ $customization_site_primary_color }};
    }
    .page-item.active .page-link {
        background-color: {{ $customization_site_primary_color }};
        border-color: {{ $customization_site_primary_color }};
    }
    .page-item .page-link:hover {
        background-color: {{ $customization_site_primary_color }};
        border-color: {{ $customization_site_primary_color }};
    }
    /**
     * End website global style
     */

    /*
     * Start website filter
     */
    .filter__location i {
        color: {{ $customization_site_primary_color }};
    }
    .filter__location input:focus {
        border-color: {{ $customization_site_primary_color }};
    }
    .filter__btns button {
        background: {{ $customization_site_primary_color }};
        border: 1px solid {{ $customization_site_primary_color }};
    }
    .filter__btns button:hover {
        color: {{ $customization_site_primary_color }};
    }
    .filter__tags label input:checked~.checkmark {
        background: {{ $customization_site_primary_color }};
    }
    /*
     * End website filter
     */

    /**
     * Start website nav menu
     */
    .header {
        background-color: {{ $customization_site_header_background_color }};
    }
    .customization-header-font-color {
        color: {{ $customization_site_header_font_color }};
    }
    .customization-header-font-color:hover {
        color: {{ $customization_site_header_font_color }};
    }
    .header__menu ul li a {
        color: {{ $customization_site_header_font_color }};
    }
    .nav-primary-btn:hover {
        color: {{ $customization_site_primary_color }} !important;
    }
    .custom-site-logo a span {
        color: {{ $customization_site_primary_color }};
    }
    .custom-site-logo img { max-height: 150px; }
    .footer__about__logo img {max-height: 100px;}
    .header__menu ul li a:after {
        background: {{ $customization_site_primary_color }} !important;
    }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .slicknav_nav a:hover {
            color: {{ $customization_site_primary_color }} !important;
        }
        .slicknav_nav .slicknav_row:hover {
            color: {{ $customization_site_primary_color }} !important;
        }
        .slicknav_btn {
            background: {{ $customization_site_primary_color }} !important;
        }
    }
    @media only screen and (max-width: 767px) {
        .slicknav_nav a:hover {
            color: {{ $customization_site_primary_color }} !important;
        }
        .slicknav_nav .slicknav_row:hover {
            color: {{ $customization_site_primary_color }} !important;
        }
        .slicknav_btn {
            background: {{ $customization_site_primary_color }} !important;
        }
    }
    /**
     * End website nav menu
     */


    /**
    * Start website footer
    */
    .footer {
        background: {{ $customization_site_footer_background_color }} !important;
    }
    .footer__copyright {
        background: {{ $customization_site_footer_background_color }} !important;
        border-top: 1px solid {{ $customization_site_footer_font_color }} !important;
    }
    .footer__about p {
        color: {{ $customization_site_footer_font_color }} !important;
    }
    .footer__widget p {
        color: {{ $customization_site_footer_font_color }} !important;
    }
    .footer__widget ul li a {
        color: {{ $customization_site_footer_font_color }} !important;
    }
    .footer__widget a {
        color: {{ $customization_site_footer_font_color }} !important;
    }
    .footer__copyright__links a {
        color: {{ $customization_site_footer_font_color }} !important;
    }
    .footer__widget ul li a:hover {
        color: {{ $customization_site_primary_color }} !important;
    }
    .footer__widget a:hover {
        color: {{ $customization_site_primary_color }} !important;
    }
    .footer__copyright__links a:hover {
        color: {{ $customization_site_primary_color }} !important;
    }
    .footer__copyright__text p {
        color: {{ $customization_site_footer_font_color }} !important;
    }
    .footer .btn-footer-dropdown {
        color: {{ $customization_site_footer_font_color }};
        border-color: {{ $customization_site_footer_font_color }};
    }
    /**
    * End website footer
    */

    /**
    * Start website search bar
    */
    .hero__search__form form button {
        background: {{ $customization_site_primary_color }} !important;
    }
    /**
    * End website search bar
    */


    /**
     * Start website index page
     */
    @media only screen and (max-width: 991px) {
        .custom-all-categories-div .custom-icon {
            color: {{ $customization_site_primary_color }};
        }
    }
    .listing__item__pic__tag {
        background: {{ $customization_site_primary_color }} !important;
    }
    .listing__item__text__inside ul li a:hover {
        color: {{ $customization_site_primary_color }};
    }
    .listing__item__text__inside h5:hover {
        color: {{ $customization_site_primary_color }};
    }
    .listing__item__text__info__left span:hover {
        color: {{ $customization_site_primary_color }} !important;
    }
    .testimonial .section-title i {
        color: {{ $customization_site_primary_color }};
    }
    .testimonial__slider.owl-carousel .owl-nav button {
        background: {{ $customization_site_primary_color }};
    }
    .testimonial__slider.owl-carousel .owl-nav button:hover {
        color: {{ $customization_site_primary_color }};
    }
    .testimonial__item span {
        color: {{ $customization_site_primary_color }} !important;
    }
    .blog__item__text h5 a:hover {
        color: {{ $customization_site_primary_color }} !important;
    }
    .blog__item__text .blog__item__tags li {
        color: {{ $customization_site_primary_color }} !important;
    }
    /**
     * End website index page
     */

    /**
     * Start website contact page
     */
    .faq .accordion-item:hover {
        color: {{ $customization_site_primary_color }} !important;
    }
    /**
     * End website contact page
     */


    /**
     * Start website blog index page
     */
    .blog__item__text h3 a:hover {
        color: {{ $customization_site_primary_color }} !important;
    }
    .blog__sidebar .blog__sidebar__recent .blog__sidebar__recent__item__text h6:hover {
        color: {{ $customization_site_primary_color }};
    }
    .blog__sidebar__recent__item__text span {
        color: {{ $customization_site_primary_color }} !important;
    }
    .blog__sidebar__categories ul li a:hover {
        color: {{ $customization_site_primary_color }};
    }
    .blog__sidebar__tags a:hover {
        background: {{ $customization_site_primary_color }};
    }
    /**
     * End website blog index page
     */

    /**
     * Start website blog detail page
     */
    .blog__hero__text .label {
        background: {{ $customization_site_primary_color }};
    }
    .blog__details__tags a:hover {
        background: {{ $customization_site_primary_color }};
    }
    /**
     * End website blog detail page
     */
</style>

