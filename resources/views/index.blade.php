<!doctype html>
<html ng-app="app" ng-strict-di>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ecosystem Mapping Platform</title>

    <meta name="theme-color" content="#0690B7">

    <link rel="manifest" href="manifest.json">

    <!--[if lte IE 10]>
    <script type="text/javascript">document.location.href = '/unsupported-browser'</script>
    <![endif]-->

    <style><?php require( public_path( "css/critical.css" ) ) ?></style>
    <style><?php require( public_path( "fonts/ionicons.min.css" ) ) ?></style>


</head>
<body>

    <!-- <app-shell>
        <div id="app-shell-content"></div>
    </app-shell> -->

    <app-view></app-view>


    <script>
    (function(){
        var link = document.createElement("link");
        link.href = "{!! elixir('css/final.css') !!}";
        link.type = "text/css";
        link.rel = "stylesheet";
        document.body.appendChild(link);
    })();
    </script>

    <script  async defer src="{!! elixir('js/final.js') !!}"></script>

</body>
</html>
