<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Registro de Administrador</h1>
    <form action="../validar.php?option=6" method="post">
      <label for="token">Token:</label>
      <input type="text" id="token" name="token" required>
      
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="username">Nombre de Usuario:</label>
      <input type="text" id="username" name="username" required>
      
      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password" required>
      
      <button type="submit">Registrar</button>
    </form>
  </div>
</body>
<style>
 body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f0f0f0;
}

.container {
  max-width: 400px;
  margin: 50px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  margin-bottom: 20px;
}

form {
  display: flex;
  flex-direction: column;
}

label {
  margin-bottom: 5px;
}

input {
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

button {
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}


</style>
</html>