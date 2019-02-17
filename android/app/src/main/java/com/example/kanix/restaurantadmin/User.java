package com.example.kanix.restaurantadmin;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.Serializable;

public class User implements Serializable {

    public int UserID = -1;
    public String Username = "";
    public String Password = "";
    public String Name = "";
    public String Lastname = "";
    public boolean IsAdministrator = false;
    public int RestaurantID = -1;

    public void setObjectFromJSON(String strJSON){
        try {
            JSONObject objJSON = new JSONObject(strJSON);

            if( objJSON.getInt("UserID") != -1) {
                this.UserID = objJSON.getInt("UserID");
                this.Username = objJSON.getString("Username");
                this.Password = objJSON.getString("Password");
                this.Name = objJSON.getString("Name");
                this.Lastname = objJSON.getString("Lastname");
                this.IsAdministrator = objJSON.getString("IsAdministrator").equals("1");
                this.RestaurantID = objJSON.getInt("RestaurantID");
            }
        } catch (JSONException e) {
            e.printStackTrace();
        } catch (Exception e){
            e.printStackTrace();
        }
    }
}
