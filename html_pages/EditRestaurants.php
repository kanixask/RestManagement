<?php 
    session_start(); 
    require '../php/Database.php';                          
	require '../php/User.php';
	require '../php/UserBL.php';
    require '../php/Restaurant.php';
    require '../php/RestaurantBL.php';
    
    if(!isset($_SESSION['UserID'])){
         header('Location: MainPage.php');
    }
?>
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
        
        $("#btnInsertRestaurant").click(function(){
         window.location.href = "Restaurants.php";   
            
        });
        
        $("#btnEditRestaurant").click(function(){
         window.location.href = "EditRestaurants.php";   
            
        });
      });
      
      function ValidateForm(){
        if($("#txtName").val() == "" || $("#txtDesc").val() == "" || $("#txtPhone").val() == ""){
            $("#lblError").text("Missing Fields");
            return false;
        }else{
            return true;
        }
      }
      
      function SaveValues($row){
        $ResID = $($($row).parent().find("input")[0]).val();
        $Name = $($($($row).parent()).parent().find("td")[0]).find("input").val();
        $Description = $($($($row).parent()).parent().find("td")[1]).find("input").val();
        $Phone = $($($($row).parent()).parent().find("td")[2]).find("input").val();
        
        if($Name == '' || $Description == '' || $Phone == ''){
            return false;
        }
        
        $('#hdnResID').val($ResID);
        $('#hdnName').val($Name);
        $('#hdnDesc').val($Description);
        $('#hdnPhone').val($Phone);
        $('#hdnAction').val('update');
        return true;
      }
      
      function SaveValuesDelete($row){        
        $ResID = $($($($($row).parent()).parent().find("td")[3]).find("input")[0]).val();
        $('#hdnResID').val($ResID);
        $('#hdnAction').val('delete');
      }
    </script>
  </head>
  <body>
    <div>
      <table style="width: 100%;">
        <tbody>
          <tr>
            <td style="width: 20%;text-align: left;padding-left: 50px;" colspan="1">
              <a href="http://localhost/RestAdmin/html_pages/UserLandingPage.php">
                <img src="../res/RA.jpg" alt="RA" title="RA"> </a>
            </td>
            <td style="width: 80%;text-align: right;padding-top: 20px;">
              <form>
                <table style="width: 100%;" border="0">
                  <tbody>
                    <tr>
                      <td style="text-align:center;padding-right: 15px; width: 80%">
                        <?php 	
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
						<input id="SignOut" class="login" value="Sign Out" type="button" />
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
    <table style="margin:auto; width:40%;">
      <tbody>
        <tr>
          <td style="width:25%;vertical-align:top;">
            <table id="RestaurantMenu" style="padding-top: 10px;">
				<tbody>
					<tr>
						<td>
							<input class="bar_links" value="Restaurants" type="button" />
						</td>
					</tr>
					<tr>
						<td style="padding-left: 10px;">
							<input id="btnInsertRestaurant" class="barmenusublinks_r" value="Insert Restaurant" type="button" />
						</td>						
					</tr>
					<tr>
						<td style="padding-left: 10px;">
							<input id="btnEditRestaurant" class="barmenusublinks_r" value="Edit Restaurant" type="button" />
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
							<input class="bar_links" value="Ingredients" type="button" />
						</td>
					</tr>
					<tr>
						<td style="padding-left: 10px;">
							<input class="barmenusublinks_i" value="Insert Ingredient" type="button" />
						</td>						
					</tr>
					<tr>
						<td style="padding-left: 10px;">
							<input class="barmenusublinks_i" value="Edit Ingredient" type="button" />
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
							<input class="bar_links" value="Dishes" type="button" />
						</td>
					</tr>
					<tr>
						<td style="padding-left: 10px;">
							<input class="barmenusublinks_d" value="Insert Dish" type="button" />
						</td>						
					</tr>
					<tr>
						<td style="padding-left: 10px;">
							<input class="barmenusublinks_d" value="Edit Dish" type="button" />
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
							<input class="bar_links" value="Orders" type="button" />
						</td>
					</tr>
					<tr>
						<td style="padding-left: 10px;">
							<input class="barmenusublinks_o" value="Insert Order" type="button" />
						</td>						
					</tr>
					<tr>
						<td style="padding-left: 10px;">
							<input class="barmenusublinks_o" value="Edit Order" type="button" />
						</td>						
					</tr>
				</tbody>
			</table>
          </td>
        </tr>
      </tbody>
    </table>
    <form action="../php/EditRestaurant.php" method="post">
        <table style="width:60%; position: absolute; top: 200px; left: 500px;">
            <tbody>
                <tr>
                    <td colspan="2">
                        <span class="formtitle">Edit Restaurants</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br />
                       
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tbody>                     
                                <?php
                                    if(isset($_SESSION["UserID"]) && $_SESSION["UserID"] > 0) {
        								$resBL = new RestaurantBL($database);                                
                                        
                                        $data = $resBL->selectRestaurantsByUser($_SESSION["UserID"]);
                                        
                                        if(count($data) > 0){
                                            echo '<tr>
                                                    <td>
                                                        <span class="formlabel">Name</span>
                                                    </td>
                                                    <td>
                                                        <span class="formlabel">Description</span>
                                                    </td>
                                                    <td>
                                                        <span class="formlabel">Phone</span>
                                                    </td>
                                                </tr>';
                                            foreach($data as $value){
                                                echo '<tr><td><input class="forminputedit" type="text" value="'
                                                .$value['Name'].'" /></td><td><input class="forminputedit" style="width: 400px;" type="text" value="'
                                                .$value['Description'].'" /></td><td><input class="forminputedit" type="text" value="'
                                                .$value['Phone'].'" /></td><td><input type="hidden" value="'
                                                .$value['RestaurantID'].'" /><input type="submit" class="formsubmit" value="Save" onclick="return SaveValues(this);" />'
                                                .'<td><input type="submit" class="formsubmit" value="Delete" onclick="SaveValuesDelete(this);"/></td></td></tr>';
                                            }
                                        }else{
                                            echo '<tr>
                                                    <td>
                                                        <span class="formlabel">No restaurants found</span>
                                                    </td>                                                    
                                                </tr>';                                            
                                        }
        							}
                                ?>
                            </tbody>
                        </table>
                        <input id="hdnResID" name="RestaurantID" type="hidden" value="" />
                        <input id="hdnName" name="Name" type="hidden" value="" />
                        <input id="hdnDesc" name="Description" type="hidden" value="" />
                        <input id="hdnPhone" name="Phone" type="hidden" value="" />
                        <input id="hdnAction" name="Action" type="hidden" value="" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="errormsg" id="lblError"></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
  </body>
</html>