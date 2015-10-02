package add_post;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DBConnection {
	public static Connection getConnection(){
		Connection con = null;
		try{
			Class.forName("com.mysql.jdbc.Driver");
		}catch(ClassNotFoundException c){
			c.printStackTrace();
		}
		try{
			con = DriverManager.getConnection("jdbc:mysql://localhost:3306/shubham","root","");
		}catch(SQLException e){
			e.printStackTrace();
		}
		return con;
	}
}
