<!DOCTYPE html>

<!-- beautify ignore:start -->

<html lang="en" class="light-style layout-navbar-fixed layout-wide" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="front-pages" data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') | Portfolio Galih</title>

    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, material, material design, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5" />
    <!-- Canonical SEO -->
    <link rel="canonical" href="#" />

    <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <script>
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
    </script>
    <!-- End Google Tag Manager -->

    @include('frontend.layouts.head')
  </head>

  <body>
    @include('frontend.layouts.js')

    @include('frontend.layouts.navigation')
    <!-- Sections:Start -->

    <div data-bs-spy="scroll" class="scrollspy-example">
        @yield('content')
    </div>

    <!-- / Sections:End -->

    @include('frontend.layouts.footer')

   @include('frontend.layouts.javascript')
  </body>
</html>

<!-- beautify ignore:end -->
