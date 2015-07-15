package test;

import java.io.*;
import java.sql.*;
import java.text.SimpleDateFormat;

import java.util.*;
import java.util.Date;

import javax.servlet.*;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.*;

/**
 * Servlet implementation class NewPost
 */
@WebServlet("/NewPost")
public class NewPost extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public NewPost() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());

		
		
		
		}
		
		

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);

	
		
		HttpSession session = request.getSession(false);
		final String email = session.getAttribute("email").toString();
		
		if(email.isEmpty()){ 
			
		}else{
			
			
			
			String title = request.getParameter("new_title");
			String category = request.getParameter("category");
			String description = request.getParameter("new_description");
			String postContent = request.getParameter("new_content");

			
			System.out.println("title is :"+title);
			System.out.println("category is :"+category);
			System.out.println("description is :"+description);
			System.out.println("content is :"+postContent);
			try{
			
			boolean newPostStatus = post_insert(email, title,category,description,postContent);
			
			if(newPostStatus){
				RequestDispatcher rd = request.getRequestDispatcher("afterLogin.html");
				rd.forward(request, response);
				
			}
			}catch (Exception e) {
			
				e.printStackTrace();
			}
	}

}
	private boolean  post_insert(String email, String title, String category, String description, String postContent) throws Exception{
		
		Connection con = DBConnection.DBConnect();
	
			
			SimpleDateFormat format = new SimpleDateFormat("yyyy");
			Date date = new Date();
			String sqlDate = format.format(date);
			format = new SimpleDateFormat( "MM" );
			sqlDate = sqlDate+"/"+format.format(date);
			format = new SimpleDateFormat("dd");
			sqlDate = sqlDate+"/"+format.format(date);

			PreparedStatement preStmt = con.prepareStatement("insert into new_post values(?,?,?,?,?,?)");
			preStmt.setString(1, email);
			preStmt.setString(2, title);
			preStmt.setString(3, category);
			preStmt.setString(4, description);
			preStmt.setString(5, postContent);
			preStmt.setString(6,sqlDate);
			
			int result = preStmt.executeUpdate();
			if(result>0){
				return true;
				
			}else{
				return false;
				
			}
			
		
		}
	
}
