package test;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DBConnection {
	public static Connection DBConnect(){
		Connection con = null;
		try{
			Class.forName("com.mysql.jdbc.Driver");
			
		}catch(ClassNotFoundException c){
			System.out.println("Problem connecting to the server.");
			c.printStackTrace();
		}
		try{
			con = DriverManager.getConnection("jdbc:mysql://localhost:3306/test1", "root", "");
		}catch(SQLException s){
			s.printStackTrace();
		}
		return con;
	}
}

