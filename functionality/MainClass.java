/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package functionality;
import java.sql.PreparedStatement;
import java.sql.Connection;
import java.sql.SQLException;
/**
 *
 * @author KRcsa
 */
public class MainClass {
    public static void main(String [] args){
        dbconn.connect();
    }
    private static void insert(String Name, String Pass){
    Connection con = dbconn.connect();
    PreparedStatement ps = null;
    try{
        String sql = "INSERT INTO data(Name, Pass) VALUES(?,?) ";
        ps = con.prepareStatement(sql);
        ps.setString(1, Name);
        ps.setString(2, Pass);
        ps.execute();
        System.out.println("Data has been inserted!");
    } catch(SQLException e){
        System.out.println(e.toString());
  }
}
}
