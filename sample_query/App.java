package sample_query;

import java.sql.Connection;

public class App {
	 /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
    	// test
    	// String conn = String.valueOf(Connect.connect());
        // System.out.println(conn);
    
    	Query db = new Query();
    	
    	// primary connection to dd
    	// for now should only connect once and close on exit
    	// using conn as parameter for query
    	Connection conn = Connect.connect(); 
    	
    	
    	db.select(conn);					 // display data
    	// db.insert(conn,"sample", 3);		 // create new data
    	// db.update(conn, "world", 2);		 // update data
    	// db.delete(conn, "world");         // delete data
    }
}
