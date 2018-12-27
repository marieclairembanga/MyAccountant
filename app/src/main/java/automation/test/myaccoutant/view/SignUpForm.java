package automation.test.myaccoutant.view;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.ImageView;

import automation.test.myaccoutant.R;

public class SignUpForm extends AppCompatActivity {
    ImageView signIn;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sign_up_form);
        signIn= (ImageView) findViewById(R.id.signIn);
        signIn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(SignUpForm.this, Main2Activity.class);
                startActivity(intent);
            }
        });
    }
}
