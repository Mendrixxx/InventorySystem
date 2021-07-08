/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package functionality;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

/**
 *
 * @author KRcsa
 */
public class operations {
    	public static void delete(String value){
		Connection conn = null; 
        try{
	    	conn = dbconn.connect();
	        String sql = "DELETE FROM item where item_name = '"+value+"'";
                PreparedStatement ps = conn.prepareStatement(sql);
                ps.execute();
	        System.out.println("Data has been deleted!"); 
	    }catch(SQLException e){
	        System.out.println(e.toString());
        }
	}
        
}
