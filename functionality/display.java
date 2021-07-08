/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package functionality;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.LinkedList;

/**
 *
 * @author KRcsa
 */
public class display {
     public static LinkedList<Item> loadinv(){
            LinkedList<Item> array = new LinkedList<>();
            Connection conn = null;
            ResultSet rs = null;
         try{
             conn = dbconn.connect();
             String sql = "Select * from item";
             Statement ps = conn.createStatement();
             rs = ps.executeQuery(sql);
             Item itm;
             while(rs.next()){
                 itm = new Item(rs.getString("item_name"),rs.getString("item_desc"),rs.getInt("property_num"),rs.getInt("date_aq"),rs.getInt("unit_meas"),rs.getDouble("unit_val"),rs.getDouble("total_val"),rs.getInt("quant_propcar"),rs.getInt("quant_phycou"),rs.getString("remarks"),1);
                 array.add(itm);
             }
            }catch(SQLException e){
             System.out.println(e.toString());
            }
         return array;
     
        }
      
}
