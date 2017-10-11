<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<body class="hold-transition login-page" style="background-color: #222222;">
    <form action="<?php echo url('/RouteSubmit/SendEmail');?>" method="post">
<div class="login-box">
         <div class="login-logo">
                 <a href="" style="color: white;">Route<b>Submit</b></a>
         </div>
         <!-- /.login-logo -->
         <div class="login-box-body">
                 <p class="login-box-msg" style="font-size: 13px;">Please complete this form to send your route.</p>
                 <form method="post" action="<?php echo url('/routesubmit');?>">
                     
                  <div class="form-group" align="center">
                  <tr>
                    <td><strong>Name:</strong></td>
                  <td>
                    <?php
                    
                      if(Auth::LoggedIn())
                    {
                      echo Auth::$userinfo->firstname .' '.Auth::$userinfo->lastname;
                      echo '<input type="hidden" name="name"
                      value="'.Auth::$userinfo->firstname
                      .' '.Auth::$userinfo->lastname.'" />';
                    } else {
                       
                    ?>
                    <input type="text" name="name" value="" />
                    
                    <?php
                    }
                    ?>
                    
                  </td>
                  </tr>
                  </div>
                  
                  <div class="form-group" align="center">
                  <tr>
                      <td width="1%" nowrap><strong>Endereço de E-mail:</strong></td>
                      <td>
                    <?php
                      if(Auth::LoggedIn())
                    {
                      echo Auth::$userinfo->email;
                      echo '<input type="hidden" name="name"
                      value="'.Auth::$userinfo->email.'" />';
                    } else {
                    ?>
   
                    <input type="text" name="email" value="" />
                      
                    <?php
                    }
                    ?>
                    
                  </td>
                  </tr>
                  </div>
                  
                  <div class="form-group">
                      <input type="text" name="departure" class="form-control" value="<?php echo Vars::POST('lastname');?>" placeholder="Departure ICAO">
                    <?php
                      if($departure_error == true)
                      echo '<p class="error">Please enter your departure ICAO</p>';
                      ?>
                  </div>
                  
                  <div class="form-group">
                      <input type="text" name="arr" class="form-control" placeholder="Arrival ICAO">
                    <?php
                      if($arrival_error == true)
                      echo '<p class="error">Please enter your arrival ICAO</p>';
                      ?>
                  </div>
                  
                  <div class="form-group">
                      <input type="text" name="route" class="form-control" placeholder="Route">
                    <?php
                      if($route_error == true)
                      echo '<p class="error">Please enter your route</p>';
                      ?>
                  </div>
                  
                                    <div class="form-group">
                      <select name="Aircraft" class="form-control">
                         <option value=" ">Select your aircraft</option>
                         <option value=" ">Airbus</option>
                         <option>Airbus A318-111</option>
                         <option>Airbus A319-111</option>
                         <option>Airbus A320-211</option>
                         <option>Airbus A321-211</option>
                         <option value=" ">Boeing</option>
                         <option>Boeing 737-800/W</option>
                         <option>Boeing 737-900/W</option>
                         <option>Boeing 747-400</option>
                         <option>Boeing 747-400F</option>
                         <option>Boeing 747-800I</option>
                         <option>Boeing 757-200</option>
                         <option>Boeing 767-300</option>
                         <option>Boeing 777-200LR</option>
                         <option>Boeing 777-300ER</option>
                         <option>Boeing 777-200F</option>
                         <option value=" ">De Havilland</option>
                         <option>DHC-8-400</option>
                         <option value=" ">McDonnell Douglas</option>
                         <option>MD-11</option>
                         <option>MD-11F</option>
                      </select>
                          <?php
							 if($aircraft_error == true)
							 echo '<p class="error">Please enter your aircraft</p>';
                          ?>
                  </div>
                  
                  <div class="form-group">
                      <input type="text" name="fl" class="form-control" placeholder="Flight level">
                    <?php
                      if($flightlevel_error == true)
                      echo '<p class="error">Please enter your flight level</p>';
                      ?>
                  </div>
                  
                  <div class="form-group">
                      <input type="text" name="dtime" class="form-control" placeholder="Departure Time">
                    <?php
                      if($departuretime_error == true)
                      echo '<p class="error">Please enter your departure time</p>';
                      ?>
                  </div>
                  
                  <div class="form-group">
                      <input type="text" name="atime" class="form-control" placeholder="Arrival Time">
                    <?php
                      if($arrivaltime_error == true)
                      echo '<p class="error">Please enter your arrival time</p>';
                      ?>
                  </div>
                  
                  <div class="form-group">
                      <input type="text" name="ftime" class="form-control" placeholder="Flight Time">
                    <?php
                      if($flighttime_error == true)
                      echo '<p class="error">Please enter your flight time</p>';
                      ?>
                  </div>
            
                     <?php
            
                     //Put this in a seperate template. Shows the Custom Fields for form
                     Template::Show('routesubmit/routesubmit_customfields.php');
            
                     ?>
                    
                     <div class="form-group">
                             <?php if(isset($captcha_error)){echo '<p class="error">'.$captcha_error.'</p>';} ?>
                             <div class="g-recaptcha" data-sitekey="<?php echo $sitekey;?>"></div>
                             <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>"></script>
                     </div>
            
                     <tr>
                       <td>
                             <input type="hidden" name="loggedin" value="<?php echo (Auth::LoggedIn())?'true':'false'?>" />
                       </td>
                     <td>
                  <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value='Submit Route'>
                     </td>
                         <!-- /.col -->
                     </tr>
                 </form>
         </div>
         <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- iCheck -->
<script src="<?php echo SITE_URL?>/lib/skins/crewcenter/plugins/iCheck/icheck.min.js"></script>
<script>
         $(function () {
         $('input').iCheck({
                 checkboxClass: 'icheckbox_square-blue',
                 radioClass: 'iradio_square-blue',
                 increaseArea: '20%' // optional
         });
         });
</script>
