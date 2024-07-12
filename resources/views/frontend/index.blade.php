<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    {{-- <script>
        (function (w, d, s, l, i) {
          w[l] = w[l] || [];
          w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
          var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != "dataLayer" ? "&l=" + l : "";
          j.async = true;
          j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
          f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-5DDHKGP");
    </script> --}}
    @include('frontend.layouts.head')
    
    <script type="module">
        window.templateCustomizer = new TemplateCustomizer({
        cssPath: '',
        themesPath: '',
        defaultStyle: "light",
        displayCustomizer: "1",
        pathResolver: function(path) {
            var resolvedPaths = {
            // Core stylesheets
                        'core.scss': '/build/assets/css/core.css',
                'core-dark.scss': '/build/assets/css/core-dark.css',
            
            // Themes
                        'theme-default.scss': '/build/assets/css/theme-default.css',
                'theme-default-dark.scss': '/build/assets/css/theme-default-dark.css',
                        'theme-bordered.scss': '/build/assets/css/theme-bordered.css',
                'theme-bordered-dark.scss': '/build/assets/css/theme-bordered-dark.css',
                        'theme-semi-dark.scss': '/build/assets/css/theme-semi-dark.css',
                'theme-semi-dark-dark.scss': '/build/assets/css/theme-semi-dark-dark.css',
                    }
            return resolvedPaths[path] || path;
        },
        'controls': ["rtl","style"],

    });
    </script> 

    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];
            w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});
            var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
            j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;
            f.parentNode.insertBefore(j,f);
        })
        (window,document,'script','dataLayer','GTM-5DDHKGP'); 
    </script>
   
</head>
<body>
    @include('frontend.layouts.js')

    @include('frontend.layouts.navigation')

    <div data-bs-spy="scroll" class="scrollspy-example">
        @include('frontend.pages.home')

        @include('frontend.pages.feature')

        @include('frontend.pages.team')

        @include('frontend.pages.FAQ')

        @include('frontend.pages.contact')
    </div>

    @include('frontend.layouts.footer')

    @include('frontend.layouts.javascript')
</body>
</html>