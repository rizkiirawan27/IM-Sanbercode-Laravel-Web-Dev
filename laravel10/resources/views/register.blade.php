<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Account Baru!</title>
</head>
<body>
    <h1>Buat Account Baru!</h1>
    <h2>Sign Up Form</h2>
    
    <form action="/welcome" method="POST">
        @csrf
        <label for="first-name">First name:</label><br>
        <input type="text" id="first-name" name="first-name" required><br><br>

        <label for="last-name">Last name:</label><br>
        <input type="text" id="last-name" name="last-name" required><br><br>

        <label>Gender:</label><br>
        <input type="radio" id="male" name="gender" value="Male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="Female">
        <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="Other">
        <label for="other">Other</label><br><br>

        <label for="nationality">Nationality:</label><br>
        <select id="nationality" name="nationality" required>
            <option value="Indonesian">Indonesian</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Thailand">Thailand</option>
            <option value="Other">Other</option>
        </select><br><br>

        <label>Language Spoken:</label><br>
        <input type="checkbox" id="bahasa" name="language" value="Bahasa Indonesia">
        <label for="bahasa">Bahasa Indonesia</label><br>
        <input type="checkbox" id="english" name="language" value="English">
        <label for="english">English</label><br>
        <input type="checkbox" id="other-language" name="language" value="Other">
        <label for="other-language">Other</label><br><br>

        <label for="bio">Bio:</label><br>
        <textarea id="bio" name="bio" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Sign Up">
    </form>
</body>
</html>