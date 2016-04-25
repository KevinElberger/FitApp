<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Employee Lab</title>
</head>
<body>
<div id="form">
    <form>
        <h2 id="login">Add an Employee</h2>
        <label>First Name</label><br />
        <input id="firstName" type="text" required><br />
        <label>Last Name</label><br />
        <input id="lastName" type="text" required><br />
        <label>Department</label><br />
        <select id="department">
            <option value="computer science">Computer Science</option>
            <option value="humanities">Humanities</option>
            <option value="education">Education</option>
            <option value="mathematics">Mathematics</option>
            <option value="health">Health</option>
            <option value="psychology">Psychology</option>
        </select><br /><br />
        <button onclick="event.preventDefault(); addEmployee()">Submit →</button>
    </form><br/>
    <div id="announcement"><h2 id="employee_added"></h2></div>
    <div id="employee_name"></div>
    <div id="employee_department"></div>
    <div id="employee_id"></div>
    <div id="employee_hire"></div>
    <div id="total_employee"></div>
</div>
<script src="/js/employee.js"></script>
</body>
</html>