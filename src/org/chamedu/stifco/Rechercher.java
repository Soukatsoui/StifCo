package org.chamedu.stifco;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.Reader;
import java.io.StringWriter;
import java.io.UnsupportedEncodingException;
import java.io.Writer;
import java.net.URISyntaxException;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.List;

import network.OnResultListener;
import network.RestClient;

import org.apache.http.HttpException;
import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.Activity;
import android.app.DatePickerDialog;
import android.app.Dialog;
import android.content.Intent;
import android.os.Bundle;
import android.view.Gravity;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.ArrayAdapter;
import android.widget.AutoCompleteTextView;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.TextSwitcher;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.ViewSwitcher;

public class Rechercher extends Activity implements ViewSwitcher.ViewFactory,View.OnClickListener {

	Button rechercher;
	EditText ville;

	// Variables pour la date et l'heure
	private TextView mDateDisplay;
	private int mYear;
	private int mMonth;
	private int mDay;

	static final int TIME_24_DIALOG_ID = 1;
	static final int DATE_DIALOG_ID = 2;

	// Variables pour le nombre de passagers
	private TextSwitcher mSwitcher;
	private int mCounter = 1;
	private Button plusButton, moinsButton;

	// Varaibles pour la lecture du flux Json
	private String jsonString;
	JSONObject jsonResponse;
	JSONArray arrayJson;
	AutoCompleteTextView tvGareAuto;
	ArrayList<String> items = new ArrayList<String>();

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.rechercher);

		ville = (EditText)findViewById(R.id.etVille);

		// Traitement du changement de la date et de l'heure
		mDateDisplay = (TextView) findViewById(R.id.tvLaDate);

		setDialogOnClickListener(R.id.btChangeDate, DATE_DIALOG_ID);

		final Calendar c = Calendar.getInstance();
		mYear = c.get(Calendar.YEAR);
		mMonth = c.get(Calendar.MONTH);
		mDay = c.get(Calendar.DAY_OF_MONTH);

		updateDisplay();

		// Traitement du changement du nombre de places
		mSwitcher = (TextSwitcher)findViewById(R.id.tsPlaces);
		mSwitcher.setFactory(this);

		Animation in = AnimationUtils.loadAnimation(this,
				android.R.anim.fade_in);
		Animation out = AnimationUtils.loadAnimation(this,
				android.R.anim.fade_out);
		mSwitcher.setInAnimation(in);
		mSwitcher.setOutAnimation(out);

		plusButton = (Button)findViewById(R.id.btPlus);
		plusButton.setOnClickListener(this);
		moinsButton = (Button)findViewById(R.id.btMoins);
		moinsButton.setOnClickListener(this);

		updateCounter();

		// Traitement du textView en autocomplétion à  partir de la source Json
		jsonString = lireJSON();

		try {
			jsonResponse = new JSONObject(jsonString);
			// Création du tableau général à partir d'un JSONObject
			JSONArray jsonArray = jsonResponse.getJSONArray("gares");

			// Pour chaque élément du tableau
			for (int i = 0; i < jsonArray.length(); i++) {

				// Création d'un tableau élément à  partir d'un JSONObject
				JSONObject jsonObj = jsonArray.getJSONObject(i);

				// Récupération à partir d'un JSONObject nommé
				JSONObject fields  = jsonObj.getJSONObject("fields");

				// Récupération de l'item qui nous intéresse
				String nom = fields.getString("nom_de_la_gare");

				// Ajout dans l'ArrayList
				items.add(nom);		
			}

			ArrayAdapter<String> adapter = new ArrayAdapter<String>(this,android.R.layout.simple_dropdown_item_1line, items);
			tvGareAuto = (AutoCompleteTextView)findViewById(R.id.actvGare);
			tvGareAuto.setAdapter(adapter);

		} catch (JSONException e) {
			e.printStackTrace();
		}

		// Listener sur le bouton de recherche
		rechercher = (Button)findViewById(R.id.btRecherche);
		rechercher.setOnClickListener(this);
	}	

	private void setDialogOnClickListener(int buttonId, final int dialogId) {
		Button b = (Button)findViewById(buttonId);
		b.setOnClickListener(new View.OnClickListener() {
			public void onClick(View v) {
				showDialog(dialogId);
			}
		});
	}

	@Override
	protected Dialog onCreateDialog(int id) {
		switch (id) {
		case DATE_DIALOG_ID:
			return new DatePickerDialog(this,
					mDateSetListener,
					mYear, mMonth, mDay);
		}
		return null;
	}

	@Override
	protected void onPrepareDialog(int id, Dialog dialog) {
		switch (id) {
		case DATE_DIALOG_ID:
			((DatePickerDialog) dialog).updateDate(mYear, mMonth, mDay);
			break;
		}
	}    

	private void updateDisplay() {
		mDateDisplay.setText(
				new StringBuilder()
				.append(mDay).append("-")
				// Month is 0 based so add 1
				.append(mMonth + 1).append("-")
				.append(mYear).append(" "));
	}

	private DatePickerDialog.OnDateSetListener mDateSetListener =
			new DatePickerDialog.OnDateSetListener() {

		public void onDateSet(DatePicker view, int year, int monthOfYear,
				int dayOfMonth) {
			mYear = year;
			mMonth = monthOfYear;
			mDay = dayOfMonth;
			updateDisplay();
		}
	};
	public void onClick(View v) {
		if ( v == plusButton ) { 
			if (mCounter<3) {
				mCounter++;
			} else {
				Toast.makeText(Rechercher.this, "Désolé, la limite maximale est fixée à trois personnes !", Toast.LENGTH_SHORT).show();
			}

			updateCounter();
		} 

		if ( v == moinsButton ) { 
			if (mCounter>1) {
				mCounter--;
			} else {
				Toast.makeText(Rechercher.this, "Désolé, la limite minimale est fixée à une personne !", Toast.LENGTH_SHORT).show();
			}

			updateCounter();
		} 

		if ( v == rechercher ) {
			List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();

			nameValuePairs.add(new BasicNameValuePair("date",""+mDateDisplay.getText()));
			nameValuePairs.add(new BasicNameValuePair("ville",""+ville.getText()));
			nameValuePairs.add(new BasicNameValuePair("places",""+mCounter));
			nameValuePairs.add(new BasicNameValuePair("gare",""+tvGareAuto.getText()));

			try {
				RestClient.doPost("/recherche.php", nameValuePairs, new OnResultListener() {					
					@Override
					public void onResult(String json) {
						doOnResult(json);
					}
				});
			} catch (URISyntaxException e) {
				e.printStackTrace();
			} catch (HttpException e) {
				e.printStackTrace();
			} catch (IOException e) {
				e.printStackTrace();
			}
		}
	}

	public void doOnResult(String json){
		if ( json.equals("Aucune propostion pour le mois")||json.equals("Aucune propostion pour cette date")) {
			Toast.makeText(Rechercher.this, "Aucune proposition actuellement.", Toast.LENGTH_LONG).show();
			finish();
		} else {
			Intent iAfficher = new Intent(this, Afficher.class);
			iAfficher.putExtra("json",json);
			this.startActivityForResult(iAfficher, 10);
		}					
	}
	private void updateCounter() {
		mSwitcher.setText(String.valueOf(mCounter));
	}

	public View makeView() {
		TextView t = new TextView(this);
		t.setGravity(Gravity.TOP | Gravity.CENTER_HORIZONTAL);
		t.setTextSize(36);
		return t;
	}

	public String lireJSON() {
		InputStream is = getResources().openRawResource(R.raw.gares);
		Writer writer = new StringWriter();
		char[] buffer = new char[1024];
		try {
			Reader reader = new BufferedReader(new InputStreamReader(is, "UTF-8"));
			int n;
			while ((n = reader.read(buffer)) != -1) {
				writer.write(buffer, 0, n);
			}
		} catch (UnsupportedEncodingException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		} finally {
			try {
				is.close();
			} catch (IOException e) {
				e.printStackTrace();
			}
		}

		return writer.toString();
	}
}