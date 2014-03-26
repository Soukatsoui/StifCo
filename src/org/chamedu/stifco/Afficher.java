package org.chamedu.stifco;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.Activity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ListView;
import android.widget.SimpleAdapter;

public class Afficher extends Activity implements View.OnClickListener{
	JSONObject jsonResponse;
	JSONArray arrayJson;
	ArrayList<Map<String, String>> propositions = new ArrayList<Map<String,String>>();
	
	protected void onCreate(Bundle savedInstanceState){
		super.onCreate(savedInstanceState);
		setContentView(R.layout.afficher);
		ListView lvTrajets = (ListView)findViewById(R.id.lvTrajets);
		Bundle bundle = getIntent().getExtras();
		
		if(bundle.getString("json")!= null)
		{
			String ficJson = (String) bundle.get("json");
			try {
				jsonResponse = new JSONObject(ficJson);
				// Création du tableau général à partir d'un JSONObject
				JSONArray jsonArray = jsonResponse.getJSONArray("propositions");

				// Pour chaque élément du tableau
				for (int i = 0; i < jsonArray.length(); i++) {
					Map<String,String> proposition = new HashMap<String,String>(2);

					// Création d'un tableau élément à  partir d'un JSONObject
					JSONObject jsonObj = jsonArray.getJSONObject(i);

					// Récupération de l'item qui nous intéresse
					String propId = jsonObj.getString("id");
					Log.i("Valeur id", propId);
					// Récupération de l'item qui nous intéresse
					String propVille = jsonObj.getString("ville");
					Log.i("Valeur ville", propVille);
					// Récupération de l'item qui nous intéresse
					String propLieu = jsonObj.getString("lieu");
					Log.i("Valeur lieu", propLieu);
					// Récupération de l'item qui nous intéresse
					String propGare = jsonObj.getString("gare");
					Log.i("Valeur gare", propGare);
					

					// Ajout dans l'ArrayList
					proposition.put("Date",propId);
					proposition.put("Trajet", propLieu+" de "+propVille+" --> "+propGare);
					propositions.add(proposition);
				}

				SimpleAdapter adapter = new SimpleAdapter(this, propositions, android.R.layout.simple_list_item_2,
												new String[] {"Date", "Trajet"},
                        						new int[] {	android.R.id.text1,
                        									android.R.id.text2});
				lvTrajets.setAdapter(adapter);

			} catch (JSONException e) {
				e.printStackTrace();
			}
		}
	}

	@Override
	public void onClick(View v) {
		// TODO Auto-generated method stub
		
	}

}