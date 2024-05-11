{include 'pagepart_htmlhead.tpl'}
{include 'pagepart_bodystart.tpl'}

{foreach $msg as $message}

    <div class="callout alert">
    <p>{$message}</p>
    </div>


{/foreach}



{if !$sys.useauth || $userdata.loggedin}   {* No auth system used or already logged in *}
{include 'pagepart_navbar.tpl'}
{/if}
{if !$sys.useauth || $userdata.loggedin}   {* No auth system used or already logged in *}
    <div class="grid-container">


      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
<!-- x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x -->
<!-- x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x -->
<!-- x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x -->
<!-- x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x -->
            <div id="contentholder"> <!-- START OF CONTENTHOLDER DIV-->


            {include 'pagepart_welcome.tpl'} {* That's the default content which will be overwritten *}
            {include 'pagepart_examplegrid.tpl'}
            {include 'pagepart_examplegridingrid.tpl'}




            </div> <!-- END OF CONTENTHOLDER DIV-->
<!-- x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x -->
<!-- x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x -->
<!-- x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x -->
<!-- x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x -->
        </div>
      </div>


    </div>  <!-- END OF <div class="grid-container"> -->
{else}          {* No auth system used or already logged in *}
    {include 'form_login.tpl'}
{/if}           {* No auth system used or already logged in *}





{$debug}    {* $debug *}

<script>

function ApiFetch(url){
    var RetVal;
    fetchData(url)
        .then(response => {
            RetVal = response;
            console.log(response);
        })
        .catch(error => {
            RetVal = error;
            console.error(error);
        });

    console.log("RetVal:" + RetVal);

}
// Call the function to initiate the GET request

</script>

{include 'pagepart_bodyend.tpl'}
{include 'pagepart_htmlend.tpl'}




