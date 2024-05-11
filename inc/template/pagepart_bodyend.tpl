    <script src="assets/js/vendor/jquery.js"></script>
    <script src="assets/js/vendor/what-input.js"></script>
    <script src="assets/js/vendor/foundation.js"></script>
    <script src="assets/js/app.js"></script>
{foreach $sys.js as $jscript}


<!-- Script {$jscript} start-->
<script>
{include "js/$jscript"}
</script>
<!-- Script {$jscript} end-->


{/foreach}
  </body>
