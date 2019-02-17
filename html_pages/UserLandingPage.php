<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Rest Admin</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <script src="jquery-3.3.1.min.js"></script>
    <script src="jquery.sticky.js"></script>
    <script>
    	$(document).ready(function(){
        $("#SignOut").hover(
          function() {
            $( this ).css('text-decoration', 'underline');
          }, function() {
            $( this ).css('text-decoration', '');
          }
        );
        
        $(".barmenulinks").hover(
          function() {
            $( this ).css('text-decoration', 'underline');
          }, function() {
            $( this ).css('text-decoration', '');
          }
        );
        
        $("#RestaurantMenu").hover(
          function() {
            $('.barmenusublinks_r').css({display:'block'});
          }, function() {            
			$('.barmenusublinks_r').css({display:'none'});
          }
        );
		
		$("#IngredientsMenu").hover(
          function() {
            $('.barmenusublinks_i').css({display:'inline'});
          }, function() {            
			$('.barmenusublinks_i').css({display:'none'});
          }
        );
		
		$("#DishesMenu").hover(
          function() {
            $('.barmenusublinks_d').css({display:'inline'});
          }, function() {            
			$('.barmenusublinks_d').css({display:'none'});
          }
        );
		
		$("#OrderMenu").hover(
          function() {
            $('.barmenusublinks_o').css({display:'inline'});
          }, function() {            
			$('.barmenusublinks_o').css({display:'none'});
          }
        );
        
        $("#SignOut").click(function(){
          window.location.href = "../php/LoginOut.php";          
        });
      });
    </script>
  </head>
  <body>
    <div>
      <table style="width: 100%;">
        <tbody>
          <tr>
            <td style="width: 20%;text-align: left;padding-left: 50px;" colspan="1">
              <a href="http://localhost/RestAdmin/html_pages/UserLanding.html">
                <img src="../res/RA.jpg" alt="RA" title="RA"> </a>
            </td>
            <td style="width: 80%;text-align: right;padding-top: 20px;">
              <form>
                <table style="width: 100%;" border="0">
                  <tbody>
                    <tr>
                      <td style="text-align:center;padding-right: 15px; width: 80%">
                        <?php 													
							require '../php/Database.php';                          
							require '../php/User.php';
							require '../php/UserBL.php';													
							session_start();
							if(isset($_SESSION["UserID"]) && $_SESSION["UserID"] > 0) {
								$userBL = new UserBL($database); 
								$userFinder = new User(); 
								$user = new User(); 
								$userFinder->UserID = $_SESSION["UserID"];
								$user->SetValuesFromData($userBL->selectUser($userFinder));
								echo '<span class="lbl_title">Welcome '.$user->Name.' '.$user->Lastname.' </span>'; 
							} ?> 
						</td>
                      <td style="padding-right: 50px;"> 
						<input id="SignOut" class="login" value="Sign Out" type="button">
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
    <div id="sticker" class="barmenu"> </div>
    <table style="margin:auto; width:40%;" border="0">
      <tbody>
        <tr>
          <td style="width:25%;vertical-align:top;">
            <table id="RestaurantMenu" style="padding-top: 10px;">
				<tbody>
					<tr>
						<td>
							<input class="bar_links" value="Restaurants" type="button">
						</td>
					</tr>
					<tr>
						<td style="padding-left: 10px;">
							<input class="barmenusublinks_r" value="Insert Restaurant" type="button">
						</td>						
					</tr>
					<tr>
						<td style="padding-left: 10px;">
							<input class="barmenusublinks_r" value="Edit Restaurant" type="button">
						</td>						
					</tr>
				</tbody>
			</table>
          </td>
          <td style="width:25%;vertical-align:top;"> 
			<table id="IngredientsMenu" style="padding-top: 10px;">
				<tbody>
					<tr>
						<td>
							<input class="bar_links" value="Ingredients" type="button">
						</td>
					</tr>
					<tr>
						<td style="padding-left: 10px;">
							<input class="barmenusublinks_i" value="Insert Ingredient" type="button">
						</td>						
					</tr>
					<tr>
						<td style="padding-left: 10px;">
							<input class="barmenusublinks_i" value="Edit Ingredient" type="button">
						</td>						
					</tr>
				</tbody>
			</table>
          </td>
		  <td style="width:25%;vertical-align:top;"> 
			<table id="DishesMenu" style="padding-top: 10px;">
				<tbody>
					<tr>
						<td>
							<input class="bar_links" value="Dishes" type="button">
						</td>
					</tr>
					<tr>
						<td style="padding-left: 10px;">
							<input class="barmenusublinks_d" value="Insert Dish" type="button">
						</td>						
					</tr>
					<tr>
						<td style="padding-left: 10px;">
							<input class="barmenusublinks_d" value="Edit Dish" type="button">
						</td>						
					</tr>
				</tbody>
			</table>
          </td>
		  <td style="width:25%;vertical-align:top;"> 
			<table id="OrderMenu" style="padding-top: 10px;">
				<tbody>
					<tr>
						<td>
							<input class="bar_links" value="Orders" type="button">
						</td>
					</tr>
					<tr>
						<td style="padding-left: 10px;">
							<input class="barmenusublinks_o" value="Insert Order" type="button">
						</td>						
					</tr>
					<tr>
						<td style="padding-left: 10px;">
							<input class="barmenusublinks_o" value="Edit Order" type="button">
						</td>						
					</tr>
				</tbody>
			</table>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
