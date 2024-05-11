<div class="top-bar">
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <li class="menu-text">Site Title</li>
      <li class="mega-menu">
        <a data-toggle="mega-menu" href="#">One</a>

        <div class="dropdown-pane bottom" id="mega-menu" data-dropdown data-options="closeOnClick:true; hover: true; hoverPane: true; vOffset:11">

          <div class="row expanded">
            <div class="column">
              <ul class="menu vertical">
                <li><a href="#">One</a></li>
                <li><a href="#">Two</a></li>
                <li><a href="#">Three</a></li>
              </ul>
            </div>
            <div class="column">
              <ul class="menu vertical">
                <li><a href="#">One</a></li>
                <li><a href="#">Two</a></li>
                <li><a href="#">Three</a></li>
              </ul>
            </div>
            <div class="column">
              <ul class="menu vertical">
                <li><a href="#">One</a></li>
                <li><a href="#">Two</a></li>
                <li><a href="#">Three</a></li>
              </ul>
            </div>
            </div>

        </div>
      </li>
      <li><a href="#">Two</a></li>
      <li><a href="#">Three</a></li>
    </ul>
  </div>
  <div class="top-bar-right">
    <ul class="menu">
  
    

    {if $userdata.loggedin}

      {if $userdata.session.auth_roles == "1"}


        <li class="mega-menu">
        <a data-toggle="mega-menu2" href="#">Administration</a>

        <div class="dropdown-pane bottom" id="mega-menu2" data-dropdown data-options="closeOnClick:true; hover: true; hoverPane: true; vOffset:11">

          <div class="row expanded">
            <div class="column">
              <ul class="menu vertical">
                <li><button type="button" class="button" onclick="fetchDataAndDisplay('/settings','contentholder');">Settings</button></li>
                <li><button type="button" class="button" onclick="fetchDataAndDisplay('/userman','contentholder');">User-Manager</button></li>
                <li><a href="#">Three</a></li>
              </ul>
            </div>

            </div>

        </div>
      </li>




        <li><button type="button" class="button" onclick="fetchDataAndDisplay('/settings','contentholder');">Settings</button></li>
      {/if}



        <form method="post">
        <li><input type="hidden" name="act" value="logout"></li>
        <li><button type="submit" class="button">Logout</button></li>
        </form>

    {/if}    

    </ul>
  </div>
</div>
