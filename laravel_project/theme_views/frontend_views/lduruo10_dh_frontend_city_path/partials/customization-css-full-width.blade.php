<!-- Start page level nav style -->
<style>
    @media only screen and (min-width: 1400px) and (max-width: 1920px) {
        .header {
            padding: 0px 0px;
        }
        .circle-img {
          width: 6.5rem;
          height: 6.5rem;
          overflow: hidden;
        }
        small{
            font-size: .65em;
        }
    }
    .header {

        background-color: #ffffff;
        top:  0px;
        /*position: sticky;*/
        /*top: 0;*/
    }

    
    .customization-header-font-color {
        color: #323232;
    }
    .customization-header-font-color:hover {
        color: #323232;
    }
    .header__menu ul li a {
        color: #323232;
    }
    .custom-index-area {
        padding-top:calc(.10 * 100vh);
        padding-right: 0;
        padding-left: 0;
        padding-bottom: 0;
    }

    html {
      scroll-behavior: smooth;
    }

    .custom-index-area {
        padding-top:calc(.18 * 100vh);
        padding-right: 0;
        padding-left: 0;
        padding-bottom: 0;
    }

    .categories__item_sm .custom-icon {
        font-size: 20px;
    }

    
     body {
        padding-top: 60px;
        /*background-color: #C7F6FF;*/
      }

     
    /*body {
      padding-top: 20px;
    }
    @media (max-width: 979px) {
      body {
        padding-top: 0px;
      }
    }*/

    .custom-site-logo img { max-height: 120px; }
    .nav {position: sticky;}

    /*.filter {margin-top: 4%; height: auto;}*/
    /*.listing {margin-top: 0%;}*/
   /* .filter {
        padding-top: 160px; 
        height: auto;
        margin-top:3%;
        transition: all .3s;
    }*/

    .filter {
        padding-top: 160px; 
        height: 100%;
        margin-top:2%;
        overflow-y: scroll;
        top:  0;
        bottom: 0;
    }

    .nice-scroll {
        overflow-y: scroll !important; 
        height: 100% !important;
        cursor: default !important;
        touch-action: auto !important;
    }

    .filter.active {
        left: 0;
    }
    .h5{word-wrap: break-word;}
    @media only screen and (min-width: 1200px) and (max-width: 1399px) {
        /*.listing {padding-top: 30%;}*/
        /*.container-fluid {padding-top: 10%;}*/

        .circle-img {
          width: 6.4rem;
          height: 6.4rem;
          overflow: hidden;
        }

        small{
            font-size: .55em;
        }



        /*.filter {padding-top: 40%; align-items: left; }*/
    }
    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        /*.listing {padding-top: 30%;}*/
        /*.container-fluid {padding-top: 10%;}*/

        .card-columns {
                column-count: 3;
            }




        /*.filter {padding-top: 40%; align-items: left; }*/
    }

    @media  only screen and (min-width: 812px) and (max-width: 991px) {
        /*.container-fluid {position: absolute;}*/
        .listing { padding-top: 110px; padding-left: 60px;}

        .filter {padding-top: 160px; height: auto; }
        .card-columns {
           
            column-count: 2;
        }

        .filter { width: 30%;}

     }

    @media only screen and (min-width: 768px) and (max-width: 811px){
        /*.container-fluid {padding-top: 30%;}*/
        .listing { padding-top: 140px; padding-left: 80px; }
        .filter {padding-top: 220px; height: auto;}
        .card-columns {
            column-count: 1;
        }
        /*.coverfilter{padding-top: 10%;}*/
        /*.filter { width: 30%;}*/
    }

    @media only screen and (min-width: 676px) and (max-width: 767px){
        /*.container-fluid {padding-top: 22%;}*/
        .listing { padding-top: 180px;}
        .filter {padding-top: 200px; height: auto;}
        .card-columns {
            column-count: 1;
        }
        /*.filter { width: 30%;}*/
    }

    @media only screen and (min-width: 610px) and (max-width: 675px){
        /*.container-fluid {padding-top: 22%;}*/
        .listing { padding-top: 240px; padding-left: 40px;}
        .filter {padding-top: 240px; height: auto;}
        .card-columns {
            column-count: 1;
        }
        /*.filter { width: 30%;}*/
    }

    @media only screen and (min-width: 576px)   and (max-width: 610px){
        /*.container-fluid {padding-top: 22%;}*/
        .listing { padding-top: 240px; padding-left: 40px;}
        .filter {padding-top: 280px; height: auto;}
        .card-columns {
            column-count: 1;
        }
        /*.filter { width: 30%;}*/

    }
    @media only screen and (min-width: 300px)   and (max-width: 575px){
        /*.container-fluid {padding-top: 22%;}*/
        .listing { padding-top: 80px; padding-left: 40px;}
        .filter {padding-top: 80px; height: auto;}
        .card-columns {
            column-count: 2;
        }

        .custom-site-logo img { max-height: 95px; }

        .circle-img {
          width: 4.5rem;
          height: 4.5rem;
          overflow: hidden;
        }

        small {
            font-size: .5rem;
        }

        .categories__item_sm .custom-icon {
            font-size: .7rem;
        }

        .rounded-circle .categories__item_sm div {
            max-height: 0.5rem;
        }

        .card {
            width: 10rem;
            height: 20rem;
        }
        .listing__item__text__inside h5 {
            font-size: 0.7rem;
        }

        .listing__item__text__inside ul li{
            font-size: 0.5rem;
        }
        .listing__item__text__info__left span {
            font-size: 0.5rem;
        }

         .listing__item__text__rating h6{
            font-size: 0.4rem;
        }

        .listing__item__rating__star {
            width: .5rem;
            
        }

        .item-box-hour-span-opened {
            font-size: 0.4rem;
            font-weight: 200;
            color: #dc3545;
            border: 1px solid #dc3545;
            padding: 0 1em 0 1em;
            border-radius: 3px;
            line-height: 1;
        }

        .item-box-hour-span-closed {
            font-size: 0.4rem;
            font-weight: 200;
            color: #dc3545;
            border: 1px solid #dc3545;
            padding: 0 1em 0 1em;
            border-radius: 3px;
            line-height: 1;
        }
    }


</style>
<!-- End page level nav style -->
