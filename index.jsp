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
    <%! public List<String> types = new ArrayList<String>(); %>
    <%! public List<String> buttonColors = new ArrayList<String>(); %>
    
    
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<!DOCTYPE html>

<head>
<meta charset="ISO-8859-1"><link rel="stylesheet" type="text/css" href="index.css"> 
<link rel="stylesheet" type="text/css" href="bootstrap.css"> 


<script language="javascript" type="text/javascript" src="masonry.pkgd.js"></script>


<script type="text/javascript">
	// external js: masonry.pkgd.js

$(document).ready( function() {

  $('.grid').masonry({
    itemSelector: '.grid-item',
    columnWidth: 160
  });
  
});


</script></head>

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
	<input type="text" name="titleField" >
	<br>
	<label>category</label>
	
	<select  name="categoryField">
			<option>music</option>
			<option>life</option>
			<option>cars</option>
		</select>
	
	
	<!-- <input type="text" name="category" id="category"> -->
	<br>
	<label>content</label>
	<textarea rows="10" cols="50" name="contentField"></textarea>
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
types.add(0, "panel-primary");
types.add(1, "panel-success");
types.add(2, "panel-info");
types.add(3, "panel-warning");
types.add(4, "panel-danger");

buttonColors.add(0,"btn-primary");
buttonColors.add(1,"btn-success");
buttonColors.add(2,"btn-info");
buttonColors.add(3,"btn-warning");
buttonColors.add(4,"btn-danger");
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
	%><div class="grid">
 <%
	for(int i = 0, j = count, k = 0; i < count; i++, j--, k++){
		if(k>4){
			k=0;
		}
		%>
	
 <div class="panel <%=types.get(k)%>">

  <div class="panel-heading">

    <h3 class="panel-title">Panel title</h3>

  </div>

  <div class="panel-body">
	<% 
	
	if(content.get(i).length()>300){
		
		%>
		<%=content.get(i).subSequence(0, 300)%>
	<%
		
	}else{
		%>
		<%=content.get(i) %>
	<%
	}
	
	%>
	... <button type="button" class="btn <%=buttonColors.get(k)%>">Read More</button>
  </div>

</div>


		<%
		
	}
	%> </div>	<%
	}catch(SQLException e){
	e.printStackTrace();
}

%>


</body>
</html>
</body>
</html>