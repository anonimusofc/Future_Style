<?php
// Inicia a sessão
session_start();

// Dados do banco de dados
$host = 'localhost'; // Altere para seu host, caso não seja localhost
$dbname = 'seu_banco_de_dados'; // Altere para o nome do seu banco de dados
$username = 'seu_usuario'; // Altere para o nome do seu usuário do banco de dados
$password = 'sua_senha'; // Altere para a senha do seu banco de dados

// Conexão com o banco de dados usando PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitiza as entradas
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    // Verifica se os campos estão vazios
    if (empty($email) || empty($senha)) {
        $_SESSION['erro'] = "Por favor, preencha todos os campos.";
        header("Location: login.php"); // Redireciona de volta para a página de login
        exit();
    }

    // Consulta ao banco de dados para verificar as credenciais
    $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Se o usuário não existe ou a senha não confere
    if ($usuario === false || !password_verify($senha, $usuario['senha'])) {
        $_SESSION['erro'] = "E-mail ou senha incorretos.";
        header("Location: login.php");
        exit();
    }

    // Se as credenciais estiverem corretas, inicia a sessão
    $_SESSION['usuario_id'] = $usuario['id']; // Armazena o ID do usuário na sessão
    $_SESSION['usuario_email'] = $usuario['email']; // Armazena o e-mail do usuário na sessão

    // Redireciona para a página de boas-vindas ou painel do usuário
    header("Location: dashboard.php");
    exit();
}
?>

