package automation.test.myaccoutant.view;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.widget.ProgressBar;

import automation.test.myaccoutant.R;

/**
 * An example full-screen activity that shows and hides the system UI (i.e.
 * status bar and navigation/system bar) with user interaction.
 */
public class Loading extends AppCompatActivity {
    private ProgressBar progressLoad;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_loading);
        progressLoad = (ProgressBar) findViewById(R.id.progressBar);
        Progression calcul = new Progression();

        calcul.execute();
    }

    private class Progression extends AsyncTask<Void, Integer, Void>
    {
        @Override
        protected Void doInBackground(Void... voids) {
            int progress;
            for (progress=0;progress<=6000;progress++)
            {
                for (int i=0; i<6000; i++){}
                publishProgress(progress);
                progress++;
            }

            return null;
        }
        @Override
        protected void onProgressUpdate(Integer... values){
            super.onProgressUpdate(values);
            progressLoad.setProgress(values[0]);
        }
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
        }
        @Override
        protected void onPostExecute(Void result) {
            Intent activity =new Intent(Loading.this,LogIn.class);
            startActivity(activity);
            finish();
        }
    }}