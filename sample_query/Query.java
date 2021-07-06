package sample_query;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class Query {

	/**
	 * @param conn the connection object for query
	 * */
	public void select(Connection conn) {
		
		String query = "SELECT * FROM sample";
		
		try {
			Statement stmt = conn.createStatement();
			ResultSet rs = stmt.executeQuery(query);
			
			while(rs.next()) {
				System.out.println( rs.getString("str_data1") + "\t" + rs.getInt("int_data2"));
			}
			
		} catch (SQLException e) {
			System.out.println(e.getMessage());
			e.printStackTrace();
		}
	}
	
	/**
	 * @param conn the connection object for query
	 * @param data1 the sample data on db is str
	 * @param data2 the sample data on db is int
	 * */
	public void insert(Connection conn, String data1, int data2) {
		
		String query = "INSERT INTO sample(str_data1, int_data2)"
				+ "VALUES(?, ?)";
		
		try {
			PreparedStatement pstmt = conn.prepareStatement(query);
			pstmt.setString(1, data1);
			pstmt.setInt(2, data2);
			pstmt.executeUpdate();
			
			System.out.println("Data Created.");
			
		} catch (SQLException e) {
			System.out.println(e.getMessage());
			e.printStackTrace();
		}
	}
	

	/**
	 * @param conn the connection object for query
	 * @param data1 the sample data on db is str
	 * @param data2 the sample data on db is int
	 * 
	 * note* id used is "hello" for now
	 * */
	public void update(Connection conn, String data1, int data2) {

		String query = "UPDATE sample SET str_data1 = ? , "
                + "int_data2 = ? WHERE str_data1 = ?";
		
		try {
			PreparedStatement pstmt = conn.prepareStatement(query);
			pstmt.setString(1, data1);
			pstmt.setInt(2, data2);
			pstmt.setString(3, "hello");
			pstmt.executeUpdate();
			
			System.out.println("Data Updated.");
			
		} catch (SQLException e) {
			System.out.println(e.getMessage());
			e.printStackTrace();
		}
		
	}

	/**
	 * @param conn the connection object for query
	 * @param data1 the id of data to delete, is str
	 * */
	public void delete(Connection conn, String data1) {
		
		String query = "DELETE FROM sample WHERE str_data1 = ?";
		
		try {
			PreparedStatement pstmt = conn.prepareStatement(query);
			pstmt.setString(1, data1);
			pstmt.executeUpdate();

			System.out.println("Data Deleted.");
			
		} catch (SQLException e) {
			System.out.println(e.getMessage());
			e.printStackTrace();
		}
		
	}
	
}
