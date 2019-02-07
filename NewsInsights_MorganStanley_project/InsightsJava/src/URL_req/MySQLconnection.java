package URL_req;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;

public class MySQLconnection 
{
	public static void main(String args[]) throws Exception
	{
		createTable();
		insert();
	}
	public static Connection getConnection() throws Exception
	{
		try
		{
			String driver = "com.mysql.jdbc.Driver";
			String url = "jdbc:mysql://localhost:3306/newsinsights";
			Class.forName(driver);
			Connection connec = DriverManager.getConnection(url, "root","");
			System.out.println("connected");
			return connec;
		}catch(Exception e )
		{
			System.out.println(e);
		}
		return null;
	}
	public static void createTable() throws Exception
	{
		try
		{
			//String section[] = new String[4];
			Connection conn = getConnection();
			String section[] = {"Business", "Banking", "Finance", "Technology"};
			int i, j=0;
			String table1 = "CREATE TABLE IF NOT EXISTS "
					+ "newsinsights.users(userid int PRIMARY KEY AUTO_INCREMENT, "
					+ "username varchar(25) UNIQUE NOT NULL, "
					+ "pass varchar(25) NOT NULL, "
					+ "email varchar(25) UNIQUE NOT NULL)";
			PreparedStatement create = conn.prepareStatement(table1);
			create.executeUpdate();
			for(i=0; i<4; i++)
			{
				
					String sectionCreate = "CREATE TABLE IF NOT EXISTS "
							+ "newsinsights."+ section[i] +"(id int PRIMARY KEY AUTO_INCREMENT, keywrd varchar(30) NOT NULL, "
							+ "day date NOT NULL, "
							+ "frequency int NOT NULL)";
			PreparedStatement createTable = conn.prepareStatement(sectionCreate);
			createTable.executeUpdate();
			}
		}catch(Exception e) { System.out.println(e);}
		finally {System.out.println("Create function executed");}
	}
	public static void insert() throws Exception
	{
		String var1 = "admin";
		String var2 = "admin";
		String var3 = "sarahsonje99@gmail.com";
		try
		{
			//System.out.println("HI11");
			Connection conn = getConnection();
			//System.out.println("H22");
			PreparedStatement insert = conn.prepareStatement("INSERT INTO "
					+ "usr(username, pass, email) values('"
					+var1+"', '"+var2+"', '"+var3+"')");
		//	System.out.println("HI33");
			//insert.executeUpdate();
			//System.out.println("HI34");
			String section[] = {"Business", "Banking", "Finance", "Technology"};
			//System.out.println("HI75");
			String keyword[] = {"HDFC", "Tesla", "Aviation", "GST"};
			StrInt stored[]= new StrInt[description.sized];
			int i, j = 0;
			
			//System.out.println("My size "+stored.length);
			description obj1= new description();
//			for(i=0; i<4; i++)
//			{
//			
////				for(j=0; j<4; j++) 
////				{
//					System.out.println("HI1");
//					
//					//System.out.println(keyword[j]);
//					
				int j1=3;
					stored=obj1.getfreq(keyword[j1]);
//					
					System.out.println("HI2");
					for(int p=282;p<300;p++)
					{
						System.out.println("Date = "+stored[p].date+"  and p= "+p+ " and fre = "+stored[p].freq);
						if(p==19)
							break;
					}
//					
//				System.exit(0);
//					System.out.println("---------------------  "+j);
					System.out.println("ADDED");
					System.out.println("---------------------");
					//System.out.println("stored acquired");
					//System.out.println(stored[j].date);
					//System.exit(0);
					
				//		System.out.println(keyword[j]+" "+stored[k].date +"  "+stored[k].freq);
							
					
					//stored=obj1.FindFreq(keyword[j]);
				
					for(int k=282;k<300;k++)
					{
					String sectionCreate = "INSERT INTO "
						+ section[3] +"(keywrd, day, frequency) VALUES('"+keyword[j1]+"', '"+stored[k].date +"', "+stored[k].freq+");";
					System.out.println(sectionCreate);
					PreparedStatement createTable = conn.prepareStatement(sectionCreate);
					createTable.executeUpdate();
					}
			
//					System.out.println("--------------------");
//			//}
//				System.out.println("--------------------");
				
				
			//}
			
			
			//System.exit(0);
			
			
			String data1 = null;
			System.out.println("HI1");
//			for(int k1=0;k1<4;k1++)
//			{
			int k1=3;
				System.out.println("HI2");
			//	System.out.println(keyword[j]+" "+stored[k].date +"  "+stored[k].freq);
					most data=obj1.whenwasitfirstused(keyword[k1]);
					System.exit(0);
					if(data.Sec==1)
					{
						 data1="business";
					}
					if(data.Sec==2)
					{
						data1="banking";
					}
					if(data.Sec==3)
					{
						data1="finance";
					}
					if(data.Sec==4)
					{
						data1="technology";
					}
				
			String sectionCreate1 = "INSERT INTO "
				+ "whenwasitfirstused" +"(section, keyword, date) VALUES('"+data1+"', '"+keyword[k1] +"', "+data.date+");";
			System.out.println(sectionCreate1);
			PreparedStatement createTable1 = conn.prepareStatement(sectionCreate1);
			createTable1.executeUpdate();
			//}
			
		}catch(Exception e) {System.out.println(e);}
		finally {System.out.println("Insert function execution completed");}
		
	}
}

