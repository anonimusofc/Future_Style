<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Sugestão - Future Style</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .suggestion-container {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-50px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        button {
            background-color: #77ab59;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #5c8347;
        }
    </style>
</head>
<body>
    <div class="suggestion-container">
        <h1>Enviar Sugestão</h1>
        <form action="process-suggestion.php" method="POST">
            <div class="form-group">
                <label for="userName">Nome de Usuário:</label>
                <input type="text" id="userName" name="userName" required>
            </div>
            <div class="form-group">
                <label for="userEmail">Email:</label>
                <input type="email" id="userEmail" name="userEmail" required>
            </div>
            <div class="form-group">
                <label for="suggestion">Sugestão:</label>
                <textarea id="suggestion" name="suggestion" rows="4" required></textarea>
            </div>
            <button type="submit">Enviar Sugestão</button>
        </form>
    </div>
</body>
</html>
