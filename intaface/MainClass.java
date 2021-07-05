package intaface;
import java.sql.Connection;
import java.sql.PreparedStatement;  
import java.sql.SQLException;  


public class MainClass {
	
	private static void insert(String name,String desc) {
		Connection conn = DbConnection.connect();
		PreparedStatement pstmt =  null;
		
		try {
			String sql = "INSERT INTO item(item_name,item_desc) VALUES(?,?)";
			pstmt = conn.prepareStatement(sql);
			pstmt.setString(1, name);
			pstmt.setString(2,desc);
			pstmt.execute();
			System.out.println("napasok ko na lods!");
			
		}catch(SQLException e){
			System.out.println(e.getMessage());
		}
		
	}
	
	public static void main(String[] args) {
		Connection conn = DbConnection.connect();
		if(conn != null) {
			insert("pipi","mo");
		}
	}

}
