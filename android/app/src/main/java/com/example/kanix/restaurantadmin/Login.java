package com.example.kanix.restaurantadmin;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;

public class Login extends AppCompatActivity {

    TextView lblResultMsg;
    EditText txtUsername,txtPassword;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        setContentView(R.layout.activity_login);
        txtUsername = findViewById(R.id.txtUsername);
        txtPassword = findViewById(R.id.txtPassword);
        lblResultMsg = findViewById(R.id.lblResultMsg);
    }

    public void btnLogInOnClick(View v){
        try {
            LoginSender s = new LoginSender(Login.this, getString(R.string.LoginString), lblResultMsg, txtUsername, txtPassword);

            s.execute();
        }catch(Exception ex){
            ex.printStackTrace();
        }
    }
}
