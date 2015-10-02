<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
</head>
<body>

<%
String keyValue = request.getAttribute("key_value").toString();
String [] splitKey = keyValue.split(":",3);
StringBuilder key = new StringBuilder();
key.append(splitKey[0]);
key.append(":");
key.append(splitKey[2]);

%>
<form action="index.jsp" >
	<input type="text" value="<%=key.toString() %>" onclick="this.select()" readonly />
	<input type="submit" value="OK" />
	<input type="submit" value="Cancel" />

</form>
</body>
</html>