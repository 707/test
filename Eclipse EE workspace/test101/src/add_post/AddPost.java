package add_post;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Locale;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class AddPost
 */
@WebServlet("/AddPost")
public class AddPost extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public AddPost() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		doPost(request, response);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		try{
			
			
				PrintWriter out = response.getWriter();
				out.print("lksdvlsdnvkln");
				
				PreparedStatement preStmt2 = DBConnection.getConnection().prepareStatement("select * from keycount");
				ResultSet countResult = preStmt2.executeQuery();
				if(countResult.next()){
					int newCount = Integer.parseInt(countResult.getString(1));
					PreparedStatement preStmt3 = DBConnection.getConnection().prepareStatement("update keycount set count=?");
					++newCount;
					preStmt3.setString(1, String.valueOf(newCount));
					int countChange = preStmt3.executeUpdate();
					if(countChange>0){

						out.println("Sdvsdvs");
						
						
						Connection con = DBConnection.getConnection();
						PreparedStatement preStmt = con.prepareStatement("insert into basics1(title, category, content, edited_at, post_key, ip_address) values(?,?,?,?,?,?)");
						preStmt.setString(1, request.getParameter("titleField"));
						preStmt.setString(2, request.getParameter("categoryField"));
						preStmt.setString(3, request.getParameter("contentField"));
						SimpleDateFormat dateFormat = new SimpleDateFormat(
				                "yyyy-MM-dd HH:mm:ss", Locale.getDefault());
				        Date date = new Date();
				       preStmt.setString(4,dateFormat.format(date));
				       
				       StringBuilder ipAddrFirst = new StringBuilder();
					   StringBuilder ipAddrSecond = new StringBuilder();
					   StringBuilder ipAddrFinal = new StringBuilder();
					   StringBuilder ipAddrMiddle = new StringBuilder();
				       
				       String ipAddress = request.getHeader("X-FORWARDED-FOR");  
					   if (ipAddress == null) {  
						   ipAddress = request.getRemoteAddr();  
						   String [] ipAddr = ipAddress.split(":");
						   
						   for(String ipTemp : ipAddr){
							  
							   ipAddrFirst.append(ipTemp);
							   
						   }
						   
						
							   ipAddrSecond.append(newCount);
							   
							   
						   ipAddrMiddle.append(":9176943663:");
						   ipAddrFinal.append(ipAddrFirst);
						   ipAddrFinal.append(ipAddrMiddle);
						   ipAddrFinal.append(ipAddrSecond);
						   
						   
				       
				       
				       
					   }
				       
				       
				       
				       
				       
						preStmt.setString(5, ipAddrFinal.toString());
						preStmt.setString(6, ipAddress.toString());
						int result = preStmt.executeUpdate();
						
						
						
						if(result>0){
						
						//	PrintWriter out = response.getWriter();
							
						RequestDispatcher dispatch = getServletContext().getRequestDispatcher("/show_key.jsp");
						request.setAttribute("key_value", ipAddrFinal.toString());
						dispatch.forward(request, response);
							
							
							//RequestDispatcher dispatch = getServletContext().getRequestDispatcher("/index.jsp");
							//dispatch.forward(request, response);
						}
					}
					
					
				}
				
				
				
			
		}catch(SQLException e){
			e.printStackTrace();
		}
		
		
	}

}
