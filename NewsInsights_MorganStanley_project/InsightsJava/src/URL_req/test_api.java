package URL_req;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.concurrent.TimeUnit;
import java.io.FileWriter;


import org.json.JSONObject;


public class test_api  {

		public static void main(String args[])
		{
			
			String[] l=new String[16];
			
			
			l[0]="https://newsapi.org/v2/everything?q=+business%20AND%20HDFC%20&from=2018-01-14&to=2018-03-04&apiKey=031a8ed5c0da4e44abf5ed02db6add35";
			l[1]="https://newsapi.org/v2/everything?q=business%20AND%20Tesla&from=2017-07-14&to=2018-02-04&apiKey=031a8ed5c0da4e44abf5ed02db6add35";
			l[2]="https://newsapi.org/v2/everything?q=business%20AND%20Aviation&from=2017-08-14&to=2018-03-04&apiKey=031a8ed5c0da4e44abf5ed02db6add35";
			l[3]="https://newsapi.org/v2/everything?q=business%20AND%20GST&from=2017-09-14&to=2018-04-06&apiKey=031a8ed5c0da4e44abf5ed02db6add35";
			
			l[4]="https://newsapi.org/v2/everything?q=banking%20AND%20HDFC&from=2017-01-14&to=2018-02-04&apiKey=031a8ed5c0da4e44abf5ed02db6add35";
			l[5]="https://newsapi.org/v2/everything?q=banking%20AND%20Tesla&from=2017-02-14&to=2018-03-04&apiKey=031a8ed5c0da4e44abf5ed02db6add35";
			l[6]="https://newsapi.org/v2/everything?q=banking%20AND%20Aviation&from=2017-03-14&to=2018-04-04&apiKey=031a8ed5c0da4e44abf5ed02db6add35";
			l[7]="https://newsapi.org/v2/everything?q=banking%20AND%20GST&from=2017-04-14&to=2018-01-07&apiKey=031a8ed5c0da4e44abf5ed02db6add35";
			
			l[8]="https://newsapi.org/v2/everything?q=Finance%20AND%20HDFC&from=2017-05-14&to=2018-02-07&apiKey=031a8ed5c0da4e44abf5ed02db6add35";
			l[9]="https://newsapi.org/v2/everything?q=Finance%20AND%20Tesla&from=2017-06-14&to=2018-03-06&apiKey=031a8ed5c0da4e44abf5ed02db6add35";
			l[10]="https://newsapi.org/v2/everything?q=Finance%20AND%20Aviation&from=2017-06-04&to=2018-02-04&apiKey=031a8ed5c0da4e44abf5ed02db6add35";
			l[11]="https://newsapi.org/v2/everything?q=Finance%20AND%20GST&from=2017-07-14&to=2018-03-04&apiKey=031a8ed5c0da4e44abf5ed02db6add35";
			
			l[12]="https://newsapi.org/v2/everything?q=Technology%20AND%20HDFC&from=2017-01-14&to=2018-03-04&apiKey=031a8ed5c0da4e44abf5ed02db6add35";
			l[13]="https://newsapi.org/v2/everything?q=Technology%20AND%20Tesla&from=2017-03-14&to=2018-04-04&apiKey=031a8ed5c0da4e44abf5ed02db6add35";
			l[14]="https://newsapi.org/v2/everything?q=Technology%20AND%20Aviation&from=2017-10-14&to=2018-03-04&apiKey=031a8ed5c0da4e44abf5ed02db6add35";
			l[15]="https://newsapi.org/v2/everything?q=Technology%20AND%20GST&from=2017-12-14&to=2018-04-04&apiKey=031a8ed5c0da4e44abf5ed02db6add35";
			
			
			for(int i=0;i<16;i++)
			{
				  
	
			try {
		//		TimeUnit.SECONDS.sleep(1);
				
			URL obj=new URL(l[i]);
			
			HttpURLConnection co =(HttpURLConnection) obj.openConnection();
			
			int responseCode =co.getResponseCode();
			System.out.println("Sending the GET request to the URL "+l[i]);
			System.out.println("Response code is "+ responseCode);
			
			
			if(i==0)
			{
				String inputLine;
				StringBuffer response = new StringBuffer();
				BufferedReader in =new BufferedReader( new InputStreamReader(co.getInputStream()));
				
				
				
				while ((inputLine = in.readLine()) != null) {
			     	response.append(inputLine);
			     }
				in.close();
				String alldata=response.toString();
				
				System.out.println(response.toString());

				JSONObject myresponse =new JSONObject(alldata);
				
			
				
				FileWriter fw = new FileWriter("C:\\\\\\\\Users\\\\\\\\Sarah\\\\\\\\Documents\\\\\\\\Second Year Engineering\\\\\\\\InsightsDWP\\\\\\\\src\\\\\\\\Business1.json");
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(myresponse.toString());
				bw.close();

				fw.close();
						
						
			}
			
			else if(i==1)
			{
				String inputLine;
				StringBuffer response = new StringBuffer();
				BufferedReader in =new BufferedReader( new InputStreamReader(co.getInputStream()));
				
				
				
				while ((inputLine = in.readLine()) != null) {
			     	response.append(inputLine);
			     }
				in.close();
				String alldata=response.toString();
				
				
				JSONObject myresponse =new JSONObject(alldata);
				
			
				
				FileWriter fw = new FileWriter("C:\\\\\\\\Users\\\\\\\\Sarah\\\\\\\\Documents\\\\\\\\Second Year Engineering\\\\\\\\InsightsDWP\\\\\\\\src\\\\\\\\Business2.json");
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(myresponse.toString());
				bw.close();

				fw.close();
			}
			
			else if(i==2)
			{
				String inputLine;
				StringBuffer response = new StringBuffer();
				BufferedReader in =new BufferedReader( new InputStreamReader(co.getInputStream()));
				
				
				
				while ((inputLine = in.readLine()) != null) {
			     	response.append(inputLine);
			     }
				in.close();
				String alldata=response.toString();
				
				
				JSONObject myresponse =new JSONObject(alldata);
				
			
				
				FileWriter fw = new FileWriter("C:\\\\\\\\Users\\\\\\\\Sarah\\\\\\\\Documents\\\\\\\\Second Year Engineering\\\\\\\\InsightsDWP\\\\\\\\src\\\\\\\\Business3.json");
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(myresponse.toString());
				bw.close();

				fw.close();
						
						
			}
			
			else if(i==3)
			{
				String inputLine;
				StringBuffer response = new StringBuffer();
				BufferedReader in =new BufferedReader( new InputStreamReader(co.getInputStream()));
				
				
				
				while ((inputLine = in.readLine()) != null) {
			     	response.append(inputLine);
			     }
				in.close();
				String alldata=response.toString();
				
				
				JSONObject myresponse =new JSONObject(alldata);
				
			
				
				FileWriter fw = new FileWriter("C:\\\\\\\\Users\\\\\\\\Sarah\\\\\\\\Documents\\\\\\\\Second Year Engineering\\\\\\\\InsightsDWP\\\\\\\\src\\\\\\\\Business4.json");
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(myresponse.toString());
				bw.close();

				fw.close();
			}
			
			else if(i==4)
			{
				String inputLine;
				StringBuffer response = new StringBuffer();
				BufferedReader in =new BufferedReader( new InputStreamReader(co.getInputStream()));
				
				
				
				while ((inputLine = in.readLine()) != null) {
			     	response.append(inputLine);
			     }
				in.close();
				String alldata=response.toString();
				
				
				JSONObject myresponse =new JSONObject(alldata);
				
			
				
				FileWriter fw = new FileWriter("C:\\\\\\\\Users\\\\\\\\Sarah\\\\\\\\Documents\\\\\\\\Second Year Engineering\\\\\\\\InsightsDWP\\\\\\\\src\\\\\\\\Banking1.json");
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(myresponse.toString());
				bw.close();

				fw.close();
			}
			
			else if(i==5)
			{
				String inputLine;
				StringBuffer response = new StringBuffer();
				BufferedReader in =new BufferedReader( new InputStreamReader(co.getInputStream()));
				
				
				
				while ((inputLine = in.readLine()) != null) {
			     	response.append(inputLine);
			     }
				in.close();
				String alldata=response.toString();
				
				
				JSONObject myresponse =new JSONObject(alldata);
				
				FileWriter fw = new FileWriter("C:\\\\\\\\Users\\\\\\\\Sarah\\\\\\\\Documents\\\\\\\\Second Year Engineering\\\\\\\\InsightsDWP\\\\\\\\src\\\\\\\\Banking2.json");
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(myresponse.toString());
				bw.close();

				fw.close();
			}
			
			
			else if(i==6)
			{
				String inputLine;
				StringBuffer response = new StringBuffer();
				BufferedReader in =new BufferedReader( new InputStreamReader(co.getInputStream()));
				
				
				
				while ((inputLine = in.readLine()) != null) {
			     	response.append(inputLine);
			     }
				in.close();
				String alldata=response.toString();
				
				
				JSONObject myresponse =new JSONObject(alldata);
				
			
				FileWriter fw = new FileWriter("C:\\\\\\\\Users\\\\\\\\Sarah\\\\\\\\Documents\\\\\\\\Second Year Engineering\\\\\\\\InsightsDWP\\\\\\\\src\\\\\\\\Banking3.json");
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(myresponse.toString());
				bw.close();

				fw.close();;
			}
			
			
			else if(i==7)
			{
				String inputLine;
				StringBuffer response = new StringBuffer();
				BufferedReader in =new BufferedReader( new InputStreamReader(co.getInputStream()));
				
				
				
				while ((inputLine = in.readLine()) != null) {
			     	response.append(inputLine);
			     }
				in.close();
				String alldata=response.toString();
				
				
				JSONObject myresponse =new JSONObject(alldata);
				
				
				
				FileWriter f = new FileWriter("C:\\\\\\\\Users\\\\\\\\Sarah\\\\\\\\Documents\\\\\\\\Second Year Engineering\\\\\\\\InsightsDWP\\\\\\\\src\\\\\\\\banking44.json");
				BufferedWriter bw = new BufferedWriter(f);
				bw.write(myresponse.toString());
				bw.close();

				f.close();
					

			
		}
			else if(i==8)
			{
				String inputLine;
				StringBuffer response = new StringBuffer();
				BufferedReader in =new BufferedReader( new InputStreamReader(co.getInputStream()));
				
				
				
				while ((inputLine = in.readLine()) != null) {
			     	response.append(inputLine);
			     }
				in.close();
				String alldata=response.toString();
				
				
				JSONObject myresponse =new JSONObject(alldata);
				
			
				
				FileWriter fw = new FileWriter("C:\\\\\\\\Users\\\\\\\\Sarah\\\\\\\\Documents\\\\\\\\Second Year Engineering\\\\\\\\InsightsDWP\\\\\\\\src\\\\\\\\Finance1.json");
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(myresponse.toString());
				bw.close();

				fw.close();
			}
			
			else if(i==9)
			{
				String inputLine;
				StringBuffer response = new StringBuffer();
				BufferedReader in =new BufferedReader( new InputStreamReader(co.getInputStream()));
				
				
				
				while ((inputLine = in.readLine()) != null) {
			     	response.append(inputLine);
			     }
				in.close();
				String alldata=response.toString();
				
				
				JSONObject myresponse =new JSONObject(alldata);
				
			
				FileWriter fw = new FileWriter("C:\\\\\\\\Users\\\\\\\\Sarah\\\\\\\\Documents\\\\\\\\Second Year Engineering\\\\\\\\InsightsDWP\\\\\\\\src\\\\\\\\Finance2.json");
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(myresponse.toString());
				bw.close();

				fw.close();
			}
			
			else if(i==10)
			{
				String inputLine;
				StringBuffer response = new StringBuffer();
				BufferedReader in =new BufferedReader( new InputStreamReader(co.getInputStream()));
				
				
				
				while ((inputLine = in.readLine()) != null) {
			     	response.append(inputLine);
			     }
				in.close();
				String alldata=response.toString();
				
				
				JSONObject myresponse =new JSONObject(alldata);
				
			
				
				FileWriter fw = new FileWriter("C:\\\\\\\\Users\\\\\\\\Sarah\\\\\\\\Documents\\\\\\\\Second Year Engineering\\\\\\\\InsightsDWP\\\\\\\\src\\\\\\\\Finance3.json");
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(myresponse.toString());
				bw.close();

				fw.close();
			}
			
			else if(i==11)
			{
				String inputLine;
				StringBuffer response = new StringBuffer();
				BufferedReader in =new BufferedReader( new InputStreamReader(co.getInputStream()));
				
				
				
				while ((inputLine = in.readLine()) != null) {
			     	response.append(inputLine);
			     }
				in.close();
				String alldata=response.toString();
				
				
				JSONObject myresponse =new JSONObject(alldata);
				
			
				
				FileWriter fw = new FileWriter("C:\\\\\\\\Users\\\\\\\\Sarah\\\\\\\\Documents\\\\\\\\Second Year Engineering\\\\\\\\InsightsDWP\\\\\\\\src\\\\\\\\Finance4.json");
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(myresponse.toString());
				bw.close();

				fw.close();
			}
			
			else if(i==12)
			{
				String inputLine;
				StringBuffer response = new StringBuffer();
				BufferedReader in =new BufferedReader( new InputStreamReader(co.getInputStream()));
				
				
				
				while ((inputLine = in.readLine()) != null) {
			     	response.append(inputLine);
			     }
				in.close();
				String alldata=response.toString();
				
				
				JSONObject myresponse =new JSONObject(alldata);
				
			
				
				FileWriter fw = new FileWriter("C:\\\\\\\\Users\\\\\\\\Sarah\\\\\\\\Documents\\\\\\\\Second Year Engineering\\\\\\\\InsightsDWP\\\\\\\\src\\\\\\\\Technology1.json");
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(myresponse.toString());
				bw.close();

				fw.close();
			}
			
			
			else if(i==13)
			{
				String inputLine;
				StringBuffer response = new StringBuffer();
				BufferedReader in =new BufferedReader( new InputStreamReader(co.getInputStream()));
				
				
				
				while ((inputLine = in.readLine()) != null) {
			     	response.append(inputLine);
			     }
				in.close();
				String alldata=response.toString();
				
				
				JSONObject myresponse =new JSONObject(alldata);
				
			
				
				FileWriter fw = new FileWriter("C:\\\\\\\\Users\\\\\\\\Sarah\\\\\\\\Documents\\\\\\\\Second Year Engineering\\\\\\\\InsightsDWP\\\\\\\\src\\\\\\\\Technology2.json");
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(myresponse.toString());
				bw.close();

				fw.close();
			}
			
			
			else if(i==14)
			{
				String inputLine;
				StringBuffer response = new StringBuffer();
				BufferedReader in =new BufferedReader( new InputStreamReader(co.getInputStream()));
				
				
				
				while ((inputLine = in.readLine()) != null) {
			     	response.append(inputLine);
			     }
				in.close();
				String alldata=response.toString();
				
				
				JSONObject myresponse =new JSONObject(alldata);
				
			
				

				
				FileWriter fw = new FileWriter("C:\\\\\\\\Users\\\\\\\\Sarah\\\\\\\\Documents\\\\\\\\Second Year Engineering\\\\\\\\InsightsDWP\\\\\\\\src\\\\\\\\Technology3.json");
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(myresponse.toString());
				bw.close();

				fw.close();
			}
			
			
			
			else if(i==15)
			{
				String inputLine;
				StringBuffer response = new StringBuffer();
				BufferedReader in =new BufferedReader( new InputStreamReader(co.getInputStream()));
				
				
				
				while ((inputLine = in.readLine()) != null) {
			     	response.append(inputLine);
			     }
				in.close();
				String alldata=response.toString();
				
				
				JSONObject myresponse =new JSONObject(alldata);
								
				FileWriter fw = new FileWriter("C:\\\\\\\\Users\\\\\\\\Sarah\\\\\\\\Documents\\\\\\\\Second Year Engineering\\\\\\\\InsightsDWP\\\\\\\\src\\\\\\\\Technology4.json");
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(myresponse.toString());
				bw.close();

				fw.close();
			}
			
					
					
					
			}catch(Exception e)
			{
				e.printStackTrace();
			}
			
			}
			
		}
}
				    
		

