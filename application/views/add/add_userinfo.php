<style type="text/css">
  /* Apply a basic styling to the form */
form {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f9f9f9;
}

/* Style labels for better readability */
label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

/* Style text inputs */
input[type="text"],
input[type="email"],
input[type="phone"],
input[type="category"],
input[type="country"],
input[type="tag"],
input[type="weather"],
input[type="status"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #fff;
}

/* Style the submit button */
input[type="submit"] {
  background-color: #007BFF;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
}

/* Hover effect for the submit button */
input[type="submit"]:hover {
  background-color: #0056b3;
}

/* Add some spacing between form elements */
form > * {
  margin-bottom: 10px;
}

</style>
<form action="" method="post">
  <label for="fname">First name:</label>
  <input type="text" id="fname" name="fname"><br><br>
  <label for="lname">Last name:</label>
  <input type="text" id="lname" name="lname"><br><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br><br>
  <label for="phone">Phone:</label>
  <input type="phone" id="phone" name="phone"><br><br>
  <label for="category">Category:</label>
  <input type="category" id="category" name="category"><br><br>
  <label for="country">country:</label>
  <input type="country" id="country" name="country"><br><br>
  <label for="tag">tag:</label>
  <input type="tag" id="tag" name="tag"><br><br>
  <label for="weather">weather:</label>
  <input type="weather" id="weather" name="weather"><br><br>
  <label for="status">status:</label>
  <input type="status" id="status" name="status"><br><br>
  <input type="submit" value="Submit">
</form>