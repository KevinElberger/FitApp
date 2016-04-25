var employees = [];
function addEmployee() {
    var d = new Date();
    var employee = {
        firstName: document.getElementById('firstName').value,
        lastName: document.getElementById('lastName').value,
        department: document.getElementById('department').value,
        idNum: getRandomInt(10000000,99999999),
        hireDate: d.toDateString()
    };
    // Add employee to employee array.
    employees.push(employee);
    var employeeAdded = document.getElementById('employee_added').innerHTML =
        "Employee Added";
    var employeeName = document.getElementById('employee_name').innerHTML =
        "Name: " + employee.lastName + ", " + employee.firstName;
    var employeeDept = document.getElementById('employee_department').innerHTML =
        "Department: " + employee.department;
    var employeeId = document.getElementById('employee_id').innerHTML =
        "ID: " + employee.idNum;
    var employeeHire = document.getElementById('employee_hire').innerHTML =
        "Hire Date: " + employee.hireDate;
    var totalEmployees = document.getElementById('total_employee').innerHTML =
        "Total Employees: " + employees.length;
}

// Returns a random integer between min and max.
function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}