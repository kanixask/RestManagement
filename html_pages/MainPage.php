<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Rest Admin</title>
    <link rel="stylesheet" type="text/css" href="Style.css" />
    <script src="jquery-3.3.1.min.js"></script>
    <script src="jquery.sticky.js"></script>
    <script>
    	$(document).ready(function(){
    		$(".bar_links").hover(
    			function() {
    				$( this ).css('text-decoration', 'underline');
    			}, function() {
    				$( this ).css('text-decoration', '');
    			}
    		);
    
    		$(".login").hover(
    			function() {
    				$( this ).css('text-decoration', 'underline');
    			}, function() {
    				$( this ).css('text-decoration', '');
    			}
             );
              
              $(".registersubmit").hover(
        		function() {
        			$( this ).css('text-decoration', 'underline');
        		}, function() {
        			$( this ).css('text-decoration', '');
        		}
              );
              
              $("#sticker").sticky({topSpacing:0});
              
              $('#lnkWhatIs').click(function (event) {
                event.stopPropagation();
                var Position = jQuery('#divWhatIs').offset().top;
                jQuery('html, body').animate({ scrollTop: Position }, 1100);
                return false;
              });
              
              $("#btnForget").hover(
    			function() {
    				$( this ).css('text-decoration', 'underline');
    			}, function() {
    				$( this ).css('text-decoration', '');
    			}
              );          
            });
            
            function ValidateUser(){
                if($('#txtName').val() == "" || $('#txtPass1').val() == "" || $('#txtPass2').val() == "" || $('#txtUserName').val() == "" || $('#txtEmail').val() == ""){
                    $('#lblErrorPass').text('Missing fields');
                    return false;
                }
                
                if($('#txtPass1').val() != $('#txtPass2').val()){
                    $('#lblErrorPass').text('The passwords are not the same');
                    return false;
                }else{
                    return true;
                }
            }
		</script>
  </head>
  <body>
    <div>
      <table style="width: 100%;">
        <tbody>
          <tr>
            <td style="width: 40%;text-align: left;padding-left: 50px;" colspan="1">
              <a href="http://localhost/RestAdmin/html_pages/MainPage.php"> <img

                  src="../res/RA.jpg" alt="RA" title="RA" /> </a> </td>
            <td style="width: 60%;text-align: right;padding-top: 20px;">
              <form action="../php/Login.php" method="post">
                <table style="width: 100%;">
                  <tbody>
                    <tr>
                      <td style="text-align:right;padding-right: 15px; width: 50%">
                        <span class="login_label">Username:</span> </td>
                      <td style="text-align:right;padding-right: 15px;"> <input

                          class="login_inputs" name="username" type="text" /> </td>
                      <td style="text-align:right;padding-right: 15px;"> <span

                          class="login_label">Password:</span> </td>
                      <td style="text-align:right;padding-right: 15px;"> <input

                          class="login_inputs" name="password" type="password" />
                      </td>
                      <td> <input id="isweb" name="isweb" value="1" type="hidden" />
                        <input class="login" value="Login In" type="submit"> </td>
                    </tr>
                    <tr>
                      <td colspan="2" style="text-align:right;padding-right: 15px; width: 50%">
                        <span class="err">
                          <?php if (isset($_GET['Error']) && $_GET['Error'] ==
                            "WrongUsername") {
                                echo "Wrong User Name or Password";
                            } ?>
                        </span> <br />
                      </td>
                      <td colspan="3">
                        <?php if (isset($_GET["Error"]) && $_GET["Error"] == "WrongUsername") {
                                echo "<input id='btnForget' type='button' class='forget' value='Forget Your Password?'";
                            } ?>
                        <br />
                      </td>
                    </tr>
                  </tbody>
                </table>
              </form>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div id="sticker">
      <table style="width:100%;">
        <tbody>
          <tr>
            <td class="bar"> <input id="lnkWhatIs" class="bar_links" value="What is Rest Admin?" type="button" /> 
                <span class="bar_label">|</span>
                <input class="bar_links" value="Contact Us" type="button" /> 
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div>
      <table style="width:100%;">
        <tbody>
          <tr>
            <td class="top_td">
              <table style="width:100%">
                <tbody>
                  <tr>
                    <td style="text-align:center;width:50%"> <span class="landing_text">Rest
                        Admin is an App</span> <br/>
                      <span class="landing_text">Designed to Administrate
                        Restaurants</span> <br/>
                      <span class="landing_text">In an Easy and Intuitive Way</span>
                    </td>
                    <td style="width:50%;padding-left:100px;">
                      <div class="registerbox">
                        <form action="../php/InsertUser.php" method="post">
                          <table style="width:100%;">
                            <tbody>
                              <tr>
                                <td style="width: 100%;text-align:center;"> <span class="register">Register for a free trial</span>
                                </td>
                              </tr>
                              <tr>
                                <td> <br />
                                </td>
                              </tr>
                              <tr>
                                <td style="padding-left: 35px;"> <span class="registerform">Name:</span>
                                </td>
                              </tr>
                              <tr>
                                <td style="padding-left: 35px;"> <input id="txtName" name="Name" class="registerinputs" type="text" /> </td>
                              </tr>
                              <tr>
                                <td style="padding-left: 35px;"> <span class="registerform">Last Name:</span> </td>
                              </tr>
                              <tr>
                                <td style="padding-left: 35px;"> <input name="Lastname" class="registerinputs" type="text" /> </td>
                              </tr>
                              <tr>
                                <td style="padding-left: 35px;"> <span class="registerform">Username:</span>
                                </td>
                              </tr>
                              <tr>
                                <td style="padding-left: 35px;"> <input id="txtUserName" name="Username" class="registerinputs" type="text" /> </td>
                              </tr>
                              <tr>
                                <td style="padding-left: 35px;"> <span class="registerform">Password:</span>
                                </td>
                              </tr>
                              <tr>
                                <td style="padding-left: 35px;"> <input id="txtPass1" name="Password" class="registerinputs" type="password" /> </td>
                              </tr>
                              <tr>
                                <td style="padding-left: 35px;"> <span class="registerform">Repeat Password:</span> </td>
                              </tr>
                              <tr>
                                <td style="padding-left: 35px;"> <input id="txtPass2" class="registerinputs" type="password" /> </td>
                              </tr>
                              <tr>
                                <td style="padding-left: 35px;">
                                    <span class="registerform">Email:</span>
                                </td>
                              </tr>
                              <tr>
                                <td style="padding-left: 35px;">
                                    <input id="txtEmail" name="Email" class="registerinputs" type="text" />
                                </td>
                              </tr>
                              <tr>
                                <td style="text-align: center;"> 
                                    <input class="registersubmit" value="Join Now" type="submit" onclick="return ValidateUser();" />
                                </td>
                              </tr>
                              <tr>
                                <td style="text-align: center;">
                                    <span class="errormsg" id="lblErrorPass"></span>
                                </td>
                              </tr>
                              <tr>
                                <td> <br />
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </form>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div id="divWhatIs" class="about_td">
      <table style="width: 100%;">
        <tbody>
          <tr>
            <td style="text-align: center;"> <span class="about_label">What is
                Rest Admin?</span> </td>
          </tr>
          <tr>
            <td> <br />
            </td>
          </tr>
          <tr>
            <td style="text-align: center;"> <span class="about_txt">Rest Admin
                is a tool in the form of on an Android app and a web
                application.</span> <br />
              <span class="about_txt">It is used to administrate your restaurant</span>
              <br />
              <span class="about_txt">From the ingrendient inventory,</span> <br>
              <span class="about_txt">The dishes you are serving,</span> <br>
              <span class="about_txt">To taking the orders of your clients.</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="module_td">
      <table style="width:100%;">
        <tbody>
          <tr>
            <td style="text-align: center;"> <span class="module_label">
                Modules </span> </td>
          </tr>
          <tr>
            <td> <br />
            </td>
          </tr>
          <tr>
            <td>
              <table style="margin:auto;width:80%;">
                <tbody>
                  <tr>
                    <td> <span class="module_label">Ingredients</span> </td>
                    <td> <span class="module_label"> Dishes </span> </td>
                    <td> <span class="module_label"> Orders </span> </td>
                  </tr>
                  <tr>
                    <td class="module_txt_td"> <br>
                      <span class="module_txt">In this module you can capture
                        the ingredients you are using in your restaurant.</span>
                      <br />
                      <ul class="module_txt">
                        <li> Set the amount you have bought and store. </li>
                        <li> Set the unitary price of the ingredient. </li>
                      </ul>
                    </td>
                    <td class="module_txt_td" style=""> <span class="module_txt">
                        In this module you can capture the dishes you are
                        serving in your restaurant. </span> <br />
                      <ul class="module_txt">
                        <li> Set the ingredients of the recipe of the dish, and
                          get an aproximate of the price. </li>
                        <li> Set the picture of the dish for the client to look
                          at it. </li>
                      </ul>
                    </td>
                    <td class="module_txt_td"> <span class="module_txt"> In
                        this module you capture the orders the client is taking.
                      </span> <br />
                      <ul class="module_txt">
                        <li> By this you can now know how much ingredients are
                          approximately in the stock and anticipate restocking.
                        </li>
                        <li> Get reports of how much money you are earning
                          according to the price of the ingredients and the
                          dishes you are serving. </li>
                      </ul>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    
  </body>
</html>