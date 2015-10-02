package post_manipulations;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import add_post.DBConnection;


/**
 * Servlet implementation class DeletePost
 */
@WebServlet("/DeletePost")
public class DeletePost extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public DeletePost() {
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
		if(request.getParameter("submitButton")!=null){
			
		String key = request.getParameter("keyField");
		if(key.isEmpty()){
			
		}else{
			
			try{
				Connection con = DBConnection.getConnection();
				PreparedStatement preStmt = con.prepareStatement("delete from basics1 where post_key=?");
				
				String [] splitKey = key.split(":");
				StringBuilder keyFinal = new StringBuilder();
				keyFinal.append(splitKey[0]);
				keyFinal.append(":9176943663:");
				keyFinal.append(splitKey[1]);
				
				PrintWriter out = response.getWriter();
				out.print(keyFinal);
				preStmt.setString(1, keyFinal.toString());
				int delete = preStmt.executeUpdate();
				if(delete>0){
					RequestDispatcher dispatch = getServletContext().getRequestDispatcher("/index.jsp");
					dispatch.forward(request, response);
				}else{
					out.print("00000001:23");
				}
			}catch(SQLException e){
				e.printStackTrace();
			}
		}
	}else if(request.getParameter("cancelButton")!=null){
		RequestDispatcher dispatch = getServletContext().getRequestDispatcher("/index.jsp");
		dispatch.forward(request, response);
	}
	}

}
