package functionality;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.LinkedList;


public class Display {
     public static LinkedList<Item> loadinv(){
            LinkedList<Item> array = new LinkedList<>();
            Connection conn = null;
            ResultSet rs = null;
         try{
             conn = Dbconn.connect();
             String sql = "Select * from item";
             Statement ps = conn.createStatement();
             rs = ps.executeQuery(sql);
             Item itm;
             while(rs.next()){
                 itm = new Item(rs.getInt("item_id"),rs.getString("item_name"),rs.getString("item_desc"),rs.getInt("property_num"),rs.getInt("date_aq"),rs.getString("unit_meas"),rs.getDouble("unit_val"),rs.getDouble("total_val"),rs.getInt("quant_propcar"),rs.getInt("quant_phycou"),rs.getString("remarks"),rs.getInt("classification"),rs.getInt("SO_quant"),rs.getDouble("SO_val"));
                 array.add(itm);
             }
            }catch(SQLException e){
             System.out.println(e.toString());
            }
         return array;
     
        }
     
     public static LinkedList<Archive> loadsumm(int cls){
            LinkedList<Archive> array = new LinkedList<>();
            Connection conn = null;
            ResultSet rs = null;
            String sql = null;
         try{
             conn = Dbconn.connect();
             sql = "Select * from archive where Classification = "+cls; 
             Statement ps = conn.createStatement();
             rs = ps.executeQuery(sql);
             Archive arch;
             while(rs.next()){
                 arch = new Archive(rs.getInt("Year"),rs.getDouble("Total"),rs.getInt("Classification"));
                 array.add(arch);
             }
            }catch(SQLException e){
             System.out.println(e.toString());
            }
         return array;
     
        }
      
}
