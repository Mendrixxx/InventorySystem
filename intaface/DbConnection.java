package intaface;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DbConnection {
	public static Connection connect() {
		Connection con = null;
		try {	 
			Class.forName("org.sqlite.JDBC");
			con = DriverManager.getConnection("jdbc:sqlite:inventorydb.db");//connection to database 
			System.out.println("Connecteda saksefuley!");
		}catch(ClassNotFoundException | SQLException e){
			System.out.println(e+" ");
		}
		return con;
	}
}
