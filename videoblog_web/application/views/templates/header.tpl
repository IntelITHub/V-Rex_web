<div class="navbar navbar-fixed-top">
    <div class="navbar-inner topbgchenge">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
            </a>
            <a class="brand" href="{$data.base_url}" title="MediaLytix"><img class="logomain" src="{$data.base_image}logo.png" alt="">
            </a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i>
                        {$data.user_info.vFirstName} {$data.user_info.vLastName} <i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="{$data.base_url}Profile">Profile</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="{$data.base_url}changepassword">Change Password</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a tabindex="-1" href="{$data.base_url}logout">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
               
                <ul class="nav tpmenu" style="clear:left;">
                    <li class="{if $data.url_name eq 'home'}active tpact {else} btnblue {/if}">
                        <a href="{$data.base_url}home">Dashboard</a>
                    </li>
                    <li class="dropdown btnblue">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="{$data.base_url}language">Master <b class="caret"></b></a>
                        <ul class="dropdown-menu" id="menu1">
                            <li>
                                <a href="{$data.base_url}country">Country</a>
                                <a href="{$data.base_url}state">States</a>
                                <a href="{$data.base_url}category">Categories</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown btnblue">
                        <a href="{$data.base_url}user" data-toggle="dropdown" class="dropdown-toggle">Users <b class="caret"></b></a>
                          <ul class="dropdown-menu" id="menu1">
                            <li>
                                <a href="{$data.base_url}role">Roles</a>
                                <a href="{$data.base_url}user">Users</a>
                                <a href="{$data.base_url}loginlogs">Login Logs</a>
                                <!--<a href="{$data.base_url}client">Client</a>-->
                                <a href="{$data.base_url}member">Member</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{if $data.url_name eq 'post'}active tpact {else} btnblue {/if}">
                        <a href="{$data.base_url}post">Posts</b></a>
                    </li>
                    <li class="{if $data.url_name eq 'apk'}active tpact {else} btnblue {/if}">
                        <a href="{$data.base_url}apk">Apk</b></a>
                    </li>
                    <li class="dropdown btnblue">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Settings <b class="caret"></b></a>
                          <ul class="dropdown-menu" id="menu1">
                            <li>
                                <a href="{$data.base_url}language">Languages</a>
                                <a href="{$data.base_url}languagelabel">Language Label</a>
                                <a href="{$data.base_url}staticpage">Static Pages</a>
                                 <a href="{$data.base_url}configuration">Configration</a>
                                <a href="{$data.base_url}emailtemplate">Email Template</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>

