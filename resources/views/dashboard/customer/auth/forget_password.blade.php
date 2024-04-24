<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تغيير كلمة المرور</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
      }

      .container {
        width: 30%;
        margin: 100px auto;
        background-color: #fff;
        padding: 40px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      h1 {
        text-align: center;
        margin-bottom: 20px;
      }
      form {
        display: flex;
        justify-content: center;
        align-items: center;
      }

      label {
        display: block;
        margin-bottom: 5px;
      }

      input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
      }

      input[type="button"] {
        width: 50%;
        padding: 10px;
        background-color: #007bff;
        border: none;
        color: #fff;
        border-radius: 3px;
        cursor: pointer;
      }

      input[type="button"]:hover {
        background-color: #0056b3;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1> ادخل الاميل </h1>
      <form method="post" action="{{ route('forgetPassword') }}">
          @csrf
        <input type="email" name="email" value="" placeholder="ادخل الاميل " />
          <button type="submit" > ارسال </button>
      </form>
    </div>
  </body>
</html>
