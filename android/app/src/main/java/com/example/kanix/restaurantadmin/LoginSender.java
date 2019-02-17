package com.example.kanix.restaurantadmin;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;

public class LoginSender extends AsyncTask<Void,Void,String> {

    Context c;
    String urlAddress;
    EditText txtUsername, txtPassword;
    TextView result;

    String username, password;

    private static final String SAMPLE_ALIAS = "MYALIAS";

    ProgressDialog pd;

    public LoginSender(Context c, String urlAddress, TextView result, EditText...editTexts) {
        this.c = c;
        this.urlAddress = urlAddress;

        this.txtUsername = editTexts[0];
        this.txtPassword = editTexts[1];

        username = txtUsername.getText().toString();
        password = txtPassword.getText().toString();

        this.result = result;
    }

    @Override
    protected void onPreExecute() {
        super.onPreExecute();

        pd = new ProgressDialog(c);
        pd.setTitle(c.getString(R.string.TryingToLogin));
        pd.setMessage(c.getString(R.string.Sending));
        pd.show();
    }

    @Override
    protected String doInBackground(Void... params) {
        return this.send();
    }

    @Override
    protected void onPostExecute(String response) {
        super.onPostExecute(response);

        pd.dismiss();

        if(response != null)
        {
            User objUser = new User();

            objUser.setObjectFromJSON(response);

            if(objUser.UserID != -1 && objUser.RestaurantID != -1) {
                txtUsername.setText("");
                txtPassword.setText("");
                result.setText("");
                Toast.makeText(c, c.getString(R.string.LoginSuccessful), Toast.LENGTH_LONG).show();
                Intent intent = new Intent(c, MainMenu.class);
                intent.putExtra("User", objUser);
                c.startActivity(intent);
            }else{
                result.setText(c.getString(R.string.WrongUsername));
            }
        }else
        {
            Toast.makeText(c,c.getString(R.string.NetworkError),Toast.LENGTH_LONG).show();
        }
    }

    private String send()
    {
        HttpURLConnection con=Connector.connect(urlAddress);

        if(con == null)
        {
            return null;
        }

        try
        {
            OutputStream os = con.getOutputStream();

            BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(os,"UTF-8"));
            bw.write(new DataPackager(username, password).packData());

            bw.flush();

            bw.close();
            os.close();

            int responseCode = con.getResponseCode();

            if(responseCode == HttpURLConnection.HTTP_OK)
            {
                StringBuffer response;
                try (BufferedReader br = new BufferedReader(new InputStreamReader(con.getInputStream()))) {
                    response = new StringBuffer();

                    String line;

                    while ((line = br.readLine()) != null) {
                        response.append(line);
                    }

                }

                return response.toString();

            }else
            {
                result.setText(c.getString(R.string.NetworkError));
            }

        } catch (IOException e) {
            e.printStackTrace();
        }

        return null;
    }

}
