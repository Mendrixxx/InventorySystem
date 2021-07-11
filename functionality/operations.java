package functionality;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

public class Operations {
    	public static void delete(String value){
		Connection conn = null; 
        try{
	    	conn = Dbconn.connect();
	        String sql = "DELETE FROM item where item_id = "+value;
                PreparedStatement ps = conn.prepareStatement(sql);
                ps.execute();
	        System.out.println("Data has been deleted!"); 
	    }catch(SQLException e){
	        System.out.println(e.toString());
        }
	}
        
}
