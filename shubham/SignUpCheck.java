package test;

import java.io.IOException;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLClientInfoException;
import java.sql.SQLException;

import javax.print.attribute.standard.PrinterIsAcceptingJobs;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import com.mysql.jdbc.SQLError;

/**
 * Servlet implementation class SignUpCheck
 */
@WebServlet("/SignUpCheck")
public class SignUpCheck extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public SignUpCheck() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
		final String FIRSTNAME = request.getParameter("firstName");
		final String LASTNAME = request.getParameter("lastName");
		final String EMAIL = request.getParameter("signUpEmail");
		final String PASSWORD = request.getParameter("signUpPassword");
		final String PASSWORDCONF = request.getParameter("passwordConfirm");
		
		if(PASSWORD.equals(PASSWORDCONF)){
			try{
				
				boolean creation = createUser(FIRSTNAME, LASTNAME, EMAIL, PASSWORD);
				if(creation){
					HttpSession session = request.getSession();
					session.setAttribute("email", EMAIL);
					
					RequestDispatcher rd = request.getRequestDispatcher("afterLogin.html");
					rd.forward(request, response);
					
				}
			}catch(SQLException sql){
				sql.printStackTrace();
			}
			
		}
		
	
	}
	private boolean createUser(String firstName, String lastname, String email, String password)throws SQLException{
		
		Connection con = DBConnection.DBConnect();
		PreparedStatement insert = con.prepareStatement("insert into all_details values(?,?,?,?)");
		insert.setString(1,firstName);
		insert.setString(2,lastname);
		insert.setString(3,email);
		insert.setString(4,password);
		
		int insertion = insert.executeUpdate();
		if(insertion > 0){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
