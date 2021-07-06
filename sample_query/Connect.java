package sample_query;

import java.sql.Connection;  
import java.sql.DriverManager;  
import java.sql.SQLException; 

public class Connect {
     /**
     * Connect to a sample database
     */
    public static Connection connect() {
        Connection conn = null;
        try {
        	try {
				Class.forName("org.sqlite.JDBC");
			} catch (ClassNotFoundException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
            // db parameters
            String url = "jdbc:sqlite:C:/Users/Ejohn/Desktop/my_workspace/practicum_cs/sample/sample.db";
            // create a connection to the database
            conn = DriverManager.getConnection(url);
            
            System.out.println("Connection to SQLite has been established.");
            
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
		return conn;
    }
   
}