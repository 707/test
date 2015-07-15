package test;

import java.io.*;
import java.sql.*;
import javax.servlet.*;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.*;

/**
 * Servlet implementation class LoginCheck
 */
@WebServlet(description = "Checks for user's login information and verifies the user's credentials.", urlPatterns = { "/LoginCheck" })
public class LoginCheck extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public LoginCheck() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
		System.out.println("reached here...");
		final String EMAIL = request.getParameter("loginEmail");
		final String PASSWORD = request.getParameter("loginPassword");
		
		try{
			boolean validation = userInfoCheck(EMAIL, PASSWORD);
			if(validation){
				
				HttpSession session = request.getSession();
				session.setAttribute("email", EMAIL);
				System.out.println("reached here...");
				
				RequestDispatcher rd = request.getRequestDispatcher("afterLogin.html");
				rd.forward(request, response);
				
			}
		}catch(SQLException sql){
			sql.printStackTrace();
		}
		
		
	}
	private boolean userInfoCheck(String email, String password) throws SQLException{
		System.out.println("reached here...");
		Connection con = DBConnection.DBConnect();
		ResultSet check = null;
		
		// The login_info table in test1 database has all the email id's and password for our users.
			PreparedStatement userCheck = con.prepareStatement("select * from login_info where email=? and password=?");
			userCheck.setString(1,email);
			userCheck.setString(2,password);
			check = userCheck.executeQuery();
			System.out.println("reached here...");
			if(check.next()){
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
