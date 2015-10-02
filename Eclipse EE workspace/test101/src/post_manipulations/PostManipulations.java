package post_manipulations;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import add_post.DBConnection;

/**
 * Servlet implementation class PostManipulations
 */
@WebServlet("/PostManipulations")
public class PostManipulations extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public PostManipulations() {
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
		PrintWriter out = response.getWriter();
		int id = Integer.parseInt(request.getParameter("id_value"));
		
			//out.println("The id value received is"+ request.getParameter("id_value"));
		/*	
			try{
				Connection con = DBConnection.getConnection();
				
				
				
				PreparedStatement preStmt = con.prepareStatement("delete from basics1 where post_id=?");
				preStmt.setInt(1, id);
				int delete = preStmt.executeUpdate();
				if(delete>0){
					RequestDispatcher dispatch = getServletContext().getRequestDispatcher("/index.jsp");
					dispatch.forward(request, response);
				}else{
					out.print("some error");
				}
			}catch(SQLException e){
				e.printStackTrace();
			}
			*/
			
			
		if(request.getParameter("user_ip")!=null){
			String ipAddress = request.getHeader("X-FORWARDED-FOR");  
			   if (ipAddress == null) {  
				   ipAddress = request.getRemoteAddr();  
				   out.println(ipAddress);
				   
				   
				   /*<input type="text" value="Click Me to Select Text" onclick="this.select()">
				   			*This selects the text displayed in the text field which the user can the copy.
				   			*Used here to display the key that will be associated with that post, which the user has to know to manipulate the post.
				   			
				    
				    
				    suppose the ip address is: 125:6:6:0:0:0:0:1 
				    we will represent the address as, let say - 125:6:6:0:0:0:0:1:5676:290:000000000000001
				    To the user it will be shown as - 1256600001000000000000001 (basically ignoring the ":" in the sequence - 125:6:6:0:0:0:0:1:000000000000001
				    The last part of the key - 000000000000001 will be auto_incrementing every post. so second post will have it let say, 000000000000002 and so on...
				    This number is our set value - 5676:290 which we will append searching from the database.
				    
				    
				    
				    
				    */
				   
				   
				   
				   String [] ipAddr = ipAddress.split(":");
				   StringBuilder ipAddrFirst = new StringBuilder();
				   StringBuilder ipAddrSecond = new StringBuilder();
				   StringBuilder ipAddrFinal = new StringBuilder();
				   StringBuilder ipAddrMiddle = new StringBuilder();
				   for(String ipTemp : ipAddr){
					   out.println(ipTemp);
					   ipAddrFirst.append(ipTemp);
					   
				   }
				   
				try{
					PreparedStatement preStmt4 = DBConnection.getConnection().prepareStatement("select * from keycount");
				
				   ResultSet res = preStmt4.executeQuery();
				   if(res.next()){
					   ipAddrSecond.append(res.getString(1));
					   
				   }
				   
				   ipAddrMiddle.append(":9176943663:");
				   ipAddrFinal.append(ipAddrFirst);
				   ipAddrFinal.append(ipAddrMiddle);
				   ipAddrFinal.append(ipAddrSecond);
				   
				   
				   out.println(ipAddrFinal);
				   
				   
				}catch(SQLException e){
					e.printStackTrace();
				}
				
				   
				   
				   
			   
			   }
			   
		}
	}

}
