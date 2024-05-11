{include 'pagepart_htmlhead.tpl'}
{include 'pagepart_bodystart.tpl'}

{foreach $msg as $message}

    <div class="callout alert">
    <p>{$message}</p>
    </div>


{/foreach}



{if $sys.useauth}   {* No auth system used or already logged in *}

<div class="grid-x grid-padding-x">
  <div class="large-12 cell">
    <form class="callout text-center" method="post">
    <h2>Become A Member</h2>
    <div class="floated-label-wrapper">
      <label for="full-name">Full name</label>
      <input type="text" id="full-name" name="username" placeholder="Username">
    </div>
    <div class="floated-label-wrapper">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Email">
    </div>
    <div class="floated-label-wrapper">
      <label for="pass">Password</label>
      <input type="password" id="pass" name="password" placeholder="Password">
    </div>
    <input class="button expanded" type="submit" value="Sign up">
    </form>
  </div>
</div>

{else}
<center><h1>User authentification disabled</h1></center>


{/if}


    {$debug}


{include 'pagepart_bodyend.tpl'}
{include 'pagepart_htmlend.tpl'}




