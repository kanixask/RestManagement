package com.example.kanix.restaurantadmin;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class MainMenu extends AppCompatActivity {
    TextView lblWelcomeUsername;
    Button btnAdmin, btnOrder;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main_menu);

        lblWelcomeUsername = findViewById(R.id.lblWelcomeUsername);
        btnAdmin = findViewById(R.id.btnAdmin);
        btnOrder = findViewById(R.id.btnOrder);
        Intent intent = getIntent();

        User objUser = new User();
        objUser = (User) intent.getSerializableExtra("User");

        if(!objUser.IsAdministrator){
            btnAdmin.setVisibility(View.INVISIBLE);
        }

        lblWelcomeUsername.setText("Welcome " + objUser.Name + " " + objUser.Lastname);
    }

    public void btnAdminOnClick(View v) {
        Intent intent = new Intent(this, AdminMenu.class);
        //intent.putExtra("User", objUser);
        this.startActivity(intent);
    }

    public void btnOrderOnClick(View v){

    }
}
