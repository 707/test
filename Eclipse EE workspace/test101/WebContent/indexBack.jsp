<%@page import="add_post.DBConnection"%>
<%@page import="java.util.List"%>
<%@page import="java.util.ArrayList"%>
<%@page import="java.sql.SQLException"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.PreparedStatement"%>
<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.Connection"%>
<%@page import="java.io.PrintWriter"%>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
    <%! public static int postTrack = 0; %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
Hi. Welcome to test 101.
<hr>


<table border="1">
<legend> Basic elements that will be displayed.</legend>
	
	<tr>
		<th>post id</th>
	<tr>
	<tr>
		<th>title</th>
	</tr>
	<tr>
		<th>category of your own</th>
	</tr>
	<tr>
			<th>content</th>
	</tr>
	<tr>
		<th>like</th>
	</tr>
	<tr>
		<th>contact (if choosen the option while positing the post)</th>
	</tr>
	
</table>
<hr>
<br><br>
<p> This a template of how the new post popup will look like. The details that will be asked are given below.</p>

<form action="AddPost" method="POST">
<label>title</label>
	<input type="text" name="title" id="title">
	<br>
	<label>category</label>
	
	<select id="categories"  name="category">
			<option>music</option>
			<option>life</option>
			<option>cars</option>
		</select>
	
	
	<!-- <input type="text" name="category" id="category"> -->
	<br>
	<label>content</label>
	<textarea rows="10" cols="50" name="content"></textarea>
	<br>
	<input type="submit" value="submit">
	<br>
</form>

<hr>
<br><br>
<p>The site will only have what was posted today. People can just post anything that comes to their mind and it will only be there for a day ! All earased the next day.</p>

<table border="1">

<tr>
	<th>Today's Posts</th>
	<th>All posts</th>
</tr>
</table>
<p>
All the posts will be displayed below.
</p>
<%

try{
	Connection con = DBConnection.getConnection();

	PreparedStatement preStmt = con.prepareStatement("select * from basics1 order by edited_at DESC");
	PreparedStatement numberOfRecords = con.prepareStatement("select count(*) from basics1");
	ResultSet countResult = numberOfRecords.executeQuery();
	ResultSet result = preStmt.executeQuery();
	int count = 0;
	if(countResult.next()){
		count = countResult.getInt(1);
	}
	
	List<String> ids = new ArrayList<String>();
	List<String> titles = new ArrayList<String>();
	List<String> category = new ArrayList<String>();
	List<String> content = new ArrayList<String>();
	List<String> timestamp = new ArrayList<String>();
	while(result.next()){
		
		ids.add(result.getString(1));
		titles.add(result.getString(2));
		category.add(result.getString(3));
		content.add(result.getString(4));
		timestamp.add(result.getString(6));
	}
	
	for(int i = 0, j = count; i < count; i++, j--){
		%>
	<table border="1">
		<tr>
			<td>post number :</td>
			<td><%=j %></td>
		</tr>
		<tr>
			<td>id:</td>
			<td><%=ids.get(i) %>; For Testing; use hidden;</td>
			
		</tr>
		
	
		<tr>
			<td>title:</td>
			<td><%=titles.get(i) %></td>
		</tr>
		</tr>
			<td>category:</td>
			<td><%=category.get(i) %></td>
		</tr>
		</tr>
			<td>content</td>
			<td><%=content.get(i) %></td>
		</tr>	<tr>
			<td>timestamp:</td>
			<td><%=timestamp.get(i) %></td>
		</tr>
	
		</table>

		<form action="PostManipulations" method="POST">
		
		<input type="submit" value = "ipDisp" name= "user_ip" />
		<input type="hidden" name="id_value" value="<%= postTrack%>">
		</form>
		<form action="delete_key.jsp">
		<input type="submit" value="delete" name="delete_button" onclick="<%=postTrack= Integer.parseInt(ids.get(i)) %>" />
		
		</form>
		

		<%
		
	}
	
	}catch(SQLException e){
	e.printStackTrace();
}

%>


</body>
</html>
</body>
</html>