
        @yield('css')

        <!-- App css -->
        <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/app-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/all.css')}}" rel="stylesheet" type="text/css" />

        <style>
            @font-face {
                font-family: "YekanWeb";
                src: url("/fonts/iranyekanwebregular.ttf)") format('truetype'),
                url("/fonts/iranyekanwebregular.woff") format("woff");
            }


            @font-face {
                font-family: IRANSans;
                font-style: normal;
                font-weight: 900;
                src: url('/fonts/IRANSans-NoEN/eot/IRANSansWeb(NoEn)_Black.eot');
                src: url('/fonts/IRANSans-NoEN/eot/IRANSansWeb(NoEn)_Black.eot?#iefix') format('embedded-opentype'),  /* IE6-8 */
                url('/fonts/IRANSans-NoEN/woff2/IRANSansWeb(NoEn)_Black.woff2') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
                url('/fonts/IRANSans-NoEN/woff/IRANSansWeb(NoEn)_Black.woff') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
                url('/fonts/IRANSans-NoEN/ttf/IRANSansWeb(NoEn)_Black.ttf') format('truetype');
            }
            @font-face {
                font-family: IRANSans;
                font-style: normal;
                font-weight: bold;
                src: url('/fonts/IRANSans-NoEN/eot/IRANSansWeb(NoEn)_Bold.eot');
                src: url('/fonts/IRANSans-NoEN/eot/IRANSansWeb(NoEn)_Bold.eot?#iefix') format('embedded-opentype'),  /* IE6-8 */
                url('/fonts/IRANSans-NoEN/woff2/IRANSansWeb(NoEn)_Bold.woff2') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
                url('/fonts/IRANSans-NoEN/woff/IRANSansWeb(NoEn)_Bold.woff') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
                url('/fonts/IRANSans-NoEN/ttf/IRANSansWeb(NoEn)_Bold.ttf') format('truetype');
            }
            @font-face {
                font-family: IRANSans;
                font-style: normal;
                font-weight: 500;
                src: url('/fonts/IRANSans-NoEN/eot/IRANSansWeb(NoEn)_Medium.eot');
                src: url('/fonts/IRANSans-NoEN/eot/IRANSansWeb(NoEn)_Medium.eot?#iefix') format('embedded-opentype'),  /* IE6-8 */
                url('/fonts/IRANSans-NoEN/woff2/IRANSansWeb(NoEn)_Medium.woff2') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
                url('/fonts/IRANSans-NoEN/woff/IRANSansWeb(NoEn)_Medium.woff') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
                url('/fonts/IRANSans-NoEN/ttf/IRANSansWeb(NoEn)_Medium.ttf') format('truetype');
            }
            @font-face {
                font-family: IRANSans;
                font-style: normal;
                font-weight: 300;
                src: url('/fonts/IRANSans-NoEN/eot/IRANSansWeb(NoEn)_Light.eot');
                src: url('/fonts/IRANSans-NoEN/eot/IRANSansWeb(NoEn)_Light.eot?#iefix') format('embedded-opentype'),  /* IE6-8 */
                url('/fonts/IRANSans-NoEN/woff2/IRANSansWeb(NoEn)_Light.woff2') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
                url('/fonts/IRANSans-NoEN/woff/IRANSansWeb(NoEn)_Light.woff') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
                url('/fonts/IRANSans-NoEN/ttf/IRANSansWeb(NoEn)_Light.ttf') format('truetype');
            }
            @font-face {
                font-family: IRANSans;
                font-style: normal;
                font-weight: 200;
                src: url('/fonts/IRANSans-NoEN/eot/IRANSansWeb(NoEn)_UltraLight.eot');
                src: url('/fonts/IRANSans-NoEN/eot/IRANSansWeb(NoEn)_UltraLight.eot?#iefix') format('embedded-opentype'),  /* IE6-8 */
                url('/fonts/IRANSans-NoEN/woff2/IRANSansWeb(NoEn)_UltraLight.woff2') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
                url('/fonts/IRANSans-NoEN/woff/IRANSansWeb(NoEn)_UltraLight.woff') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
                url('/fonts/IRANSans-NoEN/ttf/IRANSansWeb(NoEn)_UltraLight.ttf') format('truetype');
            }
            @font-face {
                font-family: IRANSans;
                font-style: normal;
                font-weight: normal;
                src: url('/fonts/IRANSans-NoEN/eot/IRANSansWeb(NoEn).eot');
                src: url('/fonts/IRANSans-NoEN/eot/IRANSansWeb(NoEn).eot?#iefix') format('embedded-opentype'),  /* IE6-8 */
                url('/fonts/IRANSans-NoEN/woff2/IRANSansWeb(NoEn).woff2') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
                url('/fonts/IRANSans-NoEN/woff/IRANSansWeb(NoEn).woff') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
                url('/fonts/IRANSans-NoEN/ttf/IRANSansWeb(NoEn).ttf') format('truetype');
            }
            *{
                font-family: Nunito,Cerebri Sans,IRANSans,sans-serif,"Font Awesome 5 Pro","Material Design Icons" !important
            }
        </style>

{{--        <script src="https://kit.fontawesome.com/1dea923e8b.js" crossorigin="anonymous"></script>--}}

<script src="./js/app.js" type="javascript"></script>